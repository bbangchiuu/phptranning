<?php $this->load->view('template/headeradmin') ?>
<div class="col-sm-9 session">
        <div class="row">
                <div class="w-100 tieude-bang">
                        <p class="chu-tieude" ><i class="fa fa-plus-circle canh-tieude"></i>Add Category</p>
                </div>
            </div>
    <div class="row">
        <form action="" method="POST" name="form_register" class="col-sm-12" enctype="multipart/form-data">
            <div class="add-img col-sm-12">
                <p class="tieumuc"> Category Image</p>
                <div class="row">
                    <div class="col-sm-3">
                    <input type="file" name="cat_img" id="" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 content">
                <div class="row">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="" class="tieumuc">Category Name</label>
                            <input type="text" name="cat_name" id="cate_name" class="form-control" placeholder="Name Category"
                                aria-describedby="helpId" required>
                            <div style="color: red;">
                                <?php if(isset($error)){
                                        echo $error;
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="" class="tieumuc">Category Description</label>
    
                                <textarea class="form-control" rows="5" id="cate_desc" name="cat_desc"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="submit-reg btn btn-success btn-block col-sm-6 offset-sm-3 bgr-btn" name="add_cat">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('template/footeradmin') ?>