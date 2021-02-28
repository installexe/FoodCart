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

  <div class = "container" style = "margin-top: 25px;  color: #fffff; font-family: ‘Raleway’, sans-serif; font-size: 18px; font-weight: 500; line-height: 32px;  ">
  
<p style = "font-size: 23px;">Почему покупку продуктов можно доверить FoodCart?</p>
100% качество.
Товары, которые вы заказали, отбирают специально обученные эксперты по закупкам. Они знают, как быстро найти лучшие фрукты и овощи, проверить сроки годности и правильно упаковать заказ, чтобы продукты приехали к вам так, как будто вы только что взяли их с полки магазина.
<p style = "font-size: 23px;">Поможем сэкономить</p>
Каждую неделю более 2 тысяч товаров со скидками до 50% и сотни наименований собственных брендов магазинов.  
<p style = "font-size: 23px;">Доставим вовремя</p>
Время и место выбираете вы. Мы доставим заказ в день оформления, или в удобное время в течение недели. Интервал ожидания заказа всего 2 часа.  
<p style = "font-size: 23px;">Донесём тяжёлые сумки</p>
Со FoodCart вы забудете о тяжёлых сумках. Доставка заказов до 30 кг уже входит в стоимость сервиса. Наши курьеры донесут их до двери, даже если вы живёте в доме без лифта.
<p style = "font-size: 23px;">Гарантия</p>
Только у нас  возврат в течение 24 часов. Если вам не понравилось качество – вернём деньги по первому требованию.
<p style = "font-size: 23px;">Официальный партнер магазинов</p>
Наш сервис – привилегированный   партнёр сети торговых центров METRO Cash&Carry по всей России. Также работаем с сетями Лента, АШАН, Billa, Азбука Вкуса, Вкусвилл, Командор, Аллея, Виктория, Мегамарт, Бахетле, Зелёное Яблоко, Real, Дея, Хороший, Титан, Седьмая СТОЛИЦА, Забайкальский привозъ, Кит, Парус, Караван, Магнолия, Вега, Шан, Аутлет, Осень, ТЦ “Новомариинский”, Удачная покупка, ТД Хороший, Фреш25, ТЦ Столица, Сигма, Идея, Столичный, Быстроном и др.    
<p style = "font-size: 23px;">Зарабатывать на покупках просто</p>
Копите баллы программы «Аэрофлот Бонус» за каждую покупку в FoodCart. Получайте бонусы и скидки за приглашённых друзей. <br>

		</div>
		<div class = "row">	
		<div class="col s6"><img src = "https://i2.stat01.com/2/2849/128488791/075a3e/dostavka-produktov-ashan.jpg" width = 450px; height = 250px; style = "margin-left:300px; margin-top: 25px; 
    border: 2px solid ;  ">	</div>
		<div class="col s6"><img src = "https://i.pinimg.com/originals/34/2b/a3/342ba305b57b9cd6d4068f067c170aae.jpg" width = 450px; height = 250px; style = "margin-top: 25px; 
    border: 2px solid ;  ">	</div>
	<div class="col s6"><img src = "https://www.narodnayamarka.ru/images/laureats/2018/auchan/logo.png" width = 450px; height = 250px; style = " margin-left:300px; margin-top: 25px; 
    border: 2px solid ;  ">	</div>
	<div class="col s6"><img src = "https://izbran.com/upload/iblock/3d3/3d3c57828d90b3bcce17288d18989d20.png" width = 450px; height = 250px; style = "margin-top: 25px; 
    border: 2px solid ;  "></div>
		
</div>


  
<script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
    </html>
