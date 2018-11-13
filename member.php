<?php 
//   ob_start();
//   session_start();
 if(isset($_SESSION["memId"])){


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,shrink-to-fit=no">
	<title>會員中心</title>
	<link rel="stylesheet" href="css/member.css">
	<link rel="stylesheet" href="css/loginFruit.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/global.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/member.js"></script>



</head>

<body>
<?php 
	require_once("php/nav.php");
?>
	<div class="brick"></div>
	<section class="member_memberInfo clearfix">
		<!-- 會員中心選擇頁面 -->
		<div class="member_container">
			<div class="member_memberInfo_wrapper cl-s-12 cl-md-6">
				<div class="member_memberInfo_box">
					<div class="member_memberInfo_profile_photo">
						<div class="member_memberInfo_photo_box">
							<img id="imgPreview" src="images/member/profile.png" alt="profilePhoto">
						</div>
						<label class="uploadBtn common_btn common_btn_second">
							<input id="upload_img" style="display:none;" type="file" accept="image/*">
							<i class="fa fa-photo"></i>
							<span class="common_btn_txt">上傳圖片</span>
							<div class="common_btn_blobs">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</label>

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
					<form>
						<div class="member_personalInfo_basicInfo_block_item">
							<span>姓名</span><input type="text" name="memName" id="memName" value="<?php echo $_SESSION["memName"] ?>"></div>
						<div class="member_personalInfo_basicInfo_block_item">
							<span>手機</span><input type="text" name="memtTel" id="memTel" value="<?php echo $_SESSION["memTel"] ?>"></div>
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
					<div class="member_personalInfo_password_block_item">
						<span>輸入舊密碼</span><input type="text" name="memName" id="memName">
					</div>
					<div class="member_personalInfo_password_block_item">
						<span>輸入新密碼</span><input type="text" name="memName" id="memName">
					</div>
					<div class="member_personalInfo_password_block_item">
						<span>確認新密碼</span><input type="text" name="memName" id="memName">
					</div>
					<!-- <input type="submit" name="submit" value="確認修改密碼 " id="submit">  -->
					<label class="modifyPsw_btn common_btn common_btn_second">
						<input type="submit" name="submit" id="submit" style="display: none">
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
				<div class="member_orderSearch_block_box">
					<div class="member_orderSearch_block_box_item">
						<span>訂單編號</span>
						<div id="member_orderSearch_block_box_item_orderNo">1</div>
					</div>
					<div class="member_orderSearch_block_box_item">
						<span>收件人</span>
						<div id="member_orderSearch_block_box_item_memName">黃先生</div>
					</div>
					<div class="member_orderSearch_block_box_item">
						<span>總金額</span>
						<div id="member_orderSearch_block_box_item_orderPrice">2000元</div>
					</div>
					<div class="member_orderSearch_block_box_item">
						<span>下單日期</span>
						<div id="member_orderSearch_block_box_item_orderDate">2018-10-20</div>
					</div>

					<label class="orderDetail_btn common_btn common_btn_second">
						<input type="submit" name="submit" id="submit" style="display: none">
						<span class="common_btn_txt">訂單詳情</span>
						<div class="common_btn_blobs">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</label>
				</div>
				<div class="member_orderSearch_block_box">
					<div class="member_orderSearch_block_box_item">
						<span>訂單編號</span>
						<div id="member_orderSearch_block_box_item_orderNo">1</div>
					</div>
					<div class="member_orderSearch_block_box_item">
						<span>收件人</span>
						<div id="member_orderSearch_block_box_item_memName">黃先生</div>
					</div>
					<div class="member_orderSearch_block_box_item">
						<span>總金額</span>
						<div id="member_orderSearch_block_box_item_orderPrice">2000元</div>
					</div>
					<div class="member_orderSearch_block_box_item">
						<span>下單日期</span>
						<div id="member_orderSearch_block_box_item_orderDate">2018-10-20</div>
					</div>
					<label class="orderDetail_btn common_btn common_btn_second">
						<input type="submit" name="submit" id="submit" style="display: none">
						<span class="common_btn_txt">訂單詳情</span>
						<div class="common_btn_blobs">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</label>
				</div>
			</div>
		</div>
		<!-- 訂單明細燈箱 -->
		<div class="member_orderSearch_block_lightbox">
			<div class="member_orderSearch_block_lightbox_box">
				<table>
					<tr class="member_orderSearch_block_lightbox_title">
						<th></th>
						<th>產品名稱</th>
						<th>單價</th>
						<th>數量</th>
						<th>小計</th>
					</tr>
					<tr class="member_orderSearch_block_lightbox_content">
						<td class="member_orderSearch_block_lightbox_picture"><img src="images/about/bottleYellow.png" alt="productPic">
						</td>
						<td class="member_orderSearch_block_lightbox_content_pdName">
							客製化果汁
						</td>
						<td class="member_orderSearch_block_lightbox_unitPrice">90</td>
						<td class="member_orderSearch_block_lightbox_quantity">20</td>
						<td class="member_orderSearch_block_lightbox_total">1800</td>
					</tr>
					<tr class="member_orderSearch_block_lightbox_content">
						<td class="member_orderSearch_block_lightbox_picture"><img src="images/about/bottleYellow.png" alt="productPic">
						</td>
						<td class="member_orderSearch_block_lightbox_content_pdName">
							客製化果汁
						</td>
						<td class="member_orderSearch_block_lightbox_unitPrice">90</td>
						<td class="member_orderSearch_block_lightbox_quantity">20</td>
						<td class="member_orderSearch_block_lightbox_total">1800</td>
					</tr>

				</table>

			</div>



		</div>





		<!-- 我的優惠卷 -->
		<div class="member_coupon_wrpaper cl-s-12  cl-md-6">

			<div class="member_coupon_block">
				<div class="member_coupon_title">我的優惠卷</div>
				<div class="member_coupon_block_box">
					<img src="images/member/coupon.png" alt="coupon">
					<span>數量</span>
					<div class="member_coupon_block_box_quantity">20</div>
				</div>
				<div class="member_coupon_block_box">
					<img src="images/member/coupon.png" alt="coupon">
					<span>數量</span>
					<div class="member_coupon_block_box_quantity">20</div>
				</div>
				<div class="member_coupon_block_box">
					<img src="images/member/coupon.png" alt="coupon">
					<span>數量</span>
					<div class="member_coupon_block_box_quantity">20</div>
				</div>
				<div class="member_coupon_block_box">
					<img src="images/member/coupon.png" alt="coupon">
					<span>數量</span>
					<div class="member_coupon_block_box_quantity">20</div>
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

	<script src="js/orderDetailLightbox.js"></script>



</body>

</html>

 <?php }else{

 	echo"尚未登入";

 }  ?>