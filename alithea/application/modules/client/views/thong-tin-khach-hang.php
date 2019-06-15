<?php $this->load->view('template/header') ?>
<div class="detail8">
    <div class="container">
        <div class="row mb-3">      
            <div class="col-sm-12 m-t-150 dsxacnhanorder">
                <div class="dsxacnhanorder-list float-left dangxacnhanorder divfirst">
                    Sản phẩm đã chọn
                </div>
                <!-- <div class="muitenxn muiten1 float-left"></div> -->
                <div class="dsxacnhanorder-list float-left dangxacnhanorder">
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
            <div class="col-sm-12 thongtinkh-list">
            <form class="needs-validation" method="POST" action="" name="checkttkh">              
                    <div class="thongtinkh mb-3">
                        <label for="fullname">Full name</label>
                        <?php if(isset($_SESSION['userlogin'])){ ?> 
                        <input type="text" class="form-control" name="fullname" placeholder="Full name" value="<?php echo $_SESSION['userlogin']['lastname'].' '.$_SESSION['userlogin']['firstname'] ?>">
                        <?php }else{ ?> 
                        <input type="text" class="form-control" name="fullname" placeholder="Full name">
                        <?php } ?>
                    </div>
                    <div class="thongtinkh mb-3">
                        <label for="email">Email</label>
                        <?php if(isset($_SESSION['userlogin'])){ ?> 
                        <input type="text" class="form-control" name="fullname" placeholder="Full name" value="<?php echo $_SESSION['userlogin']['email']?>">
                        <?php }else{ ?> 
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <?php } ?>
                    </div>
                    <div class="thongtinkh mb-3">
                        <label for="address">Address</label>
                        <?php if(isset($_SESSION['userlogin'])){ ?> 
                        <input type="text" class="form-control" name="fullname" placeholder="Full name" value="<?php echo $_SESSION['userlogin']['email']?>">
                        <?php }else{ ?>
                        <input type="text" class="form-control" placeholder="Address" name="address">
                        <?php } ?>
                    </div>

                    <div class="thongtinkh mb-3">
                        <label for="phone">Phone</label>
                        <?php if(isset($_SESSION['userlogin'])){ ?> 
                        <input type="text" class="form-control" name="fullname" placeholder="Full name" value="<?php echo $_SESSION['userlogin']['email']?>">
                        <?php }else{ ?>
                        <input type="text" class="form-control" placeholder="Phone" name="phone">     
                        <?php } ?>                  
                    </div>
               
                    <div class="thongtinkh mb-3">
                    <button class="btn btn-success" type="submit"  name="submitttkh" onclick="return checkthongtin()">Buy now</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer') ?>