//柱狀圖
 function chart() {
     //傳值事件
    var diyButton = document.getElementById('nextButton');
    diyButton.addEventListener('click',diySubmit);

    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['熱量', '纖維', '維他命', '鐵質'],
            datasets: [{
                label: ['果汁成分 (cal)', '熱量(cal)'],
                data: [0, 0, 0, 0],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(255, 206, 255, 0.8)',
                ]
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });




    var fruits = document.querySelectorAll('.diy_pickFruit_leftItem');
    content=[];
    color=[];
    cal=[];
    iron=[];
    fiber=[];
    vinC=[];
    fruitInfo=[];
    for(var i=0;i<fruits.length;i++){
        fruits[i].addEventListener('click',addJuice);
        content[i] = document.querySelector(".content"+fruits[i].id).value;
        color[i]= content[i].split(',')[0];
        cal[i]= content[i].split(',')[1];
        iron[i]= content[i].split(',')[2];
        fiber[i]= content[i].split(',')[3];
        vinC[i]=content[i].split(',')[4];
        fruitInfo[i]= content[i].split(',')[5];
        infoArea = document.querySelector('.diy_pickFruit_rightItem');

    }
//判斷是否從首頁進來
    


    if(document.getElementById('homeFruit3')){
        homeFruitContent1 = document.getElementById('homeFruit1').value;
        var homeFruitNo1 = homeFruitContent1.split(',')[0];
        var homeFruitColor1 = homeFruitContent1.split(',')[1];
        filljuice(homeFruitColor1,homeFruitNo1-1);
        bgc1 = '.diy_pickFruit_leftItem' + $('#f'+homeFruitNo1).attr('id');
        $(bgc1).css('background-color', "rgb(199, 129, 50)");
        setTimeout(function (){
            alert(document.getElementById('homeFruit2').value);
            homeFruitContent2 = document.getElementById('homeFruit2').value;
            var homeFruitNo2 = homeFruitContent2.split(',')[0];
            var homeFruitColor2 = homeFruitContent2.split(',')[1];
            filljuice(homeFruitColor2,homeFruitNo2-1);
            bgc2 = '.diy_pickFruit_leftItem' + $('#f'+homeFruitNo2).attr('id');
            $(bgc2).css('background-color', "rgb(199, 129, 50)");
                
        },50);
        setTimeout(function (){
            alert(document.getElementById('homeFruit3').value);
            homeFruitContent3 = document.getElementById('homeFruit3').value;
            var homeFruitNo3 = homeFruitContent3.split(',')[0];
            var homeFruitColor3 = homeFruitContent3.split(',')[1];
            filljuice(homeFruitColor3,homeFruitNo3-1);
            bgc3 = '.diy_pickFruit_leftItem' + $('#f'+homeFruitNo3).attr('id');
            $(bgc3).css('background-color', "rgb(199, 129, 50)"); 
            },100);
    }else if(document.getElementById('homeFruit2')){
        homeFruitContent1 = document.getElementById('homeFruit1').value;
        var homeFruitNo1 = homeFruitContent1.split(',')[0];
        var homeFruitColor1 = homeFruitContent1.split(',')[1];
        filljuice(homeFruitColor1,homeFruitNo1-1);
         bgc1 = '.diy_pickFruit_leftItem' + $('#f'+homeFruitNo1).attr('id');
        $(bgc1).css('background-color', "rgb(199, 129, 50)");
        setTimeout(function (){
            homeFruitContent2 = document.getElementById('homeFruit2').value;
            var homeFruitNo2 = homeFruitContent2.split(',')[0];
            var homeFruitColor2 = homeFruitContent2.split(',')[1];
            filljuice(homeFruitColor2,homeFruitNo2-1);
            bgc2 = '.diy_pickFruit_leftItem' + $('#f'+homeFruitNo2).attr('id');
            $(bgc2).css('background-color', "rgb(199, 129, 50)");
        },50);
    }else if(document.getElementById('homeFruit1')){
       homeFruitContent1 = document.getElementById('homeFruit1').value;
        var homeFruitNo1 = homeFruitContent1.split(',')[0];
        var homeFruitColor1 = homeFruitContent1.split(',')[1];
        filljuice(homeFruitColor1,homeFruitNo1-1);
         bgc1 = '.diy_pickFruit_leftItem' + $('#f'+homeFruitNo1).attr('id');
        $(bgc1).css('background-color', "rgb(199, 129, 50)");
    }


