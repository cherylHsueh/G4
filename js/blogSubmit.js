

function doFirst(){
//上傳文章比例條

//比例拖拉


    // alert('ok');
    var cursor1 = document.getElementById('cursor1');
    var cursor2 = document.getElementById('cursor2');
    if(window..screen.width>1024){
        cursor1.onmousedown = down;
        cursor2.onmousedown = down;
    }else{
        cursor1.ontouchstart= down;
        cursor2.ontouchstart= down;
        alert('1');
    }
    
    //比例預設0.33333
    $('#fruitratio1').text('0.333333');
    $('#fruitratio2').text('0.333333');
    $('#fruitratio3').text('0.333333');
    $('#fruitRatio1').attr("value",'0.333333');
    $('#fruitRatio2').attr("value",'0.333333');
    $('#fruitRatio3').attr("value",'0.333333');

};

window.addEventListener('load',doFirst);


//點擊比例拖拉事件
function down(e){
    alert('2');

    //    alert('a');
        dragging = true;
        if (e.pageX) {
            mouseX = e.pageX;
        } else {
            mouseX = e.clientX - document.body.clientLeft;
        }
        cursor = this || window.event;
        cursorX = cursor.offsetLeft;
        // alert(cursorX);
        offsetX = mouseX - cursorX;
        // console.log(cursor);
        if(window..screen.width>1024){
            document.onmousemove = move;
        }else{
            document.ontouchmove= move;
        }
        
    //移動滑鼠事件
        function move(e) {
        console.log('e');
    
            e = e || window.event;
            if (dragging) {
    
                if (e.pageX) {
                    mouseX = e.pageX;
                } else {
                    mouseX = e.clientX - document.body.clientLeft;
                }
                var x = mouseX - offsetX;
                // alert(x);
                // var width = document.documentElement.clientWidth + cursor.offsetWidth;
                // y = Math.min(Math.max(0, y), height);
    
                var boxWidth = document.querySelector('.full').clientWidth;
                // console.log(x);
                var cursor1 = document.getElementById('cursor1');
                var cursor2 = document.getElementById('cursor2');
                if(cursor==cursor1){
                    if(x>=cursor2.offsetLeft){
                            cursor.style.left = cursor2.offsetLeft+ 'px';
                        }else if(x<=0){
                            cursor.style.left = -10 + 'px';
                        }else{
                            cursor.style.left = (x) + 'px';
                        }
                }else{
                    // alert(boxWidth);
                    if(x>=boxWidth){
                        cursor.style.left = boxWidth-10 + 'px';
                    }else if(x<=cursor1.offsetLeft){
                        cursor.style.left = cursor1.offsetLeft + 'px';
                    }else{
                        cursor.style.left = x + 'px';
                    }
                }
                proportion1 = parseInt(cursor1.offsetLeft+10)/ boxWidth;
                proportion2 = (parseInt(cursor2.offsetLeft) - parseInt(cursor1.offsetLeft))/ boxWidth;
                proportion3 =(boxWidth - parseInt(cursor2.offsetLeft+10))/ boxWidth;
                // alert(boxWidth+','+proportion1+','+proportion2+','+proportion3);
    
                var fruitratio1 = proportion1.toFixed(3);
                var fruitratio2 = proportion2.toFixed(3);
                var fruitratio3 = proportion3.toFixed(3);
                // console.log(fruitratio);
    
                $('#fruitRatio1').attr("value",fruitratio1);
                $('#fruitRatio2').attr("value",fruitratio2);
                $('#fruitRatio3').attr("value",fruitratio3);

                $('#fruitratio1').text(fruitratio1);
                $('#fruitratio2').text(fruitratio2);
                $('#fruitratio3').text(fruitratio3);
            };
        };
    //放開滑鼠事件
    if(window..screen.width>1024){
        document.onmouseup = function(){
            dragging = false;
            
        };
    }else{
        document.ontouchend = function(){
            dragging = false;
            
        };
    }
     };