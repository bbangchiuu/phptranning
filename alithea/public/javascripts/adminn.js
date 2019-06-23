$(document).ready(function () {
    $(function () {
        new WOW().init();
    });
    //   $(function() {
    //     TweenMax.staggerFrom($('.tinto'),0.5,{top:100,opacity:0},0.1)
    // });
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    $('#sidebarCollapse').on('click', function () {
        $('.register').toggleClass('col-sm-9');
    });
    
    $('#sidebarCollapse').on('click', function () {
        window.setTimeout(function () {
            $('.session').toggleClass('col-sm-12').toggleClass('active-content').attr("right", "0");
            $('.dan-huong').toggleClass('col-sm-11').toggleClass('active-content').attr("right", "0");
        });

    });

    $('.content-message').slideUp();

	// click vao the h3 
	$('.selector').click(function(event) {
		// $('.content-message').slideToggle();
		console.log('Da chay duoc hieu ung click roi ')
		$(this).next().slideToggle();
    });
    //hiệu ứng đếm ngược thời gian
    // $('#getting-started').countdown('2019/09/14', function(event) {
    //     $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
    //   });
//slider
    $( "#qty_inputs" ).change(function() {
        if ($('#qty_inputs').val() <= 0) {
            $('#qty_inputs').val(1);
        }
    });

    $('#plus-btn').click(function(){
        	$('#qty_inputs').val(parseInt($('#qty_inputs').val()) + 1 );
        });
    $('#minus-btn').click(function(){
        $('#qty_inputs').val(parseInt($('#qty_inputs').val()) - 1 );

        if ($('#qty_inputs').val() == 0) {
    		$('#qty_inputs').val(1);
    	}   
    });
//-----------------------------------------

//function 0
    $('#plus_pro_0').click(function(){
            $('#qty_pro_0').val(parseInt($('#qty_pro_0').val()) + 1 );
            
            //console.log($('#qty_pro_0').val());

            var url, data;

            url = "http://localhost:8080/alithea/client/Dashboard/change_qty?order_pro_id=0";
            data = {     
                "qty_pro_order" : $('#qty_pro_0').val(),
            }; 
            //console.log(data);

            $.post(url, data, function(result, status){              
                console.log(result.total_price); 
                if(status == "success"){
                    $('#total_price').empty();
                    $("#total_price").append('<a href="" class="btn btn-danger btn-block p-30 nut-checkout">' + result.total_price + '</a>');

                    $('#qty_order').empty();
                    $('#qty_order').html(result.qty_order);
                }                         
            }, 'json');
    });
    $('#minus_pro_0').click(function(){
        $('#qty_pro_0').val(parseInt($('#qty_pro_0').val()) - 1 );

        if ($('#qty_pro_0').val() == 0) {
    		$('#qty_pro_0').val(1);
        }   
        
        var url, data;

            url = "http://localhost:8080/alithea/client/Dashboard/change_qty?order_pro_id=0";
            data = {     
                "qty_pro_order" : $('#qty_pro_0').val(),
            }; 
            //console.log(data);

            $.post(url, data, function(result, status){              
                console.log(result); 
                if(status == "success"){
                    $('#total_price').empty();
                    $("#total_price").append('<a href="" class="btn btn-danger btn-block p-30 nut-checkout">' + result.total_price + '</a>');

                    $('#qty_order').empty();
                    $('#qty_order').html(result.qty_order);
                }                         
        }, 'json');
    });

    $( "#qty_pro_0" ).change(function() {
        if ($('#qty_pro_0').val() <= 0) {
            $('#qty_pro_0').val(1);
        }
    });
//function 1
$( "#qty_pro_1" ).change(function() {
    if ($('#qty_pro_1').val() <= 0) {
        $('#qty_pro_1').val(1);
    }
});

$('#plus_pro_1').click(function(){
    $('#qty_pro_1').val(parseInt($('#qty_pro_1').val()) + 1 );

    var url, data;

            url = "http://localhost:8080/alithea/client/Dashboard/change_qty?order_pro_id=1";
            data = {     
                "qty_pro_order" : $('#qty_pro_1').val(),
            }; 
            //console.log(data);

            $.post(url, data, function(result, status){              
                console.log(result.total_price); 
                if(status == "success"){
                    $('#total_price').empty();
                    $("#total_price").append('<a href="" class="btn btn-danger btn-block p-30 nut-checkout">' + result.total_price + '</a>');

                    $('#qty_order').empty();
                    $('#qty_order').html(result.qty_order);
                }                         
            }, 'json');
});
$('#minus_pro_1').click(function(){
    $('#qty_pro_1').val(parseInt($('#qty_pro_1').val()) - 1 );

    if ($('#qty_pro_1').val() == 0) {
        $('#qty_pro_1').val(1);
    }   
    var url, data;

            url = "http://localhost:8080/alithea/client/Dashboard/change_qty?order_pro_id=1";
            data = {     
                "qty_pro_order" : $('#qty_pro_1').val(),
            }; 
            //console.log(data);

            $.post(url, data, function(result, status){              
                console.log(result.total_price); 
                if(status == "success"){
                    $('#total_price').empty();
                    $("#total_price").append('<a href="" class="btn btn-danger btn-block p-30 nut-checkout">' + result.total_price + '</a>');

                    $('#qty_order').empty();
                    $('#qty_order').html(result.qty_order);
                }                         
            }, 'json');
});
//function 2
$( "#qty_pro_2" ).change(function() {
    if ($('#qty_pro_2').val() <= 0) {
        $('#qty_pro_2').val(1);
    }
});

$('#plus_pro_2').click(function(){
        $('#qty_pro_2').val(parseInt($('#qty_pro_2').val()) + 1 );

        var url, data;

            url = "http://localhost:8080/alithea/client/Dashboard/change_qty?order_pro_id=2";
            data = {     
                "qty_pro_order" : $('#qty_pro_2').val(),
            }; 
            //console.log(data);

            $.post(url, data, function(result, status){              
                console.log(result.total_price); 
                if(status == "success"){
                    $('#total_price').empty();
                    $("#total_price").append('<a href="" class="btn btn-danger btn-block p-30 nut-checkout">' + result.total_price + '</a>');

                    $('#qty_order').empty();
                    $('#qty_order').html(result.qty_order);
                }                         
            }, 'json');
    });
$('#minus_pro_2').click(function(){
    $('#qty_pro_2').val(parseInt($('#qty_pro_2').val()) - 1 );

    if ($('#qty_pro_2').val() == 0) {
        $('#qty_pro_2').val(1);
    }   

    var url, data;

            url = "http://localhost:8080/alithea/client/Dashboard/change_qty?order_pro_id=2";
            data = {     
                "qty_pro_order" : $('#qty_pro_2').val(),
            }; 
            //console.log(data);

            $.post(url, data, function(result, status){              
                console.log(result.total_price); 
                if(status == "success"){
                    $('#total_price').empty();
                    $("#total_price").append('<a href="" class="btn btn-danger btn-block p-30 nut-checkout">' + result.total_price + '</a>');

                    $('#qty_order').empty();
                    $('#qty_order').html(result.qty_order);
                }                         
            }, 'json');
});
//function 3
$( "#qty_pro_3" ).change(function() {
    if ($('#qty_pro_3').val() <= 0) {
        $('#qty_pro_3').val(1);
    }
});

$('#plus_pro_3').click(function(){
        $('#qty_pro_3').val(parseInt($('#qty_pro_3').val()) + 1 );

        var url, data;

            url = "http://localhost:8080/alithea/client/Dashboard/change_qty?order_pro_id=3";
            data = {     
                "qty_pro_order" : $('#qty_pro_3').val(),
            }; 
            //console.log(data);

            $.post(url, data, function(result, status){              
                console.log(result.total_price); 
                if(status == "success"){
                    $('#total_price').empty();
                    $("#total_price").append('<a href="" class="btn btn-danger btn-block p-30 nut-checkout">' + result.total_price + '</a>');

                    $('#qty_order').empty();
                    $('#qty_order').html(result.qty_order);
                }                         
            }, 'json');
    });
$('#minus_pro_3').click(function(){
    $('#qty_pro_3').val(parseInt($('#qty_pro_3').val()) - 1 );

    if ($('#qty_pro_3').val() == 0) {
        $('#qty_pro_3').val(1);
    }   

    var url, data;

            url = "http://localhost:8080/alithea/client/Dashboard/change_qty?order_pro_id=3";
            data = {     
                "qty_pro_order" : $('#qty_pro_3').val(),
            }; 
            //console.log(data);

            $.post(url, data, function(result, status){              
                console.log(result.total_price); 
                if(status == "success"){
                    $('#total_price').empty();
                    $("#total_price").append('<a href="" class="btn btn-danger btn-block p-30 nut-checkout">' + result.total_price + '</a>');

                    $('#qty_order').empty();
                    $('#qty_order').html(result.qty_order);
                }                         
            }, 'json');
});

//function 4
$( "#qty_pro_4" ).change(function() {
    if ($('#qty_pro_4').val() <= 0) {
        $('#qty_pro_4').val(1);
    }
});

$('#plus_pro_4').click(function(){
        $('#qty_pro_4').val(parseInt($('#qty_pro_4').val()) + 1 );

        var url, data;

            url = "http://localhost:8080/alithea/client/Dashboard/change_qty?order_pro_id=4";
            data = {     
                "qty_pro_order" : $('#qty_pro_4').val(),
            }; 
            //console.log(data);

            $.post(url, data, function(result, status){              
                console.log(result.total_price); 
                if(status == "success"){
                    $('#total_price').empty();
                    $("#total_price").append('<a href="" class="btn btn-danger btn-block p-30 nut-checkout">' + result.total_price + '</a>');

                    $('#qty_order').empty();
                    $('#qty_order').html(result.qty_order);
                }                         
            }, 'json');
    });
$('#minus_pro_4').click(function(){
    $('#qty_pro_4').val(parseInt($('#qty_pro_4').val()) - 1 );

    if ($('#qty_pro_4').val() == 0) {
        $('#qty_pro_4').val(1);
    }   

    var url, data;

            url = "http://localhost:8080/alithea/client/Dashboard/change_qty?order_pro_id=4";
            data = {     
                "qty_pro_order" : $('#qty_pro_4').val(),
            }; 
            //console.log(data);

            $.post(url, data, function(result, status){              
                console.log(result.total_price); 
                if(status == "success"){
                    $('#total_price').empty();
                    $("#total_price").append('<a href="" class="btn btn-danger btn-block p-30 nut-checkout">' + result.total_price + '</a>');

                    $('#qty_order').empty();
                    $('#qty_order').html(result.qty_order);
                }                         
            }, 'json');
});
//------------------------------------

var dem = 1;
var  soluonganh = $('.slideanh img').length;

// console.log(soluonganh)

// them 1 the html vao trong vi tri bat ki   
$('.slideanh').append("<img src='' alt='' class='anh'>");
// xu ly vao kich dieu huong
$('.phai').click(function (e) { 
    // bien attr thay doi vi tri
    // x = $('.slideanh img:nth-child(2)').attr('src');
    // $('.slideanh img:nth-child(3)').attr({src:x});
    // console.log(x)

    // xu ly cho boder ben duoi
    var  vitri = $('.boder').index() +1 ;
    $('.anhnho .anh1').removeClass('boder');
    if(vitri == $('.anhnho .anh1').length){
        vitri = 0;
    }
    $('.anhnho .anh1:nth-child('+( vitri+1)+')').addClass('boder');


    // console.log("dem thu xem co bn anh :" + $('.slideanh img').length)
    $('.anh').attr({src:$('.slideanh img:nth-child('+dem+')').attr('src')});

    // console.log('bay gio dem la dem' + dem )
    if(dem == soluonganh )
    {
        dem=0;
        
    }
     dem = dem + 1 ;

});

var dem2 = soluonganh -1;

$('.trai').click(function (e) { 
    //xu li cho phan boder ben duoi
    var  vitri = $('.boder').index() +1 ;
    $('.anhnho .anh1').removeClass('boder');
    if(vitri == 1){
        vitri = $('.anhnho .anh1').length +1;
    }
    $('.anhnho .anh1:nth-child('+( vitri-1)+')').addClass('boder');

    // console.log("dem thu xem co bn anh :" + $('.slideanh img').length)
    $('.anh').attr({src:$('.slideanh img:nth-child('+dem2+')').attr('src')});
    console.log('bay gio dem la dem' + dem2 )
    if( dem2 == 1 )
    {
        dem2 = 4;
        
    }
    dem2 = dem2 - 1 ;
 });

 $('.anhnho .anh1').click(function (e) {  

 console.log( $(this).index() + 1 );
 $('.anh').attr({src:$('.slideanh img:nth-child('+($(this).index() + 1)+')').attr('src')});
$('.anh1').removeClass('boder');
 $(this).addClass('boder');
 });

 
 $('a.next').click(function (e) { 

    $('.owl-wrapper').removeClass('sangtrai');
    $('.owl-wrapper').toggleClass('sangphai')

 });
 $('a.prev').click(function (e) { 
     $('.owl-wrapper').removeClass('sangphai');
    $('.owl-wrapper').addClass('sangtrai');
});

//end slider
 //menu
 jQuery(".ic").bind("mouseenter",function(){          //
    jQuery(this).children("div").slideDown();     //DS con khi hover
});
jQuery(".ic").bind("mouseleave",function(){    
    jQuery(this).children("div").hide()     
});

// $('#confirm-delete').on('show.bs.modal', function(e) {
//     console.log(e);
//     $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
// });

$('#confirm-delete').on('show.bs.modal', function(e) {
    console.log(e);
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

//bootstraptoggle

$(function() {
    $('#toggle-one').bootstrapToggle();
  })

    //slider
    $('.nutan .next').click(function (e) {
        $('.sangphai').removeClass('sangphai');
        $('.owl-wrapper').addClass('sangtrai');
    });

    $('.nutan .prev').click(function (e) {
        $('.sangtrai').removeClass('sangtrai');
        $('.owl-wrapper').addClass('sangphai');
    });
    //endslider
    jQuery(window).on('scroll', function (event) {
       
        var vitri = jQuery('html, body').scrollTop();
        if (vitri >= 105) {
            jQuery('.nav').addClass('add-menu');
        } else {
            jQuery('.nav').removeClass('add-menu');
        }
    });
    jQuery(window).on('scroll', function (event) {
        // console.log('vi tri');
        // console.log(jQuery('html, body').scrollTop());
        var vitri = jQuery('html, body').scrollTop();
        if (vitri >= 105) {
            jQuery('.block-side').addClass('add-menu1');
        } else {
            jQuery('.block-side').removeClass('add-menu1');
        }
    });

//slide change color

    //slide0
    $("#namediv0").click(function(){
        $("#slidenamediv0").slideToggle("slow");
    });
    //slide1
    $("#namediv1").click(function(){
        $("#slidenamediv1").slideToggle("slow");
    });
    //slide2
    $("#namediv2").click(function(){
        $("#slidenamediv2").slideToggle("slow");
    });
    //slide3
    $("#namediv3").click(function(){
        $("#slidenamediv3").slideToggle("slow");
    });
    //slide4
    $("#namediv4").click(function(){
        $("#slidenamediv4").slideToggle("slow");
    });


    //xac nhan comment cus
    $("#xacnhan_cus_commnet").click(function(){
        var valuecus = $("#xacnhan_cus_commnet").val();

        if(valuecus == ""){
            $("#thongtin_cus_commnet").removeClass("an_dien_thongtin");
            $("#thongtin_cus_commnet").addClass("hien_dien_thongtin");

            $(".nen_an_dien_thongtin").removeClass("an_dien_thongtin");
            $(".nen_an_dien_thongtin").addClass("hien_dien_thongtin");
        }else{
            if($("#comment_cus").val() == ""){
                $("#erroComment").html("Ban chưa nhâp bình luận")
            }else{
                var pro_id = $("#pro_id_comment").val();
                
                var url = "http://localhost:8080/alithea/client/Dashboard/submitComment?pro_id=" + pro_id;
                var data = {
                    "fullname" : $("#fullname_cus").val(),
                    "email" : $("#email_cus").val(),
                    "telephone" : $("#telephone_cus").val(),
                    "conntent_comment" : $("#comment_cus").val(),
                };
                
                $.post(url, data, function(result_cus, status){              
                    console.log(result_cus);
                    if(status == "success"){
                        var appenComment = '<li class="media">' +
                                                '<a class="pull-left" style="margin-right: 10px;">' +
                                                    '<img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">' +
                                                '</a>' +
                                                '<div class="media-body">' +
                                                    '<span class="text-muted pull-right">' +
                                                        '<p class="text-muted">' + result_cus.uploaded_on + '</p>' +
                                                    '</span>' +
                                                    '<strong class="text-success">' + result_cus.fullname + '</strong>' +
                                                    '<p>' +
                                                        result_cus.conntent_comment +
                                                    '</p>' +
                                                '</div>' +
                                            '</li><hr>'
                        $("#list_commnet").prepend(appenComment);
                        $("#comment_cus").val("");
                    };                        
                }, 'json');
            }          
        }
        
    });

    $("#dongcuaso").click(function(){
        
        //console.log("ok");
        $("#thongtin_cus_commnet").removeClass("hien_dien_thongtin");
        $("#thongtin_cus_commnet").addClass("an_dien_thongtin");

        $(".nen_an_dien_thongtin").removeClass("hien_dien_thongtin");
        $(".nen_an_dien_thongtin").addClass("an_dien_thongtin");
    });

    $(".nen_an_dien_thongtin").click(function(){
        //console.log("ok");
        $("#thongtin_cus_commnet").removeClass("hien_dien_thongtin");
        $("#thongtin_cus_commnet").addClass("an_dien_thongtin");

        $(".nen_an_dien_thongtin").removeClass("hien_dien_thongtin");
        $(".nen_an_dien_thongtin").addClass("an_dien_thongtin");
    });

    //thêm session cus để comment
    $("#add_profile_cus").click(function(){

        var errorAdd = 0;
        if($("#add_fullname").val() == ""){
            $("#error-add-fullname").html("Bạn chưa nhâp họ tên");
            errorAdd++;
        }else{
            $("#error-add-fullname").empty();
        }
        
        if($("#add_email").val() == ""){
            $("#error-add-email").html("Bạn chưa nhâp email");
            errorAdd++;
        }else{
            $("#error-add-email").empty();
        }

        if($("#add_telephone").val() == ""){
            $("#error-add-telephone").html("Bạn chưa nhâp số điện thoại");
            errorAdd++;
        }else{
            $("#error-add-telephone").empty();
        }

        if(errorAdd == 0){
            
            $("#error-add-fullname").empty();
            $("#error-add-email").empty();
            $("#error-add-telephone").empty();

            $("#thongtin_cus_commnet").removeClass("hien_dien_thongtin");
            $("#thongtin_cus_commnet").addClass("an_dien_thongtin");

            $(".nen_an_dien_thongtin").removeClass("hien_dien_thongtin");
            $(".nen_an_dien_thongtin").addClass("an_dien_thongtin");

                var pro_id = $("#pro_id_comment").val();
                
                var url = "http://localhost:8080/alithea/client/Dashboard/taoCusComment";
                var data = {
                    "fullname" : $("#add_fullname").val(),
                    "email" : $("#add_email").val(),
                    "telephone" : $("#add_telephone").val(),
                };

                $.post(url, data, function(result_cus, status){              
                    //console.log(result_cus);
                    if(status == "success"){
                        $("#fullname_cus").val(result_cus.fullname);
                        $("#email_cus").val(result_cus.email);
                        $("#telephone_cus").val(result_cus.telephone);
   
                        $("#xacnhan_cus_commnet").val(result_cus.email);
                        //console.log($("#fullname_cus").val());
                    };                        
                }, 'json');
        }      
    });
});


    
