<!doctype html>
<html lang="en">

<head>
    <title>
        <?php echo $title ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/vendor/css/bootstrap-slider.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/vendor/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/vendor/all.css">
    <link rel='stylesheet' href='<?php echo base_url() ?>public/vendor/css/animate.css'>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/stylesheets/ipadto.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/stylesheets/ipadnho.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/stylesheets/iphone.css">
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url() ?>public/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/stylesheets/styles.css">
    <style>
        .danghoatdong{
            color: red !important;
        }
    </style>
</head>

<body>

    <div class="nav col-md-12">
        <div class="col-md-6 logo">
            <small class="hot-line bounceIn"><i class="fa fa-phone"></i> Hotline: 0986818699</small>
            <div class="row">
                <p class="logo-word col-sm-3 bounceIn">
                    <a href="/alithea"><img class="anh-logo" src="<?php echo base_url() ?>public/images/logo.png" alt=""></a>
                </p>
                <form action="<?php echo base_url() ?>search-product" method="POST" class="col-sm-9 bounceIn">
                    <div class="form-group search-input">
                        <label for=""></label>
                        <input type="text" class="form-control" name="search_pro_name" placeholder="Search products name">
                    </div>
                    <button type="submit" class="nut-search" name="search_pro"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="col-md-6 menu">
            <ul>
                <li class="bounceIn"><a href="<?php echo base_url() ?>service">Services</a> </li>
                
                <li class="bounceIn" ><a href="<?php echo base_url() ?>about-us">About us</a></li>
                <li class="bounceIn" ><a href="<?php echo base_url() ?>contact">Contact</a></li>
                <a href="<?php echo base_url() ?>shopping-cart" class="xehang bounceIn">
                    <i class="fa fa-shopping-cart"></i>

                    <?php if(isset($_SESSION['qty_order'])) { ?>
                    <span class="badge badge-light custom-badge">
                        <?php echo $_SESSION['qty_order'] ?>
                    </span>
                    <?php } ?>       
                    
                </a>
                
                <?php if(isset($_SESSION['userlogin'])){ ?>
                    
                <li class="drd bounceIn" data-wow-delay="0.6s">
                <div class="dropdown" >
                    <div class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                        <?php echo $_SESSION['userlogin']['firstname'] ?>
                    </div>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo base_url() ?>edit-profile">Profile</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>shopping-cart">My order</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>logout">Logout</a>
                        <?php if($_SESSION['userlogin']['quyenAdmin'] == '1'){ ?>
                            <a class="dropdown-item" href="<?php echo base_url() ?>admin/Dashboard">Dashboard</a>
                        <?php } ?>                    
                    </div>
                </div>

                <?php } else{ ?>
                <li class="bounceIn ">
                    <a href="<?php echo base_url() ?>login">Log in</a>
                </li>
                <?php } ?>
                
                <li class="drd bounceIn">
                
                </li>         
            </ul>
        </div>
    </div>