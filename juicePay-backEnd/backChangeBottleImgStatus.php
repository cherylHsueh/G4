<?php
try{
    require_once("../connectBooks.php");
    $bottleInfo = JSON_decode($_POST['loginInfo']);
    $status = $bottleInfo->bottlesStatus;
    if($status=='下架'){   //已上架
    	 $sql = "update bottleimg SET bottleStatus='0' where bottleNo = :bottleNo";
    }else{
    	 $sql = "update bottleimg SET bottleStatus='1' where bottleNo = :bottleNo";
    }
    $bottleStatus = $pdo ->prepare($sql);
	$bottleStatus->bindValue(':bottleNo',$bottleInfo->bottlesNo);
  $bottleStatus->execute();
  
  echo "success";
}catch(PDOException $e){
  echo $e->getMessage();
}
 ?>