//點選果汁
    function addJuice(e){
        var fruit =this.id;
        var content = document.querySelector(".content"+this.id).value;
        var color = content.split(',')[0];
        filljuice(color,this.id);
    }
//果汁填色
    function filljuice(color,fruit){
        if ($(".diy_pickFruit_bottle1").css('background-color') == "rgba(0, 0, 0, 0)") {
            $('.diy_pickFruit_bottle1').attr('id', fruit);
            $('.diy_pickFruit_bottle1').css('background-color', '#' + color);
            $('.diy_pickFruit_bottle1').css('height', '100%');
            $('.diy_pickFruit_cursor1').css({
                'display':'none'});
            $('.diy_pickFruit_cursor2').css({
                'display':'none'});
            var fruit1=$('.diy_pickFruit_bottle1').attr('id');
            var info = document.createElement('p');
            infoArea.append(info);
            info.innerText=fruitInfo[fruit];
            info.className='diy_pickFruit_rightItemContent';
            changeData(cal[fruit1]*1, iron[fruit1]*1, fiber[fruit1]*1, vinC[fruit1]*1);

            // alert('1');
        } else if ($(".diy_pickFruit_bottle2").css('background-color') == "rgba(0, 0, 0, 0)") {
            $('.diy_pickFruit_bottle2').css('background-color',  '#' + color);
             $('.diy_pickFruit_bottle2').attr('id', fruit);
            $('.diy_pickFruit_bottle1').css('height', '50%');
            $('.diy_pickFruit_bottle2').css('height', '50%');
            $('.diy_pickFruit_cursor1').css({
                'display':'block',
                'top':'calc(50% - 10px)'});
            $('.diy_pickFruit_cursor2').css({
                'display':'none'});
            var fruit1=$('.diy_pickFruit_bottle1').attr('id');
            var fruit2=$('.diy_pickFruit_bottle2').attr('id');
            // console.log(fruit2);
            var info = document.createElement('p');
            infoArea.append(info);
            info.innerText=fruitInfo[fruit];
            info.className='diy_pickFruit_rightItemContent';
            changeData(cal[fruit1]*0.5+cal[fruit2]*0.5, iron[fruit1]*0.5+iron[fruit2]*0.5, fiber[fruit1]*0.5+fiber[fruit2]*0.5, vinC[fruit1]*0.5+vinC[fruit2]*0.5);
            
            // alert('2');
        
        } else if ($(".diy_pickFruit_bottle3").css('background-color') == "rgba(0, 0, 0, 0)") {
            $('.diy_pickFruit_bottle3').css('background-color',  '#' + color);
             $('.diy_pickFruit_bottle3').attr('id', fruit);
            $('.diy_pickFruit_bottle3').css('height', '33.3333%');
            $('.diy_pickFruit_bottle1').css('height', '33.3333%');
            $('.diy_pickFruit_bottle2').css('height', '33.3333%');
            $('.diy_pickFruit_cursor1').css({
                'top':'calc(66.6666% - 10px)'});
            $('.diy_pickFruit_cursor2').css({
                'display':'block',
                'top':'calc(33.3333% - 10px)'});
            var fruit1=$('.diy_pickFruit_bottle1').attr('id');
            var fruit2=$('.diy_pickFruit_bottle2').attr('id');
            var fruit3=$('.diy_pickFruit_bottle3').attr('id');
            var info = document.createElement('p');
            infoArea.append(info);
            info.innerText=fruitInfo[fruit];
            info.className='diy_pickFruit_rightItemContent';
            changeData(cal[fruit1]*0.3333+cal[fruit2]*0.3333+cal[fruit3]*0.3333, iron[fruit1]*0.3333+iron[fruit2]*0.3333+iron[fruit3]*0.3333, fiber[fruit1]*0.3333+fiber[fruit2]*0.3333+fiber[fruit3]*0.3333, vinC[fruit1]*0.3333+vinC[fruit2]*0.3333+vinC[fruit3]*0.3333);
            // alert('3');

        } else {
            swal({
                type: 'error',
                title: '果汁已經滿了哦!',
                confirmButtonText: '<a href="diyDesignBottle.php">下一步!</a>',
                confirmButtonColor: '#ffd700',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: '取消',
                animation: false,
                customClass: 'animated tada',
                // text: 'Something went wrong!',
                footer: '<p>下一步可以客製瓶身外觀</p>'
            })
        }
    }
