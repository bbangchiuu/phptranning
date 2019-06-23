
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <div>
        <div>Bai viet cua Session</div>
        <div>
            <?php 
                session_start();
                if(isset($_SESSION["urserX"])){
                    echo "Xin chao: ".$_SESSION["urserX"]."<br>";
                    echo "Bai viet lap trinh php<br>";
                    echo "<a href='logoutSeesion.php'>Dang xuat</a>";
                    
                }else{
                    echo "Ban phai <a href='loginSeesion.php'>login</a> moi xem dc bai viet";
                }
            ?>
        </div>
    </div>
</body>
</html>