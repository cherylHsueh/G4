
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
    document.getElementById('blogIn_Msg_SendBlock_id').appendChild(blogIn_Msg_SendWrapper);

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

    // var memname = document.getElementById('blogIn_Msg_SendBlock_id');
    // var memchild = memname.lastChild;
    // console.log(memchild);

    blogIn_Msg_SendWrapper = document.createElement('div');
    blogIn_Msg_SendWrapper.className = 'blogIn_Msg_SendWrapper clearfix';

    //create imagearea
    var blogIn_Msg_SendBox = document.createElement('div');
    blogIn_Msg_SendBox.className = 'blogIn_Msg_SendBox cl-s-2 cl-md-2';

    var blogIn_Msg_SendPic = document.createElement('div');
    blogIn_Msg_SendPic.className = 'blogIn_Msg_SendPic';
    var image = document.createElement('img');
    var memImg = document.getElementById('blogIn_Msg_MesNo').value;
    alert(memImg);
    var memsrc = 'images/member/photo/'+memImg
    alert(memsrc);
    image.src = memsrc;
    alert(image.src);
    image.alt = '留言者';

    var memName = document.createElement('p');
    memName.className = 'blogmemname';
    var msgmemname = document.getElementById('loginName').innerHTML;
    alert(msgmemname);
    memName.innerHTML =msgmemname;

    document.getElementById('blogIn_Msg_SendBlock_id').appendChild(blogIn_Msg_SendWrapper);
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
    subButtonItem.className = 'blogIn_Msg_SendBox subButtonItem reportNum cl-s-2 cl-md-1';
    subButtonItem.href = 'javascript:;';
    subButtonItem.value = '檢舉';

    blogIn_Msg_SendWrapper.appendChild(subButtonItem);

    // getmemName();


}

// function getmemName(){
//     var memname = document.getElementById('blogIn_Msg_SendBlock_id');
//     var memchild = memname.lastElementChild;
//     console.log(memchild);
// }


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

