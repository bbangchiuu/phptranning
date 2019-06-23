<?php 
    $this->load->view('template/headers');
?>
<br>

<div id="content" class="app-content" role="main">
<div class="app-content-body ">


<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Edit User</h1>
</div>
<div>
        <div class="panel">
            <div class="wrapper-lg">
                <form role="form" method="post" enctype="multipart/form-data">
                    <?php 
                        if(isset($thanhcong)){
                            echo $thanhcong;
                            echo "<br><a href='http://localhost:8080/telesale' style='color: blue;'>Quay lai trang chu</a>";
                        } 
                        else{ ?>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $nguoidung['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="<?php echo $nguoidung['password'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="checkbox">
                        <input type="radio" name="gender" value="1" id="male" <?php if($nguoidung['gender'] === '1'){ echo "checked";} ?>>
                        <label for="male" class="i-checks">Male</label>
                        <br>
                        <input type="radio" name="gender" value="0" id="female" <?php if($nguoidung['gender'] === '0'){ echo "checked";} ?>>
                        <label for="female" class="i-checks">Female</label>
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <img src="<?php echo base_url() ?>img/<?php echo $nguoidung['avatars'] ?>" alt="">
                        <input type="file" name="avatars" id="">
                    </div>
                    <input type="submit" class="btn btn-sm btn-primary" value="Submit" name="updateUser">
                    <br><br><br>
                    <a href='http://localhost:8080/telesale' style='color: blue;'>Quay lai trang chu</a>
                    <?php
                        }
                    ?>
            </form>
            </div>
        </div>
</div>
