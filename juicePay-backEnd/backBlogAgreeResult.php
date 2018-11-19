<?php
//停權
try{
    $artInfo = JSON_decode($_POST['loginInfo']);
    require_once("../connectBooks.php");

    $status = $artInfo->artResult;
    $sql = "update blog set artResult = :artResult where artNo = :artNo";
    $fruitStatus = $pdo ->prepare($sql);
    $fruitStatus->bindValue(':artNo',$artInfo->artNo);
    $fruitStatus->bindValue(':artResult',$artInfo->artResult);
    $fruitStatus->execute();

  // echo "succes";
}catch(PDOException $e){
  echo $e->getMessage();
}

 ?>