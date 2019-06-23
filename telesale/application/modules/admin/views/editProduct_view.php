<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url() ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo isset($title)?$title:'' ?></title>
</head>
<body>
    

        Ma sp: <input type="text" name="productID" value="<?php echo $user["userID"] ?>"><br>
        ten sp: <input type="text" name="productName" value="<?php echo $user["name"] ?>"><br>
        price: <input type="text" name="price" value="<?php echo $user["password"] ?>"><br>
        so luong: <input type="text" name="quanity" value="<?php echo $user["email"] ?>"><br>
        anh cu: <img src="<?php echo base_url(); ?>public/imageProduct/<?php echo $user['avatars'] ?>" width="150px;"><br>
        anh moi: <input type="file" name="avatas"><br>
      
</body>
</html>