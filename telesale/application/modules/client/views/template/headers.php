<!DOCTYPE html>
<html lang="en" class="">

<head>
    <base href="<?php echo base_url() ?>">
    <meta charset="utf-8" />
    <title>Html version | Angulr</title>
    <link rel="shocurt icon" type="image/ico" href="favicion.ico">
    <meta name="description"
    content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />

    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link rel="stylesheet" href="css/app.css" type="text/css" />
    <style>
      .danghoatdong{
        color: red !important;
      }
      
    </style>
</head>

<body>
  <div class="app app-header-fixed ">

    <!-- header -->
    <header id="header" class="app-header navbar" role="menu">
      

      <!-- navbar collapse -->
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
            <i class="fa fa-dedent fa-fw text"></i>
            <i class="fa fa-indent fa-fw text-active"></i>
          </a>
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user">
            <i class="icon-user fa-fw"></i>
          </a>
        </div>
        <!-- / buttons -->

        <!-- link and dropdown -->
        <ul class="nav navbar-nav hidden-sm">
          <li class="dropdown pos-stc">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
              <span>Mega</span>
              <span class="caret"></span>
            </a>
            <div class="dropdown-menu wrapper w-full bg-white">
              <div class="row">
                <div class="col-sm-4">
                  <div class="m-l-xs m-t-xs m-b-xs font-bold">Pages <span class="badge badge-sm bg-success">10</span>
                  </div>
                  <div class="row">
                    <div class="col-xs-6">
                      <ul class="list-unstyled l-h-2x">
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Profile</a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Post</a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Search</a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Invoice</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-xs-6">
                      <ul class="list-unstyled l-h-2x">
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Price</a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Lock screen</a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Sign in</a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Sign up</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 b-l b-light">
                  <div class="m-l-xs m-t-xs m-b-xs font-bold">UI Kits <span class="label label-sm bg-primary">12</span>
                  </div>
                  <div class="row">
                    <div class="col-xs-6">
                      <ul class="list-unstyled l-h-2x">
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Buttons</a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Icons <span
                              class="badge badge-sm bg-warning">1000+</span></a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Grid</a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Widgets</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-xs-6">
                      <ul class="list-unstyled l-h-2x">
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Bootstap</a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Sortable</a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Portlet</a>
                        </li>
                        <li>
                          <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Timeline</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 b-l b-light">
                  <div class="m-l-xs m-t-xs m-b-sm font-bold">Analysis</div>
                  <div class="text-center">
                    <div class="inline">
                      <div ui-jq="easyPieChart" ui-options="{
                          percent: 65,
                          lineWidth: 50,
                          trackColor: '#e8eff0',
                          barColor: '#23b7e5',
                          scaleColor: false,
                          size: 100,
                          rotate: 90,
                          lineCap: 'butt',
                          animate: 2000
                        }">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
              <i class="fa fa-fw fa-plus visible-xs-inline-block"></i>
              <span translate="header.navbar.new.NEW">New</span> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#" translate="header.navbar.new.PROJECT">Projects</a></li>
              <li>
                <a href>
                  <span class="badge bg-info pull-right">5</span>
                  <span translate="header.navbar.new.TASK">Task</span>
                </a>
              </li>
              <li><a href translate="header.navbar.new.USER">User</a></li>
              <li class="divider"></li>
              <li>
                <a href>
                  <span class="badge bg-danger pull-right">4</span>
                  <span translate="header.navbar.new.EMAIL">Email</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- / link and dropdown -->

        <!-- search form -->
        <form class="navbar-form navbar-form-sm navbar-left shift" ui-shift="prependTo" data-target=".navbar-collapse"
          role="search" ng-controller="TypeaheadDemoCtrl">
          <div class="form-group">
            <div class="input-group">
              <input type="text" ng-model="selected"
                typeahead="state for state in states | filter:$viewValue | limitTo:8"
                class="form-control input-sm bg-light no-border rounded padder" placeholder="Search projects...">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
        </form>
        <!-- / search form -->

        <!-- nabar right -->
        
              <ul class="nav navbar-nav navbar-right">
              <?php 
                if($this->session->has_userdata('userEmail')){  
              ?>
                <li class="dropdown">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    <i class="icon-bell fa-fw"></i>
                    <span class="visible-xs-inline">Notifications</span>
                    <span class="badge badge-sm up bg-danger pull-right-xs">2</span>
                  </a>
                  <!-- dropdown -->
                  <div class="dropdown-menu w-xl animated fadeInUp">
                    <div class="panel bg-white">
                      <div class="panel-heading b-light bg-light">
                        <strong>You have <span>2</span> notifications</strong>
                      </div>
                      <div class="list-group">
                        <a href class="list-group-item">
                          <span class="pull-left m-r thumb-sm">
                            <img src="<?php echo base_url(); ?>img/<?php echo $this->session->userdata('avatars') ?>" alt="..." class="img-circle">
                          </span>
                          <span class="clear block m-b-none">
                            Use awesome animate.css<br>
                            <small class="text-muted">10 minutes ago</small>
                          </span>
                        </a>
                        <a href class="list-group-item">
                          <span class="clear block m-b-none">
                            1.0 initial released<br>
                            <small class="text-muted">1 hour ago</small>
                          </span>
                        </a>
                      </div>
                      <div class="panel-footer text-sm">
                        <a href class="pull-right"><i class="fa fa-cog"></i></a>
                        <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                      </div>
                    </div>
                  </div>
                  <!-- / dropdown -->
                </li>
                <li class="dropdown">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
                    <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                      <img src="<?php echo base_url(); ?>img/<?php echo $this->session->userdata('avatars') ?>" alt="...">
                      <i class="on md b-white bottom"></i>
                    </span>
                    <span class="hidden-sm hidden-md"><?php echo $this->session->userdata('userName') ?></span> <b class="caret"></b>
                  </a>
                  <!-- dropdown -->
                  <ul class="dropdown-menu animated fadeInRight w">
                    <li class="wrapper b-b m-b-sm bg-light m-t-n-xs">
                      <div>
                        <p>300mb of 500mb used</p>
                      </div>
                      <div class="progress progress-xs m-b-none dker">
                        <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="50%"
                          style="width: 50%"></div>
                      </div>
                    </li>
                    <li>
                      <a href="http://localhost:8080/telesale/editUser.html">
                        <span class="badge bg-danger pull-right">30%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li>
                      <a ui-sref="app.page.profile">Profile</a>
                    </li>
                    <li>
                      <a ui-sref="app.docs">
                        <span class="label bg-info pull-right">new</span>
                        Help
                      </a>
                    </li>
                    <?php
                      if($this->session->userdata('quyenAdmin') === '1'){
                        ?>
                        <li>
                          <a ui-sref="app.docs" href="http://localhost:8080/telesale/index.html">
                            <span class="label bg-info pull-right"></span>
                            Dashboard
                          </a>
                        </li>
                        <?php
                      }
                    ?>
                    <li class="divider"></li>
                    <li>
                      <a ui-sref="access.signin" href="logout.html">Logout</a>
                    </li>
                  </ul>
                  <!-- / dropdown -->
                </li>
                <?php
                }else{ ?>
                <li class="dropdown">
                  <a href="http://localhost:8080/telesale/page_signin.html">Đăng nhập</a>
                </li>
                    <?php
                }
              ?>
              </ul>
            
        
        <!-- / navbar right -->
      </div>
      <!-- / navbar collapse -->
    </header>
    <!-- / header -->
    