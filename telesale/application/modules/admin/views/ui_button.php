<?php $this->load->view('template/headers') ?>

<?php $this->load->view('template/asides') ?>


  <!-- content -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
	    

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Buttons</h1>
</div>
<div class="wrapper-md">
  <div class="row">
    <div class="col-md-6">
      <h4 class="m-t-xs">Button options</h4>
      <div>
        <button class="btn m-b-xs w-xs btn-default">Default</button>
        <button class="btn m-b-xs w-xs btn-primary">Primary</button>
        <button class="btn m-b-xs w-xs btn-success">Success</button>
        <button class="btn m-b-xs w-xs btn-info">Info</button>
        <button class="btn m-b-xs w-xs btn-warning">Warning</button>
        <button class="btn m-b-xs w-xs btn-danger">Danger</button>
        <button class="btn m-b-xs w-xs btn-dark">Dark</button>
        <button class="btn m-b-xs w-xs btn-default disabled">Disabled</button>
      </div>

      <h4 class="m-t-lg">
        Button addon
      </h4>
      <p>
        <button class="btn m-b-xs btn-sm btn-primary btn-addon"><i class="fa fa-plus"></i>Primary</button>
        <button class="btn m-b-xs btn-sm btn-info btn-addon"><i class="fa fa-trash-o"></i>Info</button>
        <button class="btn m-b-xs btn-sm btn-success btn-addon"><i class="fa fa-minus pull-right"></i>Success</button>
        <button class="btn m-b-xs btn-sm btn-warning btn-addon"><i class="fa fa-circle"></i>Warning</button>
        <button class="btn m-b-xs btn-sm btn-default btn-addon"><i class="fa fa-plus"></i>Default</button>
      </p>
      <p>
        <button class="btn btn-default btn-addon"><i class="fa fa-music"></i>Default</button>
        <button class="btn btn-info btn-addon"><i class="fa fa-play"></i>Info</button>
      </p>
      
      <h4 class="m-t">Button size</h4>
      <p>
        <button class="btn btn-default btn-lg">Large</button>
        <button class="btn btn-primary btn-addon btn-lg"><i class="fa fa-plus"></i>Addon</button>
      </p>
      <p>
        <button class="btn btn-default">Default button</button>
      </p>
      <p>
        <button class="btn btn-default btn-sm">Small button</button>
      </p>
      <p>
        <button class="btn btn-default btn-xs">Extra small button</button>
      </p>
 
      <h4 class="m-t-lg">Button dropdowns</h4>
      <p class="text-muted">Single button dropdowns</p>
      <div class="m-b-sm">
        <div class="btn-group dropdown">
          <button class="btn btn-default" data-toggle="dropdown">Action <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href>Action</a></li>
            <li><a href>Another action</a></li>
            <li><a href>Something else here</a></li>
            <li class="divider"></li>
            <li><a href>Separated link</a></li>
          </ul>
        </div>
        <div class="btn-group dropdown">
          <button class="btn btn-success" data-toggle="dropdown">Action <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href>Action</a></li>
            <li><a href>Another action</a></li>
            <li><a href>Something else here</a></li>
            <li class="divider"></li>
            <li><a href>Separated link</a></li>
          </ul>
        </div>
      </div>
      <div class="m-b-sm">
        <div class="btn-group dropdown">
          <button class="btn btn-default btn-sm" data-toggle="dropdown">Action <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href>Action</a></li>
            <li><a href>Another action</a></li>
            <li><a href>Something else here</a></li>
            <li class="divider"></li>
            <li><a href>Separated link</a></li>
          </ul>
        </div>
      </div>
      <div class="m-b-sm">
        <div class="btn-group dropdown">
          <button class="btn btn-default btn-xs" data-toggle="dropdown">Action <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href>Action</a></li>
            <li><a href>Another action</a></li>
            <li><a href>Something else here</a></li>
            <li class="divider"></li>
            <li><a href>Separated link</a></li>
          </ul>
        </div>
      </div>
      <p class="text-muted">Split button dropdowns & variation </p>
      <div class="m-b-sm">
        <div class="btn-group dropdown">
          <button class="btn btn-default">Action</button>
          <button class="btn btn-default" data-toggle="dropdown"><span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href>Action</a></li>
            <li><a href>Another action</a></li>
            <li><a href>Something else here</a></li>
            <li class="divider"></li>
            <li><a href>Separated link</a></li>
          </ul>
        </div>
        <div class="btn-group dropdown dropup">
          <button class="btn btn-default">Action</button>
          <button class="btn btn-default" data-toggle="dropdown"><span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href>Action</a></li>
            <li><a href>Another action</a></li>
            <li><a href>Something else here</a></li>
            <li class="divider"></li>
            <li><a href>Separated link</a></li>
          </ul>
        </div>
      </div>

      <h4 class="m-t-lg">Button with icon</h4>
      <p>
        <button class="btn btn-default"><i class="fa fa-html5"></i> Html5</button>
        <button class="btn btn-info"><i class="fa fa-css3"></i> CSS3</button>
      </p>            
      <p>
        <button class="btn btn-default btn-lg btn-block"><i class="fa fa-bars pull-right"></i> Block button with icon</button>
      </p>
      <p>
        <button class="btn btn-default btn-block"><i class="fa fa-bars pull-left"></i> Block button with icon</button>
      </p>      
      <h4 class="m-t-lg">
        Button icon
      </h4>
      <p>
        <button class="btn btn-sm btn-icon btn-info"><i class="fa fa-twitter"></i></button>
        <button class="btn btn-sm btn-icon btn-danger"><i class="fa fa-google-plus"></i></button>
      </p>
      <h4 class="m-t-lg">
        Button icon rounded
      </h4>
      <p>
        <button class="btn btn-rounded btn-sm btn-icon btn-default"><i class="fa fa-twitter"></i></button>
        <button class="btn btn-rounded btn btn-icon btn-default"><i class="fa fa-facebook"></i></button>
        <button class="btn btn-rounded btn-lg btn-icon btn-default"><i class="fa fa-google-plus"></i></button>
      </p>       
    </div>
    <div class="col-md-6">
      <h4 class="m-t-xs">Rounded button</h4>
      <div>
        <button class="btn m-b-xs w-xs btn-default btn-rounded">Default</button>
        <button class="btn m-b-xs w-xs btn-primary btn-rounded">Primary</button>
        <button class="btn m-b-xs w-xs btn-success btn-rounded">Success</button>
        <button class="btn m-b-xs w-xs btn-info btn-rounded">Info</button>
        <button class="btn m-b-xs w-xs btn-warning btn-rounded">Warning</button>
        <button class="btn m-b-xs w-xs btn-danger btn-rounded">Danger</button>
        <button class="btn m-b-xs w-xs btn-dark btn-rounded">Dark</button>
        <button class="btn m-b-xs w-xs btn-default btn-rounded disabled">Disabled</button>
      </div>

      <h4 class="m-t-lg">Button groups</h4>
      <div class="m-b-sm">
        <div class="btn-group">
          <button type="button" class="btn btn-default">Left</button>
          <button type="button" class="btn btn-default">Middle</button>
          <button type="button" class="btn btn-default">Right</button>
        </div>              
      </div>
      <p class="text-muted">Vertical button groups</p>
      <div class="btn-group-vertical m-b-sm">
        <button type="button" class="btn btn-default">Top</button>
        <button type="button" class="btn btn-default">Middle</button>
        <button type="button" class="btn btn-default">Bottom</button>
      </div>
      <p class="text-muted">Nested button groups</p>
      <div class="btn-group m-b-sm">
        <button type="button" class="btn btn-default">1</button>
        <button type="button" class="btn btn-success">2</button>
        <button type="button" class="btn btn-default">3</button>
        <div class="btn-group dropdown">
          <button type="button" class="btn btn-default" data-toggle="dropdown">
            Dropdown
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href>Dropdown link</a></li>
            <li><a href>Dropdown link</a></li>
            <li><a href>Dropdown link</a></li>
          </ul>
        </div>
      </div>
      <p class="text-muted">Justified button groups</p>
      <div class="m-b-sm">
        <div class="btn-group btn-group-justified">
          <a href class="btn btn-primary">Left</a>
          <a href class="btn btn-info">Middle</a>
          <a href class="btn btn-success">Right</a>
        </div>
      </div>
      <p class="text-muted">Multiple button groups</p>
      <div class="btn-toolbar">
        <div class="btn-group">
          <button type="button" class="btn btn-default">1</button>
          <button type="button" class="btn btn-default active">2</button>
          <button type="button" class="btn btn-default">3</button>
          <button type="button" class="btn btn-default">4</button>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-default">5</button>
          <button type="button" class="btn btn-default">6</button>
          <button type="button" class="btn btn-default">7</button>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-default">8</button>
        </div>
      </div>
    
      <h4 class="m-t-lg">Button components</h4>
      <p class="text-muted">
        <span>There are a few easy ways to quickly get started with Bootstrap, each one ...</span>
        <span class="text-muted hide" id="moreless"> appealing to a different skill level and use case. Read through to see what suits your particular needs.</span>
      </p>
      <p>
        <button class="btn btn-sm btn-default" ui-toggle-class="show" target="#moreless">
          <i class="fa fa-plus text"></i>
          <span class="text">More</span>
          <i class="fa fa-minus text-active"></i>
          <span class="text-active">Less</span>
        </button>
      </p>
      <p>
        <button class="btn btn-default" ui-toggle-class="btn-success">
          <i class="fa fa-cloud-upload text"></i>
          <span class="text">Upload</span>
          <i class="fa fa-check text-active"></i>
          <span class="text-active">Success</span>
        </button>
        <a class="btn btn-default" ui-toggle-class="button">
          <i class="fa fa-heart-o text"></i>
          <i class="fa fa-heart text-active text-danger"></i>
        </a>
        <a class="btn btn-default" ui-toggle-class="button">
          <span class="text">
            <i class="fa fa-thumbs-up text-success"></i> 25
          </span>
          <span class="text-active">
            <i class="fa fa-thumbs-down text-danger"></i> 10
          </span>
        </a>
        <button class="btn btn-success" ui-toggle-class="show inline" target="#spin">
          <span class="text">Save</span>
          <span class="text-active">Saving...</span>
        </button> 
        <i class="fa fa-spin fa-spinner hide" id="spin"></i>
      </p>
      <div class="m-b-sm">
        <div class="btn-group" ng-init="radioModel = 'Male'">
          <label class="btn btn-sm btn-info"    ng-model="radioModel" btn-radio="'Male'"><i class="fa fa-check text-active"></i> Male</label>
          <label class="btn btn-sm btn-success" ng-model="radioModel" btn-radio="'Female'"><i class="fa fa-check text-active"></i> Female</label>
          <label class="btn btn-sm btn-primary" ng-model="radioModel" btn-radio="'N/A'"><i class="fa fa-check text-active"></i> N/A</label>
        </div>
      </div>

      <div class="m-b-sm">
        <div class="btn-group" ng-init="checkModel = {option1: true, option2: false}">
          <label class="btn btn-sm btn-default" ng-model="checkModel.option1" btn-checkbox>Option1</label>
          <label class="btn btn-sm btn-default" ng-model="checkModel.option3" btn-checkbox>Option2</label>
        </div>                
      </div>

      <h4 class="m-t-lg">
        <button class="pull-right text-sm btn btn-xs btn-default" ui-toggle-class="btn-rounded" target="#social-buttons button">Toggle</button>
        Social buttons
      </h4>
      <p id="social-buttons">
        <button class="btn btn-rounded btn-sm btn-info"><i class="fa fa-fw fa-twitter"></i> Twitter</button>
        <button class="btn btn-rounded btn-sm btn-danger"><i class="fa fa-fw fa-google-plus"></i> Google+</button>
      </p>
    </div>
  </div>
</div>



	</div>
  </div>
  <!-- /content -->
  
  <?php $this->load->view('template/footers') ?>
