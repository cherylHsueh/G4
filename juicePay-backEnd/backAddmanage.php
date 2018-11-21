<?php
try{
    require_once("../connectBooks.php");
    $sql="insert into backmanage values(null,:managerId,:managerPsw,:position, :manageStatus)";
    $backmanage=$pdo->prepare($sql);
    $backmanage->bindValue(':managerId',$_POST["managerId"]);
    $backmanage->bindValue(':managerPsw',$_POST["managerPsw"]);
    $backmanage->bindValue(':position',$_POST["position"]);
    $backmanage->bindValue(':manageStatus',$_POST["manageStatus"]);
    $backmanage->execute();
 
 header('location:backEmpManage.php');
  
}catch(PDOException $e){
  echo $e->getMessage();
  echo $e->getLine();
}
?>