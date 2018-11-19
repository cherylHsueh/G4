<?php
ob_start();
session_start();
try{
  require_once("connectBooks.php");
  $sql = "insert into message (artNo, memNo, mesContent, mesTime, mesReportFq, mesResult) values (:artNo, :memNo, :mesContent, NOW(), '0', '0')";
  $blogmes = $pdo->prepare($sql);
  $blogmes->bindValue(":artNo",$_POST["artNo"]);
  $blogmes->bindValue(":memNo", $_SESSION["memNo"]);
  $blogmes->bindValue(":mesContent", $_POST["mes"]);
  $blogmes->execute();

  $blogmesno = $pdo->lastInsertId();
  echo $blogmesno;
  //  header("location:blogIn.php?artNo=$artNo");
// header(location:getenv("HTTP_REFERER"));
}
catch(PDOException $e){
	echo "錯誤原因:",$e ->getMessage(),'<br>';
	echo "錯誤行列:",$e ->getLine();
 }
?>



