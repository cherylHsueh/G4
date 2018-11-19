<?php
ob_start();
session_start();
try{
  require_once("../connectBooks.php");
  $sql = "select * from member where memId=:memId and memPsw=:memPsw and memStatus=1";
  $member = $pdo->prepare( $sql);
  $member->bindValue(":memId", $_POST["memId"]);
  $member->bindValue(":memPsw", $_POST["memPsw"]);
  $member->execute();
  $sql2 = "select * from member where memId=:memId and memPsw=:memPsw and memStatus=0";
  $member2 = $pdo->prepare( $sql2);
  $member2->bindValue(":memId", $_POST["memId"]);
  $member2->bindValue(":memPsw", $_POST["memPsw"]);
  $member2->execute();

  if( $member->rowCount()==0 && $member2->rowCount()==0){ //查無此人
	  echo "not found";
  }else if($member->rowCount()==0 && $member2->rowCount()!=0){
    echo "account erro";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);

    //將登入者的資訊寫入session暫存區
    $_SESSION["memNo"] = $memRow["memNo"];
  	$_SESSION["memId"] = $memRow["memId"];
    $_SESSION["memPsw"] = $memRow["memPsw"];
    $_SESSION["memImg"] = $memRow["memImg"];
    $_SESSION["memName"] = $memRow["memName"];
    $_SESSION["memTel"] = $memRow["memTel"];
  	//送出登入者的姓名資料
    echo $memRow["memName"],',',$memRow["memImg"];
    
  }
}catch(PDOException $e){
  echo $e->getMessage();
}
?>