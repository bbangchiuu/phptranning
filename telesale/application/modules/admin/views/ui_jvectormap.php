<?php $this->load->view('template/headers') ?>

<?php $this->load->view('template/asides') ?>


  <!-- content -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
	    

<div class="wrapper-md" ng-controller="JVectorMapDemoCtrl">
  <div class="panel b-a">
    <div class="panel-heading b-b b-light">World Map</div>
    <div class="panel-body">
      <div class="h3 m-b font-thin">World Map with information</div>
      <p class="m-b-lg text-muted">This map is based on data available at <a href="http://www.naturalearthdata.com/downloads/110m-cultural-vectors/110m-admin-0-countries/">http://www.naturalearthdata.com</a>. Data is in <a href="http://www.naturalearthdata.com/about/terms-of-use/">public domain</a>.</p>
      <div class="row">
        <div class="col-sm-8">
          <div style="height:240px;" ui-jq="vectorMap" ui-options="{            
            map: 'world_mill_en',
            markers: [{latLng: [41.90, 12.45], name: 'Vatican City'},{latLng: [43.73, 7.41], name: 'Monaco'},{latLng: [-0.52, 166.93], name: 'Nauru'},{latLng: [-8.51, 179.21], name: 'Tuvalu'},{latLng: [43.93, 12.46], name: 'San Marino'},{latLng: [47.14, 9.52], name: 'Liechtenstein'},{latLng: [7.11, 171.06], name: 'Marshall Islands'},{latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis'},{latLng: [3.2, 73.22], name: 'Maldives'},{latLng: [35.88, 14.5], name: 'Malta'},{latLng: [12.05, -61.75], name: 'Grenada'},{latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines'},{latLng: [13.16, -59.55], name: 'Barbados'},{latLng: [17.11, -61.85], name: 'Antigua and Barbuda'},{latLng: [-4.61, 55.45], name: 'Seychelles'},{latLng: [7.35, 134.46], name: 'Palau'},{latLng: [42.5, 1.51], name: 'Andorra'},{latLng: [14.01, -60.98], name: 'Saint Lucia'},{latLng: [6.91, 158.18], name: 'Federated States of Micronesia'},{latLng: [1.3, 103.8], name: 'Singapore'},{latLng: [1.46, 173.03], name: 'Kiribati'},{latLng: [-21.13, -175.2], name: 'Tonga'},{latLng: [15.3, -61.38], name: 'Dominica'},{latLng: [-20.2, 57.5], name: 'Mauritius'},{latLng: [26.02, 50.55], name: 'Bahrain'},{latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}],
            normalizeFunction: 'polynomial',
            backgroundColor: '#fff',
            regionStyle: {
              initial: {
                fill: '#e8eff0'
              },
             hover: {
                fill: '#7266ba'
              },
            },
            markerStyle: {
              initial: {
                fill: '#23b7e5',
                stroke: '#fff'
              }
            }
          }" >
          </div>
          <div class="m-t-xl m-b clearfix">
            <i class="i i-local i-2x text-info pull-left m-r m-l m-t-xs"></i>
            <div class="clear text-sm">
              Countries distinguish between metropolitan (homeland) and independent and semi-independent portions of sovereign states.
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="h4 m-b font-thin">Statistics</div>
          <p class="m-b-xs">Population growth</p>
          <div class="progress progress-xs">
            <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="80%" style="width: 80%"></div>
          </div>
          <p class="m-b-xs">Desertification</p>
          <div class="progress progress-xs">
            <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="60%" style="width: 60%"></div>
          </div>
          <p class="m-b-xs">Natural Disasters</p>
          <div class="progress progress-xs">
            <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-original-title="70%" style="width: 70%"></div>
          </div>
          <p class="m-b-xs">World Forest</p>
          <div class="progress progress-xs">
            <div class="progress-bar progress-bar-primary lter" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="panel b-a">
    <div class="panel-heading b-b b-light">USA Map</div>
    <div class="panel-body">
      <div class="h3 m-b font-thin">Map with selection</div>
      <p class="m-b-lg text-muted">This map is based on data available at <a href="http://www.naturalearthdata.com/downloads/10m-cultural-vectors/10m-admin-1-states-provinces/">http://www.naturalearthdata.com</a>. Data is in <a href="http://www.naturalearthdata.com/about/terms-of-use/">public domain</a>.</p>
      <div class="row m-b-xl">
        <div class="col-sm-8">                      
          <div style="height:240px;" ui-jq="vectorMap" ui-options="{
            map: 'us_aea_en',
            markers: [{latLng: [40.71, -74.00], name: 'New York'},{latLng: [34.05, -118.24], name: 'Los Angeles'},{latLng: [41.87, -87.62], name: 'Chicago'},{latLng: [29.76, -95.36], name: 'Houston'},{latLng: [39.95, -75.16], name: 'Philadelphia'},{latLng: [38.90, -77.03], name: 'Washington'},{latLng: [37.36, -122.03], name: 'Silicon Valley'}],
            backgroundColor: '#fff',
            regionsSelectable: true,
            markersSelectable: true,
            markerStyle: {
              initial: {
                fill: '#fad733'
              },
              selected: {
                fill: '#ffffff'
              }
            },
            regionStyle: {
              initial: {
                fill: '#23b7e5'
              },
              selected: {
                fill: '#27c24c'
              }
            },
            series: {
              markers: [{
                attribute: 'r',
                scale: [5, 15],
                values: [
                  187.70,
                  255.16,
                  310.69,
                  605.17,
                  248.31,
                  107.35,
                  217.22
                ]
              }]
            }
          }" >
          </div>
        </div>
        <div class="col-sm-4">
          <div class="h4 m-b font-thin">Statistics</div>
          <p>Internal administrative boundaries</p>
          <div>
            <div class="inline text-center">
              <div ui-jq="easyPieChart" ui-options="{
                      percent: 60,
                      lineWidth: 4,
                      trackColor: '#e8eff0',
                      barColor: '#23b7e5',
                      scaleColor: '#fff',
                      size: 100,
                      lineCap: 'butt',
                      animate: 1000
                    }">
                <div>
                  <span class="step">60</span>%
                </div>
              </div>
              <p class="text-info font-bold">data</p>
            </div>
            <div class="inline text-center">
              <div ui-jq="easyPieChart"  ui-options="{
                      percent: 30,
                      lineWidth: 4,
                      trackColor: '#e8eff0',
                      barColor: '#fad733',
                      scaleColor: '#fff',
                      size: 100,
                      lineCap: 'butt',
                      animate: 1000
                    }">
                <div>
                  <span class="step">30</span>%
                </div>
              </div>
              <p class="text-warning font-bold">info</p>
            </div> 
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
