
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="text/css" href="">
    <title>果然配後台</title>
    <link rel="stylesheet" type="text/css" href="css/backloginb.css">
    
</head>
<body>
    <div class="backendFull">

	    <div class="wrapback"> 
	        <div class="loginback">
	        	<div id="owlface">
	    			<img src="images/face.png">
	    		</div>  
	    		<div id="left_down">
	    			<img src="images/arm-down-left.png">
	    		</div>
	    		<div id="right_down">
	    			<img src="images/arm-down-right.png">
	    		</div>
	            <h2>管理員登入</h2>
	            <span>帳號:</span>
	            <span><input type="text" placeholder="請輸入您的帳號" onfocus="this.placeholder=''" name="managerId" id="mgrId"></span>
	            <span>密碼:</span>
	            <span><input type="password" placeholder="請輸入您的密碼" onfocus="this.placeholder=''" name="managerPsw" id="mgrpsw"></span>
	            <span><input type="submit" value="登入" id="backLoginBtn"></span>
	        </div>     
	    </div>
	    <div class="guava">
	    	<img src="images/HotAirBallon01.png">
	    </div>
	    <div class="balloon">
	    	<img src="images/HotAirBallon02.png">
	    </div>
    </div>
<script>

	// 送出管理員帳密

	function $id(id) {
        return document.getElementById(id);
      }

	function owl(){
      //=====使用Ajax 回server端,取回登入者姓名, 放到頁面上 
      var xhr = new XMLHttpRequest();
      xhr.onload = function (){
        if( xhr.status == 200){
          if(xhr.responseText.indexOf("not found") != -1){ //回傳的資料中有not found
            alert("帳密錯誤");
          }else if(xhr.responseText.indexOf("account erro") != -1){
            alert("此帳號已被停權");
          }else{ //登入成功 
             // alert(xhr.responseText);
             window.location.href="juicePay-backEnd/backFruit.php"

          }
        }else{
          alert(xhr.status);
        }
      }
      xhr.open("post", "php/ajaxbacklogin.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      var data_info = "managerId=" + $id("mgrId").value + "&managerPsw=" + $id("mgrpsw").value;
      xhr.send(data_info);
    }

    document.getElementById("backLoginBtn").addEventListener('click',owl,false);

</script>
</body>
