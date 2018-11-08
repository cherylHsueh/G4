
function doFirst() { // wait for document ready
  
  var controller = new ScrollMagic.Controller();

  var horizontalSlide = new TimelineMax();
  // animate panels
  horizontalSlide.to("#js-slideContainer", 13,   {x: "-5%"})	
  .to("#js-slideContainer", 13,   {x: "-20%"})
  .to("#js-slideContainer", 13,   {x: "-30%"})
  .to("#js-slideContainer", 13,   {x: "-40%"})
  .to("#js-slideContainer", 13,   {x: "-50%"})
  .to("#js-slideContainer", 13,   {x: "-60%"})
  .to("#js-slideContainer", 13,   {x: "-70%"})
  .to("#js-slideContainer", 13,   {x: "-80%"});


  // create scene to pin and link animation
  new ScrollMagic.Scene({
    triggerElement: "#js-wrapper",
    triggerHook: "onLeave",
    duration: "400%"
  })
    .setPin("#js-wrapper")
    .setTween(horizontalSlide)
    //.addIndicators() // add indicators (requires plugin)
    .addTo(controller);
  
  
  
};
window.addEventListener('load',doFirst);