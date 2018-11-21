<?php 
ob_start();
session_start();

try{
	require_once("../connectBooks.php");
	$memId=$_POST["memId"];
	$memPsw=$_POST["memPsw"];
	$memImg='profile.png';
	// $memImg=$_POST["memImg"];
	$memName=$_POST["memName"];
	$memTel=$_POST["memTel"];
	$sql = "select * from member where memId = :memId";
	$idAccount = $pdo ->prepare($sql);
	$idAccount ->bindValue(":memId",$memId);
	$idAccount ->execute();
	if(empty($memId)||empty($memPsw)||empty($memName)||empty($memTel)){
		echo "註冊失敗";

		// header('location:../signUp.php');


	}else{

	$sql = "insert into member(memId,memPsw,memImg,memName,memTel)values(:memId,:memPsw,:memImg,:memName,:memTel)";
	$member = $pdo ->prepare($sql);
	$member ->bindValue(":memId",$memId);
	$member ->bindValue(":memPsw",$memPsw);
	$member ->bindValue(":memImg",$memImg);
	$member ->bindValue(":memName",$memName);
	$member ->bindValue(":memTel",$memTel);
	$member ->execute();
	$memNo = $pdo->lastInsertId();
	  	//將登入者的資訊寫入session暫存區
  	$_SESSION["memId"] = $memId;
	$_SESSION["memPsw"] = $memPsw;
	$_SESSION["memImg"] = $memImg;
  	$_SESSION["memName"] = $memName;
	$_SESSION["memTel"] = $memTel;
	// $_SESSION["memNo"] = $memNo;
  	//送出登入者的姓名資料


	// $sql = "select memNo from member where memId = :memId";
	// $member = $pdo ->prepare($sql);
	// $member ->bindValue(":memId",$_SESSION["memId"]);
	// $member ->execute();
	// $memberRow=$member->fetchObject();
	$_SESSION["memNo"]=$memNo;


	echo $memName;
	// echo "<script type='text/javascript'>";
	// echo "window.location.href='../homepage.php'";
	// echo "</script>";
	header('location:../homepage.php');

	}



	}catch (PDOException $e) {
	echo "錯誤原因:",$e ->getMessage(),"<br>";
	echo "錯誤行號:",$e ->getLine(),"<br>";
	}




 ?>
 	