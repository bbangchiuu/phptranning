<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <style>
    img{
        width: 150px;
    }
</style>
</head>
<body>
    <?php 
        $link = new mysqli("localhost", "root", "", "person") or die("ket noi that bai");
        mysqli_query($link, "SET NAMES UTF8");

        $maSVcu = $_GET["idSV"];
        $query = "SELECT * FROM sinhvien WHERE maSV = $maSVcu";

        $result = mysqli_query($link, $query) or die("ko lay dc du lieu");
        if(mysqli_num_rows($result) > 0){
            while($rowss = mysqli_fetch_array($result)){
                $malop = $rowss["malop"];
                $hoten = $rowss["hoten"];
                $anhSV = $rowss["anhSV"];
            }
        }else{
            echo "ko co ban ghi nao";
        }
    ?>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã lớp: </td>
                    <td><input type="text" name="malop" value="<?php echo $malop ?>"></td>
                </tr>
                <tr>
                    <td>Mã sinh viên: </td>
                    <td><input type="text" name="maSV" value="<?php echo $maSVcu ?>"></td>
                </tr>
                <tr>
                    <td>Họ tên: </td>
                    <td><input type="text" name="hoten" value="<?php echo $hoten ?>"></td>
                </tr>
                <tr>
                    <td>Ảnh sinh viên cũ: </td>
                    <td><img src="./uploadFile/<?php echo $anhSV ?>" alt=""></td>
                </tr>
                <tr>
                    <td>Ảnh sinh viên mới: </td>
                    <td><input type="file" name="anhSV"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="updateData">Sửa</button> </td>
                </tr>
            </table>
        </form>
        <?php 
            if(isset($_POST["updateData"])){

                $malop = $_POST["malop"];
                $maSVmoi = $_POST["maSV"];
                $hoten = $_POST["hoten"];

                if($_FILES["anhSV"]["error"] > 0){
                    $query = "UPDATE sinhvien SET malop = '$malop', maSV = '$maSVmoi', hoten = '$hoten' WHERE maSV = '$maSVcu'";
                    mysqli_query($link, $query) or die("Cap nhat that bai");

                    header("location: indexPerson.php");
                }else{
                    move_uploaded_file($_FILES["anhSV"]["tmp_name"],"uploadFile/".$_FILES["anhSV"]["name"]);

                    $anhSV = $_FILES["anhSV"]["name"];

                    $query = "UPDATE sinhvien SET malop = '$malop', maSV = '$maSVmoi', hoten = '$hoten', anhSV = '$anhSV' WHERE maSV = '$maSVcu'";
                    mysqli_query($link, $query) or die("Cap nhat that bai");

                    header("location: indexPerson.php");
                }
            }
        ?>
    </div>
</body>
</html>