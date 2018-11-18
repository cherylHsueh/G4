
//文章內容限制
$(window).ready(function(){
    var lenone = 30; // 超過50個字以"..."取代
   
            $(".blog_Rank_Desc p").each(function(i){
                if($(this).text().length>lenone){
                    $(this).attr("title",$(this).text());
                    var text=$(this).text().substring(0,lenone-1)+"...";
                    $(this).text(text);
                }
             }); 
             
    var lentwo = 50; // 超過50個字以"..."取代
   
            $(".blog_Forum_Desc p").each(function(i){
                if($(this).text().length>lentwo){
                    $(this).attr("title",$(this).text());
                    var text=$(this).text().substring(0,lentwo-1)+"...";
                    $(this).text(text);
                }
             });



             $(".blog_Rank_Container").click(function () {

                if ($(this).attr('data-rank') == 2) {
                    for (var i = 1; i <= 3; i++) {
                        var rankBox = $("#phone .blog_Rank_Container:nth-child(" + i + ")");
                        // 抓值
                        var num = rankBox.attr("data-rank");
                        // alert(num);
                        // removeClass
                        rankBox.removeClass("blog_Rank_Container" + num);
                        // 值+1(判斷值==4,值變1)
                        num++;
                        if (num == 4) {
                            num = 1;
                        }
                        // addClass
                        rankBox.addClass("blog_Rank_Container" + num);
                        // 傳回值
                        rankBox.attr("data-rank", num);
                    }
                } else if ($(this).attr('data-rank') == 3) {
                    for (var i = 1; i <= 3; i++) {
                        var rankBox = $("#phone .blog_Rank_Container:nth-child(" + i + ")");
                        // 抓值
                        var num = rankBox.attr("data-rank");
                        // alert(num);
                        // removeClass
                        rankBox.removeClass("blog_Rank_Container" + num);
                        // 值-1(判斷值==0,值變3)
                        num--;
                        if (num == 0) {
                            num = 3;
                        }
                        // addClass
                        rankBox.addClass("blog_Rank_Container" + num);
                        // 傳回值
                        rankBox.attr("data-rank", num);
                    }
            
                }
            })
            
})




//留言

window.onload = function () {

    //create 外殼
    blogIn_Msg_SendWrapper = document.createElement('div');
    blogIn_Msg_SendWrapper.className = 'blogIn_Msg_SendWrapper clearfix';
    document.getElementById('blogIn_Msg_SendBlock').appendChild(blogIn_Msg_SendWrapper);

    // Btn = document.getElementById("blogIn_Msg_BoxBtn");
    // Btn.addEventListener('click', function () {
    //     addItem();
    // })

    // var input = document.getElementById("blogIn_Msg_Content");
    // input.addEventListener("keydown", function (event) {
    //     event.preventDefault();
    //     if (event.keyCode === 13) {
    //         // document.getElementById("blogIn_Msg_BoxBtn").click();
    //         addItem();
    //     }
    // });

}

