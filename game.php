<?php
ob_start();
// session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>水果遊戲</title>
    <meta name="keywords" />
    <meta name="description" />
    <link rel="stylesheet" href="css/loginFruit.css">
    <link rel="stylesheet" href="css/game.css">
    <script type="text/javascript" src="js/jquery.js"></script>
   
  </head>
  <body>
  <?php 
  try{
  require_once("connectBooks.php"); 
  require_once("php/nav.php"); 
  ?>
  

 
    <div class="game_container">
      <!-- 遊戲訊息欄 -->
      <div id="game_info">
        <div>
          <div>生命力</div>
          <div style="text-align: left;">
            <div class="life_bar_box"><span id="lifeBar"></span></div>
          </div>
          <div style="display:none;">關卡</div>
          <div><strong id="gameLevel">1</strong></div>
          <div>當前得分</div>
          <div id="gameCent">0</div>
        </div>
       
      </div>
      <!-- 遊戲訊息 end -->
      <!-- 遊戲主螢幕 start -->
      <div id="game_box">
          <!--倒數時間 --> 
          <a id="bonus" class="game_over_tip3">GO</a>
        <div class="time_container">
          <span>剩餘時間:</span><span id="divNum">30</span>
        </div>
        <!-- 菜籃 -->
        <div class="car_bar">
          <div id="carBox" class="car">
        </div>        
      </div>
      <!-- 遊戲螢幕 end -->
      <!-- 遊戲控制 start -->
      <div id="game_control">
        <div id="game_control_txt">
          使用"→"跟"←"來接住水果,會依照水果數量給不同獎賞唷!
        </div>
        <button onclick="document.getElementById('game_control').style.display='none'" id="btnStart">
          開始
        </button>
      </div>
      
    </div>
    <form method="post" action="coupon.php" id="coupon1">
        <input id="bonusgo" type="hidden" name="coupon" value="">
      </form>

   
    <script type="text/javascript" src="js/game.js"></script>
    <script type="text/javascript">


      $(function() {
        $("#btnStart").click(function() {
          // alert('ok');
          FruitGame.Start();
        });
      });
      $(document).ready(function(){
         $("#bonus").click(function(){
          // alert('ok');
          bonuscheck();
         });
      })
        
      function bonuscheck(){
        // alert('ok');
        if( $("#spanLogin").text() == "登入"){
          showLoginForm();
        }else{
          // alert(document.getElementById('bonusgo').value);
          $('#coupon1').submit();
        }
      }





    </script>
  </body>
  <?php
  }catch(PDOException $ex){
    echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
    echo "行號：",$ex->getLine(),"<br>";
  }
  ?>
</html>
