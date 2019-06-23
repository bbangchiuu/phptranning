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
    <div>
        <div>Bai viet cua cookie</div>
        <div>
            <?php 
                if(isset($_COOKIE["ursers"])){
                    echo "Xin chao: ".$_COOKIE["ursers"]."<br>";
                    echo "Bai viet lap trinh php<br>";
                    echo "<a href='logoutCookie.php'>Dang xuat</a>";
                    include "CPadmin.php";
                    // header("location: CPadmin.php");
                }else{
                    echo "Ban phai <a href='loginCookie.php'>login</a> moi xem dc bai viet";
                }
            ?>
        </div>
    </div>
    
</body>
</html>
