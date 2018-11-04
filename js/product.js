document.getElementById('dieting').onclick = function () {
    //注意windows 物件
    TweenMax.to(window, 1, {
        scrollTo: {
            y: "#pd_cate_dieting",//到達錨點
            offsetY: 100//位移
        }
    })
}
document.getElementById('health').onclick = function () {
    //注意windows 物件
    TweenMax.to(window, 1, {
        scrollTo: {
            y: "#pd_cate_health",//到達錨點
            offsetY: 100//位移
        }
    })
}
document.getElementById('Iron').onclick = function () {
    //注意windows 物件
    TweenMax.to(window, 1, {
        scrollTo: {
            y: "#pd_cate_Iron",//到達錨點
            offsetY: 100//位移
        }
    })
}
document.getElementById('whitening').onclick = function () {
    //注意windows 物件
    TweenMax.to(window, 1, {
        scrollTo: {
            y: "#pd_cate_whitening",//到達錨點
            offsetY: 100//位移
        }
    })
}

// scrollmagic 初始化

var controller = new  ScrollMagic.Controller();
var tw01 = TweenMax.to('.pdcate .cloud2,.pdcate .cloud,.pdcate .ballon ' , 1, {y:-200});

var scene_01 = new ScrollMagic.Scene({
   //觸發點
   triggerElement : '#trigger01',
   //偏移 y軸
   offset: 100,
   //偏移 0 - 1
   triggerHook: 0.3,
   //範圍
   duration: 300,
   // 動畫是否還原 預設是true
   reverse: true
}).setTween(tw01)
// .addIndicators({
//    name: 'section01',
//    colorStart: '#f20',
//    colorEnd: '#000'
// })
.addTo(controller);