<?php 
include "database.php";
$username = '';
$role = 0;
if(array_key_exists('id',$_COOKIE)){
	$query = mysqli_query($induction, "SELECT * FROM users WHERE id='".$_COOKIE['id']."' AND password='".$_COOKIE['password']."'");
	$result = $query->fetch_row();

	$username = $result[1];
	$role = $result[4];
	if(!empty($result)){
		$role = $result[4];
		}
}
$products = [];
$query = mysqli_query($induction, "SELECT * FROM goods");

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
		<li><a href = "onas.php">О нас</a></li>
		<li><a href = "contacts.php">Контакты</a></li>
		<?php if($username!==''):?>
			<li><?php echo $username;?></li>
			<?php else:?>
		<a href = "vhod.html" class="waves-effect waves-light btn">Вход</a>
		<?php endif;?>
		<?php if($role>0):?>
			<a href = "admin.php" class="waves-effect waves-light btn">Админ-панель</a>
			<?php endif;?>
		<a class="waves-effect waves-light btn" href = "cartpage.php">Корзина</a>
		
	</ul>
	
	</div>
	</div>
</nav>
</div>

<div class = "container" style = "margin-top: 30px; color: #fffff; font-family: ‘Raleway’, sans-serif; font-size: 18px; font-weight: 500; line-height: 32px;  ">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1999.9989755779113!2d30.30708434210655!3d59.91556434740889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46962fc9187acce9%3A0x75027f733c1da9f2!2siGooods!5e0!3m2!1sru!2sru!4v1614255165378!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> <br>
	8-800-555-35-35 - Горячая линия <br>
	г. Калуга ул. Пушкина д.10 оф.5
</div>

  
 
  
<script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
    </html>