function addItem() {
    // url = "blogInMes.php";
    // location.href= url;

    blogIn_Msg_SendWrapper = document.createElement('div');
    blogIn_Msg_SendWrapper.className = 'blogIn_Msg_SendWrapper clearfix';

    //create imagearea
    var blogIn_Msg_SendBox = document.createElement('div');
    blogIn_Msg_SendBox.className = 'blogIn_Msg_SendBox cl-s-2 cl-md-2';

    var blogIn_Msg_SendPic = document.createElement('div');
    blogIn_Msg_SendPic.className = 'blogIn_Msg_SendPic';
    var image = document.createElement('img');
    image.src = 'images/blogImg/memberPic.png';
    image.alt = '留言者';

    var memName = document.createElement('p');
    memName.innerHTML = '哆啦A夢';

    document.getElementById('blogIn_Msg_SendBlock').appendChild(blogIn_Msg_SendWrapper);
    blogIn_Msg_SendWrapper.appendChild(blogIn_Msg_SendBox);
    blogIn_Msg_SendBox.appendChild(blogIn_Msg_SendPic);
    blogIn_Msg_SendBox.appendChild(memName);
    blogIn_Msg_SendPic.appendChild(image);


    //create messagearea
    var blogIn_Msg_SendBox2 = document.createElement('div');
    blogIn_Msg_SendBox2.className = 'blogIn_Msg_SendBox blogIn_Msg_SendBox2 cl-s-7 cl-md-8';

    var blogIn_Msg_SendContent = document.createElement('div');
    blogIn_Msg_SendContent.className = 'blogIn_Msg_SendContent';
    var msginput = document.getElementById('blogIn_Msg_Content').value;
    var msg = document.createElement('p');
    msg.innerHTML = (msginput);

    var blogIn_Msg_SendDate = document.createElement('div');
    blogIn_Msg_SendDate.className = 'blogIn_Msg_SendDate';
    var msgdate = document.createElement('p');
    var dt = new Date();
    var month = new Array(12);
    month[0] = "1";
    month[1] = "2";
    month[2] = "3";
    month[3] = "4";
    month[4] = "5";
    month[5] = "6";
    month[6] = "7";
    month[7] = "8";
    month[8] = "9";
    month[9] = "10";
    month[10] = "11";
    month[11] = "12";
    msgdate.innerHTML = dt.getFullYear() + "/" + month[dt.getMonth()] + "/" + dt.getDate();

    blogIn_Msg_SendWrapper.appendChild(blogIn_Msg_SendBox2);
    blogIn_Msg_SendBox2.appendChild(blogIn_Msg_SendContent);
    blogIn_Msg_SendContent.appendChild(msg);
    blogIn_Msg_SendBox2.appendChild(blogIn_Msg_SendDate);
    blogIn_Msg_SendDate.appendChild(msgdate);


    //createbutton
    var subButtonItem = document.createElement('input');
    subButtonItem.className = 'subButtonItem cl-s-2 cl-md-1';
    subButtonItem.href = 'javascript:;';
    subButtonItem.value = '檢舉';

    blogIn_Msg_SendWrapper.appendChild(subButtonItem);


}




//瀑布流

$(function () {
    $('#container').masonry({
        // options 
        itemSelector: '.blog_Forum_Block',
        columnWidth: 0
    });
});



//桌機輪播
$(function () {
    $('#dg-container').gallery({
        current: 0,
        // index of current item

        autoplay: true,
        // slideshow on / off

        interval: 5000
        // time between transitions
    });
});


//手機輪播



//cloud animation

function cloudAnimation() {
    var paused1 = document.getElementById('blog_cloud5_paused');
    var fruit1 = document.getElementById('blog_cloud5_fruit1');
    var paused2 = document.getElementById('blog_cloud6_paused');
    var fruit3 = document.getElementById('blog_cloud6_fruit3');

    paused1.addEventListener('click', function () {
        // alert('ok');
        fruit1.classList.add('fruit1_active');
    });
    paused2.addEventListener('click', function () {
        // alert('ok');
        fruit3.classList.add('fruit3_active');
    })
}
window.addEventListener('load', cloudAnimation);

//umbrella

function umbrellaAnimation() {
    var umbrellaMandarin = document.getElementById('blogIn_umbrellaMandarin');
    umbrellaMandarin.addEventListener('click', function () {
    umbrellaMandarin.classList.add('umbrellaMandarin_active');
    })
}
window.addEventListener('load', umbrellaAnimation);


//上傳圖檔

$("#picture").change(function(){
    checkImage( this );
  });
function checkImage(input) {
      var filePath = input.value;
      if(filePath){
          //读取图片数据
          var filePic = input.files[0];
          var reader = new FileReader();
          reader.onload = function (e) {
              var data = e.target.result;
              //加载图片获取图片真实宽度和高度
              var image = new Image();
              image.onload=function(){
                  var width = image.width;
                  var height = image.height;
                  if (width <= 300 | height <= 300){
                      alert("圖檔上傳成功"); 
                      if ( input.files && input.files[0] ) {
                          var FR= new FileReader();
                          FR.onload = function(e) {
                          //e.target.result = base64 format picture
                          $('#viewImg').attr( "src", e.target.result );
                          $('#viewImg').addClass('imgSize');
                        //   $('.upload').css( "display","none");
                          $('.upload').addClass( "upload_active");
                          };       
                          FR.readAsDataURL( input.files[0] );
                      }
                  }else {
                      alert("圖檔尺寸不符，尺寸應為300*300！");
                      file.value = "";
                      return false;
                  }
              };
              image.src= data;
              
          };
          reader.readAsDataURL(filePic);
         
      }else{
          return false;
      }
  }

  $("#uploadBtn").click(function(){
    alert( '上傳成功' );
  });


