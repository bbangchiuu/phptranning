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
			<p class="chu-tieude"><i class="fa fa-users canh-tieude"></i>List Orders</p>
		</div>
	</div>
	<div class="row">
		<div class="content col-sm-12">
			<div class="row">
					
				<table class="table">
					<thead class="thead-light">
						<tr>
                            <th scope="col">Order Date</th>
                            <th scope="col">Status</th>                           
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Customer ID</th>
							<th scope="col">Total Quantity</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Delete</th>
						</tr>
					</thead>                      
                    <tbody>        
                    <?php if(isset($list_orders)){
                        foreach($list_orders as $val){ ?>    
                                 
                        <tr>                      
                            <?php if($val['status'] == '1'){ ?>
                                <td class="danghoatdong"><?php echo $val['orderDate'] ?></td>
                                <td class="danghoatdong">Đang giao hàng</td>
                                <td class="danghoatdong"><?php echo $val['cus_address'] ?></td>
                                <td class="danghoatdong"><?php echo $val['cus_phone'] ?></td>
                                <td class="danghoatdong"><?php echo $val['cus_id'] ?></td>
                                <td class="danghoatdong"><?php echo $val['total_quantity'] ?></td>
                                <td class="danghoatdong"><?php echo $val['total_price'] ?></td>
                                <td>
                                    <a href="<?php echo base_url() ?>admin/orders/orderdetail/<?php echo $val['order_id']?>" data-wow-delay="0.1s">
                                    <i class="fa fa-edit list-users" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>
									<a href="<?php echo base_url() ?>admin/orders/delete_order/<?php echo $val['order_id'] ?>">
								    	<i class="fa fa-trash-alt list-users" aria-hidden="true"></i>
									</a>
                                </td>
                            <?php }else{ ?> 
                                <td><?php echo $val['orderDate'] ?></td>
                                <td>Đã giao hàng xong</td>
                                <td><?php echo $val['cus_address'] ?></td>
                                <td><?php echo $val['cus_phone'] ?></td>
                                <td><?php echo $val['cus_id'] ?></td>
                                <td><?php echo $val['total_quantity'] ?></td>
                                <td><?php echo $val['total_price'] ?></td>
                                <td>
                                    <a href="<?php echo base_url() ?>admin/orders/orderdetail/<?php echo $val['order_id']?>" data-wow-delay="0.1s">
                                    <i class="fa fa-edit list-users" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>
									<a href="<?php echo base_url() ?>admin/orders/delete_order/<?php echo $val['order_id'] ?>">
								    	<i class="fa fa-trash-alt list-users" aria-hidden="true"></i>
									</a>
                                </td>
                            <?php } ?>                  
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