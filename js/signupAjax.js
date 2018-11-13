// ajax檢查帳號是否有人使用 
function checkId(){  
	  //產生XMLHttpRequest物件
	  xhr = new XMLHttpRequest();
	  
	  //註冊callback function 
	  xhr.onreadystatechange = function (){
		// console.log( xhr.readyState);
		if( xhr.readyState == 4){//或是可以寫XMLHttpRequest.DONE
		  if( xhr.status == 200 ){ //server端有正確的執行成功
			  document.getElementById("idMsg").innerHTML = xhr.responseText;
		  }else{
			  alert(xhr.status);
		  }
		}
	  }
	
	  //設定好所要連結的程式
	  var url = "php/GetResponseText.php?memId=" + document.getElementById("memId").value;
	  xhr.open("get", url, true);
	
	  //送出資料
	  
	  xhr.send( null)
	
	}//function_checkId 