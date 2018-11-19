function doFirst(){

//留言


//create 外殼
blogIn_Msg_SendWrapper = document.createElement('div');
blogIn_Msg_SendWrapper.className = 'blogIn_Msg_SendWrapper clearfix';
document.getElementById('blogIn_Msg_SendBlock_id').appendChild(blogIn_Msg_SendWrapper);


//umbrella

var umbrellaMandarin = document.getElementById('blogIn_umbrellaMandarin');
umbrellaMandarin.addEventListener('click', function () {
umbrellaMandarin.classList.add('umbrellaMandarin_active');
})


// 每章文章

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




};

window.addEventListener('load',doFirst);












//新增留言
function addItem() {

    blogIn_Msg_SendWrapper = document.createElement('div');
    blogIn_Msg_SendWrapper.className = 'blogIn_Msg_SendWrapper clearfix';

    //create imagearea
    var blogIn_Msg_SendBox = document.createElement('div');
    blogIn_Msg_SendBox.className = 'blogIn_Msg_SendBox cl-s-2 cl-md-2';

    var blogIn_Msg_SendPic = document.createElement('div');
    blogIn_Msg_SendPic.className = 'blogIn_Msg_SendPic';
    var image = document.createElement('img');
    var msgimage = document.getElementById('loginImg').getAttribute('src');
    // alert(msgimage);
    image.src = msgimage;
    // alert(image.src);
    image.alt = '留言者';

    var memName = document.createElement('p');
    memName.className = 'blogmemname';
    var msgmemname = document.getElementById('loginName').innerHTML;
    // alert(msgmemname);
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
    subButtonItem.type = 'button';
    // var hid =document.getElementById('hidmesNo').value;
    subButtonItem.id = 'Num'+ mesno;
    subButtonItem.className = 'blogIn_Msg_SendBox subButtonItem reportNum cl-s-2 cl-md-1';
    subButtonItem.href = 'javascript:;';
    subButtonItem.value = '檢舉';
    blogIn_Msg_SendWrapper.appendChild(subButtonItem);


    //hidden1
    var hidButtonItem1 = document.createElement('input');
    hidButtonItem1.type = 'hidden';
    // var hid =document.getElementById('hidmesNo').value;
    hidButtonItem1.id = 'FqNum'+ mesno;
    // alert(hidButtonItem1.id);
    hidButtonItem1.value = '0';
    // alert(hidButtonItem1.value);
    blogIn_Msg_SendWrapper.appendChild(hidButtonItem1);

    //hidden2
    var hidButtonItem2 = document.createElement('input');
    hidButtonItem2.type = 'hidden';
    hidButtonItem2.id = 'mesNum'+ mesno;
    hidButtonItem2.value = mesno;
    blogIn_Msg_SendWrapper.appendChild(hidButtonItem2);

}


//按讚

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

