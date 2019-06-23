$(document).ready(function(){
  
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
        
    });

    //function 0
    $("input[name='color_pro_change_0']").click(function(e){
        var url, data;

        url = "http://localhost:8080/alithea/client/Dashboard/change_color?order_pro_id=0";
        data = {     
            "color_pro_change" : $("input[name='color_pro_change_0']:checked").val(),
        }; 
        console.log(data);

        $.post(url, data, function(result, status){              
            console.log(result); 
            if(status == "success"){
              $("#namediv0").empty(); 
              
              if(result == "red"){
                $("#namediv0").append('<div class="p-3 mb-2 bg-danger text-white"></div>');
              }else if(result == "yellow"){
                $("#namediv0").append("<div class='p-3 mb-2 bg-warning text-dark'></div>");
              }else if(result == "blue"){
                $("#namediv0").append("<div class='p-3 mb-2 bg-primary text-white'></div>");
              }else if(result == "black"){
                $("#namediv0").append("<div class='p-3 mb-2 bg-dark text-white'></div>");
              }      
            }                         
        });
      })

    //function 1
      $("input[name='color_pro_change_1']").click(function(e){
        var url, data;

        url = "http://localhost:8080/alithea/client/Dashboard/change_color?order_pro_id=1";       
        data = {     
            "color_pro_change" : $("input[name='color_pro_change_1']:checked").val(),
        }; 
        console.log(data);

        $.post(url, data, function(result, status){              
            //console.log(result); 
            if(status == "success"){
              $("#namediv1").empty(); 
              
              if(result == "red"){
                $("#namediv1").append('<div class="p-3 mb-2 bg-danger text-white"></div>');
              }else if(result == "yellow"){
                $("#namediv1").append("<div class='p-3 mb-2 bg-warning text-dark'></div>");
              }else if(result == "blue"){
                $("#namediv1").append("<div class='p-3 mb-2 bg-primary text-white'></div>");
              }else if(result == "black"){
                $("#namediv1").append("<div class='p-3 mb-2 bg-dark text-white'></div>");
              }      
            }                         
        });
      })
    
    //funtion 2
      $("input[name='color_pro_change_2']").click(function(e){
          var url, data;

          url = "http://localhost:8080/alithea/client/Dashboard/change_color?order_pro_id=2";
          data = {
              
              "color_pro_change" : $("input[name='color_pro_change_2']:checked").val(),
          }; 
              
          $.post(url, data, function(result, status){              
              console.log(result); 
              if(status == "success"){
                $("#namediv2").empty();
                
                if(result == "red"){
                  $("#namediv2").append('<div class="p-3 mb-2 bg-danger text-white"></div>');
                }else if(result == "yellow"){
                  $("#namediv2").append("<div class='p-3 mb-2 bg-warning text-dark'></div>");
                }else if(result == "blue"){
                  $("#namediv2").append("<div class='p-3 mb-2 bg-primary text-white'></div>");
                }else if(result == "black"){
                  $("#namediv2").append("<div class='p-3 mb-2 bg-dark text-white'></div>");
                }
                    
              }                         
          });
      })
    
    //funtion 3
      $("input[name='color_pro_change_3']").click(function(e){
          var url, data;

          url = "http://localhost:8080/alithea/client/Dashboard/change_color?order_pro_id=3";      
          data = {
              "color_pro_change" : $("input[name='color_pro_change_3']:checked").val(),
          }; 
              
          $.post(url, data, function(result, status){              
              console.log(result); 
              if(status == "success"){
                $("#namediv3").empty();
                
                if(result == "red"){
                  $("#namediv3").append('<div class="p-3 mb-2 bg-danger text-white"></div>');
                }else if(result == "yellow"){
                  $("#namediv3").append("<div class='p-3 mb-2 bg-warning text-dark'></div>");
                }else if(result == "blue"){
                  $("#namediv3").append("<div class='p-3 mb-2 bg-primary text-white'></div>");
                }else if(result == "black"){
                  $("#namediv3").append("<div class='p-3 mb-2 bg-dark text-white'></div>");
                }
                    
              }                         
          });
      })
      
    //funtion 4
      $("input[name='color_pro_change_4']").click(function(e){
          var url, data;
          
          url = "http://localhost:8080/alithea/client/Dashboard/change_color?order_pro_id=4";        
          data = {
              "color_pro_change" : $("input[name='color_pro_change_4']:checked").val(),
          }; 
              
          $.post(url, data, function(result, status){              
              console.log(result); 
              if(status == "success"){
                $("#namediv4").empty();
                
                if(result == "red"){
                  $("#namediv4").append('<div class="p-3 mb-2 bg-danger text-white"></div>');
                }else if(result == "yellow"){
                  $("#namediv4").append("<div class='p-3 mb-2 bg-warning text-dark'></div>");
                }else if(result == "blue"){
                  $("#namediv4").append("<div class='p-3 mb-2 bg-primary text-white'></div>");
                }else if(result == "black"){
                  $("#namediv4").append("<div class='p-3 mb-2 bg-dark text-white'></div>");
                }
                    
              }                         
          });
      });

});