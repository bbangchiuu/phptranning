<?php $this->load->view('template/headeradmin') ?>
<div class="col-sm-9 session">
    <div class="row">
        <div class="w-100 tieude-bang">
            <p class="chu-tieude"><i class="fa fa-edit canh-tieude"></i>Detail and edit products</p>
        </div>
    </div>
    <div class="row">
        
        <div class="col-sm-12 content">
            <form action="" method="POST" class="col-sm-12" enctype="multipart/form-data">
                <div class="row m-g-b">
                <div class="form-group  col-sm-6">
                    <label for="" class="tieumuc">Name OLD</label>
                    <select name="pro_name" id="" class="form-control">
                        <option value="<?php echo $pro_detail['pro_name'] ?>"><?php echo $pro_detail['pro_name'] ?></option>
                    </select>
                </div>
                <div class="form-group  col-sm-6">
                    <label for="" class="tieumuc">Name new</label>
                    <input type="text" class="form-control" name="pro_name_new" id="" aria-describedby="helpId" placeholder="">
                        <div><?php if(isset($error)){ echo $error ;} ?></div>
                </div>
                <div class="form-group m-g-b col-sm-12">
                    <label for="" class="tieumuc">Description</label>
                    <textarea class="form-control" rows="5" id="pro_desc" name="pro_desc"><?php echo $pro_detail['description'] ?></textarea>

                </div>
                <div class="form-group m-g-b col-sm-12">
                    Thông số kỹ thuật

                </div>

                
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">Screen</label>
                                <input type="text" name="screen" id="" class="form-control" placeholder="Screen" value="<?php if(isset($thongsokithuat)){ echo $thongsokithuat['screen']; }?>"
                                    aria-describedby="helpId" required>             
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">Operating System</label>
                                <input type="text" name="operating_system" id="" class="form-control" placeholder="Operating System" value="<?php if(isset($thongsokithuat)){ echo $thongsokithuat['operating_system']; }?>"
                                    aria-describedby="helpId" required>             
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">RAM</label>
                                <input type="text" name="RAM" id="" class="form-control" placeholder="RAM" value="<?php if(isset($thongsokithuat)){ echo $thongsokithuat['RAM']; }?>"
                                    aria-describedby="helpId" required>             
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">Memory</label>
                                <input type="text" name="memory" id="" class="form-control" placeholder="Memory" value="<?php if(isset($thongsokithuat)){ echo $thongsokithuat['memory']; }?>"
                                    aria-describedby="helpId" required>             
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">CPU</label>
                                <input type="text" name="CPU" id="" class="form-control" placeholder="CPU" value="<?php if(isset($thongsokithuat)){ echo $thongsokithuat['CPU']; }?>"
                                    aria-describedby="helpId" required>             
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">Memory Stick</label>
                                <input type="text" name="memory_stick" id="" class="form-control" placeholder="Memory Stick" value="<?php if(isset($thongsokithuat)){ echo $thongsokithuat['memory_stick']; }?>"
                                    aria-describedby="helpId" required>             
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">SIM</label>
                                <input type="text" name="SIM" id="" class="form-control" placeholder="SIM" value="<?php if(isset($thongsokithuat)){ echo $thongsokithuat['SIM']; }?>"
                                    aria-describedby="helpId" required>             
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">Battery Capacity</label>
                                <input type="text" name="battery_capacity" id="" class="form-control" placeholder="Battery Capacity" value="<?php if(isset($thongsokithuat)){ echo $thongsokithuat['battery_capacity']; } ?>"
                                    aria-describedby="helpId" required>             
                            </div>

            </div>
            <div class="form-group m-g-b col-sm-12">
                    Thông số khác

            </div>
                <div class="row m-g-b">
                    <div class="form-group col-sm-4">
                        <label for="" class="tieumuc">Price</label>
                        <input type="number" step="0.01" class="form-control" name="pro_price" id="" aria-describedby="helpId"
                            value="<?php echo $pro_detail['pro_price'] ?>" placeholder="">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="" class="tieumuc">Quantity</label>
                        <input type="text" class="form-control" name="pro_quantity" id="" aria-describedby="helpId" 
                                value="<?php echo $pro_detail['pro_quantity'] ?>"
                            placeholder="">
                    </div>
                    <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">Category</label>
                                <select name="cat_id" id="" min="0" id="pro_qty" class="form-control">
                                    <?php
                                        if(isset($list_cat)){
                                            foreach($list_cat as $val){
                                            ?>
                                            <option value="<?php echo $val['cat_id'] ?>" <?php if($val['cat_id'] === $pro_detail['cat_id']){ echo 'selected="selected"';} ?>>
                                                <?php echo $val['cat_name'] ?>
                                            </option>
                                            <?php
                                            }
                                        }
                                    ?>
                                </select>
                                
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-3">
                        <p class="tieumuc">Old thumbnail</p>
                        <div class="col-sm-12">
                            <img src="<?php echo base_url() ?>public/imageproducts/<?php echo $pro_detail['img_thumbnail'] ?>" class="col-sm-12 img-edit-cat" alt="">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <p class="tieumuc">New Thumbnail</p>
                        <div class="col-sm-3">
                            <input type="file" name="img_thumbnail">
                        </div>
                    </div>
                </div>
              
                <div class="col-sm-12">                   
                    <p class="tieumuc">Old Imgae Detail</p>
                    <div class="row">
                    <?php if(isset($img_detail)){
                            foreach($img_detail as $img){
                            ?>     
                    <!---------------------------->
                            <div class="col-sm-3">
                                <img src="<?php echo base_url() ?>public/imageproducts/<?php echo $img['image_detail']?>" class="col-sm-12 img-edit-cat">
                            </div>
                    <!---------------------------->
                    <?php
                        }
                    }else{ ?>
                        <div class="col-sm-3">
                            Không có ảnh
                        </div>
                    <?php } ?>  

                    </div>
                    
                </div>
                
                    
            <div class="add-img col-sm-12">
                <p class="tieumuc">New Imgae Detail</p>
                <div class="row">
                    <div class="col-sm-4">
                        <input type="file" name="images_detail[]" multiple/>
                    </div>
                    <div class="col-sm-4">
                        <input type="file" name="images_detail[]" multiple/>
                    </div>
                    <div class="col-sm-4">
                        <input type="file" name="images_detail[]" multiple/>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-success btn-block save-changes" name="edit_pro">Save changes</button>
            
            </form>
     
        </div>
    </div>
</div>
</div>
<?php $this->load->view('template/footeradmin') ?>