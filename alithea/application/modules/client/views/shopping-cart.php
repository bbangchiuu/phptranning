<?php $this->load->view('template/header') ?>
<div class="detail8">
    <div class="container">
        <div class="row mb-3">      
            <div class="col-sm-12 m-t-150 dsxacnhanorder">
                <div class="dsxacnhanorder-list float-left dangxacnhanorder divfirst">
                    Sản phẩm đã chọn
                </div>
                <!-- <div class="muitenxn muiten1 float-left"></div> -->
                <div class="dsxacnhanorder-list float-left" >
                    Thông tin giao hàng
                </div>
                <!-- <div class="right-triangle muiten2 float-left"></div> -->
                <div class="dsxacnhanorder-list float-left">
                    Xác nhận đơn hàng
                </div>
                <div class="phuorder divlast"></div>
            </div>           
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php if(isset($_SESSION['products_order'])){ ?>
                <form action="" method="post" id="danhsachorder">
                <table class="table table-hover box">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price each</th>
                            <th scope="col">Color</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php forEach($_SESSION['products_order'] as $val){ ?>
                        <tr>
                            <td>
                                <a href=""><?php echo $val['pro_name'] ?></a>         
                            </td>
                            <td>
                                <a href="<?php echo base_url() ?>product-detail/<?php echo $val['pro_id'] ?>">
                                    <img src="<?php echo base_url() ?>public/imageproducts/<?php echo $val['img_thumbnail'] ?>">
                                </a> 
                            </td>
                            <td>
                                <div class="input-group col-sm-5 m-t-50">
                                    <div class="input-group-prepend">
                                        <div class="btn btn-light btn-sm minus-btnss" id="minus_pro_<?php echo $val['order_pro_id'] ?>"><i class="fa fa-minus"></i></div>
                                    </div>
                                    <input type="number" class="form-control form-control-sm qty_inputss" id="qty_pro_<?php echo $val['order_pro_id'] ?>" value="<?php echo $val['pro_quantity'] ?>" name="pro_qty[]">
                                    <div class="input-group-prepend">
                                        <div class="btn btn-light btn-sm plus-btnss" id="plus_pro_<?php echo $val['order_pro_id'] ?>"><i class="fa fa-plus"></i></div>
                                    </div>
                                    <input type="hidden" name="order_pro_id_mutli[]" value="<?php echo $val['order_pro_id'] ?>">
                                </div>
                            </td>
                            <td>
                                <?php echo $val['pro_price'] ?>
                            </td>
                            <td>
                                <div class="custom-radios color_present" id="namediv<?php echo $val['order_pro_id'] ?>">
                                    <?php if($val['color_pro'] == 'black'){ ?>
                                        <div class="p-3 mb-2 bg-dark text-white"></div>
                                    <?php }else if($val['color_pro'] == 'blue'){ ?>
                                        <div class="p-3 mb-2 bg-primary text-white"></div>
                                    <?php }else if($val['color_pro'] == 'yellow'){ ?>
                                        <div class="p-3 mb-2 bg-warning text-dark"></div>
                                    <?php }else if($val['color_pro'] == 'red'){ ?>
                                        <div class="p-3 mb-2 bg-danger text-white"></div>
                                    <?php } ?>
                                </div>
                                <div class="change_color" id="slidenamediv<?php echo $val['order_pro_id'] ?>">
                                    <div class="custom-radios">
                                        <div>
                                            <input type="radio" id="<?php echo $val['order_pro_id'] ?>-color-1" class="color-1" name="color_pro_change_<?php echo $val['order_pro_id'] ?>" value="black">
                                            <label for="<?php echo $val['order_pro_id'] ?>-color-1">
                                                <span></span>
                                            </label>
                                        </div>

                                        <div>
                                            <input type="radio" id="<?php echo $val['order_pro_id'] ?>-color-2" class="color-2" name="color_pro_change_<?php echo $val['order_pro_id'] ?>" value="blue">
                                            <label for="<?php echo $val['order_pro_id'] ?>-color-2">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div>
                                            <input type="radio" id="<?php echo $val['order_pro_id'] ?>-color-3" class="color-3" name="color_pro_change_<?php echo $val['order_pro_id'] ?>" value="yellow">
                                            <label for="<?php echo $val['order_pro_id'] ?>-color-3">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div>
                                            <input type="radio" id="<?php echo $val['order_pro_id'] ?>-color-4" class="color-4" name="color_pro_change_<?php echo $val['order_pro_id'] ?>" value="red">
                                            <label for="<?php echo $val['order_pro_id'] ?>-color-4">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a class="delete-user" href="<?php echo base_url() ?>remove-order?order_pro_id_xoa=<?php echo $val['order_pro_id'] ?>">
                                    <i class="fa fa-trash-alt list-users" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>                   
                    </tbody>
                </table>
                <p class="sangbenphai"> <button class="btn btn-success btn-block t-30 nut-checkout" name="dathang">Đặt hàng</button></p>

                <p class="sangbenphai" id="total_price"><a href="" class="btn btn-danger btn-block p-30 nut-checkout"><?php echo $_SESSION['total_price'] ?>$</a></p>
                </form>
                <?php }else { ?>
                    
                <button type="button" name="" id="" class="btn btn-danger m-t-150">You have not any products in shopping cart</button>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="<?php echo base_url() ?>public/javascripts/change-color-pro.js"></script>

<?php $this->load->view('template/footer') ?>