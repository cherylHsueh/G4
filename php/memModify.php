<?php
ob_start();
session_start();
try{
  require_once("../connectBooks.php");
  $sql="update member set memName=:memName,memTel=:memTel where memNo=:memNo";

  $memModify=$pdo->prepare($sql);
  $memModify->bindValue(":memName",$_POST["memName"]);
  $memModify->bindValue(":memTel",$_POST["memTel"]);
  $memModify->bindValue(":memNo",$_SESSION["memNo"]);
  $memModify->execute();
  // echo "異動成功";
  $_SESSION["memName"]=$_POST["memName"];
  echo "<script type='text/javascript'>";
  echo 'window.location.href="../member.php"';
  echo "</script>";

}catch(PDOException $e){
  echo"錯誤原因",$e->getMessage(),"<br>";
  echo"錯誤行號",$e->getLine(),"<br>";


}
?>