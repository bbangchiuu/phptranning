<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Upload extends CI_Upload {
    
    function __construct()
    {
        parent::__construct();
    }

	public $max_size = 0;
	public $max_width = 0;
	public $max_height = 0;
	public $min_width = 0;
	public $min_height = 0;
	public $max_filename = 0;
	public $max_filename_increment = 100;
	public $allowed_types = '';
	public $file_temp = '';
	public $file_name = '';
	public $orig_name = '';
	public $file_type = '';
	public $file_size = NULL;
	public $file_ext = '';
	public $file_ext_tolower = FALSE;
	public $upload_path = '';
	public $overwrite = FALSE;
	public $encrypt_name = FALSE;
	public $is_image = FALSE;
	public $image_width = NULL;
	public $image_height = NULL;
	public $image_type = '';
	public $image_size_str = '';
	public $error_msg = array();
	public $remove_spaces = TRUE;
	public $detect_mime = TRUE;
	public $xss_clean = FALSE;
	public $mod_mime_fix = TRUE;
	public $temp_prefix = 'temp_file_';
    public $client_name = '';
    
	protected $_file_name_override = '';
	protected $_mimes = array();

	public function initialize(array $config = array(), $reset = TRUE)
	{
		$reflection = new ReflectionClass($this);

		if ($reset === TRUE)
		{
			$defaults = $reflection->getDefaultProperties();
			foreach (array_keys($defaults) as $key)
			{
				if ($key[0] === '_')
				{
					continue;
				}

				if (isset($config[$key]))
				{
					if ($reflection->hasMethod('set_'.$key))
					{
						$this->{'set_'.$key}($config[$key]);
					}
					else
					{
						$this->$key = $config[$key];
					}
				}
				else
				{
					$this->$key = $defaults[$key];
				}
			}
		}
		else
		{
			foreach ($config as $key => &$value)
			{
				if ($key[0] !== '_' && $reflection->hasProperty($key))
				{
					if ($reflection->hasMethod('set_'.$key))
					{
						$this->{'set_'.$key}($value);
					}
					else
					{
						$this->$key = $value;
					}
				}
			}
        }
        
		$this->_file_name_override = $this->file_name;
		return $this;
	}

	public function do_upload($field = 'userfile')
	{
		// Is $_FILES[$field] set? If not, no reason to continue.
		if (isset($_FILES[$field]))
		{
			$_file = $_FILES[$field];
		}
		// Does the field name contain array notation?
		elseif (($c = preg_match_all('/(?:^[^\[]+)|\[[^]]*\]/', $field, $matches)) > 1)
		{
			$_file = $_FILES;
			for ($i = 0; $i < $c; $i++)
			{
				// We can't track numeric iterations, only full field names are accepted
				if (($field = trim($matches[0][$i], '[]')) === '' OR ! isset($_file[$field]))
				{
					$_file = NULL;
					break;
				}

				$_file = $_file[$field];
			}
		}

		if ( ! isset($_file))
		{
			$this->set_error('upload_no_file_selected', 'debug');
			return FALSE;
		}

		// Is the upload path valid?
		if ( ! $this->validate_upload_path())
		{
			// errors will already be set by validate_upload_path() so just return FALSE
			return FALSE;
		}

		// Was the file able to be uploaded? If not, determine the reason why.
		if ( ! is_uploaded_file($_file['tmp_name']))
		{
			$error = isset($_file['error']) ? $_file['error'] : 4;

			switch ($error)
			{
				case UPLOAD_ERR_INI_SIZE:
					$this->set_error('upload_file_exceeds_limit', 'info');
					break;
				case UPLOAD_ERR_FORM_SIZE:
					$this->set_error('upload_file_exceeds_form_limit', 'info');
					break;
				case UPLOAD_ERR_PARTIAL:
					$this->set_error('upload_file_partial', 'debug');
					break;
				case UPLOAD_ERR_NO_FILE:
					$this->set_error('upload_no_file_selected', 'debug');
					break;
				case UPLOAD_ERR_NO_TMP_DIR:
					$this->set_error('upload_no_temp_directory', 'error');
					break;
				case UPLOAD_ERR_CANT_WRITE:
					$this->set_error('upload_unable_to_write_file', 'error');
					break;
				case UPLOAD_ERR_EXTENSION:
					$this->set_error('upload_stopped_by_extension', 'debug');
					break;
				default:
					$this->set_error('upload_no_file_selected', 'debug');
					break;
			}

			return FALSE;
		}

		// Set the uploaded data as class variables
		$this->file_temp = $_file['tmp_name'];
		$this->file_size = $_file['size'];

		// Skip MIME type detection?
		if ($this->detect_mime !== FALSE)
		{
			$this->_file_mime_type($_file);
		}

		$this->file_type = preg_replace('/^(.+?);.*$/', '\\1', $this->file_type);
		$this->file_type = strtolower(trim(stripslashes($this->file_type), '"'));
		$this->file_name = $this->_prep_filename($_file['name']);
		$this->file_ext	 = $this->get_extension($this->file_name);
		$this->client_name = $this->file_name;

		// Is the file type allowed to be uploaded?
		if ( ! $this->is_allowed_filetype())
		{
			$this->set_error('upload_invalid_filetype', 'debug');
			return FALSE;
		}

		// if we're overriding, let's now make sure the new name and type is allowed
		if ($this->_file_name_override !== '')
		{
			$this->file_name = $this->_prep_filename($this->_file_name_override);

			// If no extension was provided in the file_name config item, use the uploaded one
			if (strpos($this->_file_name_override, '.') === FALSE)
			{
				$this->file_name .= $this->file_ext;
			}
			else
			{
				// An extension was provided, let's have it!
				$this->file_ext	= $this->get_extension($this->_file_name_override);
			}

			if ( ! $this->is_allowed_filetype(TRUE))
			{
				$this->set_error('upload_invalid_filetype', 'debug');
				return FALSE;
			}
		}

		// Convert the file size to kilobytes
		if ($this->file_size > 0)
		{
			$this->file_size = round($this->file_size/1024, 2);
		}

		// Is the file size within the allowed maximum?
		if ( ! $this->is_allowed_filesize())
		{
			$this->set_error('upload_invalid_filesize', 'info');
			return FALSE;
		}

		// Are the image dimensions within the allowed size?
		// Note: This can fail if the server has an open_basedir restriction.
		if ( ! $this->is_allowed_dimensions())
		{
			$this->set_error('upload_invalid_dimensions', 'info');
			return FALSE;
		}

		// Sanitize the file name for security
		$this->file_name = $this->_CI->security->sanitize_filename($this->file_name);

		// Truncate the file name if it's too long
		if ($this->max_filename > 0)
		{
			$this->file_name = $this->limit_filename_length($this->file_name, $this->max_filename);
		}

		// Remove white spaces in the name
		if ($this->remove_spaces === TRUE)
		{
			$this->file_name = preg_replace('/\s+/', '_', $this->file_name);
		}

		if ($this->file_ext_tolower && ($ext_length = strlen($this->file_ext)))
		{
			// file_ext was previously lower-cased by a get_extension() call
			$this->file_name = substr($this->file_name, 0, -$ext_length).$this->file_ext;
		}

		/*
		 * Validate the file name
		 * This function appends an number onto the end of
		 * the file if one with the same name already exists.
		 * If it returns false there was a problem.
		 */
		$this->orig_name = $this->file_name;
		if (FALSE === ($this->file_name = $this->set_filename($this->upload_path, $this->file_name)))
		{
			return FALSE;
		}

		/*
		 * Run the file through the XSS hacking filter
		 * This helps prevent malicious code from being
		 * embedded within a file. Scripts can easily
		 * be disguised as images or other file types.
		 */
		if ($this->xss_clean && $this->do_xss_clean() === FALSE)
		{
			$this->set_error('upload_unable_to_write_file', 'error');
			return FALSE;
		}

		/*
		 * Move the file to the final destination
		 * To deal with different server configurations
		 * we'll attempt to use copy() first. If that fails
		 * we'll use move_uploaded_file(). One of the two should
		 * reliably work in most environments
		 */
		if ( ! @copy($this->file_temp, $this->upload_path.$this->file_name))
		{
			if ( ! @move_uploaded_file($this->file_temp, $this->upload_path.$this->file_name))
			{
				$this->set_error('upload_destination_error', 'error');
				return FALSE;
			}
		}

		/*
		 * Set the finalized image dimensions
		 * This sets the image width/height (assuming the
		 * file was an image). We use this information
		 * in the "data" function.
		 */
		$this->set_image_properties($this->upload_path.$this->file_name);

		return TRUE;
	}

	public function data($index = NULL)
	{
		$data = array(
				'file_name'		=> $this->file_name,
				'file_type'		=> $this->file_type,
				'file_path'		=> $this->upload_path,
				'full_path'		=> $this->upload_path.$this->file_name,
				'raw_name'		=> substr($this->file_name, 0, -strlen($this->file_ext)),
				'orig_name'		=> $this->orig_name,
				'client_name'		=> $this->client_name,
				'file_ext'		=> $this->file_ext,
				'file_size'		=> $this->file_size,
				'is_image'		=> $this->is_image(),
				'image_width'		=> $this->image_width,
				'image_height'		=> $this->image_height,
				'image_type'		=> $this->image_type,
				'image_size_str'	=> $this->image_size_str,
			);

		if ( ! empty($index))
		{
			return isset($data[$index]) ? $data[$index] : NULL;
		}

		return $data;
	}

	public function set_upload_path($path)
	{
		// Make sure it has a trailing slash
		$this->upload_path = rtrim($path, '/').'/';
		return $this;
	}

	public function set_filename($path, $filename)
	{
		if ($this->encrypt_name === TRUE)
		{
			$filename = md5(uniqid(mt_rand())).$this->file_ext;
		}

		if ($this->overwrite === TRUE OR ! file_exists($path.$filename))
		{
			return $filename;
		}

		$filename = str_replace($this->file_ext, '', $filename);

		$new_filename = '';
		for ($i = 1; $i < $this->max_filename_increment; $i++)
		{
			if ( ! file_exists($path.$filename.$i.$this->file_ext))
			{
				$new_filename = $filename.$i.$this->file_ext;
				break;
			}
		}

		if ($new_filename === '')
		{
			$this->set_error('upload_bad_filename', 'debug');
			return FALSE;
		}

		return $new_filename;
	}

	public function set_allowed_types($types)
	{
		$this->allowed_types = (is_array($types) OR $types === '*')
			? $types
			: explode('|', $types);
		return $this;
	}

	public function set_image_properties($path = '')
	{
		if ($this->is_image() && function_exists('getimagesize'))
		{
			if (FALSE !== ($D = @getimagesize($path)))
			{
				$types = array(1 => 'gif', 2 => 'jpeg', 3 => 'png');

				$this->image_width	= $D[0];
				$this->image_height	= $D[1];
				$this->image_type	= isset($types[$D[2]]) ? $types[$D[2]] : 'unknown';
				$this->image_size_str	= $D[3]; // string containing height and width
			}
		}

		return $this;
	}

	public function set_xss_clean($flag = FALSE)
	{
		$this->xss_clean = ($flag === TRUE);
		return $this;
	}

	public function is_image()
	{
		// IE will sometimes return odd mime-types during upload, so here we just standardize all
		// jpegs or pngs to the same file type.

		$png_mimes  = array('image/x-png');
		$jpeg_mimes = array('image/jpg', 'image/jpe', 'image/jpeg', 'image/pjpeg');

		if (in_array($this->file_type, $png_mimes))
		{
			$this->file_type = 'image/png';
		}
		elseif (in_array($this->file_type, $jpeg_mimes))
		{
			$this->file_type = 'image/jpeg';
		}

		$img_mimes = array('image/gif',	'image/jpeg', 'image/png');

		return in_array($this->file_type, $img_mimes, TRUE);
	}

	public function is_allowed_filetype($ignore_mime = FALSE)
	{
		if ($this->allowed_types === '*')
		{
			return TRUE;
		}

		if (empty($this->allowed_types) OR ! is_array($this->allowed_types))
		{
			$this->set_error('upload_no_file_types', 'debug');
			return FALSE;
		}

		$ext = strtolower(ltrim($this->file_ext, '.'));

		if ( ! in_array($ext, $this->allowed_types, TRUE))
		{
			return FALSE;
		}

		// Images get some additional checks
		if (in_array($ext, array('gif', 'jpg', 'jpeg', 'jpe', 'png'), TRUE) && @getimagesize($this->file_temp) === FALSE)
		{
			return FALSE;
		}

		if ($ignore_mime === TRUE)
		{
			return TRUE;
		}

		if (isset($this->_mimes[$ext]))
		{
			return is_array($this->_mimes[$ext])
				? in_array($this->file_type, $this->_mimes[$ext], TRUE)
				: ($this->_mimes[$ext] === $this->file_type);
		}

		return FALSE;
	}

	public function is_allowed_filesize()
	{
		return ($this->max_size === 0 OR $this->max_size > $this->file_size);
	}

	public function is_allowed_dimensions()
	{
		if ( ! $this->is_image())
		{
			return TRUE;
		}

		if (function_exists('getimagesize'))
		{
			$D = @getimagesize($this->file_temp);

			if ($this->max_width > 0 && $D[0] > $this->max_width)
			{
				return FALSE;
			}

			if ($this->max_height > 0 && $D[1] > $this->max_height)
			{
				return FALSE;
			}

			if ($this->min_width > 0 && $D[0] < $this->min_width)
			{
				return FALSE;
			}

			if ($this->min_height > 0 && $D[1] < $this->min_height)
			{
				return FALSE;
			}
		}

		return TRUE;
	}

	public function validate_upload_path()
	{
		if ($this->upload_path === '')
		{
			$this->set_error('upload_no_filepath', 'error');
			return FALSE;
		}

		if (realpath($this->upload_path) !== FALSE)
		{
			$this->upload_path = str_replace('\\', '/', realpath($this->upload_path));
		}

		if ( ! is_dir($this->upload_path))
		{
			$this->set_error('upload_no_filepath', 'error');
			return FALSE;
		}

		if ( ! is_really_writable($this->upload_path))
		{
			$this->set_error('upload_not_writable', 'error');
			return FALSE;
		}

		$this->upload_path = preg_replace('/(.+?)\/*$/', '\\1/',  $this->upload_path);
		return TRUE;
	}

	public function get_extension($filename)
	{
		$x = explode('.', $filename);

		if (count($x) === 1)
		{
			return '';
		}

		$ext = ($this->file_ext_tolower) ? strtolower(end($x)) : end($x);
		return '.'.$ext;
	}

	public function limit_filename_length($filename, $length)
	{
		if (strlen($filename) < $length)
		{
			return $filename;
		}

		$ext = '';
		if (strpos($filename, '.') !== FALSE)
		{
			$parts		= explode('.', $filename);
			$ext		= '.'.array_pop($parts);
			$filename	= implode('.', $parts);
		}

		return substr($filename, 0, ($length - strlen($ext))).$ext;
	}

	public function do_xss_clean()
	{
		$file = $this->file_temp;

		if (filesize($file) == 0)
		{
			return FALSE;
		}

		if (memory_get_usage() && ($memory_limit = ini_get('memory_limit')) > 0)
		{
			$memory_limit = str_split($memory_limit, strspn($memory_limit, '1234567890'));
			if ( ! empty($memory_limit[1]))
			{
				switch ($memory_limit[1][0])
				{
					case 'g':
					case 'G':
						$memory_limit[0] *= 1024 * 1024 * 1024;
						break;
					case 'm':
					case 'M':
						$memory_limit[0] *= 1024 * 1024;
						break;
					default:
						break;
				}
			}

			$memory_limit = (int) ceil(filesize($file) + $memory_limit[0]);
			ini_set('memory_limit', $memory_limit); // When an integer is used, the value is measured in bytes. - PHP.net
		}
		if (function_exists('getimagesize') && @getimagesize($file) !== FALSE)
		{
			if (($file = @fopen($file, 'rb')) === FALSE) // "b" to force binary
			{
				return FALSE; // Couldn't open the file, return FALSE
			}

			$opening_bytes = fread($file, 256);
			fclose($file);

			return ! preg_match('/<(a|body|head|html|img|plaintext|pre|script|table|title)[\s>]/i', $opening_bytes);
		}

		if (($data = @file_get_contents($file)) === FALSE)
		{
			return FALSE;
		}

		return $this->_CI->security->xss_clean($data, TRUE);
	}

	public function set_error($msg, $log_level = 'error')
	{
		$this->_CI->lang->load('upload');

		is_array($msg) OR $msg = array($msg);
		foreach ($msg as $val)
		{
			$msg = ($this->_CI->lang->line($val) === FALSE) ? $val : $this->_CI->lang->line($val);
			$this->error_msg[] = $msg;
			log_message($log_level, $msg);
		}

		return $this;
	}

	public function display_errors($open = '<p>', $close = '</p>')
	{
		return (count($this->error_msg) > 0) ? $open.implode($close.$open, $this->error_msg).$close : '';
	}

	protected function _prep_filename($filename)
	{
		if ($this->mod_mime_fix === FALSE OR $this->allowed_types === '*' OR ($ext_pos = strrpos($filename, '.')) === FALSE)
		{
			return $filename;
		}

		$ext = substr($filename, $ext_pos);
		$filename = substr($filename, 0, $ext_pos);
		return str_replace('.', '_', $filename).$ext;
	}
	protected function _file_mime_type($file)
	{
		// We'll need this to validate the MIME info string (e.g. text/plain; charset=us-ascii)
		$regexp = '/^([a-z\-]+\/[a-z0-9\-\.\+]+)(;\s.+)?$/';

		if (function_exists('finfo_file'))
		{
			$finfo = @finfo_open(FILEINFO_MIME);
			if (is_resource($finfo)) // It is possible that a FALSE value is returned, if there is no magic MIME database file found on the system
			{
				$mime = @finfo_file($finfo, $file['tmp_name']);
				finfo_close($finfo);

				if (is_string($mime) && preg_match($regexp, $mime, $matches))
				{
					$this->file_type = $matches[1];
					return;
				}
			}
		}

		if (DIRECTORY_SEPARATOR !== '\\')
		{
			$cmd = function_exists('escapeshellarg')
				? 'file --brief --mime '.escapeshellarg($file['tmp_name']).' 2>&1'
				: 'file --brief --mime '.$file['tmp_name'].' 2>&1';

			if (function_usable('exec'))
			{
	
				$mime = @exec($cmd, $mime, $return_status);
				if ($return_status === 0 && is_string($mime) && preg_match($regexp, $mime, $matches))
				{
					$this->file_type = $matches[1];
					return;
				}
			}

			if ( ! ini_get('safe_mode') && function_usable('shell_exec'))
			{
				$mime = @shell_exec($cmd);
				if (strlen($mime) > 0)
				{
					$mime = explode("\n", trim($mime));
					if (preg_match($regexp, $mime[(count($mime) - 1)], $matches))
					{
						$this->file_type = $matches[1];
						return;
					}
				}
			}

			if (function_usable('popen'))
			{
				$proc = @popen($cmd, 'r');
				if (is_resource($proc))
				{
					$mime = @fread($proc, 512);
					@pclose($proc);
					if ($mime !== FALSE)
					{
						$mime = explode("\n", trim($mime));
						if (preg_match($regexp, $mime[(count($mime) - 1)], $matches))
						{
							$this->file_type = $matches[1];
							return;
						}
					}
				}
			}
		}

		// Fall back to mime_content_type(), if available (still better than $_FILES[$field]['type'])
		if (function_exists('mime_content_type'))
		{
			$this->file_type = @mime_content_type($file['tmp_name']);
			if (strlen($this->file_type) > 0) // It's possible that mime_content_type() returns FALSE or an empty string
			{
				return;
			}
		}

		$this->file_type = $file['type'];
	}
}