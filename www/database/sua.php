<?php 
    $link = new mysqli("localhost", "root", "", "demo") or die("ket noi that bai");

    if(isset($_GET["idLop"])){
        $malop = $_GET["idLop"];
        $query = "SELECT * FROM lop WHERE malop = $malop";

        $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result) > 0){
            $i = 0;
            
            while($rowss = mysqli_fetch_assoc($result)){
                $i++;
                $malop = $rowss["malop"];
                echo $malop;
            }
        }
    }
?>