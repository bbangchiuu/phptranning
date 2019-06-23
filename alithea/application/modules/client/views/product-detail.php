<?php $this->load->view('template/header') ?>
<!--- --->
<div class="an_dien_thongtin nen_an_dien_thongtin col-md-12" id="nenthongtin"></div>
<div class="an_dien_thongtin" id="thongtin_cus_commnet">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <button type="button" class="close" id="dongcuaso" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</button>
            <h5 class="card-title text-center">Bạn phải nhập thông tin</h5>
            <hr>
            <form class="form-signin">
              <div class="form-label-group">
                <label for="inputEmail">Họ tên</label>
                <input type="text" class="form-control" id="add_fullname" placeholder="Họ tên" required>
                <div id="error-add-fullname" style="color: red;"></div>
              </div>
              <hr>
              <div class="form-label-group">
                <label for="inputEmail">Email address</label>
                <input type="email" class="form-control" id="add_email" placeholder="Email (để nhận phản hồi qua email)" required>
                <div id="error-add-email" style="color: red;"></div>
              </div>
              <hr>
              <div class="form-label-group">
                <label for="inputPassword">Số điện thoại</label>
                <input type="text" class="form-control" id="add_telephone" placeholder="Số điện thoại (để phản hồi qua Zalo)" required>
                <div id="error-add-telephone" style="color: red;"></div>
              </div>
              <hr>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" id="add_profile_cus" type="button">Gửi bình luận</button>

            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<!--- --->

