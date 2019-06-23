<?php 
    $fname = $_GET["filenames"];

    //mở file                       phải mở file dưới dạng nhị phân    
    $file = fopen("dowFile/".$fname, "rb");

    //báo cho browser biết dữ liệu trả về từ loccalhost là dữ liệu nhị phân
    //vì nếu mở ở chế độ nhị phân, browser sẽ thực hiện quá trình download và save file thay vì hiện thị browser như 1 trang html bình thường
    header("Content-Type: application/octet-stream");

    //nếu ko có hàm nay, browser sẽ mặc định download file xuly.php
    header("content-Disposition: attachment; filename=".$fname);

    //đọc file và hiện thị khung download ra màn hình
    fpassthru($file);

    fclose($file);
?>
