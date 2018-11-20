<?php
try{
    require_once("../connectBooks.php");

    $sql="insert into offcialpd values(null, :offCateNo , :offPdName, :pdPrice, :offPdImg , :offPdInfo, :offPdStatus)";
    $pd=$pdo->prepare($sql);
    $pd->bindValue(':offCateNo',$_POST["newpdcate"]);
    $pd->bindValue(':offPdName',$_POST["pdName"]);
    $pd->bindValue(':pdPrice',$_POST["pdPrice"]);
    $pd->bindValue(':offPdImg',$_FILES["pdImg"]["name"]);
    $pd->bindValue(':offPdInfo',$_POST["offPdInfo"]);
    $pd->bindValue(':offPdStatus',$_POST["pdStatus"]);
    $pd->execute();

    if($_FILES['pdImg']['error']==0){//如果上傳成功
		$dir="../images/pd/";
		if(file_exists($dir)==false){//如果沒有這個資料夾
			mkdir($dir);//建立資料夾
		}
		$from=$_FILES['pdImg']['tmp_name'];
		$to=$dir. $_FILES['pdImg']['name'];
		copy($from,$to);
	}else{
		echo $_FILES['pdImg']['error'];
	}
header('location:backProduct.php');

}catch(PDOException $e){
  echo $e->POSTMessage();
}
?>