//表格數據更換
    function changeData(n1, n2, n3, n4) {
        // var data0 = myChart.data.datasets[0].data[0];
        // var data1 = myChart.data.datasets[0].data[1];
        // var data2 = myChart.data.datasets[0].data[2];
        // var data3 = myChart.data.datasets[0].data[3];

        myChart.data.datasets[0].data = [n1,n2,n3,n4];
        //更新
        myChart.update();
    }

//比例拖拉
        var cursor1 = document.getElementById('cursor1');
        var cursor2 = document.getElementById('cursor2');
        cursor1.onmousedown = down;
        cursor2.onmousedown = down;
    //點擊比例拖拉事件
    function down(e){
        dragging = true;
        if (e.pageY) {
            mouseY = e.pageY;
        } else {
            mouseY = e.clientY + document.body.scrollTop - document.body.clientTop;
        }
        cursor = this || window.event;
        dragging = true;
        cursorY = cursor.offsetTop;
        offsetY = mouseY - cursorY;
        document.onmousemove = move;
    //移動滑鼠事件
        function move(e) {
            e = e || window.event;
            if (dragging) {

                if (e.pageY) {
                    mouseY = e.pageY;
                } else {
                    mouseY = e.clientY + document.body.scrollTop - document.body.clientTop;
                }
                var y = mouseY - offsetY;
                var height = document.documentElement.clientHeight - cursor.offsetHeight;
                // y = Math.min(Math.max(0, y), height);

                var bottleHeight = document.querySelector('.diy_pickFruit_bottleBox').clientHeight;
                console.log(bottleHeight);
                console.log(y);
                var cursor1 = document.getElementById('cursor1');
                var cursor2 = document.getElementById('cursor2');
                var bottle3 = document.querySelector('.diy_pickFruit_bottle3');
                var bottle2 = document.querySelector('.diy_pickFruit_bottle2');
                var bottle1 = document.querySelector('.diy_pickFruit_bottle1');

                if(cursor2.style.display=='none'){
                    if(y>=bottleHeight){
                        cursor.style.top = bottleHeight + 'px';
                    }else if(y<=0){
                        cursor.style.top = 0+ 'px';
                    }else{
                        cursor.style.top = y-10 + 'px';
                    }
                    bottle2.style.height=(y/bottleHeight)*100+"%";
                    bottle1.style.height=100-(y/bottleHeight)*100+"%";
                }else if(cursor==cursor1){
                    if(y>=bottleHeight){
                        cursor.style.top = bottleHeight + 'px';
                    }else if(y<=cursor2.offsetTop){
                        cursor.style.top = cursor2.offsetTop + 'px';
                    }else{
                        cursor.style.top = y-10 + 'px';
                    }
                    console.log(y);
                    bottle1.style.height=(bottleHeight-y)/bottleHeight*100+"%";
                    bottle2.style.height=100-(bottle3.clientHeight/bottleHeight)*100-(bottleHeight-y)/bottleHeight*100+"%";
                }else{
                    if(y>=cursor1.offsetTop){
                        cursor.style.top = cursor1.offsetTop + 'px';
                    }else if(y<=0){
                        cursor.style.top = 0 + 'px';
                    }else{
                        cursor.style.top = y-10 + 'px';
                    }
                    // console.log(y);
                    bottle3.style.height=(y/bottleHeight)*100+"%";
                    bottle2.style.height=100-(bottle1.clientHeight/bottleHeight)*100-(y/bottleHeight)*100+"%";
                    // console.log(bottle1.clientHeight);
                    // console.log(y/bottleHeight);

                }
                    
                
            };
        };
    //放開滑鼠事件
        document.onmouseup = function(){
            dragging = false;
            var bottleHeight = document.querySelector('.diy_pickFruit_bottleBox').clientHeight;
            if($('.diy_pickFruit_bottle3').css('background-color') == "rgba(0, 0, 0, 0)"){
                var fruit1=$('.diy_pickFruit_bottle1').attr('id');
                var fruit2=$('.diy_pickFruit_bottle2').attr('id');
                var height1=$('.diy_pickFruit_bottle1').css('height').replace('px','')/bottleHeight;
                var height2=$('.diy_pickFruit_bottle2').css('height').replace('px','')/bottleHeight;
                changeData(parseInt((cal[fruit1]*height1+cal[fruit2]*height2)),parseInt((iron[fruit1]*height1+iron[fruit2]*height2)),parseInt((fiber[fruit1]*height1+fiber[fruit2]*height2)),parseInt((vinC[fruit1]*height1+vinC[fruit2]*height2)));

            }else{
                var fruit1=$('.diy_pickFruit_bottle1').attr('id');
                var fruit2=$('.diy_pickFruit_bottle2').attr('id');
                var fruit3=$('.diy_pickFruit_bottle3').attr('id');
                var height1=$('.diy_pickFruit_bottle1').css('height').replace('px','')/bottleHeight;
                var height2=$('.diy_pickFruit_bottle2').css('height').replace('px','')/bottleHeight;
                var height3=$('.diy_pickFruit_bottle3').css('height').replace('px','')/bottleHeight;
                // alert(parseInt((cal[fruit1]*height1+cal[fruit2]*height2+cal[fruit3]*height3))+', '+parseInt((iron[fruit1]*height1+iron[fruit2]*height2+iron[fruit3]*height3))+', '+ parseInt((fiber[fruit1]*height1+fiber[fruit2]*height2+fiber[fruit3]*height3))+', '+ parseInt((vinC[fruit1]*height1+vinC[fruit2]*height2+vinC[fruit3]*height3)));
                
                changeData(parseInt((cal[fruit1]*height1+cal[fruit2]*height2+cal[fruit3]*height3)),parseInt((iron[fruit1]*height1+iron[fruit2]*height2+iron[fruit3]*height3)),parseInt((fiber[fruit1]*height1+fiber[fruit2]*height2+fiber[fruit3]*height3)),parseInt((vinC[fruit1]*height1+vinC[fruit2]*height2+vinC[fruit3]*height3)));
            }
        };
     };
