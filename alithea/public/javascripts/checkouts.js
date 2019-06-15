function type_email() {
    var textInput_email = document.forms["checkttkh"]["email"].outerHTML;
    textInput_email += '<p class="danghoatdong">Email is required!</p>';
    document.forms["checkttkh"]["email"].outerHTML = textInput_email;
}

function type_phone() {
  var textInput_phone = document.forms["checkttkh"]["phone"].outerHTML;
  textInput_phone += '<p class="danghoatdong">Phone is required!</p>';
  document.forms["checkttkh"]["phone"].outerHTML = textInput_phone;
}
function type_address() {
    var textInput_address = document.forms["checkttkh"]["address"].outerHTML;
    textInput_address += '<p class="danghoatdong">Address is required!</p>';
    document.forms["checkttkh"]["address"].outerHTML = textInput_address;
}

function type_fullname() {
    var textInput_fullname = document.forms["checkttkh"]["fullname"].outerHTML;
    textInput_fullname += '<p class="danghoatdong">Full name is required!</p>';
    document.forms["checkttkh"]["fullname"].outerHTML = textInput_fullname;
}

function checkthongtin() {
    var error = false;
    var email = document.forms["checkttkh"]["email"].value;
    var fullname = document.forms["checkttkh"]["fullname"].value;
    var addresss = document.forms["checkttkh"]["address"].value;
    var phone = document.forms["checkttkh"]["phone"].value;

    if (fullname.length <= 0) {
        error = true;
        if (document.forms["checkttkh"]["fullname"].nextElementSibling) {
            document.forms["checkttkh"]["fullname"].nextElementSibling.remove();
        }
        type_fullname();
    } else {
        if (document.forms["checkttkh"]["fullname"].nextElementSibling) {
            document.forms["checkttkh"]["fullname"].nextElementSibling.remove();
        }
        
    }

    if (addresss.length <= 0) {
        error = true;
        if (document.forms["checkttkh"]['address'].nextElementSibling) {
            document.forms["checkttkh"]['address'].nextElementSibling.remove();
        }
        type_address();
    } else {
        if (document.forms["checkttkh"]['address'].nextElementSibling) {
            document.forms["checkttkh"]['address'].nextElementSibling.remove();
        }
        
    }

    if (phone.length <= 0) {
        error = true;
        if (document.forms["checkttkh"]['phone'].nextElementSibling) {
            document.forms["checkttkh"]['phone'].nextElementSibling.remove();
        }
        type_phone();
    } else {
        if (document.forms["checkttkh"]['phone'].nextElementSibling) {
            document.forms["checkttkh"]['phone'].nextElementSibling.remove();
        }
        
    }
  
    if (email.length <= 0) {
        error = true;
        if (document.forms["checkttkh"]['email'].nextElementSibling) {
            document.forms["checkttkh"]['email'].nextElementSibling.remove();
        }
        type_email();
    } else {
        if (document.forms["checkttkh"]['email'].nextElementSibling) {
            document.forms["checkttkh"]['email'].nextElementSibling.remove();
        }
        
    }

    if (error) {
        return false;
    } else {
        return true;
    }
}

function rt_xacnhandonhang() {
    var xacnha_norder = document.getElementById("defaultUnchecked");

    var checbox_dieukhoan = document.forms["xacnhandonhang_form"]["checbox_dieukhoan"];

    if(xacnha_norder.checked == true){
        return true;
    }else{
        document.getElementById("checbox_dieukhoan").innerHTML = "Bạn chưa đồng ý với điều khoản của chúng tôi"
        return false;
    }

    return false;
}