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
        <form method="post">
            <table>
                <tr>
                    <td>Mã lớp: </td>
                    <td><input type="text" name="malop"></td>
                </tr>
                <tr>
                    <td>Tên lớp: </td>
                    <td><input type="text" name="tenlop"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="insert">Thêm mới</button> </td>
                </tr>
            </table>
        </form>
        <?php 
            if(isset($_POST["insert"])){
                $malop = $_POST["malop"];
                $tenlop = $_POST["tenlop"];
                $query = "INSERT INTO lop (malop, tenlop) VALUES ('$malop', '$tenlop')";
                mysqli_query($link, $query);
                header("location: indexPerson.php");
            }
        ?>
    </div>
</body>
</html>