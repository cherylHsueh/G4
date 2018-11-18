<?php
ob_start();
session_start();

	$offPdNo = $_GET["offPdNo"];

if( isset($_SESSION["offPdName"][$offPdNo]) == false){ //購物車中尚無此商品

	$_SESSION["offPdName"][$offPdNo] = $_GET["offPdName"];
	$_SESSION["offPdNo"][$offPdNo] = $offPdNo;
	$_SESSION["offPdImg"][$offPdNo] = $_GET["offPdImg"];
	$_SESSION["pdPrice"][$offPdNo] = $_GET["pdPrice"];
	$_SESSION["quantity"][$offPdNo] = $_GET["quantity"];
	$_SESSION["pdClassNo"][$offPdNo] = 0;
	
}


header("location:cart.php");
?>