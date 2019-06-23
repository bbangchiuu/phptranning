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
    <form action="xuly.php" method="post">
        Username <input type="text" name="textname">
        <br> <input type="submit" value="Login"><br>
    </form>
    <?php
        $length=5;
        if(isset($_GET["len"]))
        $length=$_GET["len"];$md5 = md5(rand());
        $text = substr($md5,0,$length);
    ?>
</body>
</html>