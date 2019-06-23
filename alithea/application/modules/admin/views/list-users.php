<?php $this->load->view('template/headeradmin') ?>

<!-- Modal -->
<div class="opacity col-md-12"></div>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center" id="exampleModalLongTitle">Are you sure delete this user?</h5>
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
			<p class="chu-tieude"><i class="fa fa-users canh-tieude"></i>List User</p>
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
							<th scope="col">Firstname</th>
							<th scope="col">Lastname</th>
							<th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col">Address</th>
							<th scope="col">Telephone</th>
							<th scope="col">Detail</th>
							<th scope="col">Delete</th>
						</tr>
					</thead>
					<?php if(isset($list_users)){
							foreach($list_users as $val){ ?>
					<tbody>
						<tr>
							<td scope="row">
								<?php if($val['quyenAdmin'] == true){ ?>
								<p class="la-admin">
									<?php echo $val['firstname'] ?>
								</p>
								<?php } else{ ?>
								<p class="khong-la-admin">
									<?php echo $val['firstname'] ?>
								</p>
								<?php } ?>
							</td>
							<td>
								<?php if($val['quyenAdmin'] == true){ ?>
								<p class="la-admin">
									<?php echo $val['lastname'] ?>
								</p>
								<?php } else{ ?>
								<p class="khong-la-admin">
									<?php echo $val['lastname'] ?>
								</p>
								<?php } ?>
							</td>
							<td>
								<?php if($val['quyenAdmin'] == true){ ?>
								<p class="la-admin">
									<?php echo $val['username'] ?>
								</p>
								<?php } else{ ?>
								<p class="khong-la-admin">
									<?php echo $val['username'] ?>
								</p>
								<?php } ?>
							</td>
							<td>
								<?php if($val['quyenAdmin'] == true){ ?>
								<p class="la-admin">
									<?php echo $val['email'] ?>
								</p>
								<?php } else{ ?>
								<p class="khong-la-admin">
									<?php echo $val['email'] ?>
								</p>
								<?php } ?>
							</td>
							<td>
								<?php if($val['quyenAdmin'] == true){ ?>
								<p class="la-admin">
									<?php echo $val['address'] ?>
								</p>
								<?php } else{ ?>
								<p class="khong-la-admin">
									<?php echo $val['address'] ?>
								</p>
								<?php } ?>
							</td>
							<td>
								<?php if($val['quyenAdmin'] == true){ ?>
								<p class="la-admin">
									<?php echo $val['telephone'] ?>
								</p>
								<?php } else{ ?>
								<p class="khong-la-admin">
									<?php echo $val['telephone'] ?>
								</p>
								<?php } ?>
							</td>
							<td>
								<a href="<?php echo base_url() ?>admin/Dashboard/detail_user?id=<?php echo $val['user_id'] ?>"> <i class="fa fa-edit list-users" aria-hidden="true"></i></a>
							</td>
							<td>
								<a class="delete-user" data-toggle="modal" data-href="<?php echo base_url() ?>admin/list-users/delete-user/<?php echo $val['user_id'] ?>" data-target="#confirm-delete">
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