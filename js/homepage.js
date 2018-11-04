function doFirst() {
//第一屏地球放大，字出現的動畫
	document.querySelector('.homepage_header_ballBox').style.transform="scale(1)";
	setTimeout(function(){
		document.querySelector('.homepage_header_titleBlock').style.opacity=1;
		document.querySelector('.homepage_header_carBox').style.opacity=1;
	},3500);

	setTimeout(typeAnimation, 2000);

//初始化卷軸

	var controller = new ScrollMagic.Controller();
//果汁DIY
	var sceneDiy =new ScrollMagic.Scene({
		triggerElement:'#homepageDiy',
		duration: 200,    
		offset:400,
	})
	.on('enter',function(){
		document.getElementById('lightRotation').className += " homepage_diy_Box-active";
		setTimeout(function(){
			var fruits = document.querySelectorAll(".homepage_diy_fruitPic");
			var diyText = document.querySelector(".homepage_diy_fruitContent");
			for(var i =0 ; i<fruits.length ; i++){
				fruits[i].className += " homepage_diy_fruitPic-active";
			}
			diyText.className += " homepage_diy_fruitContent-active";

		},1200);
	})
	// .addIndicators({
    //     name: 'diy',
    //     colorStart: '#f20',
    //     colorEnd: '#000'
    // })
	.addTo(controller);
//果然特調	
	var windowWidth = window.screen.width;
	var ship = document.getElementById('homepageTestShip');
	if(windowWidth<768){
		var cloud2 = TweenMax.to('.homepage_test_animatePic2',2,{x:30});
		var cloud3 = TweenMax.to('.homepage_test_animatePic3',2,{x:-60});
		var fruit5 = TweenMax.to('.homepage_test_animatePic5',2.5,{y:50});
		var fruit8 = TweenMax.to('.homepage_test_animatePic8',3.5,{y:90});
		var cloud4 = TweenMax.to('.homepage_test_animatePic4',2,{x:-60});

		var sceneTest1 =new ScrollMagic.Scene({
			triggerElement:'#homepageTest',
			offset:150,
		})
		.setTween([cloud2,cloud3])
		// .addIndicators({
		//     name: 'test',
		//     colorStart: '#f20',
		//     colorEnd: '#000'
		// })
		.addTo(controller);

		var sceneTest =new ScrollMagic.Scene({
			triggerElement:'#homepageTest',
			offset:250,
		})
		.setTween([fruit5,fruit8,cloud4])
		// .addIndicators({
		//     name: 'test',
		//     colorStart: '#f20',
		//     colorEnd: '#000'
		// })
		.addTo(controller);
	}else{
		if(windowWidth>=768 && windowWidth<1024){
			var ship = TweenMax.to('#homepageTestShip',6,{
				x:-windowWidth-50,
			});
		}else if(windowWidth>=1024 && windowWidth<1440){
			var ship = TweenMax.to('#homepageTestShip',6,{
				x:-windowWidth*3/4,
			});
		}else if(windowWidth>=1440){
			var ship = TweenMax.to('#homepageTestShip',6,{
				x:-windowWidth/2,
			});
		}
		var sceneTest =new ScrollMagic.Scene({
			triggerElement:'#homepageTest',
			duration: 200,    
			reverse:false,
			offset:150,
		})
		// .on('enter',function(){
		// 	ship.style.left="10%";
			
		// })
		.setTween(ship)
		.addIndicators({
		    name: 'test',
		    colorStart: '#f20',
		    colorEnd: '#000'
		})
		.addTo(controller);
	}
	

//果粉私藏
	header_blog();
	var sceneBlog =new ScrollMagic.Scene({
		triggerElement:'#homepageBlog',
		
		duration: 200,
		reverse:false,
		offset:window.screen.width/300,    
		
	})
	.on('enter',function(){
		var blogPerson = document.querySelector('.homepage_blog_platBlock');
		blogPerson.style.opacity="1";
		var t1 = TweenMax.to('.homepage_blog_platBlock',3,{
			scale:"1.5",
		})
		setTimeout(function(){
			var t1 = TweenMax.to('.homepage_blog_platBlock',3,{
				scale:"1",
			})
			var blogButon = document.querySelector('.homepage_blog_btnBlock');
			var blogPepper = document.querySelector('.homepage_blog_papperBlock');
			var blogPerson = document.querySelector('.homepage_blog_platBlock');
			
			blogButon.style.opacity="1";
			blogPepper.style.opacity="1";
			blogPepper.style.bottom=0;
			blogPerson.style.left=0;
			blogPerson.style.bottom=0;
			
			

			var t1 = TweenMax.set('.homepage_blog_platBlock',{
				scale:"1",
			})
			
		},3000);
		setTimeout(function(){
				document.querySelector('.homepage_blog_person2').className+=" homepage_blog_person-active";
			},6500);
	})
	// .addIndicators({
    //     name: 'blog',
    //     colorStart: '#f20',
    //     colorEnd: '#000'
    // })
	.addTo(controller);
//關於果然
	var sceneAbout =new ScrollMagic.Scene({
		triggerElement:'#homepageAbout',
		duration: '100%',    
		reverse:false,
		offset:window.screen.width/300,  
	})
	.on('enter',function(){
		$("#illustration_france").find("div");
		TweenMax.killTweensOf($("#illustration_france"));
		setTimeout(function () {
			$("#illustration_france").find("div.aaa,div.mountain,div.tree,div.grass").each(function (a) {
				TweenMax.fromTo($(this), .5, {
					rotationX: -90,
					visibility: "hidden",
					opacity: 0,
	
				}, {
					delay: .2 * a,
					rotationX: 0,
					opacity: 1,
					ease: "Back.easeOut",
					visibility: "visible"
				})
			})
		}, 100);
		setTimeout(function () {
			$("#illustration_france").find("div.cloud").each(function (a) {
				TweenMax.fromTo($(this), .5, {
					scale: 2,
					opacity: 0,
					rotationX: 0,
					visibility: "visible"
				}, {
					delay: .15 * a,
					scale: 1,
					opacity: 1,
					ease: "Back.easeOut"
				})
			})
		}, 300);
	})
	// .addIndicators({
    //     name: 'about',
    //     colorStart: '#f20',
    //     colorEnd: '#000'
    // })
	.addTo(controller);


	setTimeout(function () {
		var homepageHeaderItems = document.querySelectorAll('.homepage_header_box');
		for (var i = 0; i < homepageHeaderItems.length; i++) {
			homepageHeaderItems[i].style.opacity = '1';
		};
	}, 1);
	

	

};

