
<?php
session_start();

$offPdNo = $_GET["productNo"];

$_SESSION["quantity"][$offPdNo] = $_GET["quantity"]; 

?>