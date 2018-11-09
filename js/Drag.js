var clickItem;
function doFirst(){	
	zoomInButton = document.getElementById('zoomInButton');
	zoomOutButton = document.getElementById('zoomOutButton');
	rotateLeftButton = document.getElementById('rotateLeftButton');
	rotateRightButton = document.getElementById('rotateRightButton');
	deleteButton = document.getElementById('deleteButton');
	document.getElementById('uploadButton').onchange = fileChange;
	PicClick = document.getElementById('diy_designBottle_diyImg');
	TextClick = document.getElementById('diy_designBottle_dragText');
	//圖片或文字被點擊
	PicClick.addEventListener('click',choosePic);
	TextClick.addEventListener('click',chooseText);
	zoomInButton.addEventListener('click',zoomIn);
	zoomOutButton.addEventListener('click',zoomOut);
	rotateLeftButton.addEventListener('click',rotateL);
	rotateRightButton.addEventListener('click',rotateR);
	deleteButton.addEventListener('click',deletefile);
}	 
//變數
	function choosePic() {
		//更改變數的值
		 clickItem=  "#diy_designBottle_diyImg";

	}
	function chooseText() {
		//更改變數的值
		 clickItem=  "#diy_designBottle_dragText";
	}
	function zoomIn(){
		if (clickItem) {
			let size = getScale();
			let degree = getDegree();
			if (clickItem == '#diy_designBottle_diyImg' ) {
				size += 0.1;
			} else {
				size += 0.05;
			}
			$(clickItem).css("transform","scale(" + size + ")" + " rotate(" + degree + "deg)");
		}
	};
	function zoomOut(){
		if (clickItem) {
			let size = getScale();
			let degree = getDegree();
			if (clickItem == '#diy_designBottle_diyImg' ) {
				size -= 0.1;
			} else {
				size -= 0.05;
			}
			$(clickItem).css("transform","scale(" + size + ")" + " rotate(" + degree + "deg)");
		}
	};
	function rotateL(){	
		if (clickItem) {
			let size = getScale();
			let degree = getDegree();
			if (clickItem == '#diy_designBottle_diyImg' ) {
				degree -= 20;
			} else {
				degree -= 5;
			}
			$(clickItem).css("transform","scale(" + size + ")" + " rotate(" + degree + "deg)");
		}
	};
	function rotateR(){
		if (clickItem) {
			let size = getScale();
			let degree = getDegree();
			if (clickItem == '#diy_designBottle_diyImg' ) {
				degree += 20;
			} else {
				degree += 5;
			}
			$(clickItem).css("transform","scale(" + size + ")" + " rotate(" + degree + "deg)");
		}
	};
	function getScale() {
		var matches =/(-?\d+)(\.\d+)?/gi;
		var transform = $(clickItem)[0].style.transform;
		return Number(transform.match(matches)[0]);
	}
	function getDegree() {
		var matches =/(-?\d+)(\.\d+)?/gi;
		var transform = $(clickItem)[0].style.transform;
		return Number(transform.match(matches)[1]);
	}
	function deletefile(){	
		if (clickItem == '#diy_designBottle_diyImg' ) {
			var image = document.getElementById('diy_designBottle_diyImg');
			image.src = "";
		} else {
			$(clickItem).empty();
			$(clickItem).css('color','#000');
		}
	};
	function change(img){
		let image = document.getElementById('diy_designBottle_diyImg');
		image.src = img.src;
		image.style.maxWidth = '60px';
		image.style.transform='scale(1) rotate(0deg)';
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
		body.style.color="#000";
		body.style.transform="scale(1) rotate(0deg)";
		var newText = document.createElement("p");
		var text = document.createTextNode(e);
        newText.appendChild(text);
        body.appendChild(newText);
    };
window.addEventListener('load',doFirst);

