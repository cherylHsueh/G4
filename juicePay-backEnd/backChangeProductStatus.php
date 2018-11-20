<?php

try{
    $fruitInfo = JSON_decode($_POST['loginInfo']);
    require_once("../connectBooks.php");
    $status = $fruitInfo->fruitsStatus;
    if($status=='下架'){   //已上架
    	 $sql = "update offcialpd SET offPdStatus='0' where offPdNo = :offPdNo";
    }else{
    	 $sql = "update offcialpd SET offPdStatus='1' where offPdNo = :offPdNo";
    }
    $fruitStatus = $pdo ->prepare($sql);
	$fruitStatus->bindValue(':offPdNo',$fruitInfo->fruitsNo);
  $fruitStatus->execute();
  echo "succes";

}catch(PDOException $e){
  echo $e->getMessage();
}

?>