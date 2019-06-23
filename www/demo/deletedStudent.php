<?php
    if(isset($_GET["idSV"])){
        $link = new mysqli("localhost", "root", "", "person") or die("ket noi that bai");

        $maSV = $_GET["idSV"];

        $query = "DELETE FROM sinhvien WHERE maSV = $maSV";
        mysqli_query($link, $query) or die("Xóa dữ liệu thất bại");

        header("location: indexPerson.php");              
    }
?>