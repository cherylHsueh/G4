<?php
try{
    require_once("../connectBooks.php");

    $sql="insert into robot values(null,:keyContent, :keyAns)";
    $robot=$pdo->prepare($sql);
    $robot->bindValue(':keyContent',$_GET["keyContent"]);
    $robot->bindValue(':keyAns',$_GET["keyAns"]);
    $robot->execute();


    header('location:backRobot.php');



}catch(PDOException $e){
  echo $e->POSTMessage();
}
?>
