<?php $this->load->view('template/headeradmin') ?>

<div class="col-sm-9 session">
    <div class="row">
        <div class="w-100 tieude-bang">
            <p class="chu-tieude tieumuc" ><i class="fa fa-plus-circle canh-tieude"></i>Add Product</p>
        </div>
    </div>

    <form action="" method="POST" enctype="multipart/form-data" role="form">
        <div class="row">
            <div class="add-img col-sm-12">
                <p class="tieumuc">Image</p>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="file" name="img_thumbnail" required>        
                    </div>                   
                </div>
                <div class="row">
                
            </div>
            </div>
            <div class="add-img col-sm-12">
                <p class="tieumuc">Detail Images</p>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="file" name="images_detail[]" multiple/> 
                    </div>
                    <div class="col-sm-3">
                        <input type="file" name="images_detail[]" multiple/> 
                    </div>
                    <div class="col-sm-3">
                        <input type="file" name="images_detail[]" multiple/> 
                    </div>
                </div>
            </div>
            <div class="col-sm-12 content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">Name</label>
                                <input type="text" name="pro_name" id="pro_name" class="form-control" placeholder="Product Name"
                                    aria-describedby="helpId" required>
                                <div style="color: red;">
                                    <?php
                                        if(isset($error)){
                                            echo $error;
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="tieumuc">Description</label>
                                <textarea class="form-control" rows="5" id="pro_desc" name="pro_desc"></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">Quantity</label>
                                <input type="number" name="pro_quantity" min="0" id="pro_qty" class="form-control" placeholder="Product Amount"
                                    aria-describedby="helpId" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">Category</label>
                                <select name="cat_id" id="pro_cate" min="0" id="pro_qty" class="form-control">
                                    <option value="cat_null">Select Category</option>
                                    <?php
                                        if(isset($list_cat)){
                                            foreach($list_cat as $val){
                                            ?>
                                            <option value="<?php echo $val['cat_id'] ?>" ><?php echo $val['cat_name'] ?></option>
                                            <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <p id="check_cat" style="color: red;"></p>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="tieumuc">Price</label>
                                <input type="number" step="0.01" name="pro_price" id="pro_price" class="form-control" placeholder="Product Price"
                                    aria-describedby="helpId" required>
                            </div>
                        </div>
                        <input type="submit" class="submit-reg btn btn-success btn-block col-sm-6 offset-sm-3 bgr-btn" value="Add Product" name="add_product" onclick="return myFunction()">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function myFunction() {
            var check_cat_value, text_check_cat;
            check_cat_value = document.getElementById("pro_cate").value;
            if (check_cat_value == "cat_null") {
                text_check_cat = "Category not valid";
                document.getElementById("check_cat").innerHTML = text_check_cat;
                return false;
            }else{
                return true;
            }

            return false;
        }
    </script>
</div>

<?php $this->load->view('template/footeradmin') ?>