
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
            //游戏盒子
            GameBox:$('div#game_box'),
            //水果篮
            CarBox:$('div#carBox'),
            //水果藍移动像素
            CarMoveWidth:50,
            //水果籃寬度
            CarBoxWidth:$('div#carBox').width(),
            //游戏盒子宽度
            BoxWidth:1920,
            //游戏盒子高度
            BoxHeight:500,
            //水果寬度
            FruitWidth:80,
            //当前总得分
            CountCent:0,
            //当前關卡级别
            LevelNum:1,
            //当前关卡级别-升级监听变量
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
     * 遊戲等級對象,改寫成只有一關
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

    /**
     * 水果篮位置
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
                    c = 6;
                }else if(aa >=150){
                    c = 7;
                }else if(aa >=100){
                    c = 8;
                }else if(aa >=0){
                    c = 9;
                }
                _this.Setting.GameBox.append('<span class="game_over_tip">恭喜你得到積分'+document.getElementById('gameCent').innerText+'分~拿到'+c+'折優惠券</span>');
                _this.Setting.GameBox.append('<span class="game_over_tip2">立刻前往果汁DIY頁面</span>');
                _this.Setting.GameBox.append('<a href="diy.html" class="game_over_tip3">'+'GO'+'</a>');
                _this.Setting.GameBox.append('<img class="special" src="images/coupon.png" alt="">')

                
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
     * 计算投入到篮里的水果
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
        var _this = this,
            _setting = this.Setting;

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
        return this;
    }

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