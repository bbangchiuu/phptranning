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
        $link = new mysqli("localhost", "root", "", "demo") or die("ket noi that bai");
        mysqli_query($link, "SET NAMES UTF8");
        // if(!$link){
        //     echo "Ket noi that bai";
        // }else{
        //     echo "ket noi thanh cong";
        // }
    ?>
    <table>
        <tr>
            <td>STT</td>
            <td>Mã lớp</td>
            <td>Tên lớp</td>
            <td>Xóa</td>
        </tr>
        <?php 
            $query = "SELECT * FROM lop";
            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result)){
                $i = 0;
                
                while($rowss = mysqli_fetch_assoc($result)){
                    $i++;
                    $malop = $rowss["malop"];
                    echo "<tr>";
                        echo "<td>".$i."</td> ";
                        echo "<td>".$rowss["malop"]."</td>";
                        echo "<td>".$rowss["tenlop"]."</td>";
                        echo "<td><a href='deleted.php?idLop=$malop'>Xóa</a>|<a href='detail.php?idLop=$malop'>Sửa</a>";
                    echo "</tr>";
                }
            } else{
                echo "ko co ban ghi nao";
            }
        ?>
    </table>
    <div>
        <form action="index.php" method="post">
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
                header("location: index.php");
            }
        ?>
    </div>
</body>
</html>