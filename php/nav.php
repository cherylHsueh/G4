<?php 
  ob_start();
  session_start();
?>
<header>
        <input type='checkbox' name='' id='hb_control'>
        <nav>
            <div id='svg-2'>
                <canvas id='wave' width='1000' height='400'>
                    Hopefully you don't see this. If you do, get Google Chrome.
                </canvas>
                <canvas id='wave2' width='1000' height='400'>
                    Hopefully you don't see this. If you do, get Google Chrome.
                </canvas>
             </div>
            <div class='ph_nav'>
                <label for='hb_control' class='hb'><span></span></label>
                <a href='homepage.php'>
                    <h1 class='phone_logo'><img src='images/logo.png' alt='果然配'>果然配</h1>
                </a>
            </div>

            <div class='menu'>
                <ul>
                    <li class='menu_item'><a href='diy.php'>果汁DIY</a></li>
                    <li class='menu_item'><a href='product.php'>果然特調</a></li>
                    <li><a href='homepage.php'>
                            <h1 class='menu_logo'><img src='images/logo.png' alt='果然配'>果然配</h1>
                        </a> </li>
                    <li class='menu_item'><a href='blog.php'>果然私藏</a></li>
                    <li class='menu_item'><a href='about.php'>關於果然</a></li>
                </ul>
            </div>
            <div class='nav_mem'>
            
            <span id='loginName'><?php if( isset($_SESSION["memName"])){ echo $_SESSION["memName"];}else{echo "";}?> 
            </span>
            <span id='spanLogin'><?php if( isset($_SESSION["memName"])){ echo "登出"; }else{echo "登入";}?></span>
                <div class='mem_pic'><a href='member.php'><img src='images/user.png' alt='會員中心'></a></div>
                <div class='mem_pic'><a href='cart.php'><img src='images/cart.png' alt='購物車'></a></div>
            </div>
        </nav>
        <div class='coupon'><a href='game.php'><img src='images/coupon.png' alt='優惠小遊戲'></a></div>
        <!-- 機器人 -->
        <input type='checkbox' id='robotControl'>
        <div class='robot_container'>
            <label class='robot_titleBlock' for='robotControl'>
                <span class='robot_toggle'><img src='images/arrow-up.png'></span>
                <h3>果汁機器人君</h3>
                <div class='robot_pic'><img src='images/robot.png' alt='果然配客服機器人'></div>   
            </label>
            <div class='robot_conversationBlock'>
                <div class='robot_conversation'>
                    <p class='robot_text'>請問是否有需要幫忙的？</p><span class='robot_textTime'></span>
                </div>
                <!-- <div class='user_conversation'>
                    <span class='robot_textTime'>13:00</span><p class='user_text'>請問是否有需要幫忙的？</p>
                </div>
                <div class='robot_conversation'>
                    <p class='robot_text'>請問是否有需要幫忙的？</p><span class='robot_textTime'></span>
                </div> -->
            </div>
            <form>
                <div class='robot_inputBlock'>
                        <textarea name='message' id='message'></textarea>
                        <button type='button' id='robotSubmit'>送出</button>
                </div>
            </form>

        </div>
    </header>
    
    <!-- 燈箱 -->
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
    
    <!-- nav js -->
    <script type='text/javascript'>
    window.addEventListener('load',function(){
        
        i=1;

        getTime(0);
        document.getElementById('robotSubmit').addEventListener('click',getMessage);
        document.getElementById('message').addEventListener('keydown',function(e){
            if (e.keyCode === 13) {
                getMessage();
            }
        });
    });

    function getMessage(){
        //產生使用者對話框
        var block = document.querySelector('.robot_conversationBlock');
        var keyContent = document.getElementById('message').value;

        var userConversation = document.createElement('div');
        userConversation.className='user_conversation';
        block.appendChild(userConversation);

        var robotTextTime = document.createElement('span');
        robotTextTime.className='robot_textTime';
        userConversation.appendChild(robotTextTime);
        block.scrollTop = block.scrollHeight;

        getTime(i);
        i++;
        var userText = document.createElement('p');
        userText.className='user_text';
        userConversation.appendChild(userText);
        userText.innerText=keyContent;

        //把使用者打的話，使用ajax回去撈資料庫
        var xhr = new XMLHttpRequest();

        xhr.onload = function(){
            if(xhr.status == 200){
                turnMessage(xhr.responseText);
                // var text = JSON.parse(xhr.responseText);
                // alert(text);
                document.getElementById('message').value='';
                
            }else{
                alert(xhr.status);
            }
        }
        xhr.open('post','robot.php',true);
        xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
        var data_info = 'message=' + document.getElementById('message').value;
        xhr.send(data_info);


    };
    function turnMessage(jsonStr){
        var text = JSON.parse(jsonStr);
        // alert(text.keyAns);
        var block = document.querySelector('.robot_conversationBlock');
        var robotConversation = document.createElement('div');
        block.appendChild(robotConversation);

        var robotText = document.createElement('p');
        robotText.className='robot_text';
        robotConversation.appendChild(robotText);

        var robotTextTime = document.createElement('span');
        robotTextTime.className='robot_textTime';
        robotConversation.appendChild(robotTextTime);
        block.scrollTop = block.scrollHeight;
        getTime(i);
        i++;
        if(text != false ){
            robotText.innerText=text.keyAns;
        }else{
            robotText.innerText='我聽不懂你在說什麼！';
        }
        
    };
    function getTime(i){
        var nowTime= new Date();
        var nowHours = nowTime.getHours();
        var nowMinutes = nowTime.getMinutes();
        document.querySelectorAll('.robot_textTime')[i].textContent=nowHours+':'+nowMinutes;
    }
    </script>
    

