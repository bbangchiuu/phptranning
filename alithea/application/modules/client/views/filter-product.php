<?php $this->load->view('template/header') ?>
<div class="detail12">
    <div class="container ">
        <div class="row">
            <div class="nav-detail col-sm-12 wow bounceInLeft" data-wow-delay="0.1s">
                <nav aria-label="breadcrumb col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Categories</a></li>
                    </ol>
                </nav>

            </div>

            
            <div class="col-sm-3 ">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 block1 box">
                            <p class="wow bounceIn" data-wow-delay="0.1s"><i class="fa fa-align-center"
                                    aria-hidden="true"></i> Categories</p>
                            <hr>
                            <ul>
                                <?php if(isset($list_cat)){
                                    foreach($list_cat as $val){ ?>

                                <a href="<?php echo base_url() ?>category-detail/<?php echo $val['cat_id'] ?>">
                                    <li class="wow bounceIn" aria-current="page">
                                        <?php echo $val["cat_name"] ?>
                                    </li>
                                </a>
                                
                                <hr class="wow bounceIn" data-wow-delay="0.1s">
                                <?php    }
                                } ?>
                            </ul>
                        </div>
                        
                        <div class="col-sm-12 block1 box">
                            <p class="wow bounceIn" data-wow-delay="0.1"><i class="fa fa-dollar-sign" aria-hidden="true"></i>
                                Price Filter</p>
                            <hr>
                            <div class="block1">
                                <ul>
                                <form action="" method="POST">
                                        <li class="wow bounceIn" data-wow-delay="0.2">
                                            <input class="inputcheck" id="checkbox1" name="pro_price" type="radio"
                                                value="5" style="display: none;" />
                                            <label class="checkbox" for="checkbox1">
                                                <span>
                                                    <div width="12px" height="10px"></div>
                                                </span>
                                                <span>
                                                    <= 5$</span> </label> </li> <hr>
                                        <li class="wow bounceIn" data-wow-delay="0.3">
                                            <input class="inputcheck" id="checkbox2" name="pro_price" value="9" type="radio"
                                                style="display: none;" />
                                            <label class="checkbox" for="checkbox2">
                                                <span>
                                                    <div width="12px" height="10px">

                                                    </div>
                                                </span>
                                                <span>5$ - 9$</span>
                                            </label>

                                        </li>
                                        <hr>
                                        <li class="wow bounceIn" data-wow-delay="0.4">
                                            <input class="inputcheck" id="checkbox3" type="radio" name="pro_price"
                                                value="13" style="display: none;" />
                                            <label class="checkbox" for="checkbox3">
                                                <span>
                                                    <div width="12px" height="10px">
                                                    </div>
                                                </span>
                                                <span>9$ - 13$</span>
                                            </label>
                                        </li>
                                        <hr>
                                        <li class="wow bounceIn" data-wow-delay="0.5">
                                            <input class="inputcheck" id="checkbox4" name="pro_price" value="13" type="radio"
                                                style="display: none;" />
                                            <label class="checkbox" for="checkbox4">
                                                <span>
                                                    <div width="12px" height="10px">

                                                    </div>
                                                </span>
                                                <span> > 13$</span>
                                            </label>
                                        </li>
                                        <hr>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 m-b-30 wow bounceIn" data-wow-delay="0.2">
                            <div class="form-group">
                                <div class="row">
                                    <button type="submit" class="btn btn-primary btn-block kieu2" name="filter_pro">Filter</button>
                                </div>
                            </div>
                        
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            

            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                        <?php if(isset($filter_pro)){
                            foreach($filter_pro as $val){ ?>

                            <div class="col-sm-4 m-b-30 wow bounceIn" data-wow-delay="0.1s">
                                <a href="<?php echo base_url() ?>product-detail/<?php echo $val['pro_id'] ?>">
                                    <div class="card col-sm-12 box a-product" style="width: 18rem;">
                                        <div class="card-img">
                                            <img src="<?php echo base_url() ?>public/imageproducts/<?php echo $val['img_thumbnail'] ?>" class="card-img-top pro-img">
                                        </div>
                                        <div class="row">
                                            <div class="card-body">
                                                <p class="card-title text-center">
                                                    <?php echo $val['pro_name'] ?>
                                                </p>
                                                <div class="card-text text-center">
                                                    <p> 
                                                        <strong class="price-zone">$
                                                            <?php echo $val['pro_price'] ?>
                                                        </strong>
                                                        <span class="star-rate">★</span>
                                                        <span class="star-rate">★</span>
                                                        <span class="star-rate">★</span>
                                                        <span class="star-rate">★</span>
                                                        <span class="star-rate">★</span>
                                                    </p>
                                                </div>
                                                <div class="row text-center">
                                                    <a href="" class="col-md-12"><button type="submit" class="btn btn-primary kieu2 col-sm-12">Add to cart</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                                <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php $this->load->view('template/footer') ?>