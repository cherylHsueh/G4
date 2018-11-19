<?php
try{
    $empInfo = JSON_decode($_POST['loginInfo']);
    require_once("../connectBooks.php");
    $status = $empInfo->manageStatus;
    if($status=='停權'){   //已上架
    	 $sql = "update backmanage SET manageStatus='0' where managerNo = :managerNo";
    }else{
    	 $sql = "update backmanage SET manageStatus='1' where managerNo = :managerNo";
    }
   $manageStatus = $pdo ->prepare($sql);
	$manageStatus->bindValue(':managerNo',$empInfo->managerNo);
  $manageStatus->execute();
  
  echo "succes";
}catch(PDOException $e){
  echo $e->getMessage();
}
 ?>