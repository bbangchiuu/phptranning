function type_email_check() {
    var textInput_email = document.forms["checkttkh"]["email"].outerHTML;
    textInput_email += '<p class="danghoatdong">Email is required!</p>';
    document.forms["checkttkh"]["email"].outerHTML = textInput_email;
}

function type_phone_check() {
  var textInput_phone = document.forms["checkttkh"]["telephone"].outerHTML;
  textInput_phone += '<p class="danghoatdong">Phone is required!</p>';
  document.forms["checkttkh"]["telephone"].outerHTML = textInput_phone;
}
function type_address_check() {
    var textInput_address = document.forms["checkttkh"]["address"].outerHTML;
    textInput_address += '<p class="danghoatdong">Address is required!</p>';
    document.forms["checkttkh"]["address"].outerHTML = textInput_address;
}

function type_fullname_check() {
    var textInput_fullname = document.forms["checkttkh"]["fullname"].outerHTML;
    textInput_fullname += '<p class="danghoatdong">Full name is required!</p>';
    document.forms["checkttkh"]["fullname"].outerHTML = textInput_fullname;
}

function checkthongtin() {
    var testCheck = document.getElementById("test").value;

    console.log(testCheck)
    var error = false;
    var email = document.forms["checkttkh"].email.value;
    var fullnames = document.forms["checkttkh"].fullname.value;
    var addresss = document.forms["checkttkh"].address.value;
    var telephone = document.forms["checkttkh"].telephone.value;

    // console.log(fullnames);
    // console.log(addresss);
    // console.log(telephone);
    // console.log(email);
    if (fullnames.length <= 0) {
        error = true;
        if (document.forms["checkttkh"]["fullname"].nextElementSibling) {
            document.forms["checkttkh"]["fullname"].nextElementSibling.remove();
        }
        type_fullname_check();
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
        type_address_check();
    } else {
        if (document.forms["checkttkh"]['address'].nextElementSibling) {
            document.forms["checkttkh"]['address'].nextElementSibling.remove();
        }
        
    }

    if (telephone.length <= 0) {
        error = true;
        if (document.forms["checkttkh"]['telephone'].nextElementSibling) {
            document.forms["checkttkh"]['telephone'].nextElementSibling.remove();
        }
        type_phone_check();
    } else {
        if (document.forms["checkttkh"]['telephone'].nextElementSibling) {
            document.forms["checkttkh"]['telephone'].nextElementSibling.remove();
        }
        
    }
  
    if (email.length <= 0) {
        error = true;
        if (document.forms["checkttkh"]['email'].nextElementSibling) {
            document.forms["checkttkh"]['email'].nextElementSibling.remove();
        }
        type_email_check();
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

    return false;
}