<?php $this->load->view('template/headers') ?>

<?php $this->load->view('template/asides') ?>


  <!-- content -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
	    

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Static Table</h1>
</div>
<div class="wrapper-md">
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span class="label bg-danger pull-right m-t-xs">4 left</span>
          Tasks
        </div>
        <table class="table table-striped m-b-none">
          <thead>
            <tr>
              <th>Progress</th>
              <th>Item</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="progress progress-sm progress-striped active m-t-xs m-b-none">
                  <div class="progress-bar bg-success" data-toggle="tooltip" data-original-title="80%" style="width: 80%"></div>
                </div>
              </td>
              <td>App prototype design</td>
            </tr>
            <tr>                    
              <td>
                <div class="progress progress-xs m-t-xs m-b-none">
                  <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="40%" style="width: 40%"></div>
                </div>
              </td>
              <td>Design documents</td>
            </tr>
            <tr>                    
              <td>
                <div class="progress progress-xs m-t-xs m-b-none">
                  <div class="progress-bar bg-warning" data-toggle="tooltip" data-original-title="20%" style="width: 20%"></div>
                </div>
              </td>
              <td>UI toolkit</td>
            </tr>
            <tr>                    
              <td>
                <div class="progress progress-xs m-t-xs m-b-none">
                  <div class="progress-bar bg-danger" data-toggle="tooltip" data-original-title="15%" style="width: 15%"></div>
                </div>
              </td>
              <td>Testing</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">Stats</div>
        <table class="table table-striped m-b-none">
          <thead>
            <tr>
              <th style="width:60px;" class="text-center">Graph</th>
              <th>Item</th>                    
              <th style="width:70px;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>                    
              <td>
                <div ng-init="data1=[ 16,15,15,14,17,18,16,15,16 ]" ui-jq="sparkline" ui-options=", {type:'bar', height:19, barWidth:4, barSpacing:2, barColor:'#27c24c'}" class="sparkline inline">loading...</div>
              </td>
              <td>App downloads</td>
              <td class="text-success">
                <i class="fa fa-level-up"></i> 40%
              </td>
            </tr>
            <tr>
              <td class="text-center">
                <div ng-init="data2=[ 60,30,10 ]" ui-jq="sparkline" ui-options=", {type:'pie', height:19, sliceColors:['#23b7e5','#fff','#fad733']}" class="sparkline inline">loading...</div>
              </td>
              <td>Social connection</td>
              <td class="text-success">
                <i class="fa fa-level-up"></i> 20%
              </td>
            </tr>
            <tr>                    
              <td>
                <div ng-init="data3=[ 16,15,15,14,17,18,16,15,16 ]" ui-jq="sparkline" ui-options=", {type:'line', height:19, width:60, lineColor:'#7266ba', fillColor:'#fff'}" class="sparkline inline">loading...</div>
              </td>
              <td>Revenue</td>
              <td class="text-warning">
                <i class="fa fa-level-down"></i> 5%
              </td>
            </tr>
            <tr>                    
              <td>
                <div ng-init="data4=[ 16,15,15,14,17,18,16,15,16 ]" ui-jq="sparkline" ui-options=", {type:'discrete', height:19, width:60, lineColor:'#27c24c'}" class="sparkline inline">loading...</div>
              </td>
              <td>Customer increase</td>
              <td class="text-danger">
                <i class="fa fa-level-down"></i> 20%
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <form action="" method="post">
  <div class="panel panel-default">
    <div class="panel-heading">
      Responsive Table
    </div>
    <div class="row wrapper">
      <div class="col-sm-5 m-b-xs">     
        <select class="input-sm form-control w-sm inline v-middle">
          <!-- <option value="0">Bulk action</option> -->
          <option value="1">Delete selected</option>
          <!-- <option value="2">Bulk edit</option>
          <option value="3">Export</option> -->
        </select>
        <input type="submit" class="btn btn-sm btn-default" value="Apply" name="deleteCheckbox">                   
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">         
          <input type="text" class="input-sm form-control" placeholder="Search" name="nameProject" value="<?php echo isset($nameProject)?$nameProject:'' ?>">
          <span class="input-group-btn">
            <input class="btn btn-sm btn-default" type="submit" name="SearchName" value="Go!">
          </span>   
        </div>
      </div>
    </div>
    
    <div class="table-responsive">
      <!-- <div>
        <input type="text" placeholder="Name Project" name="NewNameProject">
        <input type="text" placeholder="newTask" name="newTask">         
        <input type="submit" name="newProjecOfUser" value="Add New Project">
      </div> -->
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Project</th>
            <th>Task</th>
            <th>Date</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php
						if(isset($ListProject)){
							foreach($ListProject as $val){
								?>
									<tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]" value="<?php echo $val['ID'] ?>"><i></i></label></td>
										<td><?php echo $val['nameProject'] ?></td>
										<td><?php echo $val['Task'] ?></td>
										<td><?php echo $val['Date'] ?></td>
                    <td>
                      <a href class="active" ui-toggle-class>
                        <i class="fa fa-check text-success text-active"></i>
                        <i class="fa fa-times text-danger text"></i>
                      </a>
                    </td>
									</tr>
								<?php
									}
								}else{
                  echo $thieu;
                }
							?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-4 hidden-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                  
        </div>
        <div class="col-sm-4 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-4 text-right text-center-xs">                
          <?php
            if(isset($pagination)){
              echo $pagination;
            }
          ?>
        </div>
      </div>
    </footer>
  </div>
  </form>
</div>



	</div>
  </div>
  <!-- /content -->
  
  <?php $this->load->view('template/footers') ?>