<!-- 登入跳窗  js  -->

    <script>
        $(document).ready(function () {

            $(':text').focus(function () {
                fruit.style.opacity = 1;
                fruit2.style.opacity = 0;
            });
            $(':password').focus(function () {
                fruit2.style.opacity = 1;
                fruit.style.opacity = 0;
            });
        });
    </script>
<!-- <script>
    // $("#loginBtn").click(function(){
    //  $("#lightbox_section").attr("display","block");
    // });
    var spanLogin=document.querySelector('#spanLogin');
    var lightboxWrapper=document.querySelector('#lightbox_section');
    var lightbox =document.querySelector('#lightbox');
    var closeSign =document.querySelector('.close');

    function lightboxShow(e){
    
        lightboxWrapper.style.display="block";

         e.stopPropagation();
        //  alert("打開");
    }
    function lightboxClose(e){
        e.stopPropagation();
        lightboxWrapper.style.display="none";
        // alert("關起來");
    }

    spanLogin.addEventListener("click",lightboxShow,false);
    lightboxWrapper.addEventListener("click",lightboxClose,false);
    closeSign.addEventListener("click",lightboxClose,false)
    lightbox.addEventListener("click",function(e){
        e.stopPropagation();
    },false)

    </script>
 -->


<script>
  function $id(id){
    return document.getElementById(id);
  } 

    function showLoginForm(){
      if($id('spanLogin').innerHTML == "登入"){
        $id('lightbox_section').style.display = 'block';
      }else{ //登出
        $id('loginName').innerHTML = '&nbsp';
        $id('spanLogin').innerHTML = '登入';
        //回server端清掉session
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){
          console.log("logout");
        }
        xhr.open("get","php/ajaxLogout.php", true);
        xhr.send( null);
      }

    }//showLoginForm
    function sendForm(){
      //=====使用Ajax 回server端,取回登入者姓名, 放到頁面上 
      var xhr = new XMLHttpRequest();
      xhr.onload = function (){
        if( xhr.status == 200){
          if(xhr.responseText.indexOf("not found") != -1){ //回傳的資料中有not found
            alert("帳密錯誤");
          }else{ //登入成功
            // $id("memName").innerHTML = xhr.responseText;
            //將登箱中表單上的資料清空，並隱藏起來
            $id('lightbox_section').style.display = 'none';
            $id('loginMemId').value = '';
            $id('LoginMemPsw').value = '';  
            $id("loginName").innerHTML = xhr.responseText;
            $id('spanLogin').innerHTML = '登出'; 
          }
        }else{
          alert(xhr.status);
        }
      }
      xhr.open("post", "php/ajaxLogin.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      var data_info = "memId=" + $id("loginMemId").value + "&memPsw=" + $id("LoginMemPsw").value;
      xhr.send(data_info);
    }

    function cancelLogin(){
      //將登入表單上的資料清空，並將燈箱隱藏起來
      $id('lightbox_section').style.display = 'none';
      $id('loginMemId').value = '';
      $id('LoginMemPsw').value = '';
    }


      //===設定spanLogin.onclick 事件處理程序是 showLoginForm

      $id('spanLogin').onclick = showLoginForm;  //登入/登出的面版

      //===設定btnLogin.onclick 事件處理程序是 sendForm
      $id('btnLogin').onclick = sendForm;    //確定登入

      //===設定btnLoginCancel.onclick 事件處理程序是 cancelLogin
      $id('close').onclick = cancelLogin; //取消登入
      


</script>






