<?php
try{
    require_once("connectBooks.php");
    $answer1=$_GET["answer1"];
    $answer2=$_GET["answer2"];
    $offPdNo = ($answer1-1)*4+$answer2;
    $sql = "select * from offcialpd where offPdNo = :offPdNo";
    $pd = $pdo ->prepare($sql);
    $pd -> bindValue(':offPdNo',$offPdNo);
    $pd ->execute();
    if($pd ->rowCount()!=0){
        $pdRow = $pd->fetch(PDO::FETCH_ASSOC);

        $jsonStr = json_encode( $pdRow );
    }else{
        $jsonStr ="{}";
    }
    echo $jsonStr;
}catch(PDOException $e){
  echo $e->getMessage();
}

 ?>