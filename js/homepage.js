function doFirst() {
//首頁功能區
	var fruits = document.querySelectorAll('.diy_pickFruit_leftItem');
	var diyButton = document.querySelector('.diy_start');
	diyButton.addEventListener('click',diySubmit);
	for(var i=0;i<fruits.length;i++){
		fruits[i].addEventListener('click',addJuice);
		// infoArea = document.querySelector('.diy_pickFruit_rightItem');
	}
//hoer
	$(".diy_pickFruit_leftItem").hover(function(e){
		this.style.scale='1.2';
		var content = this.nextElementSibling.value;
		var info = content.split(',')[2];
		var fruit = this.alt;
		$("body .homepage_diy_fruitContent.homepage_diy_fruitContent-active").html('<h3>'+fruit+'</h3><h4>'+info+'</h4>');
		console.log('<h3>'+fruit+':</h3><h4>'+info+'</h4>');
	},function(){
		this.scale='1';
		$("body .homepage_diy_fruitContent").html('<h4>任選<span>3</span>種水果</h4><h4>客製您的專屬果汁</h4>');
	})
//點選果汁
	function addJuice(e){
			var fruit =this.id;
			var content = this.nextElementSibling.value;
			var no= content.split(',')[0];
			var color = content.split(',')[1];
			var info = content.split(',')[2];
			filljuice(color,no);
	}
//裝果汁
	function filljuice(color,fruit){
        if ($(".diy_pickFruit_bottle1").css('background-color') == "rgba(0, 0, 0, 0)") {
            $('#bottle1').attr('value', fruit);
            $('.diy_pickFruit_bottle1').css('background-color', '#' + color);
            $('.diy_pickFruit_bottle1').css('height', '100%');
            $('.diy_pickFruit_cursor1').css({
                'display':'none'});
            $('.diy_pickFruit_cursor2').css({
                'display':'none'});
            // var info = document.createElement('p');
            // infoArea.append(info);
            // info.innerText=fruitInfo[fruit];
            // info.className='diy_pickFruit_rightItemContent';
        } else if ($(".diy_pickFruit_bottle2").css('background-color') == "rgba(0, 0, 0, 0)") {
            $('.diy_pickFruit_bottle2').css('background-color',  '#' + color);
            $('#bottle2').attr('value', fruit);            
            $('.diy_pickFruit_bottle1').css('height', '50%');
            $('.diy_pickFruit_bottle2').css('height', '50%');
            $('.diy_pickFruit_cursor1').css({
                'display':'block',
                'top':'calc(50% - 10px)'});
            $('.diy_pickFruit_cursor2').css({
                'display':'none'});
            // var info = document.createElement('p');
            // infoArea.append(info);
            // info.innerText=fruitInfo[fruit];
            // info.className='diy_pickFruit_rightItemContent';
        } else if ($(".diy_pickFruit_bottle3").css('background-color') == "rgba(0, 0, 0, 0)") {
            $('.diy_pickFruit_bottle3').css('background-color',  '#' + color);
            $('#bottle3').attr('value', fruit);
            $('.diy_pickFruit_bottle3').css('height', '33.3333%');
            $('.diy_pickFruit_bottle1').css('height', '33.3333%');
            $('.diy_pickFruit_bottle2').css('height', '33.3333%');
            $('.diy_pickFruit_cursor1').css({
                'top':'calc(66.6666% - 10px)'});
            $('.diy_pickFruit_cursor2').css({
                'display':'block',
                'top':'calc(33.3333% - 10px)'});
            // var info = document.createElement('p');
            // infoArea.append(info);
            // info.innerText=fruitInfo[fruit];
            // info.className='diy_pickFruit_rightItemContent';
        } else {
            swal({
                type: 'error',
                title: '果汁已經滿了哦!',
                confirmButtonText: '<a class="diy_start" href="diy.php">開始製作</a>',
                confirmButtonColor: '#ffd700',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: '取消',
                animation: false,
                customClass: 'animated tada',
                // text: 'Something went wrong!',
                footer: '<p>開始製作您的專屬果汁</p>'
            })
        }
    }
//點選開始製作
	function diySubmit(){
		document.getElementById('diyForm').submit();
	}

//首頁動畫區

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
		// duration: 200,    
		offset:200,
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
			var cloud1 = TweenMax.to('.homepage_test_animatePic1',3,{x:60});
			var cloud2 = TweenMax.to('.homepage_test_animatePic2',6,{x:-50});
			var cloud3 = TweenMax.to('.homepage_test_animatePic3',5,{
				x:160});
			var cloud4 = TweenMax.to('.homepage_test_animatePic4',8,{
				x:10
			});
			var fruit5 = TweenMax.to('.homepage_test_animatePic5',4.5,{y:-270});
			var fruit6 = TweenMax.to('.homepage_test_animatePic6',5.5,{
				rotation:"20deg",
				bezier:{
					values:[{
						x:-100,
						y:-90
					},{
						x:-140,
						y:-120
					},{
						x:-250,
						y:-280
					}],
					autoRotate:false
				},
				
				
			});
			var fruit8 = TweenMax.to('.homepage_test_animatePic8',5,{
				rotation:"30deg",
				bezier:{
					values:[{
						x:220,
						y:100
					},{
						x:300,
						y:290
					}],
					autoRotate:false
				},
			});
		}else if(windowWidth>=1024 && windowWidth<1440){
			var ship = TweenMax.to('#homepageTestShip',6,{
				x:-windowWidth*3/4,
			});
			var cloud1 = TweenMax.to('.homepage_test_animatePic1',3,{x:60});
			var cloud2 = TweenMax.to('.homepage_test_animatePic2',4,{x:-150});
			var cloud3 = TweenMax.to('.homepage_test_animatePic3',5,{
				x:160});
			var cloud4 = TweenMax.to('.homepage_test_animatePic4',8,{
				x:200
			});
			var fruit5 = TweenMax.to('.homepage_test_animatePic5',4.5,{y:-370});
			var fruit6 = TweenMax.to('.homepage_test_animatePic6',5.5,{
				rotation:"20deg",
				bezier:{
					values:[{
						x:-100,
						y:-90
					},{
						x:-140,
						y:-120
					},{
						x:-250,
						y:-380
					}],
					autoRotate:false
				},
				
				
			});
			var fruit8 = TweenMax.to('.homepage_test_animatePic8',15,{
				rotation:"30deg",
				bezier:{
					values:[{
						x:220,
						y:100
					},{
						x:650,
						y:1050
					}],
					autoRotate:false
				},
			});
		}else if(windowWidth>=1440){
			var cloud1 = TweenMax.to('.homepage_test_animatePic1',3,{x:260});
			var cloud2 = TweenMax.to('.homepage_test_animatePic2',6,{x:-450});
			var cloud3 = TweenMax.to('.homepage_test_animatePic3',5,{
				x:160});
			var cloud4 = TweenMax.to('.homepage_test_animatePic4',8,{
				x:200
			});
			if(windowWidth>1440){
				var fruit5 = TweenMax.to('.homepage_test_animatePic5',8.5,{
					x:70,
					y:-670
				});
				var ship = TweenMax.to('#homepageTestShip',6,{
					x:-windowWidth/3-windowWidth*.1,
				});
				var fruit6 = TweenMax.to('.homepage_test_animatePic6',5.5,{
					rotation:"20deg",
					bezier:{
						values:[{
							x:-100,
							y:-90
						},{
							x:-240,
							y:-220
						},{
							x:-450,
							y:-480
						}],
						autoRotate:false
					},
					
					
				});
			}else{
				var fruit5 = TweenMax.to('.homepage_test_animatePic5',4.5,{y:-370});
				var ship = TweenMax.to('#homepageTestShip',6,{
					x:-windowWidth/3-windowWidth*0.13,				
				});
				var fruit6 = TweenMax.to('.homepage_test_animatePic6',5.5,{
					rotation:"20deg",
					bezier:{
						values:[{
							x:-100,
							y:-90
						},{
							x:-140,
							y:-120
						},{
							x:-250,
							y:-200
						}],
						autoRotate:false
					},
					
					
				});
			}
			
			var fruit8 = TweenMax.to('.homepage_test_animatePic8',15,{
				rotation:"30deg",
				bezier:{
					values:[{
						x:220,
						y:100
					},{
						x:650,
						y:1550
					}],
					autoRotate:false
				},
			});
		}
		var sceneShip =new ScrollMagic.Scene({
			triggerElement:'#homepageTest',
			duration: 200,    
			reverse:false,
			offset:150,
		})
		.setTween(ship)
		// .addIndicators({
		//     name: 'ship',
		//     colorStart: '#f20',
		//     colorEnd: '#000'
		// })
		.addTo(controller);

		var sceneTest =new ScrollMagic.Scene({
			triggerElement:'#homepageTest',
			// duration:"30%",    
			offset:-230,
		})
		.setTween([cloud3,fruit6])
		// .addIndicators({
		//     name: 'test1',
		//     colorStart: '#f20',
		//     colorEnd: '#000'
		// })
		.addTo(controller);

		var sceneTest2 =new ScrollMagic.Scene({
			triggerElement:'#homepageTest',
			// duration:"30%",    
			offset:350,
		})
		.setTween([cloud1,cloud2,cloud4,fruit5,fruit8])
		// .addIndicators({
		//     name: 'test2',
		//     colorStart: '#f20',
		//     colorEnd: '#000'
		// })
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

		if(windowWidth>768){
			var t1 = TweenMax.to('.homepage_blog_platBlock',3,{
				scale:"1.5",
				x:100,
				y:-100,
			})
		}else{
			var t1 = TweenMax.to('.homepage_blog_platBlock',3,{
				scale:"1.5",
			})
		}
		
		setTimeout(function(){
			var t1 = TweenMax.to('.homepage_blog_platBlock',2,{
				scale:"1",
				y:0,
				x:0,

			})
			var blogButon = document.querySelector('.homepage_blog_btnBlock');
			var blogPepper = document.querySelector('.homepage_blog_papperBlock1');
			var blogPerson = document.querySelector('.homepage_blog_platBlock');
			
			blogButon.style.opacity="1";
			// blogPepper.style.opacity="1";
			// blogPepper.style.bottom=0;
			blogPepper.id+="homepage_blog_papperBlock-active";
			blogPerson.style.left=0;
			blogPerson.style.bottom=0;
			
		},3000);
		setTimeout(function(){
				document.querySelector('#blogPerson1').className+=" homepage_blog_person-active";
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
	
//果粉私藏點選的動畫
	blogPerson1 = document.getElementById('blogPerson1');
	blogPerson2 = document.getElementById('blogPerson2');
	blogPerson3 = document.getElementById('blogPerson3');
	blogPerson1.addEventListener('click',blogActive);
	blogPerson2.addEventListener('click',blogActive);
	blogPerson3.addEventListener('click',blogActive);

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
		}, 300);
	}
	snowflake();
	//执行函数
}


