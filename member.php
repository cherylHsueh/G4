
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,shrink-to-fit=no">
	<title>會員中心</title>
	<link rel="stylesheet" href="css/member.css">
	<link rel="stylesheet" href="css/loginFruit.css">
	<link rel="stylesheet" href="css/sweetalert2.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/global.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/plugin/sweetalert2.min.js"></script>
	<script src="js/member.js"></script>




</head>

<body>
<?php 
	require_once("php/nav.php");
	 require_once("connectBooks.php");
	 if(isset($_SESSION["memId"])==null){
		echo "<script>
				alert('尚未登入');
				showLoginForm();
		</script>";
	 }else{
	 $sql = "select * from member where memId=:memId";
	 $member = $pdo->prepare($sql);
	 $member -> bindValue(":memId",$_SESSION["memId"]);
	 $member -> execute();
	 $memRow = $member->fetchObject();
	 echo $memRow->memId;



?>
	<div class="brick"></div>
	
	<section class="member_memberInfo clearfix">
		<!-- 會員中心選擇頁面 -->
		<div class="member_container">
			<div class="member_memberInfo_wrapper cl-s-12 cl-md-6">
				<div class="member_memberInfo_box">
					<div class="member_memberInfo_profile_photo">
					<form action="php/memPhoto.php" method="POST" enctype="multipart/form-data">
						<div class="member_memberInfo_photo_box">
							<label id="imgContainer">
								<input id="upload_img" style="display:none;" type="file" accept="image/*" name="upload_img">
							
								<img id="imgPreview" src="images/member/photo/<?php echo $memRow->memImg?> " alt="profilePhoto">
							</label>
						</div>
						<label class="uploadBtn common_btn common_btn_second">
							<!-- <input id="upload_img" style="display:none;" type="file" accept="image/*"> -->
							
							<i class="fa fa-photo"></i>
							<span class="common_btn_txt">上傳圖片</span>
							<input type="submit" value="" style="display:none" id="submit">
							<div class="common_btn_blobs">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</label>
					</form>
						<div class="member_memberInfo_Features_box">
							<ul class="member_memberInfo_Features_box_item">
								<a href="#" class="member_personalInfo">
									<li>個人資料</li>
								</a>
								<a href="#" class="member_orderSearch">
									<li>訂單查詢</li>
								</a>
								<a href="#" class="member_coupon">
									<li>我的優惠卷</li>
								</a>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!--個人資料 -->
			<div class="member_personalInfo_wrpaper cl-s-12  cl-md-6 ">
				<div class="member_personalInfo_basicInfo_block">
					<h3>基本資料</h3>
					<form action="php/memModify.php" method="POST">
						<div class="member_personalInfo_basicInfo_block_item">
							<span>姓名</span><input type="text" name="memName" id="memName" value="<?php echo  $memRow ->memName ?>"></div>
						<div class="member_personalInfo_basicInfo_block_item">
							<span>手機</span><input type="text" name="memTel" id="memTel" value="<?php echo $memRow ->memTel ?>"></div>
						<label class="modifyInfo_btn common_btn common_btn_second">
							<input type="submit" name="submit" id="submit" style="display: none">
							<span class="common_btn_txt">確認修改會員資料</span>
							<div class="common_btn_blobs">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</label>
					</form>
				</div>
				<div class="member_personalInfo_password_block">
					<h3>變更密碼</h3>

						<input type="hidden" id="hiddenPsw" name=hiddenPsw" value="<?php echo $memRow->memPsw ?>">
						<div class="member_personalInfo_password_block_item">
							<span>輸入舊密碼</span>
							<input type="password" name="memPsw" id="memPsw">
							
						</div>
						<div class="member_personalInfo_password_block_item">
							<span>輸入新密碼</span>
							<input type="password" name="memNewPsw" id="memNewPsw">
						</div>
						<div class="member_personalInfo_password_block_item">
							<span>確認新密碼</span>
							<input type="password" name="memCheckNewPsw" id="memCheckNewPsw">
						</div>
						<label class="modifyPsw_btn common_btn common_btn_second">
							<span class="common_btn_txt">確認修改密碼</span>
							<div class="common_btn_blobs">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</label>
		
				</div>
			</div>
		</div>
		<!-- 訂單查詢 -->
		<div class="member_orderSearch_wrpaper cl-s-12  cl-md-6">
			<div class="member_orderSearch_block">
				<div class="member_orderSearch_title">訂單查詢</div>
		<?php 
		     
 				$sql="select m.memNo,m.memName,O.orderNo,O.orderDate,O.orderPrice from member m 
				join ordermaster o on m.memNo=o.memNo
				where m.memId = :memId";
			    $order = $pdo->prepare($sql);
			    $order->bindValue(":memId",$_SESSION["memId"]);
			    $order -> execute();
			    // $orderRow = $order->fetchObject();
			    if( $order->rowCount() !== 0)
			    while ($orderRow = $order->fetchObject()) {
		?>

			<div class="member_orderSearch_block_box">
					<div class="member_orderSearch_block_box_item">
						<span>訂單編號</span>
						<div id="member_orderSearch_block_box_item_orderNo">
							<?php echo $orderRow ->orderNo ?>
						</div>
					</div>

					<div class="member_orderSearch_block_box_item">
						<span>訂單金額</span>
						<div id="member_orderSearch_block_box_item_orderPrice">
							<?php echo $orderRow ->orderPrice ?>元</div>
					</div>
					<div class="member_orderSearch_block_box_item">
						<span>下單日期</span>
						<div id="member_orderSearch_block_box_item_orderDate">
							<?php echo $orderRow ->orderDate ?>
						</div>
					</div>

					<label class="orderDetail_btn common_btn common_btn_second" id="thisOrderDetail_btn<?php echo $orderRow ->orderNo ?>">
						<input type="submit" name="submit" id="submit" style="display: none">
						<span class="common_btn_txt">訂單詳情</span>
						<div class="common_btn_blobs">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</label>
				</div>
				<?php } ?>
				
		

		<!-- 訂單明細燈箱 -->
		<div class="member_orderSearch_block_lightbox">
			<div class="member_orderSearch_block_lightbox_box">
				<table id="detialTable"></table>
			</div>
		</div>


	</div>
</div>

			
		  
		<!-- 我的優惠卷 -->
		<?php  
			$sql_1="select * from couponitem  where memNo = :memNo and discount = 9 ";
			$coupon_1 = $pdo->prepare($sql_1);
			$coupon_1->bindValue(":memNo",$_SESSION["memNo"]);
			$coupon_1->execute();
			$coupon1 = $coupon_1->rowCount();

			$sql_2="select * from couponitem where memNo = :memNo and discount = 8 ";
			$coupon_2 = $pdo->prepare($sql_2);
			$coupon_2->bindValue(":memNo",$_SESSION["memNo"]);
			$coupon_2->execute();
			$coupon2 = $coupon_2->rowCount();
			

			$sql_3="select * from couponitem where memNo = :memNo and discount = 7 ";
			$coupon_3 = $pdo->prepare($sql_3);
			$coupon_3->bindValue(":memNo",$_SESSION["memNo"]);
			$coupon_3->execute();
			$coupon3 = $coupon_3->rowCount();
		?>
		<div class="member_coupon_wrpaper cl-s-12  cl-md-6">

			<div class="member_coupon_block">
				<div class="member_coupon_title">我的優惠卷</div>
				<div class="member_coupon_block_box">
					<img src="images/member/coupon9.png" alt="coupon">
					<span>數量</span>
					<div class="member_coupon_block_box_quantity">
						<?php echo $coupon1 ?>
					</div>
				</div>
				<div class="member_coupon_block_box">
					<img src="images/member/coupon8.png" alt="coupon">
					<span>數量</span>

					<div class="member_coupon_block_box_quantity">
					<?php echo $coupon2 ?>
					</div>
				</div>
				<div class="member_coupon_block_box">
					<img src="images/member/coupon7.png" alt="coupon">
					<span>數量</span>
					<div class="member_coupon_block_box_quantity">
						<?php echo $coupon3 ?>
					</div>
				</div>
			</div>
		</div>
	



		<!-- 背景畫面 -->
		<div class="member_background_bottomPart cl-s-12 cl-md-12">
			<div class="member_background_bottom_grass">
				<div class="member_background_bottom_road"></div>
				<img src="images/about/car(01).png" alt="car" class="member_background_bottom_car">
				<img src="images/about/Grass(02).png" alt="tree" class="member_background_bottom_tree">
				<img src="images/about/cloud(02).png" alt="cloud" class="member_background_bottom_cloud">
				<img src="images/about/orchard.png" alt="orchard" class="member_background_bottom_orchard">

			</div>
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
	
	<!-- 查詢訂單明細 JS -->
	<script>
	var button =  document.querySelectorAll('.orderDetail_btn input');
	button.forEach(function (item) {
		item.addEventListener('click',showbox,false);
	})
	function showbox(e){

		var orderNo =e.target.parentNode.id.substr(19);
		var xhr = new XMLHttpRequest();
		xhr.onload = function (){
	    	if( xhr.status == 200){
	         	detialTable.innerHTML=xhr.responseText;
	         	detialTable.onclick = closebox;
	         	var lightbox = document.querySelector('.member_orderSearch_block_lightbox');
				lightbox.style.display='block';
				console.log(xhr.responseText);
	      	}else{ 
	            alert(xhr.status);
	        }
		}
	    xhr.open("post", "php/orderDetials.php", true);
	    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	    var data_info = "orderNo=" + orderNo;
	    xhr.send(data_info);
	    console.log( data_info);
	}	
	function closebox(){
		var lightbox = document.querySelector('.member_orderSearch_block_lightbox');
		lightbox.style.display='none';
	}

	lightbox.addEventListener('click',closebox,false);
	</script>

<!-- 上傳會員大頭照 JS -->
	<script type="text/javascript">
		window.addEventListener("load", function () {
			document.getElementById("upload_img").onchange = function (e) {
				var file = e.target.files[0];//HTML5 的屬性files[0]->陣列方式
				var reader = new FileReader();//新增一個讀取檔案的FileReader() method
				reader.onload = function () {
					document.getElementById("imgPreview").src = reader.result;
				}
				reader.readAsDataURL(file);
			};

		}, false);

	</script>

<!-- 修改會員密碼 AJAX -->
<script>
	function checkPsw(){ 
		alert('aaa');
		  //產生XMLHttpRequest物件
		  xhr = new XMLHttpRequest();
		  
		  //註冊callback function 
		  xhr.onreadystatechange = function (){
			// console.log( xhr.readyState);
			if( xhr.readyState == 4){//或是可以寫XMLHttpRequest.DONE
			  if( xhr.status == 200 ){ //server端有正確的執行成功  
				swal(xhr.responseText, "","success")
				document.getElementById('hiddenPsw').value=document.getElementById('memNewPsw').value;
				document.getElementById('memPsw').value="";
				document.getElementById('memNewPsw').value="";
				document.getElementById('memCheckNewPsw').value="";
			  }else{
				  alert(xhr.status);
			  }
			}
		  }
		  //設定好所要連結的程式
		  var url = "php/modifyNewPsw.php";
		  xhr.open("POST", url, true);
		  xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
		  var data_info ="memNewPsw="+document.getElementById('memNewPsw').value;

		  //送出資料
		  xhr.send(data_info)
	
	}//function_checkOldPsw 

	//ajax檢查舊密碼是否輸入正確 
	function checkFormat(){
		alert('aaa');

	var hiddenPsw = document.getElementById('hiddenPsw').value;
	var memNewPsw =document.getElementById('memNewPsw').value;
	var memPsw = document.getElementById('memPsw').value;
	var memCheckNewPsw = document.getElementById('memCheckNewPsw').value;
	if(hiddenPsw != memPsw ){
		swal("舊密碼輸入錯誤", "","error");
		document.getElementById('memPsw').value="";
		document.getElementById('memNewPsw').value="";
		document.getElementById('memCheckNewPsw').value="";
	}else if(memNewPsw!=memCheckNewPsw){
		swal("新密碼輸入不一致", "","error");
		document.getElementById('memNewPsw').value="";
		document.getElementById('memCheckNewPsw').value="";
	}else{
		checkPsw();
	}

	};

	window.addEventListener("load",function(){
		var submitBtn = document.querySelector('.modifyPsw_btn');
		submitBtn.addEventListener('click',checkFormat,false);
	})
	

	 
</script>	







</body>

</html>
 <?php 
	} ?>
