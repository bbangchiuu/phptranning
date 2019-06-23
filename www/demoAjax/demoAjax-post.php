<?php 
session_start();
    if(isset($_SESSION['color_pro'])){
        echo  $_SESSION['color_pro'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <style>
    .danghoatdong{
        background-color: yellow;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
           $("#process").click(function(e){
                var url, data;
                url = "http://localhost:8080/www/demoAjax/testAjax-post.php";
                data = {
                    "username" : $("#appForm :text[name='username']").val(),
                    "password" : $("#appForm :password[name='password']").val(),
                    "color_pro" : $("input[name='color_pro']:checked").val(),
                }; 
                console.log(data);
                $.post(url, data, function(result, status){
                    //console.log(data);
                    console.log(result);
                   // console.log(result.msg);
                   //status ở đây là trạng thái trả về, nếu lấy được file thì là success, ngược lại sẽ lại fail
                    if(status == "success"){

                        $("#appForm *").removeClass("danghoatdong");
                        $("#infor").remove(".danghoatdongss").removeClass("danghoatdong");
                        if(result.status == "error"){
                            $("#infor").addClass("danghoatdong").text("co loi xay ra");
                            
                            $.each(result.msg, function(i, val){
                                var ele = "#appForm [name='" + i + "']";
                                
                                console.log(ele);
                                $(ele).addClass("danghoatdong").after("<span class='danghoatdongss'>" + val + "</span>");
                            });
                        }else{
                            $("#infor").text("OK");
                        }
                    }
                }, 'json');

           });
        });
    </script>
    <body>
        <div id="infor">sss</div>
        <form action="" method="POST" id="appForm">
            <div>
                Username:
                <input type="text" name="username">
            </div>
            <div>
                Password:
                <input type="password" name="password">
            </div>
            <div>
                Type:
                <input type="radio" name="color_pro" value="1">
                <input type="radio" name="color_pro" value="2">
                <input type="radio" name="color_pro" value="3">
                <input type="radio" name="color_pro" value="4">
            </div>
            <div>
                <input type="button" id="process" value="submit" name="submit">
                <!-- <input type="button" value=""> -->
            </div>
        </form>
    </body>
</html>