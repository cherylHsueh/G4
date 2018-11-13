
   function checkForm(){
	//   跟畫面做連結
	var memId = document.getElementById("memId");
	var memPsw = document.getElementById("memPsw");
	var memTel = document.getElementById("memTel");
	var RememPsw = document.getElementById("RememPsw");

	//檢查帳號不得低於6碼
	if( memId.value.length < 6){
	  alert('帳號不得低於6碼');
	  memId.focus();
	  return;
	}

	//檢查密碼不得低於6碼
	if( memPsw.value.length < 6){
	  alert('密碼不得低於6碼');
	  memPsw.select();
	  return;
	}
	// 密碼正規化
	var hasNum = hasABC = false;
  var temp = memPsw.value.toUpperCase().split("");
  for( let i=0; i<temp.length; i++){
    //var char = temp.charAt(i);;
    var char = temp[i];
    if( char >= '0' && char <= '9'){
      hasNum = true;
    }else if(char >= 'A' && char <= 'Z'){
      hasABC = true;
    }
  }

  if( hasNum===false || hasABC === false ){   // 1111111
    alert('密碼英數字都要有才行');
    e? e.preventDefault() : event.returnValue = false;
    return;
  }

	
	// 密碼確認是否一致
	if( RememPsw.value != memPsw.value){
		alert('密碼不相同哦!');
		return;
	}


	if( memTel.value.length <10){
		alert('手機不符合格式!')
	}
  
	//正確就送出
	document.getElementById("signupform").submit();
  
  }
  
  
  
  window.addEventListener( "load" , function (){
	document.getElementById("signupsubmit").onclick = checkForm;
  });
  
  