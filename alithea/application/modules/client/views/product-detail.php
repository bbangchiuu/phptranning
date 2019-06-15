<?php $this->load->view('template/header') ?>
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
                        <div class="bot-thumbnail wow bounceInRight" data-wow-delay="0.3s">
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
                                    <div class="input-group-prepend">
                                        <button class="btn btn-danger btn-sm pick-color"></button>
                                    </div>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-info btn-sm pick-color"></button>
                                    </div>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-success btn-sm pick-color"></button>
                                    </div>
                                </div>
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
                    
                    

                    <div class="bock-video-sp col-sm-6">
                        <div class="with-100">
                            <div class="top-thumbnail wow bounceInRight" data-wow-delay="0.2s">
                                <p class="col-sm-12 j-center"><strong>Description:</strong>
                                    <?php echo $pro_detail['description'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </form>
</div>

</div>

<?php $this->load->view('template/footer') ?>