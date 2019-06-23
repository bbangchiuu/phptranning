<?php
session_start();
$mes = 'notOk';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['captcha'] == $_SESSION['cap_code']) {
        // Nhập Captcha chính xác, bạn có thể làm điều gì đó ở đây
		// ex: lưu xuống DB, send email,..
        echo "ma lenh hop le";
    } else {
        // Nhập Captcha sai
        echo "Ma lenh khong hop le";
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>[Demo] Bảo mật form với captcha trong php và jQuery - 2Cwebvn</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="author" content="2Cweb.vn" />
		<link href="../favicon.png" rel="icon" type="image/x-icon" >
		<link rel="stylesheet" href="mystyle.css" type="text/css" media="screen">
	
    </head>
    <body>
	
	
	<div id="wrapper">
	
		<div class="captcha_status"></div>
        <form action="index.php" method="post">
            <div id="form">
                <table border="0" width="100%">
                    <tr>
                        <td colspan="2"><label>Họ tên:</label><label class="require"> *</label><br/>
                            <input type="text" name="hoten" id="hoten"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>Nội dung:</label><label class="require"> *</label><br/>
                            <textarea  name="noidung" id="noidung"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>Mã bảo mật</label><label class="require"> *</label></td>
                    </tr>
                    <tr>
                        <td width="60px">                           
                            <input type="text" name="captcha" id="captcha" maxlength="6" size="6"/></td>
                        <td><img src="captcha_code.php"/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Submit" id="submit"/></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </form>
        
	</div>
		
    </body>
</html>
