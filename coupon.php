
<?php
ob_start();
session_start();

  try{
    require_once("connectBooks.php");
    $sql = "insert into couponitem (couponNo, memNo, discount) values (null, :memNo, :discount)";
    $couponitem = $pdo->prepare($sql);
    $couponitem->bindValue(":memNo", $_SESSION["memNo"]);
    $couponitem->bindValue(":discount", $_REQUEST["coupon"]);
    $couponitem->execute();
    echo 'success';
     header("location:member.php");
  // header(location:getenv("HTTP_REFERER"));
  }
  catch(PDOException $e){
   echo "錯誤原因:",$e ->getMessage(),'<br>';
   echo "錯誤行列:",$e ->getLine();
   }

?>