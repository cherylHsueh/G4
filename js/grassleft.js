function strToHex(strtwo){
	strtwo=strtwo.replace("#","0x");
	return(strtwo);
}

var Color2 = net.brehaut.Color;

// 抓左邊的草
canvastwo  = document.getElementById("canvastwo");
ctxl = canvastwo.getContext('2d');


Blade2=function(x,y,w,h,c){
  this.displacement = 0
  this.x=x;
  this.y=y;
  this.w=w;
  this.h=h;
  
  this.tightness=0.4+Math.random();
  this.c=Color2(c).shiftHue(Math.random()*5).darkenByAmount(Math.random()/50).desaturateByAmount(Math.random()/5);
}

Blade2.prototype.draw=function(){
  ctxl.fillStyle=this.c;
  
  ctxl.beginPath();
  ctxl.moveTo(this.x - this.w/2, this.y); //left point
  ctxl.lineTo(this.x + this.displacement*this.tightness, this.y - this.h); //top point
  ctxl.lineTo(this.x + this.w/2, this.y); //right point
  ctxl.closePath();
  ctxl.fill();
}

Blade2.prototype.update=function(){
  this.displacement=Math.sin(osc2/20)*10;
}

var osc2=0;
var grassleft=new Array();

for(var i=0;i<9;i++)
grassleft.push(new Blade2(185+i*30,300,40+Math.random()*10,60+Math.random()*40,"#009e52"));

for(var i=0;i<10;i++){
grassleft.push(new Blade2(170+i*30,300,30+Math.random()*10,60+Math.random()*30,"yellowgreen"));
}

draw = function(){
  ctxl.fillStyle="#a4ddfa";
  ctxl.fillRect ( 0 , 0 , canvastwo.width, canvastwo.height );
  
  for(i=0;i<grassleft.length;i++)
    grassleft[i].draw();
}

update=function(){
    osc2++;
    for(i=0;i<grassleft.length;i++)
      grassleft[i].update();
}
console.log('canvastwo');

setInterval( draw, 1000/60);
setInterval( update, 1000/60);
