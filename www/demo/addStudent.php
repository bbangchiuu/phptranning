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
    ?>
    </table>
    <div>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã lớp: </td>
                    <td><input type="text" name="malop"></td>
                </tr>
                <tr>
                    <td>Mã sinh viên: </td>
                    <td><input type="text" name="maSV"></td>
                </tr>
                <tr>
                    <td>Họ tên: </td>
                    <td><input type="text" name="hoten"></td>
                </tr>
                <tr>
                    <td>Ảnh: </td>
                    <td><input type="file" name="anhSV"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="insert">Thêm mới</button> </td>
                </tr>
            </table>
        </form>
        <?php 
            if(isset($_POST["insert"])){
                if($_FILES["anhSV"]["error"] > 0){
                    echo "ban chua chon file";
                }else{
                    if($_FILES["userfile"]["type"] != "image/jpeg" && $_FILES["userfile"]["type"] != "image/png"){
                        echo "chi dc up file ảnh";
                    }else{
                        move_uploaded_file($_FILES["anhSV"]["tmp_name"],"uploadFile/".$_FILES["anhSV"]["name"]);

                        $malop = $_POST["malop"];
                        $maSV = $_POST["maSV"];
                        $hoten = $_POST["hoten"];
                        $anhSV = $_FILES["anhSV"]["name"];
                        $query = "INSERT INTO sinhvien (malop, maSV, hoten, anhSV) VALUES ('$malop', '$maSV', '$hoten', '$anhSV')";
                        mysqli_query($link, $query) or die("That bai");
                        header("location: indexPerson.php");
                    }
                }
            }
        ?>
    </div>
</body>
</html>