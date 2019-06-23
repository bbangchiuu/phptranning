<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="main.js"></script>
</head>
<style>
    img{
        width: 100px;
    }
</style>
<body>
    <?php 
        $link = new mysqli("localhost", "root", "", "person") or die("ket noi that bai");
        mysqli_query($link, "SET NAMES UTF8");
    ?>
    <div>
        <div>Danh sach lop</div><br>
        <table class="table table-hover">
            <thead>
                <tr class="bg-primary">
                    <td>STT</td>
                    <td>Mã lớp</td>
                    <td>Tên lớp</td>
                    <td>Xóa|Sửa</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM lop";
                    $result = mysqli_query($link, $query);
                    if(mysqli_num_rows($result)){
                        $i = 0;
                        
                        while($rowss = mysqli_fetch_assoc($result)){
                            $i++;
                            $malop = $rowss["malop"];
                            echo "<tr>";
                                echo "<td>".$i."</td>";
                                echo "<td>".$rowss["malop"]."</td>";
                                echo "<td>".$rowss["tenlop"]."</td>";
                                echo "<td><a href='deletedClass.php?idLop=$malop'>Xóa</a>|<a href='editClass.php?idLop=$malop'>Sửa</a>";
                            echo "</tr>";
                        }
                    } else{
                        echo "ko co ban ghi nao";
                    }
                ?>
            </tbody>
        </table>
        <br>
        <a href="addClass.php">Thêm lớp mới</a>
        <br>
    </div>
    <br>
    <div>
        <div>Danh sach Sinh vien</div>
        <table class="table table-hover">
            <thead>
                <tr class="bg-primary">
                    <td>STT</td>
                    <td>Mã lớp</td>
                    <td>Mã sinh viên</td>
                    <td>Họ tên</td>
                    <td>Ảnh</td>
                    <td>Xóa|Sửa</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM sinhvien";
                    $result = mysqli_query($link, $query);
                    if(mysqli_num_rows($result)){
                        $i = 0;
                        
                        while($rowss = mysqli_fetch_assoc($result)){
                            $i++;
                            $masv = $rowss["maSV"];
                            $avatar = $rowss["anhSV"];
                            $idClass = $rowss["malop"];
                            echo "<tr>";
                                echo "<td>".$i."</td> ";
                                echo "<td>".$rowss["malop"]."</td>";
                                echo "<td>".$rowss["maSV"]."</td>";
                                echo "<td>".$rowss["hoten"]."</td>";
                                ?>
                                <td><img src='./uploadFile/<?php echo $avatar ?>' alt=""></td>";
                                <?php
                                echo "<td><a href='deletedStudent.php?idSV=$masv'>Xóa</a>|<a href='editStudent.php?idSV=$masv&idClass=$idClass'>Sửa</a>";
                            echo "</tr>";
                        }
                    } else{
                        echo "ko co ban ghi nao";
                    }
                ?>
            </tbody>
        </table>
        <br><a href="addStudent.php">Thêm sinh viên mới</a><br>
    </div>
</body>
</html>