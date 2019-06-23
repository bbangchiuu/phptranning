<?php $this->load->view('template/headers') ?>

<?php $this->load->view('template/asides') ?>


  <!-- content -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
	    

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Search</h1>
  <form action="" method="post">
  <div class="panel panel-default">   
    <div class="row wrapper">
      <div class="col-sm-3">
        <div class="input-group">         
          <input type="text" class="input-sm form-control" placeholder="Search" name="nameProject" value="<?php echo isset($nameProject)?$nameProject:'' ?>">
          <span class="input-group-btn">
            <input class="btn btn-sm btn-default" type="submit" name="SearchName" value="Go!">
          </span>   
        </div>
      </div>
    </div>
  </div>
  </form>
</div>
<div class="wrapper-md">
  <div class="row">
    <div class="col-sm-9">
      <div class="blog-post">                   
        <?php
            if(isset($baiviet)){
                foreach($baiviet as $val){
                ?>
                <div class="panel">
                  <a href="http://localhost:8080/telesale/detailBaiviet/<?php echo $val['baivietID'] ?>">
                    <div>
                      <?php
                        if($val['anhBaiviet'] != NULL){
                          ?>
                            <img src="<?php echo base_url() ?>img/<?php echo  $val['anhBaiviet'] ?>" class="img-full">
                            <?php
                          }
                      ?>
                    </div>
                    <div class="wrapper-lg">
                        <h2 class="m-t-none"><a href><?php echo $val['tieude'] ?></a></h2>
                        <div>
                            <p><?php echo $val['conntent'] ?></p>
                            <h3><?php echo $val['tieude2'] ?></h3>
                            <p><?php echo $val['conntent2'] ?></p>
                        </div>
                        <div class="line line-lg b-b b-light"></div>
                        <div class="text-muted">
                        <i class="fa fa-user text-muted"></i> by Admin
                        <i class="fa fa-clock-o text-muted"></i> Feb 15, 2013
                        <a href="http://localhost:8080/telesale/editBaiviet.html/<?php echo $val['baivietID'] ?>/<?php echo $val['baivietID'] ?>" class="m-l-sm">
                          <i class="fas fa-edit"></i>Edit
                        </a>
                        <a href="http://localhost:8080/telesale/xoaBaiviet.html/<?php echo $val['baivietID'] ?>" class="m-l-sm"><i class="fas fa-trash-alt">
                          </i>Deleted
                        </a>
                        </div>
                    </div>
                  </a>
                </div>
                <?php
                }
            }
        ?>
      </div>
      <div class="text-center m-t-lg m-b-lg">
        <?php
            if(isset($pagination)){
                echo $pagination;
            }
        ?>
      </div>
    </div>
    <div class="col-sm-3">
      <h5 class="font-bold">Categories</h5>
      <ul class="list-group">
        <li class="list-group-item">
          <a href>
            <span class="badge pull-right">15</span>
            Photograph
          </a>
        </li>
        <li class="list-group-item">
          <a href>
            <span class="badge pull-right">30</span>
            Life style
          </a>
        </li>
        <li class="list-group-item">
          <a href>
            <span class="badge pull-right">9</span>
            Food
          </a>
        </li>
        <li class="list-group-item">
          <a href>
            <span class="badge pull-right">4</span>
            Travel world
          </a>
        </li>
      </ul>
      <div class="tags m-b-lg l-h-2x">
        <a href class="label bg-primary">Bootstrap</a> <a href class="label bg-primary">Application</a> <a href class="label bg-primary">Apple</a> <a href class="label bg-primary">Less</a> <a href class="label bg-primary">Theme</a> <a href class="label bg-primary">Wordpress</a>
      </div>
      <h5 class="font-bold">Recent Posts</h5>
      <div>
        <div>
          <a class="pull-left thumb thumb-wrapper m-r">
            <img src="img/b0.jpg">
          </a>
          <div class="clear">                        
            <a href class="font-semibold text-ellipsis">Bootstrap 3: What you need to know</a>
            <div class="text-xs block m-t-xs"><a href>Travel</a> 2 minutes ago</div>
          </div>
        </div>
        <div class="line"></div>
        <div>
          <a class="pull-left thumb thumb-wrapper m-r">
            <img src="img/b1.jpg">
          </a>
          <div class="clear">                        
            <a href class="font-semibold text-ellipsis">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
            <div class="text-xs block m-t-xs"><a href>Design</a> 2 hours ago</div>
          </div>
        </div>
        <div class="line"></div>
        <div>
          <a class="pull-left thumb thumb-wrapper m-r">
            <img src="img/b2.jpg">
          </a>
          <div class="clear">                        
            <a href class="font-semibold text-ellipsis">Sed diam nonummy nibh euismod tincidunt ut laoreet</a>
            <div class="text-xs block m-t-xs"><a href>MFC</a> 1 week ago</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


	</div>
  </div>
  <!-- /content -->
  
  <?php $this->load->view('template/footers') ?>
