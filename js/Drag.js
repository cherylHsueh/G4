var degree = 0;
var size = 1;
function doFirst(){	
	zoomInButton = document.getElementById('zoomInButton');
	zoomOutButton = document.getElementById('zoomOutButton');
	rotateLeftButton = document.getElementById('rotateLeftButton');
	rotateRightButton = document.getElementById('rotateRightButton');
	deleteButton = document.getElementById('deleteButton');
	document.getElementById('uploadButton').onchange = fileChange;

	//圖片或文字被點擊
	PicClick = document.getElementById('diy_designBottle_diyImg');
	TextClick = document.getElementById('diy_designBottle_dragText');
	

	PicClick.addEventListener('click',choosePic);
	TextClick.addEventListener('click',chooseText);
	zoomInButton.addEventListener('click',zoomIn);
	zoomOutButton.addEventListener('click',zoomOut);
	rotateLeftButton.addEventListener('click',rotateL);
	rotateRightButton.addEventListener('click',rotateR);
	deleteButton.addEventListener('click',deletefile);
}	 
//變數
var clickItem=  "#diy_designBottle_diyImg";

	function choosePic() {
		//更改變數的值
		 clickItem=  "#diy_designBottle_diyImg";
	}

	function chooseText() {
		//更改變數的值
		 clickItem=  "#diy_designBottle_dragText";
	}
	function zoomIn(){
		size += 0.1;
		$(clickItem).css("transform",`scale(${size}) rotate(${degree}deg)`);
		// $("#diy_designBottle_dragText").css("transform",`scale(${size}) rotate(${degree}deg)`);
	};
	function zoomOut(){
		size -= 0.1;
		$(clickItem).css("transform",`scale(${size}) rotate(${degree}deg)`);
	};
	function rotateL(){	
		degree -= 30;
		$(clickItem).css("transform",`scale(${size}) rotate(${degree}deg)`);
	};
	function rotateR(){
		degree += 30;
		$(clickItem).css("transform",`scale(${size}) rotate(${degree}deg)`);
	};
	function deletefile(){	
		var image = document.getElementById('diy_designBottle_diyImg');
		image.src = "";
		degree = 0;
		size = 1;	
		$("#diy_designBottle_diyImg").css("transform",`rotate(${degree}deg) scale(${size})`);
		$('.diy_designBottle_officalPic').css('backgroundColor','transparent');
	};
	function change(img){
		let image = document.getElementById('diy_designBottle_diyImg');
		image.src = img.src;
		image.style.maxWidth = '60px';
	};

	function fileChange(){
		var file = document.getElementById('uploadButton').files[0];
		var readFile = new FileReader();
		readFile.readAsDataURL(file); 
		readFile.addEventListener('load',function(e){
			var image = document.getElementById('diy_designBottle_diyImg');
			image.src = this.result;
			image.style.maxWidth = '100px';
		});
	};
	//新增文字	
	function createText(e) {
        var body = document.getElementsByClassName("diy_designBottle_createBlock")[0];
		body.innerHTML="";
		var newText = document.createElement("p");
		var text = document.createTextNode(e);
        newText.appendChild(text);
        body.appendChild(newText);
    };
window.addEventListener('load',doFirst);

