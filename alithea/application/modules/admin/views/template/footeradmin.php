
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url() ?>public/vendor/jquery.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/js/poper.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>public/javascripts/adminn.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/js/bootstrap-toggle.min.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/js/all.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/js/wow.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/js/lightslider.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/js/Tweenmax.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/js/easing.js"></script>
    
    <script src="<?php echo base_url() ?>public/javascripts/dropzone.js"></script>
    <script src="<?php echo base_url() ?>public/javascripts/drop.js"></script>
    
    <script src="<?php echo base_url() ?>public/javascripts/register.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/js/chart.min.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/js/Chart.bundle.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
    
  </body>
</html>