//私藏輪播
function blogActive(e) {
	blogPepper = document.querySelectorAll('.homepage_blog_papperBlock');
	var blogButton = document.querySelectorAll('.homepage_blog_btnBlock');
	if(this.id=="blogPerson1"){
	blogPepper[0].style.display="block";
	blogPepper[1].style.display="none";
	blogPepper[2].style.display="none";
	setTimeout(function(){
		blogPepper[0].id+="homepage_blog_papperBlock-active";
		blogPepper[1].id="";
		blogPepper[2].id="";
		blogButton[0].style.opacity="1";
		blogButton[1].style.opacity="0";
		blogButton[2].style.opacity="0";
	},10);

	blogPerson2.className="";
	blogPerson3.className="";
	this.className+=' homepage_blog_person-active';
 }else if(this.id=="blogPerson2"){
	blogPepper[1].style.display="block";
	blogPepper[0].style.display="none";
	blogPepper[2].style.display="none";
	setTimeout(function(){
		blogPepper[1].id+="homepage_blog_papperBlock-active";
		blogPepper[0].id="";
		blogPepper[2].id="";
		blogButton[1].style.opacity="1";
		blogButton[0].style.opacity="0";
		blogButton[2].style.opacity="0";
	},10);

	blogPerson1.className="";
	blogPerson3.className="";
	this.className+=' homepage_blog_person-active';
 }else if(this.id=="blogPerson3"){
	blogPepper[2].style.display="block";
	blogPepper[0].style.display="none";
	blogPepper[1].style.display="none";
	setTimeout(function(){
		blogPepper[2].id+="homepage_blog_papperBlock-active";
		blogPepper[0].id="";
		blogPepper[1].id="";
		blogButton[2].style.opacity="1";
		blogButton[1].style.opacity="0";
		blogButton[0].style.opacity="0";
	},10);

	blogPerson1.className="";
	blogPerson2.className="";
	this.className+=' homepage_blog_person-active';
 }
}



window.addEventListener('load', doFirst);