//重新選擇鍵
    $("#resetButton").click(function () {
        cursor1 = document.getElementById('cursor1');
        //REMOVE HIGHTLIGHT
        $('.diy_pickFruit_leftItem').css('background-color', "rgb(233, 201, 165)");

        //REMOVE BOTTLEFILL
        $(".diy_pickFruit_bottle3").css({'background-color':'rgba(0, 0, 0, 0)',
                                        'height':0});
        $(".diy_pickFruit_bottle2").css({'background-color':'rgba(0, 0, 0, 0)',
                                        'height':0});
        $(".diy_pickFruit_bottle1").css({'background-color':'rgba(0, 0, 0, 0)',
                                        'height':0});
        //REMOVE TEXT
        // alert($('.diy_pickFruit_righItemContent').length);

        //REMOVE AND RESET CHART
        changeData(0,0,0,0);
         $('.diy_pickFruit_cursor1').css({'display':'none'});
         $('.diy_pickFruit_cursor2').css({'display':'none'});
         $('.diy_pickFruit_rightItemContent').remove();
    });
//hover水果會說話
    $('.fruiticon').mousemove(function () {
        name = '.fruitname' + $(this).attr('id');
        $(name).show();
        namebgc = '.fruitnameBox' + $(this).attr('id');
        $(namebgc).show();
    })
    $('.fruiticon').mouseout(function () {

        $(this).parent().removeClass('fruitbgc');
        name = '.fruitname' + $(this).attr('id');
        $(name).hide();
        namebgc = '.fruitnameBox' + $(this).attr('id');
        $(namebgc).hide();
    })
    $(function () {
        if ($(window).width() < 768) {
            $('.diy_pickFruit_leftItem').removeClass('hvr-radial-out');
        } else {
            $('.diy_pickFruit_leftItem').addClass('hvr-radial-out');
        }
    });
    $('.fruiticon').click(function () {
        if ($(".diy_pickFruit_bottle1").css('background-color') == "rgba(0, 0, 0, 0)") {
            _index = $(this).index();
            bgc = '.diy_pickFruit_leftItem' + $(this).attr('id');
            $(bgc).css('background-color', "rgb(199, 129, 50)");
        } else if ($(".diy_pickFruit_bottle2").css('background-color') == "rgba(0, 0, 0, 0)") {
            _index = $(this).index();
            bgc = '.diy_pickFruit_leftItem' + $(this).attr('id');
            $(bgc).css('background-color', "rgb(199, 129, 50)");
  
        } else if ($(".diy_pickFruit_bottle3").css('background-color') == "rgba(0, 0, 0, 0)") {
            _index = $(this).index();
            bgc = '.diy_pickFruit_leftItem' + $(this).attr('id');
            $(bgc).css('background-color', "rgb(199, 129, 50)");

        } else {
            bgc = '.diy_pickFruit_leftItem' + $(this).attr('id');
            $(bgc).css('background-color', "rgb(233, 201, 165)");
        }

    })
    //手機水果輪播
    if ($(window).width() < 768) {
        // alert('aa');
        $('.diy_pickFruit_leftPic').slick({

            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            prevArrow: '<div class="diy_pickFruit_leftArrow"><img src="images/left01.png" alt="左箭頭"></div>',
            nextArrow: '<div class="diy_pickFruit_rightArrow"><img src="images/right01.png" alt="右箭頭"></div>',
        });
    }

