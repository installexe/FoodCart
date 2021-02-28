<?php
include "database.php";
if($_REQUEST['function']=='addCart'){
    if(addCart($_REQUEST['id'],$_REQUEST['count'],$induction)){
        echo 'success';
    }else{
        echo 'error';
    }
}

if($_REQUEST['function']=='makeOrder'){
    if(makeOrder($induction,$_REQUEST['name'],$_REQUEST['phone'], $_REQUEST['adress'])){
        echo 'success';
    }else{
        echo 'error';
    }
}
function makeOrder($induction,$name,$phone,$adress){
    $idUser = $_COOKIE['id'];
    $queryCart = mysqli_query($induction, "SELECT c.count `count`,g.price `price`,g.name `name` FROM cart c INNER JOIN goods g ON c.id_product = g.id WHERE id_user=".$idUser);
    $goods = [];
    
    while($result = $queryCart->fetch_row()){
        $goods[] = $result[2].' Кол-во: '.$result[0].' Стоимость: '.($result[0]*$result[1]).'р.';
    }
    $goods =  serialize($goods);
    $query = mysqli_query($induction, "INSERT INTO orders(id_user,goods,name,phone,adress) VALUES (".$idUser.",'".$goods."','".$name."','".$phone."','".$adress."')");
    $queryCart = mysqli_query($induction, "DELETE FROM cart WHERE id_user=".$idUser);
    return true;
}
function addCart($id,$count,$induction){
    $idUser = $_COOKIE['id'];
    if(!$idUser){
        return false;
    }
   if((int)$id>0&&(int)$count>0){
    $queryCart = mysqli_query($induction, "SELECT * FROM cart WHERE id_user=".$idUser." AND id_product=".$id);
    $result = $queryCart->fetch_row();
    if(!empty($result)){
        $count = $result[2]+$count;
        $query = mysqli_query($induction, "UPDATE cart SET count = ".$count." WHERE id = ".$result[0]);

    }else{
        $query = mysqli_query($induction, "INSERT INTO cart(id_user,id_product,count) VALUES (".$idUser.",".$id.",".$count.")");
    }
   
    return true;
   } 
   return false;
}
?>