//第一瓶字的動畫
function typeAnimation() {
	$('.homepage_header_textWrapper').css('opacity', '1');

	$('.homepage_header_textBox .homepage_header_texts').each(function () {
		$(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='homepage_header_text'>$&</span>"));
	});

	anime.timeline({
			loop: false
		})
		.add({
			targets: '.homepage_header_textBox .homepage_header_text',
			translateY: ["1.8em", 0],
			translateZ: 14,
			duration: 1500,
			delay: function (el, i) {
				return 110 * i;
			}
		});
};
// 雪花
function header_blog() {
	var snowflakeURl = [
		'images/homepage/red.png',
		'images/homepage/blue.png',
		'images/homepage/blue1.png',
		'images/homepage/pink.png',
		'images/homepage/yellow.png',
		'images/homepage/green.png'
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
			visualWidth = window.screen.width;
			if (visualWidth < 1024) {
				return $('<div class="snowbox" />').css({
					'width': visualWidth / 30,
					'height': visualWidth / 30,
					'position': 'absolute',
					'backgroundSize': 'cover',
					'zIndex': 20,
					'top': '-41px',
					'backgroundImage': 'url(' + url + ')'
				}).addClass('snowRoll');
			} else {
				return $('<div class="snowbox" />').css({
					'width': visualWidth / 70,
					'height': visualWidth / 50,
					'position': 'absolute',
					'backgroundSize': 'cover',
					'zIndex': 20,
					'top': '-41px',
					'backgroundImage': 'url(' + url + ')'
				}).addClass('snowRoll');
			}

		}
		// 开始飘花
		setInterval(function () {
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
				opacity: randomStart
			});
			// 加入到容器
			$flakeContainer.append($flake);
			// 开始执行动画
			$flake.transition({
				top: endPositionTop,
				left: endPositionLeft,
				opacity: 0.7
			}, duration, 'ease-out', function () {
				$(this).remove() //结束后删除
			});
		}, 500);
	}
	snowflake();
	//执行函数
}


//關於果然
function animate_illustration(a, b) {

}



window.addEventListener('load', doFirst);