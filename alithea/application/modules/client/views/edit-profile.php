<?php $this->load->view('template/header') ?>
<div class="bgr1">
  
    <div class="container login-container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <?php if(isset($_SESSION['success'])){ ?>
                    <div class="alert alert-success text-center wow bounceIn col-sm-12 " role="alert">
                        <strong><?php echo $_SESSION['success'] ?></strong>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-12 login-form-2 wow bounceIn" data-wow-delay="0.1s">
                <h3>Profile</h3>
               
                <form class="needs-validation" id="checkout-form" action="" method="POST">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Firstname</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['userlogin']['firstname'] ?>"
                                name="firstname" placeholder="First name" required>
                            
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom05">Lastname</label>
                            <input type="text" value="<?php echo $_SESSION['userlogin']['lastname'] ?>" name="lastname" class="form-control card-name"
                                placeholder="Lastname" autocomplete="off" required>

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">Username</label>
                            <div class="form-control" ><?php echo $_SESSION['userlogin']['username'] ?></div>                          
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">Telephone</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['userlogin']['telephone'] ?>"
                                name="telephone" required>
                           
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $_SESSION['userlogin']['address'] ?>" required>
                          
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">Email</label>
                            <div class="form-control" ><?php echo $_SESSION['userlogin']['email'] ?></div>                          
                        </div>

                    </div>

                    <button class="btn btn-success" type="submit" name="update_user">Save changes</button>
                </form>
            
                
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer') ?>