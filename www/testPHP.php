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
    <?php
        $str = "nguyen van a";
        echo $str."<br>";

        $solan = 0;
        
        for($vitri = 0; $vitri < strlen($str) ; $vitri++){
            if($str[$vitri] == "n"){
                $solan++;
                if($solan == 2){
                    echo $str[$vitri];
                    break;
                }
            }
        }
        $str[$vitri] = "h";

        echo "<br>".$str."<br>";

        $chuoi = 'abcdef abcdef';
        $pos = strpos($chuoi, 'a', 1); 
        echo $pos;

    ?>
</body>
</html>