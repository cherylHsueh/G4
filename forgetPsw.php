<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/forgetPsw.css">
    <link rel="stylesheet" href="css/loginFruit.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <title>忘記密碼</title>
    <script src="js/global.js"></script>
    <script src="js/plugin/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/plugin/TweenMax.min.js"></script>

    <script src="js/plugin/scrollMagic/ScrollMagic.min.js"></script>
    <script src="js/plugin/scrollMagic/animation.gsap.min.js"></script>
    <script src="js/plugin/scrollMagic/debug.addIndicators.min.js"></script>
</head>

<body>
   <?php  
    require_once('php/nav.php');
    // require_once("connectBooks.php");
    // $sql = "select * from member";
    // $memberForgetPsw = $pdo->query($sql);
    // $forgetPswRow = $memberForgetPsw ->fetch(PDO::FETCH_ASSOC);
    // echo $forgetPswRow ->memTel;
   ?>
    <div class="nav_space"></div>
    <section>
        <div class="nav clearfix"></div>
    </section>
    <section class="forgetPsw_session">
        <!-- 小鳥飛 -->
        <div id="pictureframe">
            <div id="bird">
                <div id="body2"></div>
                <div id="body1"></div>
                <div id="wing-l"></div>
                <div id="wing-r"></div>
            </div>
            <div id="shadow"></div>
        </div>
        <div class="forgetPsw clearfix">
            <div class="forgetPsw_explain cl-md-7">
                <div class="forgetPsw_explain_box">
                    <p>本系統將以手機號碼識別會員資訊， 請輸入您的手機號碼， 若經系統核對正確無誤,即可更改密碼。
                    </p>
                </div>
                <div class="psw_store">
                    <img src="images/member/store.png" alt="">
                    <div class="guava">
                        <img src="images/guava.png" alt="">
                    </div>
                    <div class="banana">
                        <img src="images/b-fruit/banana.png" alt="">
                    </div>
                    <div class="banana2">
                        <img src="images/b-fruit/banana.png" alt="">
                    </div>
                    <div class="cantaloupe">
                        <img src="images/cantaloupe.png" alt="">
                    </div>
                    <div class="apple">
                        <img src="images/apple.png" alt="">
                    </div>
                    <div class="grape">
                        <img src="images/orange.png" alt="">
                    </div>
                    <div class="pineapple">
                        <img src="images/pineapple.png" alt="">
                    </div>
                    <div class="watermelon">
                        <img src="images/watermelon.png" alt="">
                    </div>
                </div>

            </div>
            <div class="forgetPsw_newmem cl-md-5">

                <div class="cloud">
                    <img src="images/about/cloud(03).png" alt="">
                </div>
                <div class="cloud2">
                    <img src="images/about/cloud(01).png" alt="">
                </div>

                <div class="forgetPsw_newPsw_box">
                    <h2>忘記密碼</h2>

                    <div class="psw_inner">
                        <div class="box_phone">
                            <span>手機:</span>
                            <input type="text" name="memTel" id="memTel">
                        </div>
                        <div class="box_psw">
                            <span>新密碼 :</span>
                            <input type="password" name="memForgetNewPsw" id="memForgetNewPsw">
                        </div>
                        <div class="psw_btn">
                            <button class="common_btn common_btn_first" type="submit" id="newpswsubmit" value="登入">
                                <span class="common_btn_txt">送出</span>
                                <div class="common_btn_blobs">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </button>
                            <div class="add_mem">
                                <h3>還沒有會員?
                                    <span class="apply">
                                        <a href="signUp.php">立即申請</span>
                                    </a>
                                </h3>  
                            </div>    
                        </div>
                    </div>
                </div>

                <div class="draft">
                    <img src="images/member/ru_plant.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer_wrapper">
            <div class="footer_block clearfix">
                <div class="footer_rightBox">
                    <div class="footer_rightContent">
                        <p class="desc">地址:桃園市中壢區中大路111號</p>
                        <p class="desc">電話:(03)49111853</p>
                        <p class="copyright">Copyright © All Rights Reserved.</p>
                    </div>
                </div>
            </div>

        </div>
    </footer>


<script>
	function changePsw(){ 
		  //產生XMLHttpRequest物件
		  xhr = new XMLHttpRequest();
		  
		  //註冊callback function 
		  xhr.onreadystatechange = function (){
			// console.log( xhr.readyState);
			if( xhr.readyState == 4){//或是可以寫XMLHttpRequest.DONE
              if( xhr.status == 200 ){ //server端有正確的執行成功
                if(xhr.responseText.indexOf("密碼修改成功") !=-1){
                swal(xhr.responseText, "","success");
				document.getElementById('memTel').value="";
				document.getElementById('memForgetNewPsw').value="";
                }else{
                swal(xhr.responseText, "","error");
                }
				
			  }else{
				  alert(xhr.status);
			  }
			}
		  }
		  //設定好所要連結的程式
		  var url = "php/forgertPswModify.php";
		  xhr.open("POST", url, true);
		  xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
		  var data_info ="memForgetNewPsw="+document.getElementById('memForgetNewPsw').value + "&memTel="+document.getElementById('memTel').value;

		  //送出資料
		  xhr.send(data_info)
	
	}//function_checkOldPsw 

	//ajax檢查手機是否輸入正確 
	function checkTel(){
    // var hiddenTel =document.getElementById('hiddenTel').value;
	var memTel =document.getElementById('memTel').value;
    var memForgetNewPsw = document.getElementById('memForgetNewPsw').value;
    changePsw();
    // if(hiddenTel != memTel ){
	// 	swal("手機輸入錯誤", "","error");
	// 	document.getElementById('memTel').value="";
	//     document.getElementById('memForgetNewPsw').value="";
	// }else{
    //     changePsw();
    // }

	};

	window.addEventListener("load",function(){
		var submitBtn = document.querySelector('#newpswsubmit');
		submitBtn.addEventListener('click',checkTel,false);
	})
	

	 
</script>	







</body>

</html>