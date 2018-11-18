<?php 
ob_start();
session_start();
// try{
// 	require_once("../connectBooks.php");
// 	$sql = "update member  set memImg=:memImg where memNo =:memNo";
// 	$memPhoto = $pdo ->prepare($sql);
// 	$memPhoto ->bindValue(":memNo",$_SESSION["memNo"]);
// 	$memPhoto ->bindValue(":memImg",$_SESSION["memNo"].$_FILES["upload_img"]["name"]);
// 	$memPhoto ->execute();
// 	echo "新增成功";


	
// 	// if($_FILES["upload_img"]["error"]==0){//如果上傳成功
// 	// $dir = "images/member//";//
// 	// if(file_exists($dir)==false){//如果沒有images資料夾
// 	// mkdir($dir);//會新增1個images資料夾
// 	// }
// 	// $from = $_FILES["upload_img"]["tmp_name"];
// 	// $to = $dir .$_SESSION["memNo"].$_FILES["upload_img"]["name"];
// 	// copy($from,$to); 
// }else{
// 	echo $_FILES["upload_img"]["error"],"<br>";
// }

// 	}catch (PDOException $e) {
// 	echo "錯誤原因:",$e ->getMessage(),"<br>";
// 	echo "錯誤行號:",$e ->getLine(),"<br>";
// 	}




	require_once("../connectBooks.php");
	$sql = "update member  set memImg=:memImg where memNo =:memNo";
	$memPhoto = $pdo ->prepare($sql);
	$memPhoto ->bindValue(":memNo",$_SESSION["memNo"]);
	$memPhoto ->bindValue(":memImg",$_SESSION["memNo"].$_FILES["upload_img"]["name"]);
	$memPhoto ->execute();
	// echo "新增成功";
	
	echo "<script type='text/javascript'>";
	echo 'window.location.href="../member.php"';
	echo "</script>"; 



switch($_FILES["upload_img"]["error"]){
	case 0 :
		$dir = "../images/member/photo/";
		if(file_exists($dir)==false){
			mkdir($dir);
		}
		$from = $_FILES["upload_img"]["tmp_name"];
		echo $from."<br>";
		$to = $dir . $_SESSION["memNo"].$_FILES["upload_img"]["name"];
		echo $to;
		copy($from,$to);
		break;
	case 1:
		echo"上傳檔案太大,不可超過",ini_get("upload_max_filesize"),"<br>";
		break;
	case 2 :
		echo "上傳檔案太大,不可超過",$_POST["MAX_FILE_SIZE"],"<br>";
		break;
	case 3:
		echo "上傳檔案不完整,請重新上傳<br>";
		break;
	case 4:
		echo "没有挑選檔案<br>";
		break;
	default:
		echo "上傳檔案失敗，請通知系統維護人員<br>";
}


 ?>
 	