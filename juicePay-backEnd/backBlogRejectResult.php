<?php
//駁回
try{
    $artInfo = JSON_decode($_POST['loginInfo']);
    require_once("../connectBooks.php");

    $status = $artInfo->artresult;
    $sql = "update blog set artReportFq='0' where artNo = :artNo";
    $fruitStatus = $pdo ->prepare($sql);
    $fruitStatus->bindValue(':artNo',$artInfo->artno);
    $fruitStatus->execute();
  
  // echo "succes";
}catch(PDOException $e){
  echo $e->getMessage();
}

 ?>