//傳值事件

    function diySubmit(){
        var bottlec3 = $('.diy_pickFruit_bottle3').css('background-color');
        var bottlec2 = $('.diy_pickFruit_bottle2').css('background-color');
        var bottlec1 = $('.diy_pickFruit_bottle1').css('background-color');
        var bottleh3 = $('.diy_pickFruit_bottle3').css('height').replace('px','');
        var bottleh2 = $('.diy_pickFruit_bottle2').css('height').replace('px','');
        var bottleh1 = $('.diy_pickFruit_bottle1').css('height').replace('px','');
        
        var bottleHeight1 =  $('.diy_pickFruit_bottleBox').css('height').replace('px','');
    
        document.getElementById( 'bottleh1' ).value = Math.round((bottleh1/bottleHeight1)*100);
        document.getElementById( 'bottleh2' ).value = Math.round((bottleh2/bottleHeight1)*100);
        document.getElementById( 'bottleh3' ).value = Math.round((bottleh3/bottleHeight1)*100);
        document.getElementById( 'bottlec1' ).value = bottlec1;
        document.getElementById( 'bottlec2' ).value = bottlec2;
        document.getElementById( 'bottlec3' ).value = bottlec3;
    
        document.getElementById('diySubmit').submit();
    }



};

function diySubmit(){
    var bottlec3 = $('.diy_pickFruit_bottle3').css('background-color');
    var bottlec2 = $('.diy_pickFruit_bottle2').css('background-color');
    var bottlec1 = $('.diy_pickFruit_bottle1').css('background-color');
    var bottleh3 = $('.diy_pickFruit_bottle3').css('height').replace('px','');
    var bottleh2 = $('.diy_pickFruit_bottle2').css('height').replace('px','');
    var bottleh1 = $('.diy_pickFruit_bottle1').css('height').replace('px','');
    
    var bottleHeight1 =  $('.diy_pickFruit_bottleBox').css('height').replace('px','');

    document.getElementById( 'bottleh1' ).value = Math.round((bottleh1/bottleHeight1)*100);
    document.getElementById( 'bottleh2' ).value = Math.round((bottleh2/bottleHeight1)*100);
    document.getElementById( 'bottleh3' ).value = Math.round((bottleh3/bottleHeight1)*100);
    document.getElementById( 'bottlec1' ).value = bottlec1;
    document.getElementById( 'bottlec2' ).value = bottlec2;
    document.getElementById( 'bottlec3' ).value = bottlec3;

    document.getElementById('diySubmit').submit();
}




window.addEventListener('load', chart);






// $(window).width
//
