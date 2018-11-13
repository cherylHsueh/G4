<?php
try{
    require_once("connectBooks.php");

    // $sql = "select * from robot where keyContent = :keyContent";
    // $msg = $pdo ->prepare($sql);
    // $msg -> bindValue(':keyContent',$_REQUEST["message"]);
    // $msg -> execute();

    // if($msg->rowCount() != 0){
    // 	$msgRow = $msg->fetch(PDO::FETCH_ASSOC);
    // 	$jsonStr = json_encode($msgRow);
    //     echo $jsonStr;

    // }else{
    // 	echo "false";
    // }


    $sql = "select * from robot";
    $msg = $pdo ->query($sql);
    while($msgRow = $msg->fetch(PDO::FETCH_ASSOC)){
        if(substr_count($_REQUEST["message"],$msgRow["keyContent"]) >= 1){
            $jsonStr = json_encode($msgRow);
            break;
        }else{
            $jsonStr = '';
        }
    }
    if($jsonStr){
        echo $jsonStr;
    }else{
        echo "false";
    }



    header('location=nav.php');
}catch(PDOException $e){
  echo $e->getMessage();
}

 ?>