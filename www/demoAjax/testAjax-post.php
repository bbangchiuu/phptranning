<?php 
session_start();
    $user = $_POST['username'];
    $password = $_POST['password'];

    if(isset($_POST['color_pro'])){
        $_SESSION['color_pro'] = $_POST['color_pro'];
        $color_pro = $_POST['color_pro'];
    }else{
        $_SESSION['color_pro'] = "khong nhan duoc du lieu";
    }

    //print_r($color);die;
    $msg = array();

    if(empty($user)){
        $msg['username'] = "Username ko duoc de trong";
    }

    if(empty($password)){
        $msg['password'] = "password ko duoc de trong";
    }

    if(empty($color)){
        $msg['color_pro'] = "radio ko duoc de trong";
    }

    $status = "error";
    if(count($msg) == 0){
        $status = "success";
    }

    $response = array(
        "status" => $status,
        "msg"    => $msg
    );

    $jsonString = json_encode($response);

    echo $jsonString;
?>