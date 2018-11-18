<?php
try{
    require_once("../connectBooks.php");

    $sql="insert into fruitItem values(null,:fruitName, :fruitImg, :fruitCol, :cal, :iron, :fiber, :vinC, :fruitInfo, :fruitStatus)";
    $fruit=$pdo->prepare($sql);
    $fruit->bindValue(':fruitName',$_POST["fruitName"]);
    $fruit->bindValue(':fruitImg',$_FILES["fruitImg"]["name"]);
    $fruit->bindValue(':fruitCol',$_POST["fruitCol"]);
    $fruit->bindValue(':cal',$_POST["cal"]);
    $fruit->bindValue(':iron',$_POST["iron"]);
    $fruit->bindValue(':fiber',$_POST["fiber"]);
    $fruit->bindValue(':vinC',$_POST["vinC"]);
    $fruit->bindValue(':fruitInfo',$_POST["fruitInfo"]);
    $fruit->bindValue(':fruitStatus',$_POST["fruitStatus"]);
    $fruit->execute();

    if($_FILES['fruitImg']['error']==0){//如果上傳成功
		$dir="../images/";
		if(file_exists($dir)==false){//如果沒有這個資料夾
			mkdir($dir);//建立資料夾
		}
		$from=$_FILES['fruitImg']['tmp_name'];
		$to=$dir. $_FILES['fruitImg']['name'];
		copy($from,$to);
	}else{
		echo $_FILES['fruitImg']['error'];
	}

    header('location:backFruit.php');



}catch(PDOException $e){
  echo $e->POSTMessage();
}
?>
