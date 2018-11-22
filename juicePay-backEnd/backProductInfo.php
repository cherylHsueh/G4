<?php

try{
    require_once("../connectBooks.php");	  
    $sql = "update offcialpd set offPdName = :offPdName , offCateNo = :offCateNo , pdPrice = :pdPrice , offPdInfo = :offPdInfo where offPdNo = :offPdNo";
    $pd = $pdo ->prepare($sql);
    $pd->bindValue(':offPdNo',$_POST["offPdNo"]);
    $pd->bindValue(':offPdName',$_POST["offPdName"]);
    $pd->bindValue(':offCateNo',$_POST["offCateNo"]);
    $pd->bindValue(':pdPrice',$_POST["pdPrice"]);
    $pd->bindValue(':offPdInfo',$_POST["offPdInfo"]);
    $pd->execute();
  ?>
	<meta http-equiv = "refresh" content = "0;url=backProduct.php">
<?php


}catch(PDOException $e){
  echo $e->POSTMessage();
}
?>   
</body>
</html>
