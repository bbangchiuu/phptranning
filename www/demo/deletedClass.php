<?php
    if(isset($_GET["idLop"])){
        $link = new mysqli("localhost", "root", "", "person") or die("ket noi that bai");

        $malop = $_GET["idLop"];

        $query = "DELETE FROM lop WHERE malop = $malop";
        mysqli_query($link, $query) or die("Xóa dữ liệu thất bại");

        header("location: indexPerson.php");              
    }
?>