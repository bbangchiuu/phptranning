<form action="" method="post">
<?php
echo $captcha['image'];
echo "<br>word = ".$captcha['word'];
echo "<br>time = ".$captcha['time'];
?>

<br>
<input type="text" name="antispam"><br><input type="submit" value="xac nhan" name="submitCaptcha">
</form>