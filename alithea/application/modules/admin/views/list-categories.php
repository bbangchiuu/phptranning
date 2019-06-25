<?php $this->load->view('template/headeradmin') ?>
<!-- Modal -->
<div class="opacity col-md-12"></div>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Are you sure delete?</h5>
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
</div>
<div class="col-sm-9 session">
	<div class="row">
		<div class="w-100 tieude-bang">
				<p class="chu-tieude" ><i class="fa fa-align-center canh-tieude"></i>List Categories</p>
		</div>
	</div>

    <div class="row">
		<div class="content col-sm-12">
			<div class="row">
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th scope="col">Category Name</th>
							<th scope="col">Category Description</th>
                            <th scope="col"> Category Image </th>
                            <th scope="col">Edit</th>
							<th scope="col">Delete</th>
						</tr>
					</thead>
					<tbody>
                        <?php if(isset($list_cat)){
                            foreach($list_cat as $val){
                                ?>

                        <tr>
                        <td scope="row">
								<?php echo $val['cat_name'] ?>
							</td>
							<td>
								<div class="crop">
                                    <?php echo $val['cat_desc'] ?>
								</div>
								
							</td>
							<td>
								<img src="<?php echo base_url() ?>public/imageproducts/<?php echo $val['cat_img'] ?>" class="img-edit-cat" alt="">
							</td>
							
							<td>
								<a href="<?php echo base_url() ?>/admin/edit_cat/<?php echo $val['cat_id'] ?>"> 
                                    <i class="fa fa-edit list-users" aria-hidden="true"></i>
                                </a>
							</td>
							<td>
                                <a class="delete-user" data-toggle="modal" data-href="<?php echo base_url() ?>admin/detele_cat/<?php echo $val['cat_id'] ?>" data-target="#confirm-delete">
									<i class="fa fa-trash-alt list-users" aria-hidden="true"></i>
								</a>
								<!-- <a class="delete-user" href="<?php echo base_url() ?>/admin/detele_cat/<?php echo $val['cat_id'] ?>" > 
                                    <i class="fa fa-trash-alt list-users" aria-hidden="true"></i>
                                </a> -->
                            </td>
                        </tr>

                                <?php
                            }
                        }
                        
                        ?>
                    </tbody>
				</table>
			</div>
        </div> 

        <a href="./add-new-cat" class="col-sm-12"><button type="button" class="btn btn-success float-right bgr-btn">Add a new category</button></a>

		<div class="col-sm-12">
            <?php if(isset($pagination)){
				echo $pagination;
			} ?>
		</div>
        <?php $this->load->view('template/footeradmin') ?>