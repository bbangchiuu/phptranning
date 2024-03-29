<?php $this->load->view('template/headeradmin') ?>

<div class="col-sm-9 session add-bgr-admin">
    <section class="content-header">
        <h1>
            Dashboard
           
        </h1>
    </section>
    <section class="content10">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3 class="wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="0.7s">150</h3>

                        <p class="wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="0.7s">New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer wow bounceInLeft" data-wow-delay="0.1s" data-wow-duration="0.7s">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3 class="wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="0.7s">53<sup style="font-size: 20px">%</sup></h3>

                        <p class="wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="0.7s">Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-chart-bar"></i>
                    </div>
                    <a href="#" class="small-box-footer wow bounceInLeft" data-wow-delay="0.2s" data-wow-duration="0.7s">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3 class="wow bounceInUp" data-wow-delay="0.3s" data-wow-duration="0.7s">44</h3>

                        <p class="wow bounceInUp" data-wow-delay="0.3s" data-wow-duration="0.7s">User </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="#" class="small-box-footer wow bounceInLeft" data-wow-delay="0.3s" data-wow-duration="0.7s">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3 class="wow bounceInUp" data-wow-delay="0.4s" data-wow-duration="0.7s">65</h3>

                        <p class="wow bounceInUp" data-wow-delay="0.4s" data-wow-duration="0.7s">Unique </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <a href="#" class="small-box-footer wow bounceInLeft" data-wow-delay="0.4s" data-wow-duration="0.7s">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row"> 
            <section class="col-lg-7 connectedSortable ui-sortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom">
                  <!-- Tabs within a box -->
                  <ul class="bieudo">
                    <li class="active1"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                    <li class="active2"><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                    <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                  </ul>
                  <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                        <canvas class="my-4" id="myChart" width="880" height="480"></canvas>

                    </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                  </div>
                </div>
                <!-- /.nav-tabs-custom -->
      
                <!-- Chat box -->
                <div class="box box-primary">
                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                                <i class="fas fa-clipboard-list"></i>
            
                          <h3 class="box-title">To Do List</h3>
            
                          <div class="box-tools pull-right">
                            <ul class="pagination pagination-sm inline">
                              <li><a href="#">«</a></li>
                              <li><a href="#">1<div class="ripple-container"></div></a></li>
                              <li><a href="#">2<div class="ripple-container"></div></a></li>
                              <li><a href="#">3</a></li>
                              <li><a href="#">»<div class="ripple-container"></div></a></li>
                            </ul>
                          </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                          <ul class="todo-list ui-sortable">
                            <li class="">
                              <!-- drag handle -->
                              <span class="handle ui-sortable-handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                  </span>
                              <!-- checkbox -->
                              <input type="checkbox" value="">
                              <!-- todo text -->
                              <span class="text">Design a nice theme</span>
                              <!-- General tools such as edit or delete-->
                              <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-alt"></i>
                              </div>
                            </li>
                            <li>
                                  <span class="handle ui-sortable-handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                  </span>
                              <input type="checkbox" value="">
                              <span class="text">Make the theme responsive</span>
                              <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-alt"></i>
                              </div>
                            </li>
                            <li>
                                  <span class="handle ui-sortable-handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                  </span>
                              <input type="checkbox" value="">
                              <span class="text">Let theme shine like a star</span>
                              <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-alt"></i>
                              </div>
                            </li>
                            <li>
                                  <span class="handle ui-sortable-handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                  </span>
                              <input type="checkbox" value="">
                              <span class="text">Let theme shine like a star</span>
                              <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-alt"></i>
                              </div>
                            </li>
                            <li>
                                  <span class="handle ui-sortable-handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                  </span>
                              <input type="checkbox" value="">
                              <span class="text">Check your messages and notifications</span>
                              <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-alt"></i>
                              </div>
                            </li>
                            <li>
                                  <span class="handle ui-sortable-handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                  </span>
                              <input type="checkbox" value="">
                              <span class="text">Let theme shine like a star</span>
                              <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-alt"></i>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix no-border">
                          <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                        </div>
                      </div>
              </section>
              <section class="col-lg-5 connectedSortable ui-sortable">
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="bieudo">
                      <li class="active1"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                      <li class="active2"><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                      <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                    </ul>
                    <div class="tab-content no-padding">
                      <!-- Morris chart - Sales -->
                      <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 324px;">
                           <svg height="300" version="1.1" width="500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; margin-left:-130px; margin-top:16px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#3c8dbc" d="M306.25,243.33333333333331A93.33333333333333,93.33333333333333,0,0,0,394.4777551949771,180.44625304313007" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#3c8dbc" stroke="#ffffff" d="M306.25,246.33333333333331A96.33333333333333,96.33333333333333,0,0,0,397.31364732624417,181.4248826052307L433.8651459070204,194.03833029452744A135,135,0,0,1,306.25,285Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#f56954" d="M394.4777551949771,180.44625304313007A93.33333333333333,93.33333333333333,0,0,0,222.53484627831412,108.73398312817662" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#f56954" stroke="#ffffff" d="M397.31364732624417,181.4248826052307A96.33333333333333,96.33333333333333,0,0,0,219.84400205154566,107.40757544301087L185.1620097954186,90.31165416754118A135,135,0,0,1,433.8651459070204,194.03833029452744Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#00a65a" d="M222.53484627831412,108.73398312817662A93.33333333333333,93.33333333333333,0,0,0,306.22067846904883,243.333328727518" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#00a65a" stroke="#ffffff" d="M219.84400205154566,107.40757544301087A96.33333333333333,96.33333333333333,0,0,0,306.21973599126824,246.3333285794739L306.20601770357325,289.999993091277A140,140,0,0,1,180.67726941747117,88.10097469226493Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="306.25" y="140" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1.4192,0,0,1.4192,-128.3791,-62.1492)" stroke-width="0.7046130952380952"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="5.25">Mail-Order Sales</tspan></text><text x="306.25" y="160" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(2.0072,0,0,2.0072,-308.4296,-153.3414)" stroke-width="0.4982142857142858"><tspan dy="4.75" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20</tspan></text></svg>
                      </div>
                      <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                    </div>
                </div>
                <div class="goal">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>
  
                    <div class="progress-group">
                      <span class="progress-text">Add Products to Cart</span>
                      <span class="progress-number"><b>180</b>/200</span>
  
                      <div class="progress sm">
                        <div class="progress-bar progress-bar-aqua wow slideInLeft" data-wow-duration="0.7s" data-wow-delay="0.1s" style="width: 90%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Complete Purchase</span>
                      <span class="progress-number"><b>280</b>/400</span>
  
                      <div class="progress sm">
                        <div class="progress-bar progress-bar-red wow slideInLeft" data-wow-duration="0.7s" data-wow-delay="0.2s" style="width: 70%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="progress-number"><b>640</b>/800</span>
  
                      <div class="progress sm">
                        <div class="progress-bar progress-bar-green wow slideInLeft" data-wow-duration="0.7s" data-wow-delay="0.3s" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Send Inquiries</span>
                      <span class="progress-number"><b>300</b>/500</span>
  
                      <div class="progress sm">
                        <div class="progress-bar progress-bar-yellow wow slideInLeft" data-wow-duration="0.7s" data-wow-delay="0.4s" style="width: 60%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>

               </div>
              </section>
        </div>
        <!-- /.row -->
            </section>

        </div>
        <?php $this->load->view('template/footeradmin') ?>