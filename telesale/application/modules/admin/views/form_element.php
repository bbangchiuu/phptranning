<?php $this->load->view('template/headers') ?>

<?php $this->load->view('template/asides') ?>


<!-- content -->
<div id="content" class="app-content" role="main">
 <div class="app-content-body ">
   

  <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Form Elements</h1>
  </div>
  <div class="wrapper-md" ng-controller="FormDemoCtrl">
    
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
        Bài viết
      </div>
      <div class="panel-body">
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-sm-2 control-label">Tiều đề</label>
            <div class="col-sm-10">
              <input type="text" class="form-control rounded" name="tieude">                        
            </div>
          </div>
          <div class="line line-dashed b-b line-lg pull-in"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Conntent</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="conntent">
              <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
            </div>
          </div>
          <div class="line line-dashed b-b line-lg pull-in"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-id-1">Tiều đề 2</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="input-id-1" name="tieude2">
            </div>
          </div>
          <div class="line line-dashed b-b line-lg pull-in"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Conntent 2</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="conntent2">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
              <select name="category" id="" class="form-control">
                <?php
                  if(isset($listCategory)){
                    foreach($listCategory as $val){
                      ?>
                      <option value="<?php echo $val['idCategory'] ?>" ><?php echo $val['name'] ?></option>
                      <?php
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Thêm ảnh</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="anhBaiviet">
            </div>
          </div>
          <div class="form-group">
          <div class="col-sm-4 col-sm-offset-2">
            
            <input type="submit" class="btn btn-primary" value="Tao Bai viet moi" name="newBaiviet">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



</div>
</div>
<!-- /content -->

<?php $this->load->view('template/footers') ?>
