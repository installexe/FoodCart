<?php 
include "database.php";
$username = '';
$role = 0;
if(array_key_exists('id',$_COOKIE)){
	$query = mysqli_query($induction, "SELECT * FROM users WHERE id='".$_COOKIE['id']."' AND password='".$_COOKIE['password']."'");
	$result = $query->fetch_row();

	$username = $result[1];
	if(!empty($result)){
		$role = $result[4];
		}
}
$products = [];
$query = mysqli_query($induction, "SELECT c.id `id`, c.count `count`, g.name `name`, g.price `price` FROM cart c INNER JOIN goods g ON c.id_product = g.id");

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
		<a class="waves-effect waves-light btn " href = "cartpage.php">Корзина</a>

	</ul>
	
	</div>
	</div>
</nav>
</div>
<main>
	<div class = "goods-out">
		<ul>
		<?php $amount = 0; while($result = $query->fetch_row()):?>
			<?php $amount+=$result[3]*$result[1];?>
			<li style="
    text-align: center;
    font-size: 20px;
    color: black;
    
    "><span style="
    margin: 15px;
">Товар: <?=$result[2]?></span><span style="
    margin: 15px;
">Кол-во: <?=$result[1]?></span><span style="
    margin: 15px;
    color: #ee6e73;
"><?=$result[3]*$result[1]?>р.</span></li>

		
			<?php endwhile;?>
			<li style="
    text-align: center;
    font-size: 20px;
    color: black;
    "><span style="
    margin: 15px;
    color: #ee6e73;
">Итог: <?=$amount?>р.</span></li>
</ul>
<div style="
    width: 40%;
    margin: auto;
"><input  placeholder="Имя" id="name"></div>
<div style="
    width: 40%;
    margin: auto;
"><input placeholder="Телефон" id="phone"></div>
<div style="
    width: 40%;
    margin: auto;
"><input placeholder="Адрес" id="adress"></div>
<div style="
    align-items: center;
    display: flex;
"><div style="margin: auto;"><button type="submit" onclick="makeOrder()" style="font-size: 20px;"> Заказать </button></div></div>
	</div>
	
</main>

  
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/cartpage.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
    </html>
