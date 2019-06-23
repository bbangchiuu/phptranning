<?php 
    session_start();
    unset($_SESSION["urserX"]); //hủy session
    // session_destroy();//huy tat ca session
    echo "Huy session thanh cong";
    echo "<br>Quay lai<a href='loginSeesion.php'>login</a>";
    //nếu tắt trình duyệt thì session sẽ tự hủy
?>