$(document).ready(function(){
    // alert('ok');
    mobileturn();
    $('.blog_Rank_Container').click(mobileturn);
});

    var mobileturn = function(){
    if ($(this).attr('data-rank') == 2) {
        // alert('ok');
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
}


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

// $("#picture").change(function(){
//     checkImage( this );
//     alert('ok');
//   });
// function checkImage(input) {
//       var filePath = input.value;
//       if(filePath){
//           //读取图片数据
//           var filePic = input.files[0];
//           var reader = new FileReader();
//           reader.onload = function (e) {
//               var data = e.target.result;
//               alert(data);
//               //加载图片获取图片真实宽度和高度
//               var image = new Image();
//               image.onload=function(){
//                   var width = image.width;
//                   var height = image.height;
//                   if (width <= 300 | height <= 300){
//                       alert("圖檔上傳成功"); 
//                       if ( input.files && input.files[0] ) {
//                           var FR= new FileReader();
//                           FR.onload = function(e) {
//                           //e.target.result = base64 format picture
//                           $('#viewImg').attr( "src", e.target.result );
//                           $('#viewImg').addClass('imgSize');
//                           $('.upload').css( "display","none");
//                         //   $('.upload').addClass( "upload_active");
//                           };       
//                           FR.readAsDataURL( input.files[0] );
//                       }
//                   }else {
//                       alert("圖檔尺寸不符，尺寸應為300*300！");
//                       file.value = "";
//                       return false;
//                   }
//               };
//               image.src= reader.result;
              
//           };
//           reader.readAsDataURL(filePic);
         
//       }else{
//           return false;
//       }
//   }


// document.getElementById('picture').onchange=function(e){
//     box = document.getElementById('viewImg');
//     box.textContent=''
//     var file = e.target.files[0];
//     var reader = new FileReader();
//     reader.onload=function(){
//      var image = document.createElement('img');
//      box.appendChild(image);
//      image.src=reader.result;
//      image.style.width='150px';
//      document.getElementById('viewImg').classList.add('imgSize');
//      document.getElementById('upLoad').classList.add( "upload_active");
                 
//     };
//     reader.readAsDataURL(file);
//    };


//   $("#uploadBtn").click(function(){
//     alert( '上傳成功' );
//   });


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
function doreport(){
    document.getElementById("ReportNum").style.backgroundColor='#90A30B';
}
window.addEventListener('load',doFirst);








//柱狀圖

//前三名

function chart() {
    mychart1 = document.getElementsByClassName("chartcanvas")[0].id;
    chartratio1 = document.getElementsByClassName("chartratio1")[0].value;
    chartratio2 = document.getElementsByClassName("chartratio2")[0].value;
    chartratio3 = document.getElementsByClassName("chartratio3")[0].value;
    chartcal1 = document.getElementsByClassName("chartCal1")[0].value;
    chartcal2 = document.getElementsByClassName("chartCal2")[0].value;
    chartcal3 = document.getElementsByClassName("chartCal3")[0].value;
    chartiron1 = document.getElementsByClassName("chartIron1")[0].value;
    chartiron2 = document.getElementsByClassName("chartIron2")[0].value;
    chartiron3 = document.getElementsByClassName("chartIron3")[0].value;
    chartfiber1 = document.getElementsByClassName("chartFiber1")[0].value;
    chartfiber2 = document.getElementsByClassName("chartFiber2")[0].value;
    chartfiber3 = document.getElementsByClassName("chartFiber3")[0].value;
    chartvinc1 = document.getElementsByClassName("chartVinc1")[0].value;
    chartvinc2 = document.getElementsByClassName("chartVinc2")[0].value;
    chartvinc3 = document.getElementsByClassName("chartVinc3")[0].value;
    frcal1 = chartratio1 * chartcal1;
    frcal2 = chartratio2 * chartcal2;
    frcal3 = chartratio3 * chartcal3;
    tcal = frcal1 + frcal2 + frcal3;
    friron1 = chartratio1 * chartiron1;
    friron2 = chartratio2 * chartiron2;
    friron3 = chartratio3 * chartiron3;
    tiron = friron1 + friron2 + friron3;
    frfiber1 = chartratio1 * chartfiber1;
    frfiber2 = chartratio2 * chartfiber2;
    frfiber3 = chartratio3 * chartfiber3;
    tfiber = frfiber1 + frfiber2 + frfiber3;
    frvinc1 = chartratio1 * chartvinc1;
    frvinc2 = chartratio2 * chartvinc2;
    frvinc3 = chartratio3 * chartvinc3;
    tvinc = frvinc1 + frvinc2 + frvinc3;
    
    var ctx = document.getElementById(mychart1);
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['熱量', '纖維', '維他命', '鐵質'],
            datasets: [{
                label: ['果汁成分 (cal)', '熱量(cal)'],
                data: [tcal, tfiber ,tvinc, tiron],
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
    


    mychart2 = document.getElementsByClassName("chartcanvas")[1].id;
    chartratio21 = document.getElementsByClassName("chartratio1")[1].value;
    chartratio22 = document.getElementsByClassName("chartratio2")[1].value;
    chartratio23 = document.getElementsByClassName("chartratio3")[1].value;
    chartcal21 = document.getElementsByClassName("chartCal1")[1].value;
    chartcal22 = document.getElementsByClassName("chartCal2")[1].value;
    chartcal23 = document.getElementsByClassName("chartCal3")[1].value;
    chartiron21 = document.getElementsByClassName("chartIron1")[1].value;
    chartiron22 = document.getElementsByClassName("chartIron2")[1].value;
    chartiron23 = document.getElementsByClassName("chartIron3")[1].value;
    chartfiber21 = document.getElementsByClassName("chartFiber1")[1].value;
    chartfiber22 = document.getElementsByClassName("chartFiber2")[1].value;
    chartfiber23 = document.getElementsByClassName("chartFiber3")[1].value;
    chartvinc21 = document.getElementsByClassName("chartVinc1")[1].value;
    chartvinc22 = document.getElementsByClassName("chartVinc2")[1].value;
    chartvinc23 = document.getElementsByClassName("chartVinc3")[1].value;
    frcal21 = chartratio21 * chartcal21;
    frcal22 = chartratio22 * chartcal22;
    frcal23 = chartratio23 * chartcal23;
    tcal2 = frcal21 + frcal22 + frcal23;
    friron21 = chartratio21 * chartiron21;
    friron22 = chartratio22 * chartiron22;
    friron23 = chartratio23 * chartiron23;
    tiron2 = friron21 + friron22 + friron23;
    frfiber21 = chartratio21 * chartfiber21;
    frfiber22 = chartratio22 * chartfiber22;
    frfiber23 = chartratio23 * chartfiber23;
    tfiber2 = frfiber21 + frfiber22 + frfiber23;
    frvinc21 = chartratio21 * chartvinc21;
    frvinc22 = chartratio22 * chartvinc22;
    frvinc23 = chartratio23 * chartvinc23;
    tvinc2 = frvinc21 + frvinc22 + frvinc23;
    var ctx = document.getElementById(mychart2);
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['熱量', '纖維', '維他命', '鐵質'],
            datasets: [{
                label: ['果汁成分 (cal)', '熱量(cal)'],
                data: [tcal2,tfiber2,tvinc2,tiron2],
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


    mychart3 = document.getElementsByClassName("chartcanvas")[2].id;
    chartratio31 = document.getElementsByClassName("chartratio1")[2].value;
    chartratio32 = document.getElementsByClassName("chartratio2")[2].value;
    chartratio33 = document.getElementsByClassName("chartratio3")[2].value;
    chartcal31 = document.getElementsByClassName("chartCal1")[2].value;
    chartcal32 = document.getElementsByClassName("chartCal2")[2].value;
    chartcal33 = document.getElementsByClassName("chartCal3")[2].value;
    chartiron31 = document.getElementsByClassName("chartIron1")[2].value;
    chartiron32 = document.getElementsByClassName("chartIron2")[2].value;
    chartiron33 = document.getElementsByClassName("chartIron3")[2].value;
    chartfiber31 = document.getElementsByClassName("chartFiber1")[2].value;
    chartfiber32 = document.getElementsByClassName("chartFiber2")[2].value;
    chartfiber33 = document.getElementsByClassName("chartFiber3")[2].value;
    chartvinc31 = document.getElementsByClassName("chartVinc1")[2].value;
    chartvinc32 = document.getElementsByClassName("chartVinc2")[2].value;
    chartvinc33 = document.getElementsByClassName("chartVinc3")[2].value;
    frcal31 = chartratio31 * chartcal31;
    frcal32 = chartratio32 * chartcal32;
    frcal33 = chartratio33 * chartcal33;
    tcal3 = frcal31 + frcal32 + frcal33;
    friron31 = chartratio31 * chartiron31;
    friron32 = chartratio32 * chartiron32;
    friron33 = chartratio33 * chartiron33;
    tiron3 = friron31 + friron32 + friron33;
    frfiber31 = chartratio31 * chartfiber31;
    frfiber32 = chartratio32 * chartfiber32;
    frfiber33 = chartratio33 * chartfiber33;
    tfiber3 = frfiber31 + frfiber32 + frfiber33;
    frvinc31 = chartratio31 * chartvinc31;
    frvinc32 = chartratio32 * chartvinc32;
    frvinc33 = chartratio33 * chartvinc33;
    tvinc3 = frvinc31 + frvinc32 + frvinc33;
    var ctx = document.getElementById(mychart3);
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['熱量', '纖維', '維他命', '鐵質'],
            datasets: [{
                label: ['果汁成分 (cal)', '熱量(cal)'],
                data: [tcal3, tfiber3, tvinc3, tiron3],
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

    mychartM1 = document.getElementsByClassName("chartcanvasM")[0].id;
    chartratio1M = document.getElementsByClassName("chartratio1M")[0].value;
    chartratio2M = document.getElementsByClassName("chartratio2M")[0].value;
    chartratio3M = document.getElementsByClassName("chartratio3M")[0].value;
    chartcal1M = document.getElementsByClassName("chartCal1M")[0].value;
    chartcal2M = document.getElementsByClassName("chartCal2M")[0].value;
    chartcal3M = document.getElementsByClassName("chartCal3M")[0].value;
    chartiron1M = document.getElementsByClassName("chartIron1M")[0].value;
    chartiron2M = document.getElementsByClassName("chartIron2M")[0].value;
    chartiron3M = document.getElementsByClassName("chartIron3M")[0].value;
    chartfiber1M = document.getElementsByClassName("chartFiber1M")[0].value;
    chartfiber2M = document.getElementsByClassName("chartFiber2M")[0].value;
    chartfiber3M = document.getElementsByClassName("chartFiber3M")[0].value;
    chartvinc1M = document.getElementsByClassName("chartVinc1M")[0].value;
    chartvinc2M = document.getElementsByClassName("chartVinc2M")[0].value;
    chartvinc3M = document.getElementsByClassName("chartVinc3M")[0].value;
    frcal1M = chartratio1M * chartcal1M;
    frcal2M = chartratio2M * chartcal2M;
    frcal3M = chartratio3M * chartcal3M;
    tcalM = frcal1M + frcal2M + frcal3M;
    friron1M = chartratio1M * chartiron1M;
    friron2M = chartratio2M * chartiron2M;
    friron3M = chartratio3M * chartiron3M;
    tironM = friron1M + friron2M + friron3M;
    frfiber1M = chartratio1M * chartfiber1M;
    frfiber2M = chartratio2M * chartfiber2M;
    frfiber3M = chartratio3M * chartfiber3M;
    tfiberM = frfiber1M + frfiber2M + frfiber3M;
    frvinc1M = chartratio1M * chartvinc1M;
    frvinc2M = chartratio2M * chartvinc2M;
    frvinc3M = chartratio3M * chartvinc3M;
    tvincM = frvinc1M + frvinc2M + frvinc3M;
    var ctx = document.getElementById(mychartM1);
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['熱量', '纖維', '維他命', '鐵質'],
            datasets: [{
                label: ['果汁成分 (cal)', '熱量(cal)'],
                data: [tcalM, tfiberM,tvincM, tironM],
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
    


    mychartM2 = document.getElementsByClassName("chartcanvasM")[1].id;
    chartratio1M2 = document.getElementsByClassName("chartratio1M")[1].value;
    chartratio2M2 = document.getElementsByClassName("chartratio2M")[1].value;
    chartratio3M2 = document.getElementsByClassName("chartratio3M")[1].value;
    chartcal1M2 = document.getElementsByClassName("chartCal1M")[1].value;
    chartcal2M2 = document.getElementsByClassName("chartCal2M")[1].value;
    chartcal3M2 = document.getElementsByClassName("chartCal3M")[1].value;
    chartiron1M2 = document.getElementsByClassName("chartIron1M")[1].value;
    chartiron2M2 = document.getElementsByClassName("chartIron2M")[1].value;
    chartiron3M2 = document.getElementsByClassName("chartIron3M")[1].value;
    chartfiber1M2 = document.getElementsByClassName("chartFiber1M")[1].value;
    chartfiber2M2 = document.getElementsByClassName("chartFiber2M")[1].value;
    chartfiber3M2 = document.getElementsByClassName("chartFiber3M")[1].value;
    chartvinc1M2 = document.getElementsByClassName("chartVinc1M")[1].value;
    chartvinc2M2 = document.getElementsByClassName("chartVinc2M")[1].value;
    chartvinc3M2 = document.getElementsByClassName("chartVinc3M")[1].value;
    frcal1M2 = chartratio1M2 * chartcal1M2;
    frcal2M2 = chartratio2M2 * chartcal2M2;
    frcal3M2 = chartratio3M2 * chartcal3M2;
    tcalM2 = frcal1M2 + frcal2M2 + frcal3M2;
    friron1M2 = chartratio1M2 * chartiron1M2;
    friron2M2 = chartratio2M2 * chartiron2M2;
    friron3M2 = chartratio3M2 * chartiron3M2;
    tironM2 = friron1M2 + friron2M2 + friron3M2;
    frfiber1M2 = chartratio1M2 * chartfiber1M2;
    frfiber2M2 = chartratio2M2 * chartfiber2M2;
    frfiber3M2 = chartratio3M2 * chartfiber3M2;
    tfiberM2 = frfiber1M2 + frfiber2M2 + frfiber3M2;
    frvinc1M2 = chartratio1M2 * chartvinc1M2;
    frvinc2M2 = chartratio2M2 * chartvinc2M2;
    frvinc3M2 = chartratio3M2 * chartvinc3M2;
    tvincM2 = frvinc1M2 + frvinc2M2 + frvinc3M2;
    var ctx = document.getElementById(mychartM2);
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['熱量', '纖維', '維他命', '鐵質'],
            datasets: [{
                label: ['果汁成分 (cal)', '熱量(cal)'],
                data: [tcalM2,tfiberM2,tvincM2,tironM2],
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


    mychartM3 = document.getElementsByClassName("chartcanvasM")[2].id;
    chartratio1M3 = document.getElementsByClassName("chartratio1M")[2].value;
    chartratio2M3 = document.getElementsByClassName("chartratio2M")[2].value;
    chartratio3M3 = document.getElementsByClassName("chartratio3M")[2].value;
    chartcal1M3 = document.getElementsByClassName("chartCal1M")[2].value;
    chartcal2M3 = document.getElementsByClassName("chartCal2M")[2].value;
    chartcal3M3 = document.getElementsByClassName("chartCal3M")[2].value;
    chartiron1M3 = document.getElementsByClassName("chartIron1M")[2].value;
    chartiron2M3 = document.getElementsByClassName("chartIron2M")[2].value;
    chartiron3M3 = document.getElementsByClassName("chartIron3M")[2].value;
    chartfiber1M3 = document.getElementsByClassName("chartFiber1M")[2].value;
    chartfiber2M3 = document.getElementsByClassName("chartFiber2M")[2].value;
    chartfiber3M3 = document.getElementsByClassName("chartFiber3M")[2].value;
    chartvinc1M3 = document.getElementsByClassName("chartVinc1M")[2].value;
    chartvinc2M3 = document.getElementsByClassName("chartVinc2M")[2].value;
    chartvinc3M3 = document.getElementsByClassName("chartVinc3M")[2].value;
    frcal1M3 = chartratio1M3 * chartcal1M3;
    frcal2M3 = chartratio2M3 * chartcal2M3;
    frcal3M3 = chartratio3M3 * chartcal3M3;
    tcalM3 = frcal1M3 + frcal2M3 + frcal3M3;
    friron1M3 = chartratio1M3 * chartiron1M3;
    friron2M3 = chartratio2M3 * chartiron2M3;
    friron3M3 = chartratio3M3 * chartiron3M3;
    tironM3 = friron1M3 + friron2M3 + friron3M3;
    frfiber1M3 = chartratio1M3 * chartfiber1M3;
    frfiber2M3 = chartratio2M3 * chartfiber2M3;
    frfiber3M3 = chartratio3M3 * chartfiber3M3;
    tfiberM3 = frfiber1M3 + frfiber2M3 + frfiber3M3;
    frvinc1M3 = chartratio1M3 * chartvinc1M3;
    frvinc2M3 = chartratio2M3 * chartvinc2M3;
    frvinc3M3 = chartratio3M3 * chartvinc3M3;
    tvincM3 = frvinc1M3 + frvinc2M3 + frvinc3M3;
    var ctx = document.getElementById(mychartM3);
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['熱量', '纖維', '維他命', '鐵質'],
            datasets: [{
                label: ['果汁成分 (cal)', '熱量(cal)'],
                data: [tcalM3, tfiberM3, tvincM3, tironM3],
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



   
};

window.addEventListener('load', chart);

// 每章文章
function blogchart(){

    blogratio1 = document.getElementById("blogratio1").value;
    blogratio2 = document.getElementById("blogratio2").value;
    blogratio3 = document.getElementById("blogratio3").value;
    blogcal1 = document.getElementById("blogcal1").value;
    blogcal2 = document.getElementById("blogcal2").value;
    blogcal3 = document.getElementById("blogcal3").value;
    blogiron1 = document.getElementById("blogiron1").value;
    blogiron2 = document.getElementById("blogiron2").value;
    blogiron3 = document.getElementById("blogiron3").value;
    blogfiber1 = document.getElementById("blogfiber1").value;
    blogfiber2 = document.getElementById("blogfiber2").value;
    blogfiber3 = document.getElementById("blogfiber3").value;
    blogvinc1 = document.getElementById("blogvinc1").value;
    blogvinc2 = document.getElementById("blogvinc2").value;
    blogvinc3 = document.getElementById("blogvinc3").value;
    bfrcal1 = blogratio1 * blogcal1;
    bfrcal2 = blogratio2 * blogcal2;
    bfrcal3 = blogratio3 * blogcal3;
    btcal = bfrcal1 + bfrcal2 + bfrcal3;
    bfriron1 = blogratio1 * blogiron1;
    bfriron2 = blogratio2 * blogiron2;
    bfriron3 = blogratio3 * blogiron3;
    btiron = bfriron1 + bfriron2 + bfriron3;
    bfrfiber1 = blogratio1 * blogfiber1;
    bfrfiber2 = blogratio2 * blogfiber2;
    bfrfiber3 = blogratio3 * blogfiber3;
    btfiber = bfrfiber1 + bfrfiber2 + bfrfiber3;
    bfrvinc1 = blogratio1 * blogvinc1;
    bfrvinc2 = blogratio2 * blogvinc2;
    bfrvinc3 = blogratio3 * blogvinc3;
    btvinc = bfrvinc1 + bfrvinc2 + bfrvinc3;

    var ctx = document.getElementById('blogmyChart');
    var mychartq = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['熱量', '纖維', '維他命', '鐵質'],
            datasets: [{
                label: ['果汁成分 (cal)', '熱量(cal)'],
                data: [ btcal, btfiber, btvinc, btiron],
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

}
window.addEventListener('load', blogchart);


//上傳文章比例條

//比例拖拉

window.addEventListener('load', ratio);
function ratio(){
    // alert('ok');
    var cursor1 = document.getElementById('cursor1');
    var cursor2 = document.getElementById('cursor2');
    
    cursor1.onmousedown = down;
    cursor2.onmousedown = down;

}
//點擊比例拖拉事件
function down(e){
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
    document.onmousemove = move;
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
                        cursor.style.left = 0 + 'px';
                    }else{
                        cursor.style.left = (x) + 'px';
                    }
            }else{
                // alert(boxWidth);
                if(x>=boxWidth){
                    cursor.style.left = boxWidth-15 + 'px';
                }else if(x<=cursor1.offsetLeft){
                    cursor.style.left = cursor1.offsetLeft + 'px';
                }else{
                    cursor.style.left = x + 'px';
                }
            }
            proportion1 = parseInt(cursor1.offsetLeft)/ boxWidth;
            proportion2 = (parseInt(cursor2.offsetLeft) - parseInt(cursor1.offsetLeft))/ boxWidth;
            proportion3 =(boxWidth - parseInt(cursor2.offsetLeft))/ boxWidth;
            // alert(boxWidth+','+proportion1+','+proportion2+','+proportion3);

            var fruitratio1 = proportion1.toFixed(3);
            var fruitratio2 = proportion2.toFixed(3);
            var fruitratio3 = proportion3.toFixed(3);
            // console.log(fruitratio);

            $('#fruitRatio1').attr("value",fruitratio1);
            $('#fruitRatio2').attr("value",fruitratio2);
            $('#fruitRatio3').attr("value",fruitratio3);
        };
    };
//放開滑鼠事件
    document.onmouseup = function(){
        dragging = false;
    };
 };