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
  $sql = "insert into blog (memNo, fruitNo1, fruitNo2, fruitNo3, artTitle, artContent, postTime, photo) values (:memNo, :fruitNo1, :fruitNo2, :fruitNo3, :artTitle, :artContent, NOW(), :photo)";
  $blogmes = $pdo->prepare($sql);
  $blogmes->bindValue(":memNo", 1);
  $blogmes->bindValue(":fruitNo1", $_POST["fruitselect1"]);
  $blogmes->bindValue(":fruitNo2", $_POST["fruitselect2"]);
  $blogmes->bindValue(":fruitNo3", $_POST["fruitselect3"]);
  $blogmes->bindValue(":artTitle", $_POST["fruitTitle"]);
  $blogmes->bindValue(":artContent", $_POST["mes"]);
  $blogmes->bindValue(":photo",$_FILES['blogImg']['name']);
  $blogmes->execute();

  if($_FILES['blogImg']['error']==0){//如果上傳成功
    $dir="../images/";
    if(file_exists($dir)==false){//如果沒有這個資料夾
        mkdir($dir);//建立資料夾
    }
    $from=$_FILES['blogImg']['tmp_name'];
    $to=$dir. $_FILES['blogImg']['name'];
    copy($from,$to);
}else{
    echo $_FILES['blogImg']['error'];
}

header('location:blog.php');
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
