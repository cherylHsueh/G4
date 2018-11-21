<?php 
  // ob_start();
  // session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,shrink-to-fit=no"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>果然配註冊</title>
    <link rel="stylesheet" href="css/signUp.css" />
    <link rel="stylesheet" href="css/loginFruit.css">
    <script src="js/global.js"></script>
    <script src="js/plugin/jquery.min.js"></script>
    <script src="https://unpkg.com/color-js@1.0.3/color.js"></script>
  </head>

  <body>
    <?php 
      require_once("php/nav.php")
    ?>
    <div class="nav_space"></div>
    <section class="signUp_section">
      <div class="signUp clearfix">
        <div class="signUp_newmem cl-md-5 clearfix">
          <div class="cloud">
            <img src="images/about/cloud(03).png" alt="" />
          </div>
          <div class="signUp_newmem_box">
            <!--
              <form action="php/memAcountInsert.php" method="POST" id="signupform" onsubmit="return checkForm()">
            -->
            <h2>註冊</h2>
            <!-- <form action="php/signUpSQL.php" id='myForm' method="post"> -->
            <form>
              <div class="singUp_box_1">
                <label for="memId">帳號</label
                ><input
                  type="text"
                  placeholder="英文開頭及六位數字"
                  id="memId"
                  class="inputform"
                  name="memId"
                />
                <span class="error1"></span>
              </div>
              <input
                type="button"
                value="檢查帳號是否可用"
                onClick="checkId();"
              /><span id="idMsg"></span>

              <!-- <div id="checkMemId"></div> -->
              <div class="singUp_box_2">
                <label for="memPsw">密碼</label>
                <input
                  type="password"
                  placeholder="英文開頭及六位數字"
                  name="memPsw"
                  id="memPsw"
                  class="inputform"
                />
                <span class="error2"></span>
              </div>
           
                <div class="confirm">
                  <label for="RememPsw">確認密碼</label>
                  <input
                    type="password"
                    placeholder="請再輸入一次新密碼"
                    name="RememPsw"
                    id="RememPsw"
                    class="inputform"
                  />
                  <span class="error3"></span>
                </div>
            
              <div>
                <label for="memName">姓名</label>
                <input
                  type="text"
                  name="memName"
                  id="memName"
                  class="inputform"
                />
              </div>
              <div class="singUp_box_5">
                <label for="memTel">手機</label>
                <input
                  type="tel"
                  name="memTel"
                  id="memTel"
                  placeholder="ex.09xx-xxxxxx"
                  class="inputform"
                />
                <span class="error5"></span>
              </div>
              
              <div>
                <button
                  class="common_btn common_btn_first"
                  id="signupsubmit"
                  type="button"
                >
                  <span class="common_btn_txt">送出</span>
                  <div class="common_btn_blobs">
                    <div></div>
                    <div></div>
                    <div></div>
                  </div>
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="signUp_explain cl-md-7">
          <div class="cloud2">
            <img src="images/about/cloud(02).png" alt="" />
          </div>
          <div class="sun"><img src="images/sun.png" alt="" /></div>
          <div class="signUp_explain_box">
            <h2>優惠券</h2>
            <p>1.如何獲得優惠卷：</p>
            <p>從每日優惠遊戲中可獲得，登入會員才獲得優惠卷序號</p>
            <p>2.如何使用：</p>
            <p>於訂購資料頁選擇優惠卷序號，即可折抵消費，以每筆訂單為單位</p>
            <p>3.如何查詢：</p>
            <p>
              登入後進入會員中心，點『我的優惠卷』，即可查詢優惠卷折數、卷號、有效日期
            </p>
          </div>
          <!-- 風車和草 -->
          <canvas id="canvastwo" class="grassb" height="600" width="600">
          </canvas>
          <div class="windmill">
            <img src="images/about/Windmill1.png" alt="" />
            <div class="fan">
              <img src="images/about/Windmill2.png" alt="" />
            </div>
          </div>
          <canvas id="canvas" class="grass" height="600" width="600"> </canvas>
          <!-- 車子 -->
          <div class="car">
            <img src="images/about/car(noTire).png" alt="" />
            <div class="tire1"><img src="images/about/tire.png" alt="" /></div>
            <div class="tire2"><img src="images/about/tire.png" alt="" /></div>
          </div>
          <div class="tree">
            <img src="images/about/Tree.png" alt="" />
            <div class="orange">
              <img src="images/about/orange2.png" alt="" />
            </div>
            <div class="orange2">
              <img src="images/about/orange2.png" alt="" />
            </div>
            <div class="orange3">
              <img src="images/about/orange2.png" alt="" />
            </div>
            <div class="orange4">
              <img src="images/about/orange2.png" alt="" />
            </div>
          </div>
        </div>
      </div>
      <div class="sign_earth">
        <img src="images/About_Png/Grassland.png" alt="" />
      </div>
      <div class="sign_up_dirt">
        <img src="images/about/roud01.png" alt="" />
      </div>
    </section>
    <footer>
      <div class="footer_wrapper">
        <div class="footer_block clearfix">
          <div class="footer_rightBox">
            <div class="footer_rightContent">
              <p class="copyright">Copyright © All Rights Reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
      <script src="js/grass.js"></script>
      <script src="js/grassleft.js"></script>
      <!-- <script src="js/grassthree.js"></script> -->
 
    <script src="js/signupAjax.js"></script>
    <!-- <script src="js/signUp.js"></script> -->
    <script>
      var idRule = /[a-z]+(\d{6})/i; //比對字串中是否包含 小寫英文a-z 1次 或更多次其次是 數字0-9 剛好 6 次
      var pswRule = /^([a-z])\d{6}$/;
      var telRule = /^09\d{2}-\d{6}$/;
      $(document).ready(function() {
        $(".inputform").focus(function() {
          $(this).css("border-color", "#006cff");
        }),
          $(".inputform").blur(function() {
            $(this).css("border-color", "");
          }),
          $("#memId").blur(function() {
            if (idRule.test($(this).val())) {
              $(".error1").text("");
            } else {
              $(".error1").text("字數不符");
              $(this).css("border-color", "red");
            }
          }),
          $("#memPsw").blur(function() {
            if (pswRule.test($(this).val())) {
              $(".error2").text("");
            } else {
              $(".error2").text("字數不符");
              $(this).css("border-color", "red");
            }
          }),
          $("#RememPsw").blur(function() {
            if ($(this).val()==$("#memPsw").val()) {
              $(".error3").text("");
            } else {
              $(".error3").text("密碼不同");
              $(this).css("border-color", "red");
            }
          }),
          $("#memTel").blur(function() {
            if (telRule.test($(this).val())) {
              $(".error5").text("");
            } else {
              $(".error5").text("字數不符");
              $(this).css("border-color", "red");
            }
          });
      });
    </script>
    <script>
      function $id(id) {
        return document.getElementById(id);
      }

      function signUpBtn() {
        // $id('myForm').submit();
        //=====使用Ajax 回server端,取回登入者姓名, 放到頁面上
        var xhr = new XMLHttpRequest();
        xhr.onload = function() {
          if (xhr.status == 200) {
            if (xhr.responseText.indexOf("註冊失敗") != -1) {
              //回傳的資料中有not found
              alert("註冊失敗");
              console.log("1");
            } else {
              //註冊成功
              console.log("2");
              alert("註冊成功");
              $id("memId").value = "";
              $id("memPsw").value = "";
              $id("RememPsw").value = "";
              $id("memName").value = "";
              $id("memTel").value = "";
							$id("loginName").innerHTML = xhr.responseText;
              $id("spanLogin").innerHTML="登出"
              window.location.href='homepage.php';
              // header('location:http://http://localhost/G4/index.php');

            }
          } else {
            console.log("3");
            alert(xhr.statusText);
          }
        };

        xhr.open("post","php/signUpSQL.php", true);
        xhr.setRequestHeader(
          "content-type",
          "application/x-www-form-urlencoded"
        );
        var data_info ="memId="+ $id("memId").value + "&memPsw=" + $id("memPsw").value +"&memName=" +$id("memName").value +"&memTel=" +$id("memTel").value+"&RememPsw=" +$id("RememPsw").value;
        xhr.send(data_info);
      }

      function init() {
        //===設定btnLogin.onclick 事件處理程序是 signUpBtn
        $id("signupsubmit").onclick = signUpBtn; //確定註冊
      } //window.onload

      window.onload = init;
    </script>





    
  </body>
</html>
