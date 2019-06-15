<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {
    /**
     * Keep track of which sparks are loaded. This will come in handy for being
     *  speedy about loading files later.
     *
     * @var array
     */
    var $_ci_loaded_sparks = array();

    /**
     * Is this version less than CI 2.1.0? If so, accomodate
     * @bubbafoley's world-destroying change at: http://bit.ly/sIqR7H
     * @var bool
     */
    var $_is_lt_210 = false;

    /**
     * Constructor. Define SPARKPATH if it doesn't exist, initialize parent
     */

    /** Load a module view **/

    function __construct(){
         if(!defined('SPARKPATH'))
        {
            define('SPARKPATH', 'sparks/');
        }

        $this->_is_lt_210 = (is_callable(array('CI_Loader', 'ci_autoloader'))
                               || is_callable(array('CI_Loader', '_ci_autoloader')));

        parent::__construct();     
    }

    public function view($view, $vars = array(), $return = FALSE)
    {
        list($path, $_view) = Modules::find($view, $this->_module, 'views/');

        if ($path != FALSE)
        {
            $this->_ci_view_paths = array($path => TRUE) + $this->_ci_view_paths;
            $view = $_view;
        }

        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => ((method_exists($this,'_ci_object_to_array')) ? $this->_ci_object_to_array($vars) : $this->_ci_prepare_view_vars($vars)), '_ci_return' => $return));
    }

    function spark($spark, $autoload = array())
    {
        if(is_array($spark))
        {
            foreach($spark as $s)
            {
                $this->spark($s);
            }
        }

        $spark = ltrim($spark, '/');
        $spark = rtrim($spark, '/');

        $spark_path = SPARKPATH . $spark . '/';
        $parts      = explode('/', $spark);
        $spark_slug = strtolower($parts[0]);

        # If we've already loaded this spark, bail
        if(array_key_exists($spark_slug, $this->_ci_loaded_sparks))
        {
            return true;
        }

        # Check that it exists. CI Doesn't check package existence by itself
        if(!file_exists($spark_path))
        {
            show_error("Cannot find spark path at $spark_path");
        }

        if(count($parts) == 2)
        {
            $this->_ci_loaded_sparks[$spark_slug] = $spark;
        }

        $this->add_package_path($spark_path);

        foreach($autoload as $type => $read)
        {
            if($type == 'library')
                $this->library($read);
            elseif($type == 'model')
                $this->model($read);
            elseif($type == 'config')
                $this->config($read);
            elseif($type == 'helper')
                $this->helper($read);
            elseif($type == 'view')
                $this->view($read);
            else
                show_error ("Could not autoload object of type '$type' ($read) for spark $spark");
        }

        // Looks for a spark's specific autoloader
        $this->ci_autoloader($spark_path);

        return true;
    }

	/**
	 * Pre-CI 2.0.3 method for backward compatility.
	 *
	 * @param null $basepath
	 * @return void
	 */
	function _ci_autoloader($basepath = NULL)
	{
		$this->ci_autoloader($basepath);
	}

	function ci_autoloader($basepath = NULL)
	{
        if($basepath !== NULL)
        {
            $autoload_path = $basepath.'config/autoload'.EXT;
        }
        else
        {
            $autoload_path = APPPATH.'config/autoload'.EXT;
        }

        if(! file_exists($autoload_path))
        {
            return FALSE;
        }

		include($autoload_path);

		if ( ! isset($autoload))
		{
			return FALSE;
		}

        if($this->_is_lt_210 || $basepath !== NULL)
        {
            // Autoload packages
            if (isset($autoload['packages']))
            {
                foreach ($autoload['packages'] as $package_path)
                {
                    $this->add_package_path($package_path);
                }
            }
        }

        // Autoload sparks
		if (isset($autoload['sparks']))
		{
			foreach ($autoload['sparks'] as $spark)
			{
				$this->spark($spark);
			}
		}

        if($this->_is_lt_210 || $basepath !== NULL)
        {
            if (isset($autoload['config']))
            {
                // Load any custom config file
                if (count($autoload['config']) > 0)
                {
                    $CI =& get_instance();
                    foreach ($autoload['config'] as $key => $val)
                    {
                        $CI->config->load($val);
                    }
                }
            }

            // Autoload helpers and languages
            foreach (array('helper', 'language') as $type)
            {
                if (isset($autoload[$type]) AND count($autoload[$type]) > 0)
                {
                    $this->$type($autoload[$type]);
                }
            }

            // A little tweak to remain backward compatible
            // The $autoload['core'] item was deprecated
            if ( ! isset($autoload['libraries']) AND isset($autoload['core']))
            {
                $autoload['libraries'] = $autoload['core'];
            }

            // Load libraries
            if (isset($autoload['libraries']) AND count($autoload['libraries']) > 0)
            {
                // Load the database driver.
                if (in_array('database', $autoload['libraries']))
                {
                    $this->database();
                    $autoload['libraries'] = array_diff($autoload['libraries'], array('database'));
                }

                // Load all other libraries
                foreach ($autoload['libraries'] as $item)
                {
                    $this->library($item);
                }
            }

            // Autoload models
            if (isset($autoload['model']))
            {
                $this->model($autoload['model']);
            }
        }
	}
}