<?php
    if(isset($_POST['sum'])){
        $sum = $_POST['number1'] + $_POST['number2'];
        
    }
    if(isset($_POST['color-submit'])){
        $color = $_POST['color-post'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Number 1: <input type="number" name="number1" id=""><br>
        Number 2: <input type="number" name="number2" id=""><br>
        <input type="submit" value="tinh tong" name="sum">
    </form>
    <div>
    <?php if(isset($sum)){ echo $sum; } ?>
    </div>
    <br>-----------------------------<br>
    <form action="" method="post">
        <select name="color-post" id="">
            <option value="red">red</option>
            <option value="blue">blue</option>
            <option value="yellow">yellow</option>
        </select>
        <input type="submit" value="Chon mau" name="color-submit">
    </form>
    <div>
    <?php if(isset($color)){
        echo "mau da chon la: ".$color;
    } ?>
    </div>
</body>
</html>