<?php 

    $soluong = 2;
    //var_dump($soluong);
    session_start();
    //session_destroy();

    if(!isset($_SESSION['color_1'])){
        $_SESSION['color_1'] = 'blue';
    }
    if(!isset($_SESSION['color_2'])){
      $_SESSION['color_2'] = 'black';
    }
    //print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script> 
    $(document).ready(function(){
        $("#flip").click(function(){
            $("#panel").slideToggle("slow");
            
        });

        //function 1
          $("input[name='color_pro_change_1']").click(function(e){
            var url, data;
            url = "http://localhost:8080/www/demoAjax/test2.php";
            
            data = {     
                "color_pro_change" : $("input[name='color_pro_change_1']:checked").val(),
            }; 
            console.log(data);

            $.post(url, data, function(result, status){              
                //console.log(result); 
                if(status == "success"){
                  $("#namediv1").empty(); 
                  
                  if(result == "red"){
                    $("#namediv1").append('<div class="p-3 mb-2 bg-danger text-white"></div>');
                  }else if(result == "yellow"){
                    $("#namediv1").append("<div class='p-3 mb-2 bg-warning text-dark'></div>");
                  }else if(result == "blue"){
                    $("#namediv1").append("<div class='p-3 mb-2 bg-primary text-white'></div>");
                  }else if(result == "black"){
                    $("#namediv1").append("<div class='p-3 mb-2 bg-dark text-white'></div>");
                  }      
                }                         
            });
          })
        
        //funtion 2
          $("input[name='color_pro_change_2']").click(function(e){
              var url, data;
              url = "http://localhost:8080/www/demoAjax/test2.php";

              
              
              data = {
                  //"color_pro_change" : $("input[name='color_pro_change']:checked").val(),
                  "color_pro_change" : $("input[name='color_pro_change_2']:checked").val(),
              }; 
                  
              $.post(url, data, function(result, status){              
                  console.log(result); 
                  if(status == "success"){
                    $("#namediv2").empty();
                    
                    if(result == "red"){
                      $("#namediv2").append('<div class="p-3 mb-2 bg-danger text-white"></div>');
                    }else if(result == "yellow"){
                      $("#namediv2").append("<div class='p-3 mb-2 bg-warning text-dark'></div>");
                    }else if(result == "blue"){
                      $("#namediv2").append("<div class='p-3 mb-2 bg-primary text-white'></div>");
                    }else if(result == "black"){
                      $("#namediv2").append("<div class='p-3 mb-2 bg-dark text-white'></div>");
                    }
                        
                  }                         
              });
          })
    });
</script>
<script>
        
</script>
<style> 
#panel, #flip {
  padding: 5px;
  text-align: center;
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
}

