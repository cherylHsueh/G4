<?php

try{
    require_once("../connectBooks.php");	  
    $sql = "update ordermaster set orderStatus = '1' where orderNo = :orderNo";
    $fruit = $pdo ->prepare($sql);
    $fruit->bindValue(':orderNo',$_POST["orderNo"]);
    $fruit->execute();

  ?>
<?php


}catch(PDOException $e){
  echo $e->POSTMessage();
}
?>   
</body>
</html>
