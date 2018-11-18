<?php
//  $mesNo = $_POST["mesNo"];
 $mesNo = $_POST["mesNo"];
 $artNo = $_POST["artNo"];
 $mesReportFq = $_POST["mesReportFq"];
try{
    // echo $thumbFq .$artNo;
    require_once("connectBooks.php");
    // $sql = "select * from message where message.mesNo=$mesNo";
    // $thumbFqNo = $pdo->prepare($sql);
    // $thumbFqNo->execute();

    $sql = "update message set mesReportFq = :mesReportFq where message.mesNo=$mesNo and artNo=$artNo";
    $thumFqPlus = $pdo->prepare($sql);
    $thumFqPlus->bindValue(":mesReportFq", $mesReportFq+1);
    $thumFqPlus->execute();
    // echo 'success'.$thumbFq .$artNo;
    // echo "異動成功~<br> /",$thumbFq ;
  }
  catch(PDOException $e){
      echo "錯誤原因:",$e ->getMessage(),'<br>';
      echo "錯誤行列:",$e ->getLine();
   }
?>


