<?php 
    session_start();
    if(!isset($_SESSION['color'])){
        $_SESSION['color'] = 'red';
    }

    if(isset($_POST['submit_color'])){
        $_SESSION['color'] = $_POST['color'];
    }
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
});
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
.custom-radios input[type="radio"]#color-1 + label span {
  background-color: #2ecc71;
}
.custom-radios input[type="radio"]#color-2 + label span {
  background-color: #3498db;
}
.custom-radios input[type="radio"]#color-3 + label span {
  background-color: #f1c40f;
}
.custom-radios input[type="radio"]#color-4 + label span {
  background-color: #e74c3c;
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

<div id="flip">
<div class="custom-radios">
                                    <?php if($_SESSION['color'] == 'green'){ ?>
                                        <div>
                                            <input type="radio" id="color-1" name="color_pro" value="green" checked>
                                            <label for="color-1">
                                                <span></span>
                                            </label>
                                        </div>
                                    <?php }else if($_SESSION['color'] == 'blue'){ ?>
                                        <div>
                                            <input type="radio" id="color-2" name="color_pro" value="blue" checked>
                                            <label for="color-2">
                                                <span></span>
                                            </label>
                                        </div>
                                    <?php }else if($_SESSION['color'] == 'yellow'){ ?>
                                        <div>
                                            <input type="radio" id="color-3" name="color_pro" value="yellow" checked>
                                            <label for="color-3">
                                                <span></span>
                                            </label>
                                        </div>
                                    <?php }else if($_SESSION['color'] == 'red'){ ?>
                                        <div>
                                            <input type="radio" id="color-4" name="color_pro" value="red" checked>
                                            <label for="color-4">
                                                <span></span>
                                            </label>
                                        </div>
                                    <?php } ?>
</div>
</div>

<form action="" method="post">
<div id="panel">
    <div class="custom-radios">
    <div>
        <input type="radio" id="color-1" name="color" value="green" <?php if($_SESSION['color'] == 'green'){ echo "checked";} ?>>
        <label for="color-1">
        <span>
        </span>
        </label>
    </div>
    
    <div>
        <input type="radio" id="color-2" name="color" value="blue" <?php if($_SESSION['color'] == 'blue'){ echo "checked";} ?>>
        <label for="color-2">
        <span>
        </span>
        </label>
    </div>
    
    <div>
        <input type="radio" id="color-3" name="color" value="yellow" <?php if($_SESSION['color'] == 'yellow'){ echo "checked";} ?>>
        <label for="color-3">
        <span>
        </span>
        </label>
    </div>

    <div>
        <input type="radio" id="color-4" name="color" value="red" <?php if($_SESSION['color'] == 'red'){ echo "checked";} ?>>
        <label for="color-4">
        <span>
        </span>
        </label>
    </div>
    </div>
</div>
<div><button type="submit" name="submit_color">change color</button></div>
</form>
<div id="hienthi"></div>

</body>
</html>
