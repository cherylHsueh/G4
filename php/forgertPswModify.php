<?php
ob_start();
session_start();
try{
  require_once("../connectBooks.php");

  $sql="update member set memPsw=:memPsw where memTel=:memTel";
  $forgetPswModify=$pdo->prepare($sql);
	$forgetPswModify->bindValue(":memTel",$_REQUEST["memTel"]);
	$forgetPswModify->bindValue(":memPsw",$_REQUEST["memForgetNewPsw"]);
  $forgetPswModify->execute();
  if($forgetPswModify->rowCount()!=0){
   echo "密碼修改成功";
  }else { 
   echo "密碼修改失敗";
  }    
    

}catch(PDOException $e){
  echo"錯誤原因",$e->getMessage(),"<br>";
  echo"錯誤行號",$e->getLine(),"<br>";


}
?>