<div class="detail11">
    <div class="container">
    </div>
    <form action="" method="POST" role="form">
    <section class="section detail-product">
        <div class="container w-7">
            <div class="row">
                <div class="nav-detail col-sm-12 wow bounceInLeft" data-wow-delay="0.1s">
                    
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/alithea">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo $pro_detail['pro_name'] ?>
                                </li>
                               
                            </ol>
                        </nav>
                                                      
                </div>
                <div class="bock-img-sp col-sm-6">
                    <div class="with-100">
                        <div class="top-thumbnail box wow bounceInLeft" data-wow-delay="0.2s">                           
                            <img src="<?php echo base_url() ?>public/imageproducts/<?php echo $pro_detail['img_thumbnail'] ?>" class="anh-thumbnail" alt="">                      
                        </div>
                        <div class="bot-thumbnail wow bounceInLeft" data-wow-delay="0.3s">
                            <div class="row">
                                <?php if(isset($img_detail)){
                                    foreach($img_detail as $val){ ?>

                                <div class="col-sm-4">
                                    <img src="<?php echo base_url() ?>public/imageproducts/<?php echo $val['image_detail'] ?>" class="anh-thumbnail box" alt="">
                                </div>

                                <?php   }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5 pull-right gt_sanpham">
                    <p class="tieude wow bounceInRight" data-wow-delay="0.2s">
                        <?php echo $pro_detail['pro_name'] ?>
                    </p>
                    <div class="price wow bounceInRight" data-wow-delay="0.3s">
                        <div class="row">
                            <p class="col-sm-12"><strong>Price:</strong> $
                                <?php echo $pro_detail['pro_price'] ?>
                            </p>
                        </div>
                    </div>

                    <div class="addtocard wow bounceInRight" data-wow-delay="0.4s">
                        <p>
                            <span class="get">Get it<strong> ~</strong> with</span>
                            <span class="free">Free Shipping!</span>
                        </p>
                    </div>

                    
                                
                    <div class="row m-top-30 wow bounceInRight" data-wow-delay="0.5s">
                        <div class="col-sm-12 col-sm-offset-4">
                            <div class="row">
                                <p class="col-sm-3"><strong>Quantity:</strong> </p>
                                <div class="input-group col-sm-5 mb-3">
                                    <div class="input-group-prepend">
                                        <div class="btn btn-light btn-sm" id="minus-btn"><i class="fa fa-minus"></i></div>
                                    </div>
                                    <input type="number" id="qty_inputs" class="form-control form-control-sm" value="1" name="qty_inputs">
                                    <div class="input-group-prepend">
                                        <div class="btn btn-light btn-sm" id="plus-btn"><i class="fa fa-plus"></i></div>
                                    </div>
                                </div>
                                <small>
                                    <?php echo $pro_detail['pro_quantity'] ?> products are available!
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row m-top-30 wow bounceInRight" data-wow-delay="0.6s">
                        <div class="col-sm-12 col-sm-offset-4">
                            <div class="row">
                                <p class="col-sm-3"><strong>Color:</strong></p>
                                <div class="input-group col-sm-8 mb-3">
                                    <div class="custom-radios">
                                        <div>
                                            <input type="radio" id="color-1" name="color_pro" value="black" checked>
                                            <label for="color-1">
                                                <span></span>
                                            </label>
                                        </div>

                                        <div>
                                            <input type="radio" id="color-2" name="color_pro" value="blue">
                                            <label for="color-2">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div>
                                            <input type="radio" id="color-3" name="color_pro" value="yellow">
                                            <label for="color-3">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div>
                                            <input type="radio" id="color-4" name="color_pro" value="red">
                                            <label for="color-4">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-top-30 wow bounceInRight">
                        <div class="with-100">
                            <div class="top-thumbnail wow bounceInRight" data-wow-delay="0.2s">
                                <p class="col-sm-12 j-center"><strong>Description:</strong>
                                    <?php echo $pro_detail['description'] ?>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row m-top-30">
                        <div class="col-sm-12 col-sm-offset-4">
                            <div class="input-group col-sm-8 mb-3">
                                <div class="row">
                                    <?php if($pro_detail['pro_quantity'] > '0'){ ?> 
                                    
                                    <a href="">
                                        <button type="submit" class="btn btn-danger add-to-cart wow bounceInRight" data-wow-delay="0.2s" name="add_to_cart">
                                            <i class="fa fa-cart-plus"></i> 
                                            Add to cart
                                        </button>
                                    </a>
                                    <?php }else{ ?> 
                                        <div class="btn btn-danger add-to-cart wow bounceInRight">
                                            <i class="fa fa-cart-plus"></i> 
                                            Hết Hàng
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 wow bounceInRight m-t-50">
                        <p class="col-sm-12 j-center"><strong>Thông số kĩ thuật:</strong></p>    
                        <table class="table table-striped">
                       
                        <tbody>
                            <tr>                            
                                <td>Màn hình:</td>
                                <td><?php if(isset($thongsokithuat)){ echo $thongsokithuat['screen']; }?></td>  
                            </tr>
                            <tr>                            
                                <td>Hệ điều hành:</td>
                                <td><?php if(isset($thongsokithuat)){ echo $thongsokithuat['operating_system']; }?></td>  
                            </tr>
                            <tr>                            
                                <td>CPU:</td>
                                <td><?php if(isset($thongsokithuat)){ echo $thongsokithuat['CPU']; }?></td>  
                            </tr>
                            <tr>                            
                                <td>RAM:</td>
                                <td><?php if(isset($thongsokithuat)){ echo $thongsokithuat['RAM']; }?></td>  
                            </tr>
                            <tr>                            
                                <td>Bộ nhớ trong:</td>
                                <td><?php if(isset($thongsokithuat)){ echo $thongsokithuat['memory']; }?></td>  
                            </tr>
                            <tr>                            
                                <td>Thẻ nhớ:</td>
                                <td><?php if(isset($thongsokithuat)){ echo $thongsokithuat['memory_stick']; }?></td>  
                            </tr>
                            <tr>                            
                                <td>Thẻ SIM:</td>
                                <td><?php if(isset($thongsokithuat)){ echo $thongsokithuat['SIM']; }?></td>  
                            </tr>
                            <tr>                            
                                <td>Dung lượng pin:</td>
                                <td><?php if(isset($thongsokithuat)){ echo $thongsokithuat['battery_capacity']; }?></td>  
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    
              
                </div>
            </div>
    </section>
    </form>
</div>

<?php if(isset($_SESSION['error_order'])){ ?>
    <script>

    alert("Giỏ hàng đã đầy");

    </script>
<?php } ?>
<div class="detail11">
<section class="section detail-product">
<div class="container">

<div class="row bootstrap snippets">
    <div class="col-md-2"></div>
    <div class="col-md-9 col-md-offset-2 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <p>List comment</p>
                <div class="panel-body">                
                    <form method="post">
                        <div class="panel-heading">
                        Comment panel
                        </div>
                        <input type="hidden" id="pro_id_comment" value="<?php echo $pro_detail['pro_id'] ?>">
                        <?php if(isset($_SESSION['userlogin'])){ ?>
                            <input type="hidden" id="fullname_cus" value="<?php echo $_SESSION['userlogin']['lastname'].' '.$_SESSION['userlogin']['firstname']; ?>">
                            <input type="hidden" id="email_cus" value="<?php echo $_SESSION['userlogin']['email']; ?>">
                            <input type="hidden" id="telephone_cus" value="<?php echo $_SESSION['userlogin']['telephone']; ?>">
                        <?php }else{ ?>
                            <input type="hidden" id="fullname_cus" value="<?php if(isset($_SESSION['cus_commnet'])){ echo $_SESSION['cus_commnet']['fullname']; } ?>">
                            <input type="hidden" id="email_cus" value="<?php if(isset($_SESSION['cus_commnet'])){ echo $_SESSION['cus_commnet']['fullname']; } ?>">
                            <input type="hidden" id="telephone_cus" value="<?php if(isset($_SESSION['cus_commnet'])){ echo $_SESSION['cus_commnet']['fullname']; } ?>">
                        <?php } ?>
                        
                        <textarea id="comment_cus" class="form-control" placeholder="write a comment..." rows="3" require></textarea>
                        <div id="erroComment" style="color: red;"></div>
                        <br>
                        <?php if(isset($_SESSION['userlogin'])){ ?>
                            <button type="button" class="btn btn-info pull-right" name="submit_comment" 
                                value="<?php echo $_SESSION['userlogin']['email']; ?>" 
                                id="xacnhan_cus_commnet">
                                Post
                            </button>
                        <?php }else{ ?>

                            <button type="button" class="btn btn-info pull-right" name="submit_comment" 
                                value="<?php if(isset($_SESSION['cus_commnet'])){ echo $_SESSION['cus_commnet']['email']; } ?>" 
                                id="xacnhan_cus_commnet">
                                Post
                            </button>

                        <?php } ?>
                        <div class="clearfix"></div>
                    </form>
                    <ul class="media-list" id="list_commnet">
                        <?php if(isset($listcomment)){
                            foreach($listcomment as $val){ ?>

                        <li class="media">
                            <a class="pull-left" style="margin-right: 10px;">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <p class="text-muted"><?php echo $val['uploaded_on']; ?></p>
                                </span>
                                <strong class="text-success"><?php echo $val['fullname'] ?></strong>
                                <p>
                                    <?php echo $val['conntent_comment'] ?>
                                </p>
                            </div>
                        </li>
                        <hr>

                            <?php }
                        }
                        ?>
                    </ul>
                    
                </div>
            </div>
        </div>

    </div>
</div>

</div>
</section>
</div>

<div class="detail11">
<section class="section detail-product">
<div class="row">
        <h2 class="text-center title-block wow bounceIn m-t-100" data-wow-delay="0.1s" data-wow-offset="50">
            Các sản phẩm cùng thể loại
        </h2>
        <div class="col-lg-12 grid-uniform">
            <div class="row">
                <?php if(isset($sp_cung_theloai)){
                    foreach($sp_cung_theloai as $val){ 
                        if($val['pro_id'] == $pro_detail['pro_id']){ ?>

                    <?php }else{ ?>

                    
                    
                <div class="col-sm-3 float-left">
                    <a href="<?php echo base_url() ?>product-detail/<?php echo $val['pro_id'] ?>">
                        <div class=" wow bounceIn" data-wow-delay="0.1s">
                            <div class="grid__item  product-item">
                                <div class="grid__image">
                                    <img class="anhthem2" src="<?php echo base_url() ?>public/imageproducts/<?php echo $val['img_thumbnail'] ?>">
                                    
                                </div>
                                <form action="" class="variants AddToCartForm">
                                    <h3 class="h6"><a href="">
                                            <?php echo $val['pro_name'] ?></a></h3>
                                    <div class="price">
                                        <span class="product-price">
                                            $
                                            <?php echo $val['pro_price'] ?>
                                        </span>
                                        <span class="collection-ratings__wrap">
                                            <div class="star-ratings-css">
                                                <div class="star-ratings-css-top">
                                                    <span>★</span>
                                                    <span>★</span>
                                                    <span>★</span>
                                                    <span>★</span>
                                                    <span>★</span>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>                       
                    </a>
                </div>
                <?php } ?>
                  <?php }
                }?>

            </div>
        </div>
    </div>
</section>
</div>
<?php $this->load->view('template/footer') ?>