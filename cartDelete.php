

<?php
session_start();

$offPdNo = $_GET["offPdNo"] ;

unset($_SESSION["offPdName"][$offPdNo]);
unset($_SESSION["offPdImg"][$offPdNo]);
unset($_SESSION["pdPrice"][$offPdNo]);
unset($_SESSION["quantity"][$offPdNo]);

header("location:cart.php");
?>