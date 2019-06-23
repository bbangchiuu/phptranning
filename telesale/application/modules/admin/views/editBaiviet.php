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
              <input type="text" class="form-control rounded" name="tieude" value="<?php echo $layBaiviet['tieude'] ?>">                        
            </div>
          </div>
          <div class="line line-dashed b-b line-lg pull-in"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Conntent</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="conntent" value="<?php echo $layBaiviet['conntent'] ?>">
              <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
            </div>
          </div>
          <div class="line line-dashed b-b line-lg pull-in"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-id-1">Tiều đề 2</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="input-id-1" name="tieude2" value="<?php echo $layBaiviet['tieude2'] ?>">
            </div>
          </div>
          <div class="line line-dashed b-b line-lg pull-in"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Conntent 2</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="conntent2" value="<?php echo $layBaiviet['conntent2'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Anh Bai viet</label>
            <div class="col-sm-10">
                <img src="<?php echo base_url() ?>img/<?php echo $layBaiviet['anhBaiviet'] ?>" alt="">
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
                      <option value="<?php echo $val['idCategory'] ?>" <?php if($val['idCategory'] === $layBaiviet['idCategory']){ echo 'selected="selected"';} ?>>
                        <?php echo $val['name'] ?>
                      </option>
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
          
          <!-- <div class="form-group">
            <label class="col-sm-2 control-label">Placeholder</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" placeholder="placeholder">
            </div>
          </div> -->
          <!-- <div class="line line-dashed b-b line-lg pull-in"></div> -->
          <div class="form-group">
          <div class="col-sm-4 col-sm-offset-2">
            
            <input type="submit" class="btn btn-primary" value="Update Bai viet moi" name="editBaiviet">
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
