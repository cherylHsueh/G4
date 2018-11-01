function doFirst() {
    //canvus導覽列	
        wave("#wave", "#ddd");
        wave("#wave2", "rgba(244, 214, 109, 1)");
        function wave(a, b) {
            var a = document.querySelector(a);
            console.log(a);
            var c = a.getContext("2d");
            c.beginPath(),
            c.shadowBlur = 50,
            c.shadowColor = "#bbb",
            c.shadowOffsetY = 0,
            c.shadowOffsetX = 0,
            c.moveTo(1e3, 0),
            c.lineTo(0, 0),
            c.lineTo(0, 325),
            c.quadraticCurveTo(125, 400, 250, 325),
            c.quadraticCurveTo(375, 200, 500, 325),
            c.quadraticCurveTo(625, 400, 750, 325),
            c.quadraticCurveTo(875, 200, 1e3, 325),
            c.closePath(),
            c.fillStyle = b,
            c.fill()
        }
};
window.addEventListener('load', doFirst);


	