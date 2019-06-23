<?php
if($_FILES["userfile"]["error"] > 0){ // hoặc dùng $_FILES["userfile"]["name"] == NULL
    echo "ban chua chon file";
}else{
    if($_FILES["userfile"]["type"] != "image/jpeg" && $_FILES["userfile"]["type"] != "image/png"){
        echo "chi dc up file ảnh";
    }else{
        move_uploaded_file($_FILES["userfile"]["tmp_name"],"data/".$_FILES["userfile"]["name"]);
        echo"<b>Success</b>";
    }
}
?>