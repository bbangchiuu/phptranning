<?php $this->load->view('template/headeradmin') ?>
<div class="opacity col-md-12"></div>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center" id="exampleModalLongTitle">Are you sure delete this Customer?</h5>
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
			<p class="chu-tieude"><i class="fa fa-users canh-tieude"></i>List Customer</p>
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
                            <th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Address</th>
							<th scope="col">Telephone</th>
							<th scope="col">Delete</th>
						</tr>
					</thead>
					<?php if(isset($list_customer)){
							foreach($list_customer as $val){ ?>
					<tbody>
						<tr>
							<td>
								
								<p class="khong-la-admin">
									<?php echo $val['cus_id'] ?>
								</p>
								
							</td>
							<td>
								
								<p class="khong-la-admin">
									<?php echo $val['cus_name'] ?>
								</p>
						
							</td>
							<td>
								
								<p class="khong-la-admin">
									<?php echo $val['cus_email'] ?>
								</p>
				
							</td>
							<td>
								
								<p class="khong-la-admin">
									<?php echo $val['cus_address'] ?>
								</p>
			
							</td>
							<td>
							
								<p class="khong-la-admin">
									<?php echo $val['cus_phone'] ?>
								</p>
					
							</td>
							<td>
								<a data-toggle="modal" data-href="<?php echo base_url() ?>admin/delete-cus/<?php echo $val['cus_id']?>" data-target="#confirm-delete">
									<i class="fa fa-trash-alt list-users" aria-hidden="true"></i>
								</a>
							</td>
						</tr>
					</tbody>

						<?php }
					} ?>
				</table>
			</div>
		</div>



		<div class="col-sm-12">
			
		</div>
	</div>
</div>

<?php $this->load->view('template/footeradmin') ?>