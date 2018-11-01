function doFirst(){
//滿屏一頁效果


	new fullpage('#fullpage', {
		//options here
		anchors: ['homepage_header','homepage_diy','homepage_test','homepage_blog','homepage_about'],
		//autoScrolling:true,//手動滾動時，無法停留在頁面與頁面中間
		fitToSection:true,//手動滾動時，在頁面與頁面中間停留，會強制移到下一頁面
		navigation: true,//顯示導行列
		css3:true,
		easing:3,
		controlArrow:false,
		// scrollBar:true,
		afterLoad: function(anchorLink, index) {
			var loadedSection = $(this);
	
			//using index
			//把開場動畫放進來
			if (index.index == 2) {

			}else if (index.index == 3) {

			}
			else if (index.index == 4) {


			}

			
		}
	});
//第一屏動畫

	setTimeout(function(){
		var homepageHeaderItems = document.querySelectorAll('.homepage_header_box');
		for(var i = 0 ; i<homepageHeaderItems.length;i++){
			homepageHeaderItems[i].style.opacity='1';
		};
	}, 1);
	setTimeout(homepageHeader,1000);
	setTimeout(typeAnimation,0);


	setTimeout(fruitText,500);

//第一屏水果滾動動畫
	window.onresize = homepageHeader;

//私藏的彩帶動畫
	header_blog();

};



function homepageHeader(){
	var windowHeight = window.screen.height;
	var windowWidth = window.screen.width;

	document.querySelector('.homepage_header_waterPic').className+=' homepage_header_waterPic-active';
	TweenMax.from('.homepage_header_waterPic',.9,{
					scale :0.0000000000000001,
					y: windowHeight*0.6 +'px' ,
					ease:Power4.easeIn,
					opacity:0,
				});
	setTimeout(function (){
		var drop=new TimelineMax({});
			drop.to('.homepage_header_drop',.5,{
				opacity:1,
				scale:1.6,
			}).to('.homepage_header_drop',.5,{
				scale:1,
			});

	},800);
	
	setTimeout(headerParallax, 3000);

	
};

//第一屏的Parallax
function headerParallax(){
	var homepageHeaderItems = document.querySelectorAll('.homepage_header_fruitPic');
	for(var i = 0 ; i<homepageHeaderItems.length;i++){
		var parallax = new Parallax(homepageHeaderItems[i]);
	};

};

//第一瓶字的動畫
function typeAnimation(){
	// 可愛版
	$('.homepage_header_textWrapper').css('opacity','1');

	$('.homepage_header_textBox .homepage_header_texts').each(function(){
		$(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='homepage_header_text'>$&</span>"));
	});
	
	anime.timeline({loop:false})
		.add({
		targets: '.homepage_header_textBox .homepage_header_text',
		translateY: ["1.8em", 0],
		translateZ: 14,
		duration: 1200,
		delay: function(el, i) {
			return 110 * i;
		  }
		});
};
function fruitText(){
	var texts = document.querySelectorAll('.homepage_header_fruitContent');
	var fruits = document.querySelectorAll('.homepage_header_fruitPic');
	var time = 5;
	var index=0;
	setInterval(function(){
		if(index<5){
			var text=new TimelineMax({});
			text.to(texts[index],2.7,{
				opacity:1,
				scale:1.2,
			}).to(texts[index],.9,{
				opacity:0,
				scale:.2,
			});
			var fruit=new TimelineMax({});
			fruit.to(fruits[index],2.7,{
				scale:1.1,
			}).to(fruits[index],.9,{
				scale:1,
			});
			index++;

		}else{
			var text=new TimelineMax({});
			text.to(texts[index],2.7,{
				opacity:1,
				scale:1.2,
			}).to(texts[index],.9,{
				opacity:0,
				scale:.2,
			});
			var fruit=new TimelineMax({});
			fruit.to(fruits[index],2.7,{
				scale:1.1,
			}).to(fruits[index],.9,{
				scale:1,
			});
			index=0;
		}
	},2900);
}
function header_blog(){
	var snowflakeURl = [
		'../images/homepage/red.png',
		'../images/homepage/blue.png',
		'../images/homepage/blue1.png',
		'../images/homepage/pink.png',
		'../images/homepage/yellow.png',
		'../images/homepage/green.png'
		];
	var container = $("#homepage_blog_ribbon");
	visualWidth = container.width();
	visualHeight = container.height();
	function snowflake() {
		// 雪花容器
		var $flakeContainer = $('#snowflake');
		　　　　　　
		// 随机六张图
		function getImagesName() {
			return snowflakeURl[[Math.floor(Math.random() * 6)]];
		}
		// 创建一个雪花元素
		function createSnowBox() {
			var url = getImagesName();
			visualWidth = container.width();
		if(visualWidth<1024){
			return $('<div class="snowbox" />').css({
							'width': visualWidth/30,
							'height': visualWidth/30,
							'position': 'absolute',
							'backgroundSize': 'cover',
							'zIndex': 20,
							'top': '-41px',
							'backgroundImage': 'url(' + url + ')'
			}).addClass('snowRoll');
		}else{
			return $('<div class="snowbox" />').css({
				'width': visualWidth/70,
				'height': visualWidth/50,
				'position': 'absolute',
				'backgroundSize': 'cover',
				'zIndex': 20,
				'top': '-41px',
				'backgroundImage': 'url(' + url + ')'
			}).addClass('snowRoll');
		}
			
		}
		// 开始飘花
		setInterval(function() {
		// 运动的轨迹
			var startPositionLeft = Math.random() * visualWidth - 100,
			startOpacity = 1,
			endPositionTop = visualHeight - 40,
			endPositionLeft = startPositionLeft - 100 + Math.random() * 500,
			duration = visualHeight * 5 + Math.random() * 5000;

			// 随机透明度，不小于0.5
			var randomStart = Math.random();
			randomStart = randomStart < 0.5 ? startOpacity : randomStart;
			// 创建一个雪花
			var $flake = createSnowBox();
			// 设计起点位置
			$flake.css({
				left: startPositionLeft,
				opacity : randomStart
			});
			// 加入到容器
			$flakeContainer.append($flake);
			// 开始执行动画
			$flake.transition({
				top: endPositionTop,
				left: endPositionLeft,
				opacity: 0.7
			}, duration, 'ease-out', function() {
				$(this).remove() //结束后删除
			});
		}, 300);
	} 　　
	snowflake();
		　　　//执行函数
}
window.addEventListener('load',doFirst);