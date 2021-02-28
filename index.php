<?php 
include "database.php";
$role = 0;
$username = '';
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
		<a href = "index.php"  class = "brand-logo">FoodCart</a>
	
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
<div class = "container">
<div class="row">
	<?php while($result = $query->fetch_row()):?>
    <div class="col xl4 center-align">
      <div class="card">
        <div class="card-image">
          <img src="<?=$result[4]?>" height="250" width="250">
          
        </div>
		<div class ="namepos" style = "font-size: 18px;"><?=$result[1]?></div>
        <div class="card-content">
          <p><?=$result[2]?></p>
        </div>
		<div class = "price"><?=$result[3]?></div>
        <div class="card-action">
			<a href = "#" onclick="addCart(<?=$result[0]?>,1)" class="waves-effect waves-light btn">Добавить в корзину</a>
        </div>
      </div>
    </div>
	<?php endwhile;?>
  </div>
  
 
  
  </div>

  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/cart.js"></script>
    </body>
    </html>
