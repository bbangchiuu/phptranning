<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/vendor/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/vendor/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/fonts/">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/vendor/all.css">
    <link rel='stylesheet' href='<?php echo base_url() ?>public/vendor/css/animate.css'>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/stylesheets/dropzone.css">
    
    <link rel="stylesheet" href="<?php echo base_url() ?>public/stylesheets/styles.css">

    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url() ?>public/favicon.ico"/>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>
    <style>
        .danghoatdong{
            color: red !important;
        }
    </style>
</head>
<body>
    
</body>
</html>

<body>
    <div class="top-nav-admin">
        <nav aria-label="breadcrumb" class="dan-huong col-sm-6 offset-sm-3 ">
            <ol class="breadcrumb">
              <li class="breadcrumb-item breadcrumb-custom"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $title ?></li>
            </ol>
          </nav>
    </div>
    <div class="wrapper col-sm-3">
            <div class="row">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <div class="row">
                        <div class="col-xs-12 admin-pic">
                            <img src="<?php echo base_url() ?>public/images/admin.png" alt="" class="logo-admin">
                        </div>
                        <h4 class="col-sm-12">Administrator</h4>
                        
                        <ul class="col-sm-12">
                                <div class="row">
                            <li>
                                <h6><a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle online-toggle"><i class="fa fa-circle online"></i>Online</a></h6>	
                                <ul class="collapse list-unstyled" id="pageSubmenu">
                                    <li>
                                        <a href="#">Profile</a>
                                    </li>
                                    <li>
                                        <a href="/users/logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                        </ul>
                        
                    </div>
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a href="/alithea"><i class="fa fa-home"></i> <span class="m-l-5">Home</span> </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/Dashboard/"><i class="fa fa-tachometer-alt"></i> <span class="m-l-5">Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/list-users"><i class="fa fa-users"></i><span class="m-l-5">User</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/list-product"><i class="fa fa-gift"></i><span class="m-l-5">Product</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/list-categories"><i class="fa fa-align-center"></i><span class="m-l-5">Category</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/orders"><i class="fa fa-shopping-cart"></i><span class="m-l-5">Order</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/list-customer"><i class="fa fa-users"></i><span class="m-l-5">Customer</span></a>
                    </li>
                    <li class="calendar-btn">
                        <a href="<?php echo base_url() ?>admin/register-admin"><i class="fa fa-users"></i><span class="m-l-5">Register Admin</span></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-envelope"></i><span class="m-l-5">Mail Box</span></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-map-marker"></i><span class="m-l-5">Map</span></a>
                    </li>
                    
                    <li>
                        <a href=""><i class="fa fa-wrench"></i> <span class="m-l-5">Service</span></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-phone-square"></i><span class="m-l-5">Contact Us</span></a>
                    </li>
                </ul>
            </nav>
        
            <div class="content">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button type="button" id="sidebarCollapse" class="btn btn-info wow bounceIn" data-wow-delay="0.3s">
                        <i class="fa fa-align-justify"></i>
                    </button>
                </nav>
            </div>
            
        </div>
    </div>
    