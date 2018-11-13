<?php
try{
    $fruitInfo = JSON_decode($_POST['loginInfo']);
    require_once("../connectBooks.php");

    $status = $fruitInfo->fruitsStatus;
    if($status=='下架'){   //已上架
    	 $sql = "update fruititem SET fruitStatus='0' where fruitNo = :fruitNo";
    }else{
    	 $sql = "update fruititem SET fruitStatus='1' where fruitNo = :fruitNo";
    }
    $fruitStatus = $pdo ->prepare($sql);
	$fruitStatus->bindValue(':fruitNo',$fruitInfo->fruitsNo);
  $fruitStatus->execute();
  
  echo "succes";
}catch(PDOException $e){
  echo $e->getMessage();
}

 ?>