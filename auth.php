<?php
include "database.php";
$login = $_REQUEST['login'];
$password = $_REQUEST['password'];
$query = mysqli_query($induction, "SELECT * FROM users WHERE login='".$login."' AND password='".$password."'");

$result = $query->fetch_row();

if(empty($result)){
    echo 'error';
    return;
    }
    $id = $result[0][0];
    setcookie('id', $id, time() + 604800, '/');
    setcookie('password', $password, time() + 604800, '/');
    echo 'success';
    
?>