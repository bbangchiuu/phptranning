<?php $this->load->view('template/headeradmin') ?>
<!-- Modal -->
<div class="opacity col-md-12"></div>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center" id="exampleModalLongTitle">Are you sure delete this product?</h5>
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
			<p class="chu-tieude"><i class="fa fa-gift canh-tieude"></i>List Products</p>
		</div>
	</div>
	<div class="row">
	</div>

	<div class="row">
		<div class="content col-sm-12">
			<div class="row">
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th scope="col">Name</th>
							<th scope="col">Quantity</th>
							<th scope="col">Status</th>
							<th scope="col">Thumbnail Image </th>
							<th scope="col">Edit</th>
							<th scope="col">Delete</th>
						</tr>
					</thead>
					<tbody>
                    <?php 
                        if(isset($list_product)){
                            foreach($list_product as $val){                            
                            ?>
                            <tr>
                                <td><?php echo $val['pro_name'] ?></td>
                                <td><?php echo $val['pro_quantity'] ?></td>
                                <td><?php echo $val['pro_status'] ?></td>
                                <td><img src="<?php echo base_url() ?>public/imageproducts/<?php echo $val['img_thumbnail'] ?>" alt=""></td>
                                <td>
									<a href="<?php echo base_url() ?>/admin/edit_product/<?php echo $val['pro_id'] ?>">
								   		<i class="fa fa-edit list-users" aria-hidden="true"></i>More Detail
									</a>
							    </td>
                                <td>
									<a data-toggle="modal" data-href="<?php echo base_url() ?>/admin/deleted_pro/<?php echo $val['pro_id'] ?>" data-target="#confirm-delete">
								    	<i class="fa fa-trash-alt list-users" aria-hidden="true"></i>
									</a>
                                </td>
                            </tr>
                            <?php
                            }
                        }else{
							echo $error_pro;
						}
                    ?>
                    </tbody>
				</table>
			</div>
		</div>

		<a href="./add-new-product" class="col-sm-12"><button type="button" class="btn btn-success float-right bgr-btn">Add a
				new product</button></a>

		<div class="col-sm-12">
			<?php if(isset($pagination)){
				echo $pagination;
			} ?>
		</div>
		<?php $this->load->view('template/footeradmin') ?>