#panel {
  padding: 50px;
  display: none;
}
.custom-radios div {
  display: inline-block;
}
.custom-radios input[type="radio"] {
  display: none;
}
.custom-radios input[type="radio"] + label {
  color: #333;
  font-family: Arial, sans-serif;
  font-size: 14px;
}
.custom-radios input[type="radio"] + label span {
  display: inline-block;
  width: 40px;
  height: 40px;
  margin: -1px 4px 0 0;
  vertical-align: middle;
  cursor: pointer;
  border-radius: 50%;
  border: 2px solid #FFFFFF;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
  background-repeat: no-repeat;
  background-position: center;
  text-align: center;
  line-height: 44px;
}
.custom-radios input[type="radio"] + label span img {
  opacity: 0;
  transition: all .3s ease;
}
.custom-radios input[type="radio"].color-1 + label span {
  background-color: black !important;
}
.custom-radios input[type="radio"].color-2 + label span {
  background-color: #3498db !important;
}
.custom-radios input[type="radio"].color-3 + label span {
  background-color: #f1c40f !important;
}
.custom-radios input[type="radio"].color-4 + label span {
  background-color: #e74c3c !important;
}
.custom-radios input[type="radio"]:checked + label span {
  opacity: 1;
  background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg) center center no-repeat;
  width: 40px;
  height: 40px;
  display: inline-block;

}
</style>
</head>
<body>
<input type="hidden" id="soluong" value="<?php echo $soluong; ?>">
<div id="flip">
  <div class="custom-radios" id="thongtincolor">
    <div id="namediv1">
                                    <?php if($_SESSION['color_1'] == 'black'){ ?>
                                      <div class="p-3 mb-2 bg-dark text-white"></div>
                                    <?php }else if($_SESSION['color_1'] == 'blue'){ ?>
                                      <div class="p-3 mb-2 bg-primary text-white"></div>
                                    <?php }else if($_SESSION['color_1'] == 'yellow'){ ?>
                                      <div class="p-3 mb-2 bg-warning text-dark"></div>
                                    <?php }else if($_SESSION['color_1'] == 'red'){ ?>
                                      <div class="p-3 mb-2 bg-danger text-white"></div>
                                    <?php } ?>
    </div>
    <div id="namediv2">
                                    <?php if($_SESSION['color_2'] == 'black'){ ?>
                                      <div class="p-3 mb-2 bg-dark text-white"></div>
                                    <?php }else if($_SESSION['color_2'] == 'blue'){ ?>
                                      <div class="p-3 mb-2 bg-primary text-white"></div>
                                    <?php }else if($_SESSION['color_2'] == 'yellow'){ ?>
                                      <div class="p-3 mb-2 bg-warning text-dark"></div>
                                    <?php }else if($_SESSION['color_2'] == 'red'){ ?>
                                      <div class="p-3 mb-2 bg-danger text-white"></div>
                                    <?php } ?>
    </div>
  </div>
</div>

<br>
<form action="" method="post">
<div id="panel">
    <div class="custom-radios">
      <div>
          <input type="radio" id="color-1-1" class="color-1" name="color_pro_change_1" value="black" <?php if($_SESSION['color_1'] == 'black'){ echo "checked";} ?>>
          <label for="color-1-1">
          <span>
          </span>
          </label>
      </div>
      
      <div>
          <input type="radio" id="color-1-2" class="color-2" name="color_pro_change_1" value="blue" <?php if($_SESSION['color_1'] == 'blue'){ echo "checked";} ?>>
          <label for="color-1-2">
          <span>
          </span>
          </label>
      </div>
      
      <div>
          <input type="radio" id="color-1-3" class="color-3" name="color_pro_change_1" value="yellow" <?php if($_SESSION['color_1'] == 'yellow'){ echo "checked";} ?>>
          <label for="color-1-3">
          <span>
          </span>
          </label>
      </div>

      <div>
          <input type="radio" id="color-1-4" class="color-4" name="color_pro_change_1" value="red" <?php if($_SESSION['color_1'] == 'red'){ echo "checked";} ?>>
          <label for="color-1-4">
          <span>
          </span>
          </label>
      </div>
    </div>


    <div class="custom-radios">
      <div>
          <input type="radio" id="color-2-1" class="color-1" name="color_pro_change_2" value="black" <?php if($_SESSION['color_2'] == 'black'){ echo "checked";} ?>>
          <label for="color-2-1">
          <span>
          </span>
          </label>
      </div>
      
      <div>
          <input type="radio" id="color-2-2" class="color-2" name="color_pro_change_2" value="blue" <?php if($_SESSION['color_2'] == 'blue'){ echo "checked";} ?>>
          <label for="color-2-2">
          <span>
          </span>
          </label>
      </div>
      
      <div>
          <input type="radio" id="color-2-3" class="color-3" name="color_pro_change_2" value="yellow" <?php if($_SESSION['color_2'] == 'yellow'){ echo "checked";} ?>>
          <label for="color-2-3">
          <span>
          </span>
          </label>
      </div>

      <div>
          <input type="radio" id="color-2-4" class="color-4" name="color_pro_change_2" value="red" <?php if($_SESSION['color_2'] == 'red'){ echo "checked";} ?>>
          <label for="color-2-4">
          <span>
          </span>
          </label>
      </div>
    </div>
</div>

</form>


</body>
</html>
