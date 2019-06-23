<?php $this->load->view('template/headers') ?>

<?php $this->load->view('template/asides') ?>


  <!-- content -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
	    

		<div class="bg-light lter b-b wrapper-md">
		  <h1 class="m-n font-thin h3">Footable</h1>
		</div>
		<div class="wrapper-md">
		  <div class="panel panel-default">
		    <div class="panel-heading">
		      Footable - make HTML tables on smaller devices look awesome
		    </div>
		    <div>
		      <table class="table" ui-jq="footable" ui-options='{
		        "paging": {
		          "enabled": true
		        },
		        "filtering": {
		          "enabled": true
		        },
		        "sorting": {
		          "enabled": true
		        }}'>
		        <thead>
		          <tr>
		            <th data-breakpoints="xs">ID</th>
		            <th>First Name</th>
		            <th>Last Name</th>
		            <th data-breakpoints="xs">Job Title</th>
		            <th data-breakpoints="xs sm">Started On</th>
		            <th data-breakpoints="xs sm md" data-title="DOB">Date of Birth</th>
		          </tr>
		        </thead>
		        <tbody>
							<?php
								if(isset($ListEmployee)){
									foreach($ListEmployee as $val){
										?>
										<tr>
											<td><?php echo $val['ID'] ?></td>
											<td><?php echo $val['First_Name'] ?></td>
											<td><?php echo $val['Last_Name'] ?></td>
											<td><?php echo $val['Job_Title'] ?></td>
											<td><?php echo $val['Started_On'] ?></td>
											<td><?php echo $val['Date_of_Birth'] ?></td>
										</tr>
										<?php
									}
								}
							?>
		        </tbody>
		      </table>
		    </div>
		  </div>
		</div>



	</div>
  </div>
  <!-- /content -->
  
  <?php $this->load->view('template/footers') ?>
