<?php
//停權
try{
    $mesInfo = JSON_decode($_POST['loginInfo']);
    require_once("../connectBooks.php");

    $status = $mesInfo->mesResult;
    $sql = "update message set mesResult=:mesResult where mesNo = :mesNo";
    $fruitStatus = $pdo ->prepare($sql);
    $fruitStatus->bindValue(':mesNo',$mesInfo->mesNo);
    $fruitStatus->bindValue(':mesResult',$mesInfo->mesResult);
    $fruitStatus->execute();

  echo "succes";
}catch(PDOException $e){
  echo $e->getMessage();
}

 ?>