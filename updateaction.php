<?php 
include 'database.php';
$id = $_POST ['id'];
$name = $_POST ['name'];
$desc = $_POST ['desc'];
$price = $_POST ['price'];
$image = $_POST['image'];

mysqli_query($induction, "UPDATE `goods` SET `name` = '$name', `desc` = '$desc', `price` = '$price', `image` = '$image' WHERE `goods`.`id` = '$id'");
?>
<html>
<body>
Товар изменен!
    <a href = "admin.php" >Назад в админку</a>
    
    </body>
  
    </html>