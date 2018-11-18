<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>果然配</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/diyDesignBottle.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
	 crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/loginFruit.css">
	 <link rel="stylesheet" href="css/colpick.css">
	 <link rel="stylesheet" href="css/colpickStyle.css">
	<script src="js/plugin/jquery-1.7.2.min.js"></script>
	<!-- <script src="js/plugin/jquery-3.3.1.min.js"></script> -->
	<script src="js/plugin/jquery-ui.min.js"></script>
	<script src="js/plugin/html2canvas.js"></script>
	<script src="js/plugin/jquery.ui.touch-punch.js"></script>
	<script src="js/plugin/knockout-3.0.0.js"></script>
	<script src="js/plugin/colpick.js"></script>
</head>
<body>
	<?php
	require_once("php/nav.php");
	require_once("connectBooks.php");
	?>
<div class="navSpace"></div>
<?php
try{
  $sql = "select * from bottleimg where bottleStatus = 1";
  $bottlePics = $pdo->query($sql);
?>
	<!-- SCR2--設計瓶身文字敘述 -->
	<div class="diy_designBottleBlock">
		<div class="wrapper ">
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
			<div class="diy_designBottle_title cl-s-12 cl-md-12 cl-xl-12 clearfix">
				<h4>來創作自己的瓶身</h4>
			</div>
			<div class="diy_designBottle_bgCloud">
				<img src="images/About_Png/cloud(01).png">
				<img src="images/About_Png/cloud(02).png">
				<img src="images/About_Png/cloud(03).png">
				<img src="images/About_Png/cloud(04).png">
			</div>
		</div>
		
		<!-- 設計瓶身、上傳圖檔及新增文字即時顯示調整效果 -->
		<div class="wrapper clearfix">
			<div class="diy_designBottle_bgcBox">
				<div class="diy_designBottle_box cl-s-5 cl-md-6 cl-xl-6">
					<div class="diy_designBottle_picBlock cl-s-12 cl-md-12 cl-xl-12">
						<p>圖片:</p>
						<input type="hidden" name="diy_designBottle_Logo" id="diy_designBottle_Logo">
						<div class="diy_designBottle_pics cl-s-12 cl-md-12 cl-xl-12">
							<div class="diy_designBottle_officalPicBlock cl-s-12 cl-md-12 cl-xl-12">
								<?php while($bottlePicRow = $bottlePics->fetchObject()){ ?>
								<button class="diy_designBottle_officalPic cl-s-6 cl-md-4 cl-xl-4" id="diy_designBottle_logobtn" style="background-color: transparent;">
									<input type="hidden" value="<?php echo $bottlePicRow->bottleNo ?>">
									<img src="images/diy/<?php echo $bottlePicRow->bottleImg ?>" alt="logo" onclick="change(this)">
								</button>
								<?php } ?>
							</div>
							<div class="diy_designBottle_uploadBtn cl-s-12 cl-md-12 cl-xl-12 ">
								<label class="diy_designBottle_uploadItem">
									<input type="file" accept="image/*" id="uploadButton">
									<p>上傳圖片+</p>
								</label>
							</div>
						</div>
						<div class="diy_designBottle_textBlock cl-s-6 cl-md-12 cl-xl-12">
							<form id="diy_designBottle_textForm" class="diy_designBottle_createTextBlock" name="textForm" method="_post">
								<p>文字：</p>
								<input type="text" name="e" class="diy_designBottle_textLength ">
								<input type="button" value="新增文字" onclick="createText(this.form.e.value);">
							</form>
						</div>
					</div>
				</div>
<?php
}catch(PDOException $e){
  echo $e->getMessage() , "<br>";
}
?>
					<svg id="diy_designBottle_botSvg"  xmlns="http://www.w3.org/2000/svg"  style="position:absolute;">
					<g>
					<defs>
					<clipPath id="svgPath">
					<path class="cls-1" d="M7.06,65.83V400.5A15.52,15.52,0,0,0,22.56,416h105A15.52,15.52,0,0,0,143,400.5V65.83a26.45,26.45,0,0,0-3.74-13.55L129.57,36a28.42,28.42,0,0,1-4-14.56V15h-101v6.47a28.43,28.43,0,0,1-4,14.56L10.8,52.28A26.45,26.45,0,0,0,7.06,65.83Z" transform="translate(-3.08 -4)"/>
					<rect class="cls-1" x="9.92" y="4" width="125" height="5" rx="1.95" ry="1.95"/>
					<path class="cls-2" d="M142.31,50.89l-9.67-16.17a24.28,24.28,0,0,1-3.44-12.45V15.83h5.5A5.91,5.91,0,0,0,134.7,4H15a5.91,5.91,0,1,0,0,11.83h5.5v6.44A24.28,24.28,0,0,1,17,34.72L7.37,50.89A30.28,30.28,0,0,0,3.08,66.43V399.57A19.46,19.46,0,0,0,22.51,419H127.16a19.46,19.46,0,0,0,19.43-19.43V66.43A30.28,30.28,0,0,0,142.31,50.89ZM15,11.84A1.93,1.93,0,0,1,15,8H134.7a1.93,1.93,0,0,1,0,3.86H15ZM142.61,399.57A15.47,15.47,0,0,1,127.16,415H22.51A15.47,15.47,0,0,1,7.06,399.57V66.43a26.29,26.29,0,0,1,3.72-13.49l9.67-16.17a28.26,28.26,0,0,0,4-14.5V15.83H125.21v6.44a28.26,28.26,0,0,0,4,14.5l9.67,16.17a26.29,26.29,0,0,1,3.72,13.49Z" transform="translate(-3.08 -4)"/>
			</clipPath>
		</defs>
	</g>
