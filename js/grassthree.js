function strToHex(strthree){
	strthree=strthree.replace("#","0x");
	return(strthree);
}

var Color3 = net.brehaut.Color;

// 抓左邊的草
canvasthree  = document.getElementById("canvasthree");
ctxll = canvasthree.getContext('2d');


Blade2=function(x,y,w,h,c){
  this.displacement = 0
  this.x=x;
  this.y=y;
  this.w=w;
  this.h=h;
  
  this.tightness=0.4+Math.random();
  this.c=Color3(c).shiftHue(Math.random()*5).darkenByAmount(Math.random()/50).desaturateByAmount(Math.random()/5);
}

Blade2.prototype.draw=function(){
  ctxll.fillStyle=this.c;
  
  ctxll.beginPath();
  ctxll.moveTo(this.x - this.w/2, this.y); //left point
  ctxll.lineTo(this.x + this.displacement*this.tightness, this.y - this.h); //top point
  ctxll.lineTo(this.x + this.w/2, this.y); //right point
  ctxll.closePath();
  ctxll.fill();
}

Blade2.prototype.update=function(){
  this.displacement=Math.sin(osc3/20)*10;
}

var osc3=0;
var grassthree=new Array();
// 第一個草
for(var i=0;i<9;i++)
grassthree.push(new Blade2(185+i*30,400,40+Math.random()*10,60+Math.random()*40,"yellowgreen"));
// 二個草
for(var i=0;i<10;i++){
  grassthree.push(new Blade2(170+i*30,400,30+Math.random()*10,60+Math.random()*30,"greenyellow"));
}

draw = function(){
  ctxll.fillStyle="#a4ddfa";
  ctxll.fillRect ( 0 , 0 , canvasthree.width, canvasthree.height );
  
  for(i=0;i<grassthree.length;i++)
    grassthree[i].draw();
}

update=function(){
    osc3++;
    for(i=0;i<grassthree.length;i++)
      grassthree[i].update();
}
console.log('canvasthree');

setInterval( draw, 1000/60);
setInterval( update, 1000/60);
