<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <?php
  if(isset($_SESSION['memNo'])===false){
    echo "<!-- 燈箱 -->
    <section id='lightbox_section'>
           <div class='lightbox' id='lightbox'>
               <!-- logo和關閉 -->
               <div class='logoContainer'>
                   <span id='close'>&times;</span>
                   <div class='lightbox_logo'>
                       <img src='images/about/logo.png' alt='Avatar' class='avatar'>
                   </div>
               </div>
               <!-- 登入輸入框 -->
               <div class='loginContainer'>
                  <!--  <form action='php/login.php' method='post' id='loginForm' > -->
                       <div class='account'>
                           <input class='memeber' type='text' placeholder='帳號' name='memId' required='required' id='loginMemId'>
                           <img id='fruit' src='images/about/orange.png' alt=''>
                       </div>
                       <div class='secret'>
                           <input class='memeber' type='password' placeholder='密碼' name='memPsw' required='required' id='LoginMemPsw'>
                           <img id='fruit2' src='images/about/orange.png' alt=''>
                       </div>
                       <input type='submit' class='login_btn' id='btnLogin'>
                   <!-- </form> -->
   
               </div>
   
               <div class='regPsw'>
                   <a class='lightbox_signUp' href='signUp.php'>會員註冊</a>
                   <a class='lightbox_forgrtPsw' href='forgetPsw.php'>忘記密碼</a>
               </div>
   
               <div class='clearfix'></div>
               <div class='cocktail collins'>
                   <div class='cocktail__glass cocktail__glass-long'>
                       <div class='orange'></div>
                       <div class='cherry'></div>
                       <div class='ice'>
                           <div class='ice__cube cube-1'></div>
                           <div class='ice__cube cube-2'></div>
                           <div class='ice__cube cube-3'></div>
                       </div>
                   </div>
               </div>
           </div>
   
       </section>
   ";

}else{
try{
  require_once("connectBooks.php");
  $sql = "insert into message (artNo, memNo, mesContent, mesTime, mesReportFq, mesResult) values (:artNo, :memNo, :mesContent, NOW(), '0', '0')";
  $blogmes = $pdo->prepare($sql);
  $blogmes->bindValue(":artNo",$_POST["artNo"]);
  $blogmes->bindValue(":memNo", $_SESSION["memNo"]);
  $blogmes->bindValue(":mesContent", $_POST["mes"]);
  $blogmes->execute();
  //  header("location:blogIn.php?artNo=$artNo");
// header(location:getenv("HTTP_REFERER"));
}
catch(PDOException $e){
	echo "錯誤原因:",$e ->getMessage(),'<br>';
	echo "錯誤行列:",$e ->getLine();
 }
};
?>

</body>
</html>


