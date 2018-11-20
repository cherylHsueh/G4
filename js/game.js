
(function(window,undefined){
    /**
     * 初始化遊戲
     */
    var fruitGame = function(args){
        /*十種水果*/
        this.FruitList = [
            // { ID:'F1', FruitName:'香蕉',Icon:'images/b-fruit/banana.png',Cent:50 },
            { ID:'F2', FruitName:'蘋果',Icon:'images/apple.png',Cent:50 },
            { ID:'F3', FruitName:'哈密瓜',Icon:'images/cantaloupe.png',Cent:50 },
            { ID:'F4', FruitName:'葡萄',Icon:'images/grape.png',Cent:30 },
            { ID:'F5', FruitName:'芭樂',Icon:'images/guava.png',Cent:30 },
            { ID:'F6', FruitName:'橘子',Icon:'images/mandarin.png',Cent:50 },
            { ID:'F7', FruitName:'鳳梨',Icon:'images/pineapple.png',Cent:30 },
            { ID:'F8', FruitName:'番茄',Icon:'images/tomato.png',Cent:20 },
            { ID:'F9', FruitName:'西瓜',Icon:'images/watermelon.png',Cent:10 },
            { ID:'F10', FruitName:'柳丁',Icon:'images/orange.png',Cent:10 }
        ];
        /*兩顆炸彈*/
        this.BombList = [
            { ID:'B1',BombName:'土雷',Icon:'images/15.png',Life:40 },
            { ID:'B2',BombName:'導弹',Icon:'images/16.png',Life:40 }
        ];
        /*關卡等级*/
        this.LevelList = [
            { Level:1,Cent:1000,Speed:1000 }
        ];
        /*生成水果炸弹的全局引用*/
        this.BuilderFruit = null;
        /*水果炸弹往下移动的全局引用*/
        this.FruitMove = null;
        /*全局参数设置*/
        this.Setting = $.extend({
            //遊戲盒子
            GameBox:$('div#game_box'),
            //水果籃
            CarBox:$('div#carBox'),
            //水果籃子移动像素
            CarMoveWidth:50,
            //水果籃寬度
            CarBoxWidth:$('div#carBox').width(),
            //遊戲盒宽度
            BoxWidth:1920,
            //遊戲盒高度
            BoxHeight:500,
            //水果寬度
            FruitWidth:80,
            //當前總得分
            CountCent:0,
            //關卡级别
            LevelNum:1,
            //關卡卡级别-升级監聽变量
            ListenerLevelNum:1,
            //玩家姓名
            UserName:'果然',
            //玩家总血量
            LifeSize:80,
            //是否暂停
            Pause:false,
            //是否开始
            Start:false
        },args);
    }

    /**
     * 遊戲等級對象,改寫只有一關
     */
    fruitGame.prototype.GetLevelModel = function(level){
        var _levels = this.LevelList,
            _levelObj;
        for(var i = 0, _count = _levels.length; i < _count; i++){
            _levelObj = _levels[i];
            if(_levelObj.Level == level)
                return _levelObj;
        }
        return undefined;
    }

    /**
     * 隨機獲得水果類型
     */
    fruitGame.prototype.GetRandomFruit = function(){
       var _this = this,
           _fruitCount = 0,
           _fruitIndex = 0,
           _fruitList = _this.FruitList.concat(_this.BombList);
        _fruitCount = _fruitList.length;
        _fruitIndex = parseInt(Math.random() * _fruitCount);
        return _fruitList[_fruitIndex];
    }

    /**
     * 監聽遊戲等級
     */
    fruitGame.prototype.GameLevelListener = function(){
        var _this = this,
            _countCent = _this.Setting.CountCent,
            _levelList = _this.LevelList,
            _levelObj;
        for(var i = 0,_count = _levelList.length; i < _count; i++){
            _levelObj = _levelList[i];
            if(_levelObj.Cent >= _countCent){
                if(_levelObj.Level > _this.Setting.ListenerLevelNum){
                    _this.Setting.ListenerLevelNum = _levelObj.Level;
                    _this.ShowUpgrade(_levelObj.Level);
                }
                $('#gameLevel').text(_levelObj.Level);
                _this.Setting.LevelNum = _levelObj.Level;
                break;
            }
        }
    }

    /**
     * @type 
     * @position object { X:0,Y:0 }
     */
    fruitGame.prototype.ShowTipBox = function(type,position){
        var _this = this,
            _tipBoxID = Math.random().toString().replace('.',''),
            _tipBox = '<i id="'+ _tipBoxID +'" class="tip_box '+ type +'" style=" left:' + position.X + 'px; top:' + position.Y + 'px;"></i>';
        _this.Setting.GameBox.append(_tipBox);
        setTimeout(function(){
            $('#' + _tipBoxID).remove();
        },300);
    }

    /**
     * 升级提示框
     * @level int 等级
     */
    // fruitGame.prototype.ShowUpgrade = function(level){
    //     var _this = this,
    //         _tipBox = '<span class="upgrade_tip">第'+ level +'关,加油！</span>';
    //     _this.Setting.GameBox.append(_tipBox);
    //     setTimeout(function(){
    //         $('span.upgrade_tip').remove();
    //     },2000);
    // }

    /**
     * 控制水果籃左右移動
     */
    fruitGame.prototype.BindControlMove = function(){
        var _this = this;
        $(window).keydown(function(e){
            var _code = e.keyCode;
            //左鍵
            if(_code == 37)
                _this.CarBoxMove('left');
            //右鍵
            if(_code == 39)
                _this.CarBoxMove('right');
        });
    }

// 手機模式
    //  使用陀螺儀
    if(window.screen.width<1440){
        $('#game_control_txt').text('請將手機改成橫式，左右搖擺移動菜籃');
        var mql = window.matchMedia('(orientation: portrait)');
        console.log(mql);
        //判斷手機是直式或橫式
        function handleOrientationChange(mql) {
            if(mql.matches) {
            // 豎屏
                console.log('portrait'); 
                if(window.DeviceOrientationEvent) {
                    console.log($('div#carBox').width());
                    $('div#carBox').css({ left:window.screen.width+ $('div#carBox').width()/2 });
                    window.addEventListener('deviceorientation', function(event) {
                        var gamma = event.gamma;

                        $('div#carBox').css({ left:(gamma*6+400) + 'px' });
                        
                    }, false);
                }else{
                    document.querySelector('body').innerHTML = '你的瀏覽器不支援喔';
                }
            }else {
             // 橫屏
                console.log('landscape');
                if(window.DeviceOrientationEvent) {
                    console.log($('div#carBox').width());
                    $('div#carBox').css({ left:window.screen.width+ $('div#carBox').width()/2 });
                    window.addEventListener('deviceorientation', function(event) {
                        var beta = event.beta;

                        $('div#carBox').css({ left:(beta*10+400) + 'px' });
                        
                    }, false);
                }else{
                    document.querySelector('body').innerHTML = '你的瀏覽器不支援喔';
                }
            }

        }
// 列印日誌
handleOrientationChange(mql);
// 監聽螢幕模式的變化
mql.addListener(handleOrientationChange);


    //手機橫式
        function changeOrientation($print) {  
            var width = document.documentElement.clientWidth;
            var height =  document.documentElement.clientHeight;
            if(width < height) {
                $print.width(height);
                $print.height(width);
                $print.css('top',  (height - width) / 2 );
                $print.css('left',  0 - (height - width) / 2 );
                $print.css('transform', 'rotate(90deg)');
                $print.css('transform-origin', '50% 50%');
            } 
           
            var evt = "onorientationchange" in window ? "orientationchange" : "resize";
                
                window.addEventListener(evt, function() {
          
                setTimeout(function() {
                    var width = document.documentElement.clientWidth;
                    var height =  document.documentElement.clientHeight;
                    // 刷新城市的宽度
                    initCityWidth();
                    // 初始化每个气泡和自行车碰撞的距离
                    cityCrashDistanceArr = initCityCrashDistance();
              
                //   if( width > height ){
                //       $print.width(width);
                //       $print.height(height);
                //       $print.css('top',  0 );
                //       $print.css('left',  0 );
                //       $print.css('transform' , 'none');
                //       $print.css('transform-origin' , '50% 50%');
                //    }
                //    else {
                    $print.width(height);
                      $print.height(width);
                      $print.css('top',  (height-width)/2 );
                      $print.css('left',  0-(height-width)/2 );
                      $print.css('transform' , 'rotate(90deg)');
                      $print.css('transform-origin' , '50% 50%');
                //    }
              }, 300);  
             }, false);
            }
    }






    /**
     * 水果籃位置
     */
    fruitGame.prototype.CarBoxMove = function(action){
        var _this = this,
            _setting = _this.Setting,
            _left = _setting.CarBox.position().left;
        if(action == 'left'){
            _left = _left - _setting.CarMoveWidth;
            if(_left < 0) return;
            $('div#carBox').css({ left:_left + 'px' });
        }
        if(action == 'right'){
            if(_left >  _setting.BoxWidth - _setting.CarBoxWidth) return;
            _left = _left + _setting.CarMoveWidth;
            $('div#carBox').css({ left:_left + 'px' });
        }
    }

    /**
     * 生成水果的X位置
     */
    fruitGame.prototype.BuilderFruitPosition = function(){
        var _setting = this.Setting,
            _left = parseInt(Math.random() * _setting.BoxWidth);
        return _left > _setting.BoxWidth - _setting.FruitWidth ? _setting.BoxWidth - _setting.FruitWidth : _left;
    }

    /**
     * 控制水果下落
     */
    fruitGame.prototype.FruitDownMove = function(element){
        var _this = this,
             _setting = this.Setting;
        var _move = setInterval(function(){
            var _$element = $(element),
                 _top = _$element.position().top;
            _$element.css({ top:(_top + _setting.FruitWidth) + 'px' });
            _this.FruitPutCount(_$element,_move);
        },this.GetLevelModel(_setting.LevelNum).Speed /3 );
        // 控制速度
    }

 

    /**
     * 水果炸弹,血量减少
     */
    fruitGame.prototype.FruitBomb = function(life){
        var _this = this,
             _$lifeBar = $('#lifeBar'),
            _lifeSize = _$lifeBar.width();
        _lifeSize -= life;
        if(_lifeSize <= 0 ){
    // 生命值小於零遊戲結束字樣
            _$lifeBar.animate({width:_lifeSize + 'px'},100,function(){
                $('div.thing').remove();
                aa = parseInt(document.getElementById('gameCent').innerText);
                // 把文字轉成數值再來判斷
                // alert(aa);
                if(aa >=200){
                    c = 7;
                }else if(aa >=100){
                    c = 8;
                }else if(aa >=0){
                    c = 9;
                }
                $("div#game_box").append('<span class="game_over_tip">恭喜你得到積分'+document.getElementById('gameCent').innerText+'分~拿到<span id="score">'+c+'</span>折優惠券</span>');
                $("div#game_box").append('<span class="game_over_tip2">立刻前往果汁DIY頁面</span>');
                // $("div#game_box").append('<a href="javasript:;" id="bonus" class="game_over_tip3">'+'GO'+'</a>');
                $("div#game_box").append('<img class="special" src="images/coupon.png" alt="">');
                $('#game_box .game_over_tip3').css("display" , 'block');
                $("#bonusgo").attr("value",c);
                
            });
            clearInterval(this.BuilderFruit);
        }else{
            _$lifeBar.animate({width:_lifeSize + 'px'},100,function(){
                if(_lifeSize <= _this.Setting.LifeSize / 1.5)
                    _$lifeBar.removeAttr('class').addClass('yellow');
                if(_lifeSize <= _this.Setting.LifeSize / 2)
                    _$lifeBar.removeAttr('class').addClass('red');
            });
        }
    }

    /**
     * 水果爆炸後,抖動畫面
     */
    fruitGame.prototype.FruitBombShock = function(){
        var _this = this,
            _$gameBox = _this.Setting.GameBox.parent(),
            _x = _$gameBox.position().left,
            _y = _$gameBox.position().top,
            _shockWidth = 5,
            _shockHeight = 1,
            _shockCount = 0;
        var _shock = setInterval(function(){
            if(_shockCount >= 10){
                _$gameBox.css({ left:_x + 'px', top:_y + 'px'});
                clearInterval(_shock);
                return;
            }
            if(_shockCount % 2 == 0)
                _$gameBox.css({ left:_x + _shockWidth + 'px', top:_y + _shockHeight + 'px'});
            else
                _$gameBox.css({ left:_x - _shockWidth + 'px', top:_y - _shockHeight + 'px'});
            _shockCount++;
        },20);
    }

    /**
     * 計算籃子接到的水果
     */
    fruitGame.prototype.FruitPutCount = function(element,elementMove){
        var _this = this,
            _setting = _this.Setting,
            _carBoxLeft = _setting.CarBox.position().left,
            _carBoxTop = _setting.CarBox.parent().position().top,
            _elTop = element.position().top + element.height(),
            _elLeft = element.position().left + element.width(),
            _fruitCent = parseInt(element.attr('cent') || 0),
            _life = element.attr('life');

        if(_elLeft >= _carBoxLeft && _elLeft - element.width() <= _carBoxLeft + _setting.CarBoxWidth && _elTop - 50 >= _carBoxTop){
            clearInterval(elementMove);
            element.remove();

            if(typeof _life == 'undefined'){
                //console.log('A:' + _life + ' - ' + (typeof _life == 'undefined') + ' - ' + _fruitCent);
                _setting.CountCent += _fruitCent;
                $('#gameCent').text(_setting.CountCent);
                // console.log($('#gameCent').text(_setting.CountCent));
                _this.GameLevelListener();
                _this.ShowTipBox('kiss',{ X:_elLeft - _setting.FruitWidth, Y: _elTop - 30 });
            }else{
                //console.log('B:' + _life);
                _this.FruitBomb(_life);
                _this.ShowTipBox('bomb',{ X:_elLeft - _setting.FruitWidth - 20, Y: _elTop - 60 });
                _this.FruitBombShock();
            }
        }else if(_elTop - 60 > _carBoxTop){
            clearInterval(elementMove);
            element.remove();
            _this.ShowTipBox('miss',{ X:_elLeft - _setting.FruitWidth, Y: _elTop - 60 });
        }
    }

    /**
     * 開始遊戲
     */
    fruitGame.prototype.Start = function(){
       // 倒數三十秒計時器 
        var num = 30;
        var time;
        function bye(){
 	        num--;
 	        if(num == 0){ 
 		    num = "時間到!";
 		clearInterval( time )
		// 到這邊取消計時器標號
        }
	    document.getElementById("divNum").
		innerHTML = num;
		// 用innerHTML來更改數字
		console.log(num)
    }
	    time = setInterval( bye,1000);
        // 寫下一個數字 就會是10的-3次方,所以我們寫1000會等於一秒	
        // 倒數三十秒計時器結束  
        var _this = this,
            _setting = this.Setting;
        // 遊戲部分
        _this.BindControlMove();
        _this.BuilderFruit = setInterval(function(){
            var _domDiv = document.createElement('div'),
                _fruitObj = _this.GetRandomFruit();
            _domDiv.setAttribute('class','thing');
            _domDiv.setAttribute('idx',_fruitObj.ID);
            if(_fruitObj.Life){
                _domDiv.setAttribute('life',_fruitObj.Life);
            }else{
                _domDiv.setAttribute('cent',_fruitObj.Cent);
            }
            _domDiv.setAttribute('style','left:' + _this.BuilderFruitPosition() + 'px;');
            _domDiv.innerHTML = '<img src="'+ _fruitObj.Icon +'" width="30" height="30"/>';
            _setting.GameBox.append(_domDiv);
            _this.FruitDownMove(_domDiv);
        },_this.GetLevelModel(_setting.LevelNum).Speed);
        // 這邊寫一個遊戲本身停止的計時器
        // 30000毫秒過後執行吃到炸彈的function，這function是給生命life，要扣多少就給多少，滿是80，所以可以給80，但我94要給100(怪人)
        setTimeout(function() {
        clearInterval(_this.BuilderFruit);
        console.log(fruitGame.prototype.FruitBomb(100));
        }, 30000);
        return this;
    };


    /**
     * 遊戲初始化
     */
    fruitGame.prototype.Init = function(){
        var _this = this;
        //new fruitGame().Start();
    }

    window.FruitGame = function(){
        return new fruitGame();
    }();
})(window);