//按讚及收回讚
// function doFirst(){
//    pushGreat = document.querySelectorAll('.pushGreat'); 
// // var greatNum = document.getElementById('.greatNum'); 
// for( i=0 ; i<pushGreat.length; i++){  
// 	pushGreat[i].addEventListener('click',function(){
//         Num = this.id;
//         spanNum = 'span' +this.id;
//         greatNum = 'great' + this.id;
//         spanNumIn = document.querySelector('#'+spanNum).innerHTML;
//         imgNum = 'img' + this.id;
//         // alert(imgNum);
//         if( spanNumIn === '收回'){
//         // alert('ok');
//         dodelete();
//         }else if(spanNumIn === '按讚'){
//             // alert('no');
//             doplus();
//         }
//     }) 
// };
 
// }

function doplus(){
    greatNumIn = document.querySelector('#'+greatNum).innerHTML; //找按讚數的空間
    // alert(greatNumIn);
    addinformation = parseInt(greatNumIn) + 1; //按一次加一
    // alert(addinformation);
    document.getElementById(greatNum).innerHTML = addinformation; //放入讚數空間
    //---------
    spanNumIn = document.querySelector('#'+spanNum).innerHTML; //找按讚鈕的空間
    // alert(spanNumIn);
    document.getElementById(spanNum).innerHTML = '收回'; //放入讚數空間
    // alert('ok');
    document.getElementById(Num).style.backgroundColor='#90A30B';
    document.getElementById(imgNum).style.transform = "rotate(15deg)";
    // alert('ok');
    
}
function dodelete(){
    greatNumIn = document.querySelector('#'+greatNum).innerHTML; //找按讚數的空間
    // alert(greatNumIn);
    deleteinformation = parseInt(greatNumIn) - 1; //按一次減一
    // alert(deleteinformation);
    document.getElementById(greatNum).innerHTML = deleteinformation; //放入讚數空間
    //---------
    spanNumIn = document.querySelector('#'+spanNum).innerHTML; //找按讚鈕的空間
    // alert(spanNumIn);
    document.getElementById(spanNum).innerHTML = '按讚'; //放入讚數空間
    // alert('ok');
    document.getElementById(Num).style.backgroundColor='#fbb03b';
    document.getElementById(imgNum).style.transform = "rotate(0deg)";

}

function doplusIn(){
    greatNum = document.getElementById('greatNum').innerHTML; //找按讚數的空間
    // alert(greatNum);
    addinformation = parseInt(greatNum) + 1; //按一次加一
    // alert(addinformation);
    document.getElementById('greatNum').innerHTML = addinformation; //放入讚數空間
    //---------
    document.getElementById('spanNum').innerHTML = '收回'; //放入讚數空間
    // alert('ok');
    document.getElementById("Numthumb").style.backgroundColor='#90A30B';
    document.getElementById('imgNum').style.transform = "rotate(15deg)";
    // alert('ok');
    
}
function dodeleteIn(){
    greatNum = document.getElementById('greatNum').innerHTML; //找按讚數的空間
    // alert(greatNum);
    deleteinformation = parseInt(greatNum) - 1; //按一次減一
    // alert(deleteinformation);
    // // alert(addinformation);
    document.getElementById('greatNum').innerHTML = deleteinformation; //放入讚數空間
    //---------
    document.getElementById('spanNum').innerHTML = '按讚'; //放入讚數空間
    // alert('ok');
    document.getElementById("Numthumb").style.backgroundColor='#fbb03b';
    document.getElementById('imgNum').style.transform = "rotate(0deg)";

}
window.addEventListener('load',doFirst);



