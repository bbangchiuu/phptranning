<?php
    $loi = array();
    //HÀM isset($ten_bien): kiểm tra xem biến đấy có tồn tại hay ko
    if(isset($_POST["okSubmit"])){
        if(empty($_POST["textname"])){//hàm empty($ten_bien): kiểm tra biến có rỗng hay ko
            $loi["userName"] = "chua nhap username";
        }else{
            $username = $_POST["textname"];
        };

        if($_POST["textpassword"] == NULL){
            $loi["userPassowrd"] = "chua nhap password";
        }else{
            $userpassword = $_POST["textpassword"];
        };

        if(isset($username) && isset($userpassword)){
            if($username == "admin" && $userpassword == "password"){
                setcookie("ursers", $username, time()+3600);
                header("location: baivietCookie.php");
                exit();
            }else{
                $loi["login"] = "user hoac password sai";
                
            };
        };
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>formPHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <form action="loginCookie.php" method="post">
        Username <input type="text" name="textname"> 
        <?php 
            if(isset($loi["userName"])){
                echo $loi["userName"];
            }
             
        ?>
        <br>
        Password <input type="password" name="textpassword">
        <?php 
            if(isset($loi["userPassowrd"])){
                echo $loi["userPassowrd"];
            }
            
        ?>
        <br> <input type="submit" name="okSubmit" value="Login">
    </form>
    <br>
    <?php 
        if(isset($loi["login"])){
            echo $loi["login"];
        }
    ?>
</body>
</html>