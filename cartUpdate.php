

<?php
session_start();

$offPdNo = $_GET["offPdNo"] ;

if(isset($_GET["btnUpdate"])){
    $_SESSION["quantity"][$offPdNo] = $_GET["quantity"]; 
}
else{
    unset($_SESSION["offPdName"][$offPdNo]);
    unset($_SESSION["offPdImg"][$offPdNo]);
    unset($_SESSION["pdPrice"][$offPdNo]);
    unset($_SESSION["quantity"][$offPdNo]);
}
header("location:cart.php");
?>