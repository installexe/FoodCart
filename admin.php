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
$query = mysqli_query($induction, "SELECT * FROM goods");
$queryOrders = mysqli_query($induction, "SELECT * FROM orders");

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
		<a href = "cartpage.php" class="waves-effect waves-light btn">Корзина</a>
	</ul>
	
	</div>
	</div>
</nav>

</div>
<p style = "font-size: 25px; margin: 5px;"> Список товаров <p>
<table>
<tr>
<th> ID </th>
<th> Название </th>
<th> Описание </th>
<th> Цена </th>
</tr>
<?php while($product = $query->fetch_row()):?>
<tr>
<td> <?php echo $product[0] ?> </td>
<td> <?= $product[1] ?> </td>
<td> <?= $product[2] ?> </td>
<td> <?= $product[3] ?> </td>
<td> <a class = "waves-effect waves-light btn" href = "update.php?id=<?= $product[0]?>"> Изменить </td>
</tr>
<?php endwhile;?>
</table>
<p style = "font-size: 25px;"> Добавление нового продукта <p>
<form action = "create.php" method = "post">
<p> <b> Название товара</b> </p>
<input type = "text" name = "name">
<p> <b> Описание </b> </p>
<textarea name = "desc"></textarea>
<p> <b> Цена </b> </p>
<input type = "number" name = "price">
<p> <b> Ссылка на картинку </b> </p>
<input type = "text" name = "image">
 <br> <br>
<button type = "submit"> Добавить продукт </button>
<br> 
<br>
<p style = "font-size: 25px; margin: 5px;"> Заказы <p>
<table>
<tr>
<th> ID </th>
<th> Дата </th>
<th> Имя </th>
<th> Товары </th>
<th> Телефон </th>
<th> Адрес </th>
</tr>
<?php while($product = $queryOrders->fetch_row()):?>
<tr>
<td> <?= $product[0] ?> </td>
<td> <?= $product[3] ?> </td>
<td> <?= $product[4] ?> </td>
<td> <?php $goods =  unserialize($product[2]);?><?php foreach($goods as $item){echo $item.'<br>';}?> </td>
<td> <?= $product[5] ?> </td>
<td> <?= $product[6] ?> </td>
</tr>
<?php endwhile;?>
</table>

<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>