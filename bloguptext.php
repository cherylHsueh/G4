<?php
ob_start();
session_start();
?>
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

try{
  require_once("connectBooks.php");

  
  if($_FILES['blogImg']['error']==0){//如果上傳成功
    $dir="images/blogImg/";
    if(file_exists($dir)==false){//如果沒有這個資料夾
        mkdir($dir);//建立資料夾
    }
    $from=$_FILES['blogImg']['tmp_name'];
    $to=$dir. $_FILES['blogImg']['name'];
    copy($from,$to);

  $sql = "insert into blog (memNo, fruitNo1, fruitNo2, fruitNo3, fruitRatio1, fruitRatio2, fruitRatio3, artTitle, artContent, postTime, photo, thumbFq, artResult) values (:memNo, :fruitNo1, :fruitNo2, :fruitNo3, :fruitRatio1, :fruitRatio2, :fruitRatio3, :artTitle, :artContent, NOW(), :photo, :thumbFq, :artResult)";
  $blogmes = $pdo->prepare($sql);
  $blogmes->bindValue(":memNo", $_SESSION["memNo"]);
  $blogmes->bindValue(":fruitNo1", $_POST["fruitselect1"]);
  $blogmes->bindValue(":fruitNo2", $_POST["fruitselect2"]);
  $blogmes->bindValue(":fruitNo3", $_POST["fruitselect3"]);
  $blogmes->bindValue(":fruitRatio1", $_POST["fruitRatio1"]);
  $blogmes->bindValue(":fruitRatio2", $_POST["fruitRatio2"]);
  $blogmes->bindValue(":fruitRatio3", $_POST["fruitRatio3"]);
  $blogmes->bindValue(":artTitle", $_POST["fruitTitle"]);
  $blogmes->bindValue(":artContent", $_POST["mes"]);
  $blogmes->bindValue(":photo",$_FILES['blogImg']['name']);
  $blogmes->bindValue(":thumbFq", 0);
  $blogmes->bindValue(":artResult", 0);
  $blogmes->execute();

}else{
    echo $_FILES['blogImg']['error'];
}
?>
<meta http-equiv = "refresh" content = "0;url=http://localhost/G4/blog.php">
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
