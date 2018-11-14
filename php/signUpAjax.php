<?php 
ob_start();
session_start();

try{
	require_once("../connectBooks.php");
	$memId=$_POST["memId"];
	$memPsw=$_POST["memPsw"];
	$memName=$_POST["memName"];
	$memTel=$_POST["memTel"];
	$sql = "select * from member where memId = :memId";
	$idAccount = $pdo ->prepare($sql);
	$idAccount ->bindValue(":memId",$memId);
	$idAccount ->execute();
	if(empty($memId)||empty($memPsw)||empty($memName)||empty($memTel)){
		echo "註冊失敗";
	}else{

	$sql = "insert into member(memId,memPsw,memName,memTel)values(:memId,:memPsw,:memName,:memTel)";
	$member = $pdo ->prepare($sql);
	$member ->bindValue(":memId",$memId);
	$member ->bindValue(":memPsw",$memPsw);
	$member ->bindValue(":memName",$memName);
	$member ->bindValue(":memTel",$memTel);
	$member ->execute();

	  	//將登入者的資訊寫入session暫存區
  	$_SESSION["memId"] = $memId;
  	$_SESSION["memPsw"] = $memPsw;
  	$_SESSION["memName"] = $memName;
	$_SESSION["memTel"] = $memTel;
	// $_SESSION["memNo"] = $memNo;
  	//送出登入者的姓名資料
	  echo $memName;
	?>
	<meta http-equiv = "refresh" content = "0.1;url=http://localhost/G4/index.php">
<?php

	// echo "註冊失敗";

	}



	}catch (PDOException $e) {
	echo "錯誤原因:",$e ->getMessage(),"<br>";
	echo "錯誤行號:",$e ->getLine(),"<br>";
	}




 ?>
 	