</svg>		
				<div class="diy_designBottle_container cl-s-6 cl-md-6 cl-xl-6">
					<div id="diy_containmentBlock" class="diy_designBottle_pic cl-s-11 cl-md-9 cl-xl-9">
						<div  id="diy_designBottle_wrapper" class="diy_pickFruit_wrapperBottleBox" style="clip-path: url(#svgPath);">
							<div class="diy_pickFruit_bottleBox">
								<div class="diy_pickFruit_bottle diy_pickFruit_bottle3" style="height:<?php echo $_POST['bottleh3']?>%; background-color:<?php echo $_POST['bottlec3']?>;"></div>
								<div class="diy_pickFruit_bottle diy_pickFruit_bottle2" style="height:<?php echo $_POST['bottleh2']?>%; background-color:<?php echo $_POST['bottlec2']?>;"></div>
								<div class="diy_pickFruit_bottle diy_pickFruit_bottle1" style="height:<?php echo $_POST['bottleh1']?>%; background-color:<?php echo $_POST['bottlec1']?>;"></div>
							</div>

							<img src="images/bottle.png" id="dragRange" alt="空瓶" >
							<img id="diy_designBottle_diyImg" class="diy_designBottle_changePic draggable  ui-draggable ui-widget-header ui-widget-content">
							
							<div id="diy_designBottle_dragText" class="diy_designBottle_createBlock draggable  ui-draggable ui-widget-header ui-widget-content" ></div>
						</div>	
					</div>
					<div class="diy_designBottle_controlBlock cl-s-1 cl-md-3 cl-xl-3 clearfix">
						<i id="zoomInButton" class="fas fa-search-plus cl-xl-12"></i>
						<i id="zoomOutButton" class="fas fa-search-minus cl-xl-12"></i>
						<i id="rotateLeftButton" class="fas fa-undo-alt cl-xl-12"></i>
						<i id="rotateRightButton" class="fas fa-redo-alt cl-xl-12"></i>
						<i id="picker" class="fas fa-palette cl-xl-12"></i>
						<i id="deleteButton" class="fas fa-trash cl-xl-12"></i>
					</div>
				</div>
				<div class="diy_designBottle_btnBlock cl-s-12 cl-md-12 cl-xl-12 clearfix">
					<a class="common_btn common_btn_first" href="diy.php">
						<span class="common_btn_txt">上一步</span>
						<div class="common_btn_blobs">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</a>
					<a class="common_btn common_btn_first" id="diy_copyPicButton">
						<span class="common_btn_txt">製作完成</span>
						<div class="common_btn_blobs">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<script>
	$("#diy_copyPicButton").click(function() {
		popCenterWindow();
  $('.diy_customizeBox-lightActive2').css("opacity","1");

	});
$("#diy_copyPicButton").click(function() {
  html2canvas($("#diy_containmentBlock")[0]).then(function(canvas) {
    var $div = $(".diy_customizeBox_finishPic");
    $div.empty();
    $("<img />", { src: canvas.toDataURL("image/png") }).appendTo($div);
    $('#imgRUL').attr("value",canvas.toDataURL("image/png"));
  });

});	
	</script>
		<!-- 客製完成跳出蓋滿視窗 -->
		<div class="wrapper">
			<div id="center" class=" diy_customizePopUp" >
				<div class="diy_customizeFinishBox ">
					<div class="diy_customizeBox_content cl-s-12">
							<div class="diy_customizeBox_finishTextPic"><img src="images/diy/finishText.png" alt="製作完成"></div>
							<div class="diy_customizeBox-lightActive" ><img src="images/diy/light.png"></div>
							<div class="diy_customizeBox-lightActive2" ><img src="images/diy/light2.png"></div>
							<div class="diy_customizeBox_finishPic">
							</div>
						<div class="diy_proToCartBtns">
						<form method="post" action="diy_photo_upload.php" id="imgRULForm">
							<input style="display:none;" name="imgRUL" id="imgRUL">
						</form>	
							<a id="addToCartBtn" class="common_btn common_btn_first diy_addCartBtn" >
								<span class="common_btn_txt">加入購物車</span>
								<div class="common_btn_blobs">
									<div></div>
									<div></div>
									<div></div>
								</div>
							</a>
							<a class="common_btn common_btn_first diy_addCartBtn" href="diy.php">
								<span class="
							 common_btn_txt">重新製作</span>
								<div class="common_btn_blobs">
									<div></div>
									<div></div>
									<div></div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="diy_designBottle_bottleMovingBlock">
		<div class="diy_designBottle_conveyorMoveContainer">
			<img class="diy_designBottle_conveyorPic" src="images/diy/conveyor.png" alt="傳輸帶">
			<ul class="diy_designBottle_bottlesBlock">
				<li class="item1"><img src="images/diy/bottleOrange.png" alt="果汁瓶"></li>
				<li class="item2"><img src="images/diy/juiceBottle.png" alt="果汁瓶"></li>
				<li class="item3"><img src="images/diy/bottlePink.png" alt="果汁瓶"></li>
				<li class="item4"><img src="images/diy/fullBottle.png" alt="果汁瓶"></li>
				<li class="item5"><img src="images/diy/yellowBottle.png" alt="果汁瓶"></li>
				<li class="item6"><img src="images/diy/mixBottle.png" alt="果汁瓶"></li>
				<li class="item7"><img src="images/diy/greenBottle.png" alt="果汁瓶"></li>
			</ul>
			<div class="diy_designBottle_factoryPic"><img src="images/about/Factory.png" alt="工廠"></div>
			<div class="diy_designBottle_carPic"><img src="images/About_Png/car(01).png" alt="車子"></div>
			<div class="diy_designBottle_soliRoad"></div>
		</div>
	</div>
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
	<script src="js/global.js"></script>
	<script src="js/diyDesignBottle.js"></script>
</body>
</html>