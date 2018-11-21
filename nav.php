 <header>
     <input type='checkbox' name='' id='hb_control'>
        <nav>
            <svg preserveAspectRatio='none' id='svg-2' viewBox='0 0 100 80' enable-background='new 0 0 100 80'>
                <animate dur='2s' attributeName='x' repeatCount='indefinite' from='0' to='100' xlink:href='#wave'></animate>
                <defs>
                    <filter id='f4' x='0' y='0' width='100%' height='100%'>
                        <feOffset result='offOut' in='SourceGraphic' dx='0' dy='0'></feOffset>
                        <feColorMatrix result='matrixOut' in='offOut' type='matrix' values='0.2 0 0 0 0 0 0.2 0 0 0 0 0 0.2 0 0 0 0 0 1 0'></feColorMatrix>
                        <feGaussianBlur result='blurOut' in='matrixOut' stdDeviation='2'></feGaussianBlur>
                        <feBlend in='SourceGraphic' in2='blurOut' mode='normal'></feBlend>
                    </filter>
                </defs>
                <path x='0' y='0' d='M 100,0 L 0,0 L 0,65 Q 12.5,80 25,65T 50,65 Q62.5,80 75,65 T 100,65Z' filter='url(#f4)'
                    id='wave'></path>
                <path x='30' y='0' d='M 100,0 L 0,0 L 0,65 Q 12.5,80 25,65T 50,65 Q62.5,80 75,65 T 100,65Z' filter='url(#f4)'
                    id='wave2'></path>
            </svg>
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
                <a href='index.html'>
                    <h1 class='phone_logo'><img src='images/logo.png' alt='果然配'>果然配</h1>
                </a>
            </div>
            <div class='menu'>
                <ul>
                    <li class='menu_item'><a href='diy.html'>果汁DIY</a></li>
                    <li class='menu_item'><a href='product.html'>果然特調</a></li>
                    <li><a href='index.html'>
                            <h1 class='menu_logo'><img src='images/logo.png' alt='果然配'>果然配</h1>
                        </a> </li>
                    <li class='menu_item'><a href='blog.html'>果然私藏</a></li>
                    <li class='menu_item'><a href='about.html'>關於果然</a></li>
                </ul>
            </div>
            <div class='nav_mem'>
                <p><a href='login.html'>登入</a></p>
                <div class='mem_pic'><a href='member.html'><img src='images/user.png' alt='會員中心'></a></div>
                <div class='mem_pic'><a href='cart.html'><img src='images/cart.png' alt='購物車'></a></div>
            </div>
        </nav>
        <div class='coupon'><img src='images/coupon.png' alt='優惠小遊戲'></div>
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

