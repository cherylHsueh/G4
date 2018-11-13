<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <?php
//  $artNo = $_REQUEST["artNo"];
try{
  require_once("connectBooks.php");
  $sql = "insert into message (artNo, memNo, mesContent, mesTime, mesReportFq) values (:artNo, :memNo, :mesContent, NOW(), null)";
  $blogmes = $pdo->prepare($sql);
  $blogmes->bindValue(":artNo",$_POST["artNo"]);
  $blogmes->bindValue(":memNo", 1);
  $blogmes->bindValue(":mesContent", $_POST["mes"]);
  $blogmes->execute();
?>

<?php
  //  header("location:blogIn.php?artNo=$artNo");
// header(location:getenv("HTTP_REFERER"));
}
catch(PDOException $e){
	echo "錯誤原因:",$e ->getMessage(),'<br>';
	echo "錯誤行列:",$e ->getLine();
 }
 
?>


</body>
</html>


