<?php $this->load->view('template/header') ?>
<div class="bgr"> 
    <div class="container login-container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="row">
                    <?php if(isset($error)){ ?>
                    <div class="alert alert-danger text-center wow bounceIn col-sm-12 " role="alert">
                        <strong>
                            <?php echo $error ?>
                        </strong>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6 login-form-2 offset-md-3 wow bounceIn" data-wow-delay="0.1s">
                <h3>Login</h3>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="address" class="form-control" placeholder="Password"
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" name="login"/>
                    </div>
                    <div class="form-group">
                        <a href="register" class="btnForgetPwd" value="Login">Create Acount here!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer') ?>