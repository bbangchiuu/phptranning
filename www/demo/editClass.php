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
        $link = new mysqli("localhost", "root", "", "person") or die("ket noi that bai");
        mysqli_query($link, "SET NAMES UTF8");

        $malop = $_GET["idLop"];
        $query = "SELECT * FROM lop WHERE malop = $malop";

        $result = mysqli_query($link,$query);
        if(mysqli_num_rows($result) > 0){
            while($rowss = mysqli_fetch_array($result)){
                $malopcu = $rowss["malop"];
                $tenlopcu = $rowss["tenlop"];
            }
        }else{
            echo "ko co ban ghi nao";
        }
    ?>
    <div>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Mã lớp: </td>
                    <td><input type="text" name="malop" value="<?php echo $malopcu ?>"></td>
                </tr>
                <tr>
                    <td>Tên lớp: </td>
                    <td><input type="text" name="tenlop" value="<?php echo $tenlopcu ?>"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="updateData">Sửa</button> </td>
                </tr>
            </table>
        </form>
        <?php 
            if(isset($_POST["updateData"])){
                $malopmoi = $_POST["malop"];
                $tenlopmoi = $_POST["tenlop"];
                $query = "UPDATE lop SET malop = '$malopmoi', tenlop = '$tenlopmoi' WHERE malop = '$malopcu'";
                
                mysqli_query($link, $query) or die("khong the cap nhat du lieu");
                header("location: indexPerson.php");
            }
        ?>
    </div>
</body>
</html>