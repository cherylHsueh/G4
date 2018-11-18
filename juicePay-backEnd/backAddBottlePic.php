<?php
$bottleName = $_POST["bottleName"];
$bottleImg = $_FILES["uploadImg"]["name"];
$bottleStatus = $_POST["bottleStatus"];
try{
    require_once("../connectBooks.php");
    $sql = "insert into bottleimg values (null,:bottleName, :bottleImg, :bottleStatus)";
    $products = $pdo->prepare( $sql );
    $products->bindValue(":bottleName", $bottleName);
    $products->bindValue(":bottleImg", $bottleImg);
    $products->bindValue(":bottleStatus", $bottleStatus);
    $products->execute();
    if($_FILES['uploadImg']['error']==0){//如果上傳成功
		$dir="../images/diy/";
		if(file_exists($dir)==false){//如果沒有這個資料夾
			mkdir($dir);//建立資料夾
		}
		$from=$_FILES['uploadImg']['tmp_name'];
		
        $to=$dir. $_FILES['uploadImg']['name'];
		copy($from,$to);
	}else{
		echo $_FILES['uploadImg']['error'];
	}
    header('location:backBottle.php');
}catch(PDOException $e){
  echo $e->POSTMessage();
}
?>