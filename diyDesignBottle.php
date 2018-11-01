<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>果然配</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/diyDesignBottle.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
	 crossorigin="anonymous">
	<script src="js/Drag.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/html2canvas.js"></script>
	<script src="js/jquery.ui.touch-punch.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.0.0.js "></script>W
</head>
<header>
	<input type="checkbox" name="" id="hb_control">
	<?php
	require_once("php/nav.php");
	?>
	<div class="navSpace"></div>
	<div class="coupon"><img src="images/coupon.png" alt="優惠小遊戲"></div>
	<div class="robot"><img src="images/robot.png" alt="果然配客服機器人"></div>
	<script>
		$(document).ready(function () {
			$("#diy_copyPicButton").click(function () {
				popCenterWindow();
			});
		}); 
	</script>
</header>

<body>
		<!-- SCR2--設計瓶身文字敘述 -->
		<section class="section diy_designBottleBlock">
			<div class="wrapper">
				<div class="diy_designBottle_stepBlock ">
					<div class="diy_designBottle_stepFirstBox">
						<img src="images/diy/stepBg.png" alt="挑選水果">
						<div class="diy_designBottle_stepFirstTitle">
							<p>STEP1</p>
							<h3>挑選水果</h3>
						</div>
					</div>
					<div class="diy_designBottle_stepSecondBox">
						<img src="images/diy/stepBg1.png" alt="設計瓶身">
						<div class="diy_designBottle_stepSecondTitle">
							<p>STEP2</p>
							<h3>設計瓶身</h3>
						</div>
					</div>
				</div>
				<div class="diy_designBottle_title cl-s-12 cl-md-12 cl-xl-12">
					<h4>來創作自己的瓶身</h4>
				</div>
			</div>
			<!-- 設計瓶身、上傳圖檔及新增文字即時顯示調整效果 -->
			<div class="wrapper clearfix">
				<div class="diy_designBottle_box cl-s-5 cl-md-6 cl-xl-6">
					<div class="diy_designBottle_picBlock cl-s-12 cl-md-12 cl-xl-12">
						<p>圖片:</p>
						<input type="hidden" name="diy_designBottle_Logo" id="diy_designBottle_Logo">
						<div class="diy_designBottle_pics cl-s-12 cl-md-12 cl-xl-12">
							<div class="diy_designBottle_officalPicBlock cl-s-12 cl-md-12 cl-xl-12">
								<button class="diy_designBottle_officalPic cl-s-6 cl-md-4 cl-xl-4" id="diy_designBottle_logobtn" style="background-color: transparent;">
									<input type="hidden" value="1">
									<img src="images/diy/logo.png" alt="logo" onclick="change(this)">
								</button>
								<button class="diy_designBottle_officalPic cl-s-6 cl-md-4 cl-xl-4" id="diy_designBottle_logobtn" style="background-color: transparent;">
									<input type="hidden" value="2">
									<img src="images/diy/logo1.png" alt="logo5" onclick="change(this)">
								</button>
								<button class="diy_designBottle_officalPic cl-s-6 cl-md-4 cl-xl-4" id="diy_designBottle_logobtn" style="background-color: transparent;">
									<input type="hidden" value="3">
									<img src="images/diy/logo3.png" alt="logo4" onclick="change(this)">
								</button>
								<button class="diy_designBottle_officalPic cl-s-6 cl-md-4 cl-xl-4" id="diy_designBottle_logobtn" style="background-color: transparent;">
									<input type="hidden" value="4">
									<img src="images/diy/logo2.png" alt="logo3" onclick="change(this)">
								</button>
								<button class="diy_designBottle_officalPic diy_designBottle_disNone cl-s-6 cl-md-4 cl-xl-4" id="diy_designBottle_logobtn "
								 style="background-color: transparent;">
									<input type="hidden" value="5">
									<img src="images/diy/logo4.png" alt="logo5" onclick="change(this)">
								</button>
								<button class="diy_designBottle_officalPic diy_designBottle_disNone cl-s-6 cl-md-4 cl-xl-4" id="diy_designBottle_logobtn "
								 style="background-color: transparent;">
									<input type="hidden" value="6">
									<img src="images/diy/logo5.png" alt="logo6" onclick="change(this)">
								</button>
							</div>
							<div class="diy_designBottle_uploadBtn cl-s-12 cl-md-12 cl-xl-12 ">
								<label class="diy_designBottle_uploadItem">
									<input type="file" accept="image/*" id="uploadButton">
									<p>上傳圖片+</p>
								</label>
							</div>
						</div>
						<div class="diy_designBottle_textBlock cl-s-6 cl-md-12 cl-xl-12">
							<form id="diy_designBottle_textForm" class="diy_designBottle_createTextBlock" name="textForm" method="post">
								<p>文字：</p>
								<input type="text" name="e" class="diy_designBottle_textLength ">
								<input type="button" value="新增文字" onclick="createText(this.form.e.value);">
							</form>
						</div>
					</div>
				</div>
				<div class="diy_designBottle_container cl-s-5 cl-md-6 cl-xl-6">
					<div id="diy_containmentBlock" class="diy_designBottle_pic cl-s-11 cl-md-9 cl-xl-9">
						<div id="diy_designBottle_wrapper" class="diy_designBottle_bottleItem">
							<img src="images/bottle.png" alt="空瓶">
						</div>
						<img id="diy_designBottle_diyImg" class="diy_designBottle_changePic draggable  ui-draggable ui-widget-header"
						 style="top:300px;right:35%;">
						<div id="diy_designBottle_dragText" class="diy_designBottle_createBlock" style="top:-250px;right:-120px;margin:0;"></div>
					</div>
					<div class="diy_designBottle_controlBlock cl-s-1 cl-md-3 cl-xl-3">
						<i id="zoomInButton" class="fas fa-search-plus "></i>
						<i id="zoomOutButton" class="fas fa-search-minus "></i>
						<i id="rotateLeftButton" class="fas fa-undo-alt "></i>
						<i id="rotateRightButton" class="fas fa-redo-alt "></i>
						<i id="deleteButton" class="fas fa-trash "></i>
					</div>
				</div>

				<div class="diy_designBottle_btnBlock cl-s-12 cl-md-12 cl-xl-12 clearfix">
					<a href="diy.html"><button class="diy_designBottle_btnPrevious">上一步</button></a>
					<button class="diy_designBottle_btnNext" id="diy_copyPicButton">製作完成</button>
				</div>
			</div>
			<footer>
				<div class="footer_wrapper">
					<div class="footer_block clearfix">
						<div class="footer_rightContent">
							<p class="copyright">Copyright © All Rights Reserved.</p>
						</div>
					</div>
				</div>
			</footer>
			<!-- 客製完成跳出蓋滿視窗 -->
			<div class="wrapper">
				<div class=" diy_customizePopUp" id="center">
					<div class="diy_customizeFinishBox ">
						<div class="diy_customizeBox_content cl-s-12">
							<div class="diy_customizeBox_item ">
								<i class="far fa-times-circle "></i>
							</div>
							<h3>客製完成</h3>
							<div class="diy_customizeBox_finishPic">
							</div>
							<div class="diy_proToCartBtns">
								<a href="#"><button class="diy_addCartBtn">加入購物車</button></a>
								<a href="cart.html"><button class="diy_payItBtn ">我要結帳</button></a>
							</div>
						</div>
						<div class="diy_customizeFinishBox_btns">
							<a href="diyDesignBottle.html"><button class="diy_moreBtn">再做一瓶</button></a>
							<a href="blog.html"><button class="diy_viewOtherBtn">看看別人怎麼做</button></a>
						</div>
					</div>
				</div>
			</div>
		</section>

	<script>
		$("#diy_copyPicButton").click(function () {
			html2canvas($("#diy_containmentBlock")[0]).then(function (canvas) {
				var $div = $(".diy_customizeBox_finishPic");
				$div.empty();
				$("<img />", { src: canvas.toDataURL("image/png") }).appendTo($div);
			});
		});						
	</script>
	<script>
		// 上傳圖檔後把預設的logo刪除 
		$(document).ready(function () {
			$('#uploadButton').on("change", function () {
				for (var i = 0; i < $('.diy_designBottle_officalPic').length; i++) {
					$('#diy_designBottle_Logo').val('');
					$('.diy_designBottle_officalPic').eq(i).css('backgroundColor', 'transparent');
				}
			});
		});			
	</script>
	<script type="text/javascript">
		//獲取視窗的高度 
		var windowHeight;
		//獲取視窗的寬度 
		var windowWidth;
		//獲取彈窗的寬度 
		var popWidth;
		//獲取彈窗高度 
		var popHeight;
		function init() {
			windowHeight = $(window).height();
			windowWidth = $(window).width();
			popHeight = $(".diy_customizeFinishBox").height();
			popWidth = $(".diy_customizeFinishBox").width();
		}
		//關閉視窗的方法 
		function closeWindow() {
			$(".diy_customizeBox_item i").click(function () {
				$(this).parent().parent().parent().hide("slow");
			});
			$(".diy_customizePopUp").click(function () {
				$(this).hide("slow");
			});
		}


		//定義彈出居中視窗的方法 
		function popCenterWindow() {
			init();
			//計算彈出視窗的左上角Y的偏移量 
			var popY = (windowHeight - popHeight) / 2;
			var popX = (windowWidth - popWidth) / 2;
			//設定視窗的位置 
			$("#center").css("top", popY).css("left", popX).slideToggle("slow");
			closeWindow();
		}
		$(function dragging() {
			$('#diy_designBottle_diyImg').draggable(
				{
					containment: "#diy_designBottle_wrapper",
					scroll: false,
				} //#diy_designBottle_wrapper
			);
			$('#diy_designBottle_dragText').draggable(
				{ containment: "#diy_designBottle_wrapper" }//#diy_designBottle_wrapper
			);
		});
	</script>
</body>

</html>