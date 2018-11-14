<?php
 $thumbFq = $_POST["thumbFq"];
 $artNo = $_POST["artNo"];
try{
    // echo $thumbFq .$artNo;
    require_once("connectBooks.php");
    // $sql = "select * from blog where blog.artNo=$artNo";
    // $thumbFqNo = $pdo->prepare($sql);
    // $thumbFqNo->execute();

    $sql = "update blog set thumbFq = :thumbFq, artNo = :artNo  where blog.artNo=$artNo";
    $thumFqPlus = $pdo->prepare($sql);
    $thumFqPlus->bindValue(":artNo",$artNo);
    $thumFqPlus->bindValue(":thumbFq", $thumbFq+1);
    $thumFqPlus->execute();
    // echo 'success'.$thumbFq .$artNo;
    // echo "異動成功~<br> /",$thumbFq ;
  }
  catch(PDOException $e){
      echo "錯誤原因:",$e ->getMessage(),'<br>';
      echo "錯誤行列:",$e ->getLine();
   }
?>
