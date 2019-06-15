<?php $this->load->view('template/headeradmin') ?>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Are you sure delete this image?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-9 session">
    <div class="row">
        <div class="w-100 tieude-bang">
            <p class="chu-tieude"><i class="fa fa-edit canh-tieude"></i>Edit Category</p>
        </div>
    </div>
    <div class="row">
       <?php if(isset($cat_detail)){
           ?>
        <div class="col-sm-12 content">
            <form action="" method="POST" class="col-sm-12" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="tieumuc">OLD Name Category</div>
                    <select name="cat_name" id="" class="form-control">
                        <option value="<?php echo $cat_detail['cat_name'] ?>"><?php echo $cat_detail['cat_name'] ?></option>
                    </select>
                    <label for="" class="tieumuc">New Name Category</label>
                    <input type="text" class="form-control" name="cat_name_new" id="" aria-describedby="helpId" placeholder="">
                    <div style="color: red;">
                        <?php if(isset($error)){
                                echo $error;
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cate_desc" class="tieumuc">Description's Category:</label>
                    <textarea class="form-control" rows="5" id="cate_desc" name="cat_desc"><?php echo $cat_detail['cat_desc']?></textarea>
                   
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="tieumuc">Old image</p>
                        <div class="row">
                            <img src="<?php echo base_url() ?>public/imageproducts/<?php echo $cat_detail['cat_img']?>" class="col-sm-12 img-edit-cat" alt="">                          
                        </div>
                    </div>
                    <div class="add-img col-sm-12">
                        <p class="tieumuc">New image</p>
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="file" name="cat_img">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block save-changes" name="save_change">Save</button>
            </form>
       <?php } ?>
            
        </div>
    </div>
</div>
</div>
<?php $this->load->view('template/footeradmin') ?>