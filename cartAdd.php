<?php
ob_start();
session_start();

$offPdNo = $_GET["offPdNo"];

if( isset($_SESSION["offPdName"][$offPdNo]) == false){ //購物車中尚無此商品

	$_SESSION["offPdName"][$offPdNo] = $_GET["offPdName"];
	$_SESSION["offPdNo"][$offPdNo] = $_GET["offPdNo"];
	
}


header("location:cart.php");
?>