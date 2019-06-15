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
<div class="col-sm-9 session">
	<div class="row">
		<div class="w-100 tieude-bang">
			<p class="chu-tieude"><i class="fa fa-users canh-tieude"></i>Order detail</p>
		</div>
	</div>
	
	<div class="row">
		<div class="content col-sm-12">
			<div class="row">
					
				<table class="table">
					<thead class="thead-light">
						<tr>                  
                            <th scope="col">Product ID</th>
                            <th scope="col">Image</th>
							<th scope="col">Quantity</th>
                            <th scope="col">Price Each</th>
                            <th scope="col">Deleted</th>
						</tr>
					</thead>
                    <tbody>
                    <?php if(isset($orderdetail)){
                        foreach($orderdetail as $val){ ?>                                  
                        <tr>                      
                            <td><?php echo $val['pro_id'] ?></td>
                            <td><img src="<?php echo base_url() ?>public/imageproducts/<?php echo $val['img_thumbnail'] ?>" alt=""></td>
                            <td><?php echo $val['pro_quantity'] ?></td>
                            <td><?php echo $val['priceEach'] ?></td>
                            <td>
								<a href="">
									<i class="fa fa-trash-alt list-users" aria-hidden="true"></i>
								</a>
                            </td>
                        </tr>
                        <?php }
                    } ?>        
                    </tbody>
				</table>
			</div>
		</div>



		<div class="col-sm-12">
			
		</div>
	</div>
</div>
<?php $this->load->view('template/footeradmin') ?>