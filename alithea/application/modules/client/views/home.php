<?php $this->load->view('template/header') ?>
<div class="col-sm-12 img-bgr">
    <header class="to">
        
    </header>
</div>
<div class="col-sm-8 offset-sm-2">
    <div class="row">
    <?php if(isset($_SESSION['success'])){ ?>
        <div class="alert alert-success text-center wow bounceInLeft col-sm-12 " data-wow-delay="0.1" role="alert">
            <strong><?php echo $_SESSION['success'] ?></strong>       
        </div>       
    <?php } ?>
    </div>
</div>
<section class="session1">
    <div class="row">
        <h2 class="text-center title-block wow bounceIn m-t-100" data-wow-delay="0.1s" data-wow-offset="50">
            CHECK OUT OUR NEWEST PHONE
        </h2>
        <div class="col-lg-12 grid-uniform">
            <div class="row">
                <?php if(isset($new_pro_update)){
                    foreach($new_pro_update as $val){ ?>
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
                  <?php }
                }?>

            </div>
        </div>
    </div>

    <div class="row">
        <h2 class="text-center title-block cart-title wow bounceIn m-t-100" data-wow-delay="0.1s" data-wow-offset="50">          
            HOT PHONE TYPES
        </h2>
        <?php if(isset($hot_cate)){
            foreach($hot_cate as $val){ ?>

        <a href="<?php echo base_url() ?>category-detail/<?php echo $val['cat_id'] ?>" class="col-sm-3 cate1 wow bounceInUp" data-wow-delay="0.1s">
            <div class=" text-center">
                <div class="tinto">
                    <img src="<?php echo base_url() ?>public/imageproducts/<?php echo $val['cat_img'] ?>" alt="">
                    <div class="xam"></div>

                    <div class="gradient"></div>
                    <div class="hinhvuong"></div>
                    <div class="chuto1">
                        <?php echo $val['cat_name'] ?>
                    </div>
                </div>
            </div>
        </a>

        <?php }
        } ?>
    </div>

    <div class="row">
        <h2 class="text-center title-block wow bounceIn m-t-100" data-wow-delay="0.1s" data-wow-offset="50">
            HOT PHONE
        </h2>
        <div class="col-lg-12 grid-uniform">
            <div class="row">
                <?php if(isset($hot_pro)){
                    foreach($hot_pro as $val){ ?>
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
                  <?php }
                }?>

            </div>
        </div>
    </div>
</section>

<?php $this->load->view('template/footer') ?>