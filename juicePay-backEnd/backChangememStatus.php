<?php
try{
    $memInfo = JSON_decode($_POST['loginInfo']);
    require_once("../connectBooks.php");
    $status = $memInfo->memStatus;
    if($status=='停權'){   //已上架
    	 $sql = "update member SET memStatus='0' where memNo = :memNo";
    }else{
    	 $sql = "update member SET memStatus='1' where memNo = :memNo";
    }
    $memStatus = $pdo ->prepare($sql);
	$memStatus->bindValue(':memNo',$memInfo->memNo);
  $memStatus->execute();
  
  echo "succes";
}catch(PDOException $e){
  echo $e->getMessage();
}
 ?>