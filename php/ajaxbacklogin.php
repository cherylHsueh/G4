<?php
ob_start();
session_start();
try{
  require_once("connectBooks.php");
  $sql = "select * from backmanage where managerId=:managerId and managerPsw=:managerPsw and manageStatus =1";
  $backmanage = $pdo->prepare($sql);
  $backmanage->bindValue(":managerId",$_REQUEST["managerId"]);
  $backmanage->bindValue(":managerPsw",$_REQUEST["managerPsw"]);
  $backmanage->execute();

  $sql2 = "select * from backmanage where managerId=:managerId and managerPsw=:managerPsw and manageStatus =0";
  $backmanage2 = $pdo->prepare($sql2);
  $backmanage2->bindValue(":managerId",$_REQUEST["managerId"]);
  $backmanage2->bindValue(":managerPsw",$_REQUEST["managerPsw"]);
  $backmanage2->execute();



  if( $backmanage->rowCount()==0){ //查無此人
	  echo "not found";
  }elseif($backmanage->rowCount()==0 && $backmanage2->rowCount()!=0){
    echo "account erro";
  }else{ //登入成功
    //自資料庫中取回資料
  	$backmanageRow = $backmanage->fetch(PDO::FETCH_ASSOC);

  	//將登入者的資訊寫入session暫存區
    $_SESSION["managerNo"] = $backmanageRow["managerNo"];
  	$_SESSION["managerId"] = $backmanageRow["managerId"];
    $_SESSION["managerPsw"] = $backmanageRow["managerPsw"];
    $_SESSION["position"] = $backmanageRow["position"];
 

  	//送出登入者的姓名資料
  	echo $backmanageRow["managerId"];
   
  }







}catch(PDOException $e){
  echo $e->getMessage();
}
?>