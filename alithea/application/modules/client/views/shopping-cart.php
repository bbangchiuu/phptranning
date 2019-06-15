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
                <form action="" method="post">
                <table class="table table-hover box">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php forEach($_SESSION['products_order'] as $val){ ?>
                        <tr>
                            <td>
                                <a href=""><?php echo $val['pro_name'] ?></a>
                                <a href=""><img src="<?php echo base_url() ?>public/imageproducts/<?php echo $val['img_thumbnail'] ?>"></a> 
                            </td>
                            <td>
                                <div class="input-group col-sm-5 m-t-50">
                                    <div class="input-group-prepend">
                                        <div class="btn btn-light btn-sm" id="minus-btn"><i class="fa fa-minus"></i></div>
                                    </div>
                                    <input type="number" id="qty_inputs" class="form-control form-control-sm" value="<?php echo $val['pro_quantity'] ?>" name="pro_qty[]">
                                    <div class="input-group-prepend">
                                        <div class="btn btn-light btn-sm" id="plus-btn"><i class="fa fa-plus"></i></div>
                                    </div>
                                    <input type="hidden" name="pro_ids[]" value="<?php echo $val['pro_id'] ?>">
                                </div>
                            </td>
                            <td>
                                <?php echo $val['pro_price'] ?>
                            </td>
                            <td>
                                <a class="delete-user" href="<?php echo base_url() ?>remove-order?remove_item=<?php echo $val['pro_id'] ?>">
                                    <i class="fa fa-trash-alt list-users" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>                   
                    </tbody>
                </table>
                <p class="sangbenphai"> <button class="btn btn-success btn-block t-30 nut-checkout" name="dathang">Đặt hàng</button></p>

                <p class="sangbenphai"> <a href="" class="btn btn-danger btn-block p-30 nut-checkout"><?php echo $_SESSION['total_price'] ?></a></p>
                </form>
                <?php }else { ?>
                    
                <button type="button" name="" id="" class="btn btn-danger m-t-150" btn-lg btn-block">You have not any products in shopping cart</button>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer') ?>