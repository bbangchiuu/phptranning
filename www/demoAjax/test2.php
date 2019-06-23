<?php
session_start();
if(isset($_POST['color_pro_change'])){
    $color_pro_change = $_POST['color_pro_change'];
    // $_SESSION['color'] = $_POST['color_pro_change'];
}else{
    $color_pro_change = "khong co";
}

echo $color_pro_change;
?>