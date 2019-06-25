<?php
    include 'timeago.php';
    $time = "2012-07-05 15:47:01";
    $time_ago = strtotime($time);
    //var_dump(time());
    echo time_stamp($time_ago);

?>