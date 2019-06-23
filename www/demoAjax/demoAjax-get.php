<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
           $("#process").click(function(e){
               var url, data;
               url = "http://localhost:8080/www/demoAjax/testAjax.php";
               data = {"title" : "JQery Master"};
               //$.get(url, data, funtion(){}, dataType) : xml, json, html,..
                $.get(url, data, function(response, status, XMLHttpRequest){
                    console.log(XMLHttpRequest);
                    $("#infor").html(response);
                });

                // $("#infor").load(url, data, function(response, status, XMLHttpRequest){
                //     console.log(XMLHttpRequest);
                //     //$("#infor").html(data);
                // });

                
           })
        });
    </script>
    <body>
        <div id="infor" class="infor">Ready....</div>
        <input type="button" id="process" value="Process">
    </body>
</html>