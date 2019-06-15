<?php $this->load->view('template/header') ?>
<div class="detail8">
    <div class="container">
        <div class="row mb-3">      
            <div class="col-sm-12 m-t-150 dsxacnhanorder">
                <div class="dsxacnhanorder-list float-left dangxacnhanorder divfirst">
                    Sản phẩm đã chọn
                </div>
                <!-- <div class="muitenxn muiten1 float-left"></div> -->
                <div class="dsxacnhanorder-list float-left dangxacnhanorder" >
                    Thông tin giao hàng
                </div>
                <!-- <div class="right-triangle muiten2 float-left"></div> -->
                <div class="dsxacnhanorder-list float-left dangxacnhanorder">
                    Xác nhận đơn hàng
                </div>
                <div class="phuorder divlast dangxacnhanorder"></div>
            </div>           
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php if(isset($_SESSION['products_order'])){ ?>
                <table class="table table-hover box">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
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
                                   
                                   <?php echo $val['pro_quantity'] ?>
                                    
                                    <input type="hidden" name="pro_ids[]" value="<?php echo $val['pro_id'] ?>">
                                </div>
                            </td>
                            <td>
                                <div class="input-group col-sm-5 m-t-50">
                                <?php echo $val['pro_price'] ?>
                                </div>
                            </td>
                            
                        </tr>
                        <?php } ?>                   
                    </tbody>
                </table>
                <?php }else { ?>
                    
                <button type="button" name="" id="" class="btn btn-danger m-t-150" btn-lg btn-block">You have not any products in shopping cart</button>
                <?php } ?>
                
            </div>
        </div>
        <div class="row">
            <div class="container xnthong-tin-kh">
                <div class="col-md-12">
                    <p class="text-center">Thông tin khách hàng</p>
                </div>
                <div class="form-row col-sm-12">
                    <div class="col-md-12 mb-3">  
                        <div class="col-sm-5 float-left">                 
                            Họ và tên:
                        </div>
                            <div class="col-sm-3 float-left"><?php echo $_SESSION['customer']['cus_name'] ?>       
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">                  
                        <div class="col-sm-5 float-left">                 
                            Email:
                        </div>
                            <div class="col-sm-3 float-left"><?php echo $_SESSION['customer']['cus_email'] ?>       
                        </div>               
                    </div>
                    <div class="col-md-12 mb-3">                
                        <div class="col-sm-5 float-left">                 
                            Địa chỉ:
                        </div>
                            <div class="col-sm-3 float-left"><?php echo $_SESSION['customer']['cus_address'] ?>       
                        </div>                  
                    </div>
                    <div class="col-md-12 mb-3">                
                        <div class="col-sm-5 float-left">                 
                            Số điện thoại:
                        </div>
                            <div class="col-sm-3 float-left"><?php echo $_SESSION['customer']['cus_phone'] ?>       
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container m-t-100">
            <form action="" method="post" name="xacnhandonhang_form">
                <div class="col-md-9 float-left">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                        <label class="custom-control-label" for="defaultUnchecked">Tôi đã đọc kỹ điều khoản và chấp nhận</label>
                        <p class="danghoatdong" id="checbox_dieukhoan"></p>
                    </div>
                </div>
                <div class="col-md-3 float-left">
                    
                    <button class="btn btn-success" type="submit" name="xacnhandonhang"  id="xacnhandonhang" onclick="return rt_xacnhandonhang()">
                        Buy now
                    </button>
                   
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer') ?>