<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>果然配</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,shrink-to-fit=no">
	<!-- <link rel="stylesheet" type="text/css" href="css/fullpage.css" /> -->
	<link rel="stylesheet" type="text/css" href="css/loginFruit.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/slick-theme.css">
	<link rel="stylesheet" href="css/hover.css">
	<link rel="stylesheet" href="css/sweetalert2.min.css">
	<link rel="stylesheet" href="css/diy.css">	

	<script src="js/plugin/sweetalert2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="js/plugin/slick.min.js"></script>
	<script type="text/javascript" src="js/global.js"></script>
	<script type="text/javascript" src="js/diy.js"></script>

</head>

<body onselectstart="return false">
 <?php
    require_once('php/nav.php');
 try{
    require_once("connectBooks.php");
 ?>
	<!-- DIY挑選水果 -->
	<div class="navSpace"></div>
	<section class="section active diy_pickFruit">
		<!-- <div class="space"></div> -->
		<div class="wrapper diy_pickFruit_wrapper">
			<div class="cloud1">
				<img src="images/cloud(01).png" alt="雲">
			</div>
			<div class="cloud2">
				<img src="images/cloud(04).png" alt="雲">
			</div>
			<div class="diy_pickFruit_stepBlock clearfix">
				<div class="diy_pickFruit_stepFirstBox">
					<img src="images/diy/stepBg1.png" alt="挑選水果">
					<div class="diy_pickFruit_stepFirstTitle">
						<p>STEP1</p>
						<h3>挑選水果</h3>
					</div>
				</div>

				<div class="diy_pickFruit_stepSecondBox">
					<img src="images/diy/stepBg.png" alt="設計瓶身">
					<div class="diy_pickFruit_stepSecondTitle">
						<p>STEP2</p>
						<h3>設計瓶身</h3>
					</div>
				</div>
			</div>
			<div class="diy_pickFruit_titleAllWrapper">
				<div class="diy_pickFruit_title">
					<h4>為你的DIY果汁，挑三種水果吧</h4>
				</div>
				<div class="diy_pickFruit_allWrapper clearfix">
					<div class="diy_pickFruit_leftBlock cl-md-4 cl-xl-4 clearfix">
						<div class="diy_pickFruit_leftBox clearfix">

							<div class="diy_pickFruit_leftPic clearfix">
<?php    
    $sql1 = "select * from fruititem where fruitStatus = 1";
    $fruit = $pdo ->query($sql1);
    $i=1;
    while($rowFruit=$fruit->fetch(PDO::FETCH_ASSOC)){
    	echo '
    							<div class="diy_pickFruit_picBox">
									<span class="fruitnamef',$i,'">我是',$rowFruit["fruitName"],'</span>
									<div class="fruitnameBox fruitnameBoxf',$i,'"></div>
									<div class="diy_pickFruit_leftItem diy_pickFruit_leftItem',$i,' diy_pickFruit_leftItemf',$i,' hvr-radial-out cl-md-4" id="',$rowFruit["fruitNo"]-1,'">
										<img id="f',$i,'" class="fruiticon" src="images/',$rowFruit["fruitImg"],'" alt="',$rowFruit["fruitName"],'">
									</div>
									<input style="display:none;" class="content',$rowFruit["fruitNo"]-1,'" value="',$rowFruit["fruitCol"],',',$rowFruit["cal"],',',$rowFruit["iron"],',',$rowFruit["fiber"],',',$rowFruit["vinC"],',',$rowFruit["fruitInfo"],'">
								</div>
								
			
			';
			$i++;
	if($i>9){
		break;
	}
};
if(isset($_GET["fruit1"])==true){
    	
	// echo $_GET["fruit1"],$_GET["fruit2"],$_GET["fruit3"];
	$k=1;
	$sql2 = "select * from fruititem where fruitNo = :fruitNo1 or fruitNo = :fruitNo2 or fruitNo = :fruitNo3";
    $homepageFruit = $pdo ->prepare($sql2);
    $homepageFruit -> bindValue(":fruitNo1",$_GET["fruit1"]);
    $homepageFruit -> bindValue(":fruitNo2",$_GET["fruit2"]);
    $homepageFruit -> bindValue(":fruitNo3",$_GET["fruit3"]);
    $homepageFruit ->execute();
    while($rowHomepageFruit=$homepageFruit->fetch(PDO::FETCH_ASSOC)){
    	echo'
    							<input id="homeFruit',$k,'" style="display:none;" value="',$rowHomepageFruit["fruitNo"],',',$rowHomepageFruit["fruitCol"],'">
    	';
    	$k++;
    };
};
?>
							</div>



							<!-- <script>

								$(document).ready(function () {
									if ($(window).width() <= 768) {
										carousel();
									}

									if ($(window).width() <= 768) {
										carousel();
									}
								});

								function carousel(){
									$('.diy_pickFruit_leftPic').slick({
									infinite: true,
									slidesToShow: 3,
									slidesToScroll: 3
								});
								};
							</script> -->

						</div>
						<!-- <div class="diy_pickFruit_leftArrow">
							<img src="images/left01.png" alt="左箭頭">
						</div>
						<div class="diy_pickFruit_rightArrow">
							<img src="images/right01.png" alt="右箭頭">
						</div> -->
						<div class="diy_pickFruit_resetButton">
							<a href="javascript:;" id="resetButton">重新挑選</a>
						</div>
					</div>

					<div class="diy_pickFruit_rightBlock clearfix cl-md-8">
						<div class="diy_pickFruit_leftBox cl-s-5 cl-md-5">
							<div class="diy_pickFruit_wrapperBottleBox">
								<div class="diy_pickFruit_bottleBox">
									<div class="diy_pickFruit_bottle diy_pickFruit_bottle3"></div>
									<div class="diy_pickFruit_bottle diy_pickFruit_bottle2"></div>
									<div class="diy_pickFruit_bottle diy_pickFruit_bottle1"></div>
									<div class="diy_pickFruit_cursor diy_pickFruit_cursor1" id="cursor1">1</div>
									<div class="diy_pickFruit_cursor diy_pickFruit_cursor2" id="cursor2">2</div>
								</div>
								<img src="images/bottle.png" alt="空瓶" >
							</div>
						</div>
						<div id="chart" class="diy_pickFruit_rightBox cl-s-7 cl-md-7">
							<canvas id="myChart" height="300"></canvas>
							<div class="diy_pickFruit_rightItem">
								<p class="diy_pickFruit_rightItemTitle">
									水果功效
								</p>
							</div>
						</div>

					</div>
				</div>

				
				<form method="post" action="diyDesignBottle.php" id="diySubmit" >
					<input type="hidden" name="bottleh1" id="bottleh1" value="">
					<input type="hidden" name="bottleh2" id="bottleh2" value="">
					<input type="hidden" name="bottleh3" id="bottleh3" value="">
					<input type="hidden" name="bottlec1" id="bottlec1" value="">
					<input type="hidden" name="bottlec2" id="bottlec2" value="">
					<input type="hidden" name="bottlec3" id="bottlec3" value="">
				</form>
				<div class="diy_pickFruit_nextButton">
					<a id="nextButton" class="common_btn common_btn_first">
						<span class="common_btn_txt">下一步</span>
						<div class="common_btn_blobs">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</a>
				</div>

			</div>

		</div>
		<!-- <div class="tree1">
			<img src="images/about/Tree.png" alt="tree">
		</div> -->
		<div class="tree1">
			<img src="images/about/Tree.png" alt="tree">
		</div>
		<div class="tree2">
			<img src="images/about/tree01.png" alt="tree">
		</div>
		<div class="tree3">
			<img src="images/about/Tree.png" alt="tree">
		</div>
		<div class="house">
			<img src="images/Barn.png" alt="house">
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

<?php
}catch(PDOException $e){
  echo $e->getMessage();
}
?> 
</body>

</html>