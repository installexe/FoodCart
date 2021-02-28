<?php 
include 'database.php';
$product_id = $_GET['id'];
$productt = mysqli_query($induction, "SELECT * FROM `goods` WHERE id = '$product_id'");
$productt = mysqli_fetch_assoc($productt);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="assets/css/css.css"
	
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<title> FoodCart </title>
<link rel="stylesheet" href="assets/css/css.css"


</head>
<body>
	<div class = "navbar-fixed">
<nav>
	
	<div class = "nav-wrapper">
		<div class = "container">
		<a href = "#"  class = "brand-logo">FoodCart</a>
	<a href = "#" data-target = "mobile-demo" class = "sidenav-trigger">
		<i class = "material-icons">menu</i></a>
	<ul class = "right hide-on-med-and-down">
		<li><a href = "index.php">Меню</a></li>
		<li><a href = "onas.html">О нас</a></li>
		<li><a href = "contacts.html">Контакты</a></li>
		
		
		<a class="waves-effect waves-light btn">Корзина</a>
	</ul>
	
	</div>
	</div>
</nav>

</div>
<form action = "updateaction.php" method = "post">
<input type = "hidden" name = "id" value = "<?= $productt['id'] ?>">
<p> Заголовок </p>
<input type = "text" name = "name" value = "<?= $productt['name']?>">
<p> Описание </p>
<textarea name = "desc"><?= $productt['desc']?></textarea>
<p> Цена </p>
<input type = "number" name = "price" value = "<?= $productt['price']?>">
<p> Картинка </p>
<input type = "text" name = "image" value = "<?= $productt['image']?>">
<br> <br>
<button type = "submit"> Обновить </button>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>