<?php 
include "database.php";

$name = $_POST ['name'];
$desc = $_POST ['desc'];
$price = $_POST ['price'];
$image = $_POST['image'];

mysqli_query($induction, "INSERT INTO `goods` (`id`, `name`, `desc`, `price`, `image`) VALUES (NULL, '$name', '$desc', '$price', '$image')");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    Добавлен новый товар! 
    <a href = "admin.php"  class="waves-effect waves-light btn">Назад в админку</a>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>