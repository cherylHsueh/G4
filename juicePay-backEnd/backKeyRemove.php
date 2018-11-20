<?php
try{
    require_once("../connectBooks.php");

    $no = $_POST["keyNo"];
    $sql = "delete from robot where keyNo = :keyNo ";
    $fruitStatus = $pdo ->prepare($sql);
  	$fruitStatus->bindValue(':keyNo',$no);
    $fruitStatus->execute();
  
  echo "succes";
}catch(PDOException $e){
  echo $e->getMessage();
}

 ?>