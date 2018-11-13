<?php
try{
  require_once("../connectBooks.php");
  $sql = "select memName from member where memId = ?";
  $member = $pdo->prepare( $sql );
  $member->bindValue(1,$_REQUEST["memId"]);
  $member->execute();
  if( $member->rowCount() == 0){ //會員資料中尚無此會員
  	echo "可使用此帳號";
  }else{
  	echo "帳號已存在，不可使用";
  }

}catch(PDOException $e){
  echo $e->getMessage();
}
?>