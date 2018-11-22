function doFirst() {
//首頁功能區
	var fruits = document.querySelectorAll('.diy_pickFruit_leftItem');
	var diyButton = document.querySelector('.diy_start');
	diyButton.addEventListener('click',diySubmit);
	windowWidth = window.screen.width;
	for(var i=0;i<fruits.length;i++){
		if(windowWidth>=1024){	
			fruits[i].addEventListener('dragstart',startDrag);
			// fruits[i].addEventListener('dragend',endDrag);
		}else if(windowWidth<1024){
			fruits[i].addEventListener('click',addJuice);
			// infoArea = document.querySelector('.diy_pickFruit_rightItem');
		}
	}
//水果輪播
if(windowWidth<768){
	// $('.homepage_diy_fruitBox').addClass('item');
	$('.homepage_diy_Box').addClass('owl-carousel owl-theme');
	$('.homepage_diy_fruitContent').css('display','none');
	// $('.homepage_diy_labaPhone').addClass('item');
	
	owl = $('.owl-carousel');
	owl.owlCarousel({
    items:1,
    nav:true,
	// center: true,
	// dots: true,
    loop:true,
    // margin:2,
    autoWidth:true,
    // merge:true,
    navText: ["<img src='images/left01.png'>","<img src='images/right01.png'>"],
	})
	// $(".homepage_diy_arrowRight").click(function(){
    //     console.log(owl.width());
    //     $('.owl-stage').css('transform','transition3d(-80px,0,0)');
    //      console.log( $('.owl-stage'));
    // })
    // $(".homepage_diy_arrowLeft").click(function(){
    // 	owl.trigger('owl.prev');
    // })
}
//水果拖拉
if(windowWidth>=1024){
	rightBox = document.querySelector('.homepage_diy_pickFruit_wrapperBottleBox');
	rightBox.addEventListener('dragenter',function (e){e.preventDefault();});
	rightBox.addEventListener('dragover',function (e){e.preventDefault();});
	rightBox.addEventListener('drop',dropped);
}
//首頁功能區
//水果拖拉
	i=0;
	no=[];
	color=[];
	svg=[];
	function startDrag(e){
		var fruit=this.id;
		var content = this.nextElementSibling.value;
		no[i]= content.split(',')[0];
		color[i] = content.split(',')[1];
		var info = content.split(',')[2];
		this.style.scale='1.2';
		svg[i] = this.nextElementSibling.nextElementSibling;	
	}
	function dropped(e){
		e.preventDefault();
		filljuice(color[i],no[i],svg[i]);
		i++;
	}
//點選果汁
	function addJuice(e){
			var fruit =this.id;
			var content = this.nextElementSibling.value;
			var no= content.split(',')[0];
			var color = content.split(',')[1];
			var info = content.split(',')[2];
			this.style.scale='1.2';
			svg = this.nextElementSibling.nextElementSibling;
			filljuice(color,no,svg);
	}
//hoer
	$(".diy_pickFruit_leftItem").hover(function(e){
		this.style.scale='1.2';
		var content = this.nextElementSibling.value;
		var info = content.split(',')[2];
		var fruit = this.alt;
		$("body .homepage_diy_fruitContent.homepage_diy_fruitContent-active").html('<h3>'+fruit+'</h3><h4>'+info+'</h4>');
	},function(){
		// this.scale='1';
		$("body .homepage_diy_fruitContent").html('<h4>任選<span>3</span>種水果</h4><h4>客製您的專屬果汁</h4>');
	})
//裝果汁
	function filljuice(color,fruit,svg){
        if ($(".diy_pickFruit_bottle1").css('background-color') == "rgba(0, 0, 0, 0)") {
            $('#bottle1').attr('value', fruit);
            $('.diy_pickFruit_bottle1').css('background-color', '#' + color);
            $('.diy_pickFruit_bottle1').css('height', '100%');
            $('.diy_pickFruit_cursor1').css({
                'display':'none'});
            $('.diy_pickFruit_cursor2').css({
                'display':'none'});
            svg.className+=" drawn";
             $('.homepage_diy .common_btn').css('display','inline-block');
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
            svg.className+=" drawn";
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
            svg.className+=" drawn";
            // var info = document.createElement('p');
            // infoArea.append(info);
            // info.innerText=fruitInfo[fruit];
            // info.className='diy_pickFruit_rightItemContent';
        } else {
            swal({
                type: 'error',
                title: '果汁已經滿了哦!',
                confirmButtonText: '<a>開始製作</a>',
				confirmButtonColor: '#ffd700',
				confirmButtonClass:'diy_start2',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: '取消',
                animation: false,
                customClass: 'animated tada',
                // text: 'Something went wrong!',
                footer: '<p>開始製作您的專屬果汁</p>'
			})
			var diyButton2 = document.querySelector('.diy_start2');
			diyButton2.addEventListener('click',diySubmit);
        }
    }
//點選開始製作
	function diySubmit(){
		document.getElementById('diyForm').submit();
	}
//顯示拉霸機
	$('.homepage_diy_labaPic,.homepage_diy_labaPhone').click(function(){
		$('.homepage_labaBlockPre').attr('class','homepage_labaBlock');
	});
///從拉霸機傳值到下一頁
	$('#labaNext').click(function(){
		$('#diyForm2').submit();
	});
///放棄
	$('#labaCancle').click(function(){
		$('#labaFruit1').attr('value','');
		$('#labaFruit2').attr('value','');
		$('#labaFruit3').attr('value','');
		$('.homepage_labaBlock').attr('class','homepage_labaBlockPre');
		// $('.resultFruit span').remove();
		$('.homepage_startBtn1').css('display','block');
		$('.homepage_startBtn2').css({'opacity':'0',
										'position':'absolute',
										'z-index':'-1'
									});
	});
//拉霸機程式
	var fruit1 = document.getElementById('fruit1').value;
	var fruit2 = document.getElementById('fruit2').value;
	var fruit3 = document.getElementById('fruit3').value;
	var fruit4 = document.getElementById('fruit4').value;
	var fruit5 = document.getElementById('fruit5').value;
	var fruit6 = document.getElementById('fruit6').value;
	var fruit7 = document.getElementById('fruit7').value;
	var fruit8 = document.getElementById('fruit8').value;
	var fruit9 = document.getElementById('fruit9').value;

	var fruitObject= {
			'0': fruit1,
			'1': fruit2,
			'2': fruit3,
			'3': fruit4,
			'4': fruit5,
			'5': fruit6,
			'6': fruit7,
			'7': fruit8,
			'8': fruit9,
	};
	console.log(fruit1);
	console.log(fruit2);
	console.log(fruit3);
	console.log(fruit4);
	console.log(fruit5);
	console.log(fruit6);
	console.log(fruit7);
	console.log(fruit8);
	console.log(fruit9);

	// $('.resultFruit').innerHTML= '';
	var machine4 = $("#machine4").slotMachine({
		active	: 0,
		delay	: 500
	});
		
	var machine5 = $("#machine5").slotMachine({
		active	: 1,
		delay	: 500
	});
		
	window.machine6 = $("#machine6").slotMachine({
		active	: 2,
		delay	: 500
	});
		
	$("#slotMachineButtonShuffle").click(function(){
		$('#slotMachineButtonShuffle span').text('');
		machine4.shuffle();
		machine5.shuffle();
		machine6.shuffle();
	});
		
	$("#slotMachineButtonStop").click(function(){
		var result =  machine4.stop();
		var result1 = machine5.stop();
		var result2 = machine6.stop();
		$('.homepage_startBtn1').css('display','none');
		$('.homepage_startBtn2').css({'opacity':'1',
										'position':'relative',
										'z-index':'20'
									});

		// alert(result);
		// alert(result1);
		// alert(result2);
		$('#labaFruit1').attr('value',result+1);
		$('#labaFruit2').attr('value',result1+1);
		$('#labaFruit3').attr('value',result2+1);

		var chooseFruits = Array(result, result1,result2);
		// var length = chooseFruits.length;
		// for (var i = 0;i<2; i++) {
		// 	var pickFruit =fruitObject[(chooseFruits[i])];
		// 	$('.resultFruit').append('<span>' + pickFruit + ',</span>');
		// }
		// 	var pickFruit =fruitObject[(chooseFruits[2])];
		// 	$('.resultFruit').append('<span>' + pickFruit + '</span>');

	});
		
//果然特調問答
	var a1=document.getElementById('1_1');
	var a2=document.getElementById('1_2');
	var a3=document.getElementById('1_3');
	var a4=document.getElementById('1_4');
	a1.addEventListener('click',showQuestion2);
	a2.addEventListener('click',showQuestion2);
	a3.addEventListener('click',showQuestion2);
	a4.addEventListener('click',showQuestion2);

	function showQuestion2(e){
		answer1 = this.id.split('_')[1];
		document.getElementById('question').innerText='你最近有什麼煩惱？';
		document.querySelector('.homepage_test_answerBlock').innerHTML='<div class="homepage_test_answerBox"><h4 id="2_1">1.皮膚好暗沉</h4><h4 id="2_2">2.早上沒活力</h4></div><div class="homepage_test_answerBox"><h4 id="2_3">3.甩肉甩不掉</h4><h4 id="2_4">4.心情好鬱悶</h4></div></div>';
		var a21=document.getElementById('2_1');
		var a22=document.getElementById('2_2');
		var a23=document.getElementById('2_3');
		var a24=document.getElementById('2_4');
		a21.addEventListener('click',haveTwoAnswer);
		a22.addEventListener('click',haveTwoAnswer);
		a23.addEventListener('click',haveTwoAnswer);
		a24.addEventListener('click',haveTwoAnswer);
	}
	function haveTwoAnswer(e){
		answer2 = this.id.split('_')[1];
		findProduct(answer1,answer2);
	}
	function findProduct(answer1,answer2){
	  	xhr = new XMLHttpRequest();
	  	xhr.onload = function(){
            if(xhr.status == 200){
                showProduct(xhr.responseText);
            }else{
                alert(xhr.status);
            }
        }
	  	var url = "findTextAnswer.php?answer1="+answer1+"&answer2="+answer2;
	  	xhr.open("get", url, true);
	  	//送出資料
	  	xhr.send( null)
	}
	function showProduct(jsonStr){
		console.log(jsonStr);
		var pd = JSON.parse( jsonStr );
		console.log(pd);

		if(pd.offPdNo){//檢查是否有這筆資料
	      var htmlStr = `<a class="clearfix" href="productitem.php?offPdNo=${pd.offPdNo}"><div class='pdPic'>
	      					<img src="images/pd/${pd.offPdImg}" alt="">
	      				</div>
	      				<div class='pd'>
	                        <h3>${pd.offPdName}</h3>
	                        <h3>$90</h3>
	                        <p>${pd.offPdInfo}</p>
	                     </div></a>`;
	      document.querySelector(".homepage_test_questionContainer").innerHTML = htmlStr;              

	  	}else{
	      document.querySelector(".homepage_test_questionContainer").innerHTML = '查無此商品';              

  } 
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

	var ship = document.getElementById('homepageTestShip');
	if(windowWidth<768){
		var cloud2 = TweenMax.to('.homepage_test_animatePic2',2,{x:30});
		var cloud3 = TweenMax.to('.homepage_test_animatePic3',2,{x:-30});
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
	if(windowWidth>768){
		header_blog();
	};
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
			},4500);
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
window.addEventListener('load', doFirst);






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



