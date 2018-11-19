<?php
//駁回
try{
    $mesInfo = JSON_decode($_POST['loginInfo']);
    require_once("../connectBooks.php");

    $status = $mesInfo->mesresult;
    $sql = "update message set mesReportFq='0' where mesno = :mesno";
    $fruitStatus = $pdo ->prepare($sql);
  	$fruitStatus->bindValue(':mesno',$mesInfo->mesno);
    $fruitStatus->execute();
  
  // echo "succes";
}catch(PDOException $e){
  echo $e->getMessage();
}

 ?>