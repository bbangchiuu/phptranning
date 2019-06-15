<?php $this->load->view('template/header') ?>
<div class="bgr">
    <div class="container login-container">
        <div class="row">
            <div class="col-sm-12 login-form-2 wow bounceIn" data-wow-delay="0.1s">
                <h3>Register</h3>
                    <div class="col-sm-12">
                        <?php if(isset($err_insert)){
                            ?>
                        <div class="alert alert-danger">
                            <p class="text-center"><?php echo $err_insert ?></p>
                        </div>

                            <?php 
                        }?>
                        
                            
                    </div>
                   
                    <form action="" method="POST" name="form_register" class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Firstname"
                                        aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                                        aria-describedby="helpId">
                                        <div style="color: red;">
                                            <?php if(isset($err_username)){
                                                    echo $err_username;
                                                }
                                            ?>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email"
                                        aria-describedby="helpId">
                                        <div style="color: red;">
                                            <?php if(isset($err_email)){
                                                    echo $err_email;
                                                }
                                            ?>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password" aria-describedby="helpId">
                                </div>                                                         
                            </div>

                            <div class="col-sm-6">
                                
                                <div class="form-group">
                                    <label for="">Lastname</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lastname"
                                        aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Telephone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone"
                                        aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address"
                                        aria-describedby="helpId">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="password2" id="password2" class="form-control"
                                        placeholder="Confirm Password" aria-describedby="helpId">
                                </div>
                            </div>
                            
                        </div>
                        <button type="submit" class="submit-reg btn btn-success btn-block col-sm-6 offset-sm-3" onclick="return checkRegister()" name="register">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer') ?>