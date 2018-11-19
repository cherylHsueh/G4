
//跳窗畫面獲取視窗
var windowHeight;
var windowWidth;
//獲取彈窗
var popWidth;
var popHeight;
function init() {
  windowHeight = $(window).height();
  windowWidth = $(window).width();
  popHeight = $(".diy_customizeFinishBox").height();
  popWidth = $(".diy_customizeFinishBox").width();
}
//定義彈出視窗的方法
function popCenterWindow() {
  init();
  //計算彈出視窗的左上角Y的偏移量
  var popY = (windowHeight - popHeight) / 2;
  var popX = (windowWidth - popWidth) / 2;
  //設定視窗的位置
  $("#center")
    .css("top", popY)
    .css("left", popX)
    .slideToggle("slow");
}
//拖拉瓶身圖片
$(function dragging() {
  $("#diy_designBottle_diyImg").draggable(
    {
      containment: "#dragRange",
      scroll: false
    } 
  );
  //拖拉瓶身文字
  $("#diy_designBottle_dragText").draggable(
    { containment: "#dragRange" },
  );
});
//文字換色
$("#picker").colpick({
  flat: false,
  layout: "rgbhex",
  color: "1080C8",
  submit: 1,
  onSubmit: function(hsb, hex, rgb, el) {
    $(".diy_designBottle_createBlock").css("color", "#" + hex);
    $(el).colpickHide();
  }
});
var type;
var picTextControll = {
    picSize: 1,
    picDegree: 0,
    textSize: 1,
    textDegree: 1
}
function doFirst() {

    //點選加入購物車
    $('#addToCartBtn').click(function(){
        $('#imgRULForm').submit();
    });

    zoomInButton = document.getElementById('zoomInButton');
    zoomOutButton = document.getElementById('zoomOutButton');
    rotateLeftButton = document.getElementById('rotateLeftButton');
    rotateRightButton = document.getElementById('rotateRightButton');
    deleteButton = document.getElementById('deleteButton');
    document.getElementById('uploadButton').onchange = fileChange;
    PicClick = document.getElementById('diy_designBottle_diyImg');
    TextClick = document.getElementById('diy_designBottle_dragText');
    //圖片或文字被點擊
    PicClick.addEventListener('click', () => {
        type = 'pic';
    });
    TextClick.addEventListener('click', () => {
        type = 'text';
    });
    zoomInButton.addEventListener('click', () => {
        refreshTarget(1, 'zoom');
    });
    zoomOutButton.addEventListener('click', () => {
        refreshTarget(-1, 'zoom');
    });
    rotateRightButton.addEventListener('click', () => {
        refreshTarget(1, 'rotate');
    });
    rotateLeftButton.addEventListener('click', () => {
        refreshTarget(-1, 'rotate');
    });
    deleteButton.addEventListener('click', deletefile);
}

function refreshTarget(num, mode) {
    if (!type) {
        return;
    }
    let size = 0;
    let degree = 0;
    if (mode == 'zoom') {
        refreshSize(num);
    } else {
        refreshDegree(num);
    }
    changeTarget();
}

function changeTarget() {
    let target = getTarget();
    let size = 0;
    let degree = 1;
    if (type == 'pic') {
        size = picTextControll.picSize;
        degree = picTextControll.picDegree;
    } else {
        size = picTextControll.textSize;
        degree = picTextControll.textDegree;
    }
    target.css("transform", "scale(" + size + ")" + " rotate(" + degree + "deg)");
}

function refreshSize(num) {
    if (type == 'pic') {
        picTextControll.picSize +=  (num * 0.1);
    } else {
        picTextControll.textSize += (num * 0.05);
    }
}

function refreshDegree(dictionary) {
    if (type == 'pic') {
        picTextControll.picDegree += (dictionary * 20);
    } else {
        picTextControll.textDegree += (dictionary * 5);
    }
}

function getTarget() {
    if (type == 'pic') {
        return $("#diy_designBottle_diyImg");
    } else {
        return $("#diy_designBottle_dragText");
    }

}

function deletefile() {
    if (!type) {
        return;
    }
    let target = getTarget();
    if (type == 'pic') {
        var image = target[0];
        image.src = "";
    } else {
        target.empty();
        target.css('color', '#000');
    }
};

function change(img) {
    let image = document.getElementById('diy_designBottle_diyImg');
    image.src = img.src;
    image.style.maxWidth = '60px';
    image.style.transform = 'rotate(0deg) scale(1) ';
    picTextControll.picSize = 1;
    picTextControll.picDegree = 0;
};

function fileChange() {
    var file = document.getElementById('uploadButton').files[0];
    var readFile = new FileReader();
    readFile.readAsDataURL(file);
    readFile.addEventListener('load', function(e) {
        var image = document.getElementById('diy_designBottle_diyImg');
        image.src = this.result;
        image.style.maxWidth = '60px';
        image.style.transform = 'scale(1) rotate(0deg)';
        picTextControll.picDegree = 0;
    });
};
//新增文字	
function createText(e) {
    var body = document.getElementsByClassName("diy_designBottle_createBlock")[0];
    body.innerHTML = "";
    body.style.color = "#000";
    picTextControll.textSize = 1;
    picTextControll.textDegree = 0;
    body.style.transform = "scale(1) rotate(0deg)";
    var newText = document.createElement("p");
    var text = document.createTextNode(e);
    newText.appendChild(text);
    body.appendChild(newText);
};


//點選官方logo切換
$(document).ready(function() {
  $("#uploadButton").on("change", function() {
    for (var i = 0; i < $(".diy_designBottle_officalPic").length; i++) {
      $("#diy_designBottle_Logo").val("");
      $(".diy_designBottle_officalPic")
        .eq(i)
        .css("backgroundColor", "transparent");
    }
  });
});

window.addEventListener('load', doFirst);