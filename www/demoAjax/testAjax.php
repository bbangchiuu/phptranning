<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Day la File testAjax.php</h1>

    <?php 
        echo "Nhan du lieu tu phuong thuc GET";
        echo "</br>=============================";
        echo "<pre>";
        echo print_r($_GET);
        echo "</pre>";

        echo "Nhan du lieu tu phuong thuc POST";
        echo "</br>=============================";
        echo "<pre>";
        echo print_r($_POST);
        echo "</pre>";
    ?>
</body>
</html>