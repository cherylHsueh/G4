<?php
ob_start();
session_start();
try{
  require_once("../connectBooks.php");

  $sql="update member set memPsw=:memPsw where memId=:memId";

    $newPswModify=$pdo->prepare($sql);
    $newPswModify->bindValue(":memPsw",$_REQUEST["memNewPsw"]);
    $newPswModify->bindValue(":memId",$_SESSION["memId"]);
    $newPswModify->execute();
    echo "密碼修改成功";
      
    

}catch(PDOException $e){
  echo"錯誤原因",$e->getMessage(),"<br>";
  echo"錯誤行號",$e->getLine(),"<br>";


}
?>