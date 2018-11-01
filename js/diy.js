//柱狀圖
function chart() {
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['熱量', '纖維', '維他命', '鐵質'],
            datasets: [{
                label: ['果汁成分 (cal)', '熱量(cal)'],
                data: [0, 0, 0, 0],
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


    $(document).ready(function () {
        $('#apple').click(function () {
            // alert($('.diy_pickFruit_rightItem > p').length);
            filljuice(243, 28, 21, 0.8);
            changeData(20, 30, 40, 10);
            // toggle();
            if ($('.diy_pickFruit_rightItem > p').length < 4) {
                $('.diy_pickFruit_rightItem').append('<p class="diy_pickFruit_righItemContent">蘋果：養顏美容</p>');
                alert($('.diy_pickFruit_righItemContent').length);
            } else {
                // alert('已超過容量');
            }


            // toggle(function () {
            //     if ($('.diy_pickFruit_rightItem > p').length < 4) {
            //         $('.diy_pickFruit_rightItem').append('<p class="diy_pickFruit_righItemContent">蘋果：養顏美容</p>');
            //         alert($('.diy_pickFruit_righItemContent').length);
            //     } else {
            //         // alert('已超過容量');
            //     }
            // }, function () {
            //     $('.diy_pickFruit_rightItem').remove('<p class="diy_pickFruit_righItemContent">蘋果：養顏美容</p>');
            // });

        });

        $('#guava').click(function () {

            filljuice(158, 213, 101, 0.8);
            changeData(40, 10, 10, 20);
            if ($('.diy_pickFruit_rightItem > p').length < 4) {
                $('.diy_pickFruit_rightItem').append('<p class="diy_pickFruit_righItemContent">芭樂：含豐富維他命C</p>');
            } else {
                // alert('已超過容量');
            }

        });

        $('#grape').click(function () {

            filljuice(137, 90, 137, 0.8);
            changeData(10, 30, 10, 40);
            if ($('.diy_pickFruit_rightItem > p').length < 4) {
                $('.diy_pickFruit_rightItem').append('<p class="diy_pickFruit_righItemContent">葡萄：預防心腦血管病</p>');
            } else {
                // alert('已超過容量');
            }

        });

        $('#cantaloupe').click(function () {

            filljuice(148, 208, 164, 0.8);
            changeData(10, 30, 10, 40);
            if ($('.diy_pickFruit_rightItem > p').length < 4) {
                $('.diy_pickFruit_rightItem').append('<p class="diy_pickFruit_righItemContent">哈密瓜：養顏護眼減肥</p>');
            } else {
                // alert('已超過容量');
            }

        });

        $('#pineapple').click(function () {

            filljuice(246, 188, 41, 0.8);
            changeData(10, 30, 10, 40);
            if ($('.diy_pickFruit_rightItem > p').length < 4) {
                $('.diy_pickFruit_rightItem').append('<p class="diy_pickFruit_righItemContent">鳳梨：促進入體新陳代謝，消除疲勞</p>');
            } else {
                // alert('已超過容量');
            }
        });

        $('#tomato').click(function () {

            filljuice(228, 54, 48, 0.8);
            changeData(10, 30, 10, 40);
            if ($('.diy_pickFruit_rightItem > p').length < 4) {
                $('.diy_pickFruit_rightItem').append('<p class="diy_pickFruit_righItemContent">番茄：抗氧化劑，可以提升抵抗力</p>');
            } else {
                // alert('已超過容量');
            }
        });

        $('#watermelon').click(function () {

            filljuice(140, 198, 63, 0.8);
            changeData(10, 30, 10, 40);
            if ($('.diy_pickFruit_rightItem > p').length < 4) {
                $('.diy_pickFruit_rightItem').append('<p class="diy_pickFruit_righItemContent">西瓜：抗氧化劑，可以提升抵抗力</p>');
            } else {
                // alert('已超過容量');
            }
        });

        $('#banana').click(function () {

            filljuice(247, 210, 34, 0.8);
            changeData(10, 30, 10, 40);
            if ($('.diy_pickFruit_rightItem > p').length < 4) {
                $('.diy_pickFruit_rightItem').append('<p class="diy_pickFruit_righItemContent">香蕉：降低體內的鈉元素水平</p>');
            } else {
                // alert('已超過容量');
            }
        });

        $('#orange').click(function () {

            filljuice(247, 147, 30, 0.8);
            changeData(10, 30, 10, 40);
            if ($('.diy_pickFruit_rightItem > p').length < 4) {
                $('.diy_pickFruit_rightItem').append('<p class="diy_pickFruit_righItemContent">柳丁：生津止渴、開胃下氣、幫助消化</p>');
            } else {
                // alert('已超過容量');
            }
        });
    });




    function filljuice(r, g, b, a) {
        if ($("#diy_pickFruit_bottle1").css('background-color') == "rgba(0, 0, 0, 0)") {
            $('#diy_pickFruit_bottle1').css('background-color', 'rgba( ' + r + ',' + g + ' ,' + b + ', ' + a + ')');
            $('#diy_pickFruit_bottle1').css('flex-grow', '1');
        } else if ($("#diy_pickFruit_bottle2").css('background-color') == "rgba(0, 0, 0, 0)") {
            $('#diy_pickFruit_bottle2').css('background-color', 'rgba( ' + r + ',' + g + ' ,' + b + ', ' + a + ')');
            $('#diy_pickFruit_bottle2').css('flex-grow', '1');
        } else if ($("#diy_pickFruit_bottle3").css('background-color') == "rgba(0, 0, 0, 0)") {
            $('#diy_pickFruit_bottle3').css('background-color', 'rgba( ' + r + ',' + g + ' ,' + b + ', ' + a + ')');
            $('#diy_pickFruit_bottle3').css('flex-grow', '1');
        } else {
            alert("果汁已經滿了哦!");
        }
    }

    function changeData(n1, n2, n3, n4) {
        var data0 = myChart.data.datasets[0].data[0];
        var data1 = myChart.data.datasets[0].data[1];
        var data2 = myChart.data.datasets[0].data[2];
        var data3 = myChart.data.datasets[0].data[3];

        myChart.data.datasets[0].data = [data0 + n1, data1 + n2, data2 + n3, data3 + n4];
        //更新
        if ($("#diy_pickFruit_bottle1").css('background-color') == "rgba(0, 0, 0, 0)") {
            myChart.update();
        } else if ($("#diy_pickFruit_bottle2").css('background-color') == "rgba(0, 0, 0, 0)") {
            myChart.update();
        } else if ($("#diy_pickFruit_bottle3").css('background-color') == "rgba(0, 0, 0, 0)") {
            myChart.update();
        }
    }


    $(function () {
        $(".logoimg").draggable({
            containment: ".juicebottle"
        });
    });

    $('#needimg').click(function () {
        $('.logoimg').show();
    });

}
window.addEventListener('load', chart);

//挑選水果
$(document).ready(function () {
    var _index = 0;
    $('.fruiticon').mousemove(function () {
        // alert($(this).parent().parent().attr('class'));
        // alert('.fruitname' + $(this).attr('id'));
        _index = $(this).index();
        // $(this).after('<img class="highlight" src="images/hightlight.png" alt="已選到">');
        // $(this).wrap('<div class="fruitbgc"></div>');
        $(this).after('<div class="fruitnameBox"></div>');
        // bgc = '.diy_pickFruit_leftItem' + $(this).attr('id');
        // $(bgc).css('background-color', "rgb(199, 129, 50)");
        // $(this).parent().parent().addClass('fruitbgc');
        $(this).parent().addClass('fruitbgc');
        name = '.fruitname' + $(this).attr('id');
        $(name).show();


    })

    $('.fruiticon').mouseout(function () {

        // bgc = '.diy_pickFruit_leftItem' + $(this).attr('id');
        // $(bgc).css('background-color', "rgb(233, 201, 165)");
        // $(this).parent().addClass('fruitbgc');
        $(this).parent().removeClass('fruitbgc');
        // bgc = '.diy_pickFruit_leftItem' + $(this).attr('id');
        // $(bgc).css('background-color', "rgb(233, 201, 165)");
        $('.fruitnameBox').remove();
        name = '.fruitname' + $(this).attr('id');
        $(name).hide();
    })

    $('.fruiticon').click(function () {
        // if($('.diy_pickFruit_rightItem > p').length < 4){
        //         $('.diy_pickFruit_rightItem').append('<p class="diy_pickFruit_righItemContent">蘋果:養顏美容</p>');
        //     }else{
        //         alert('已超過容量');
        //     }

        if ($("#diy_pickFruit_bottle1").css('background-color') == "rgba(0, 0, 0, 0)") {
            _index = $(this).index();
            bgc = '.diy_pickFruit_leftItem' + $(this).attr('id');
            $(bgc).css('background-color', "rgb(199, 129, 50)");
            // $(this).after('<img class="highlightClick" src="images/hightlight.png" alt="已選到">');
            // $(this).after('<img class="highlightUnclick" src="images/hightlight.png" alt="已選到">');
            // alert('no');

        } else if ($("#diy_pickFruit_bottle2").css('background-color') == "rgba(0, 0, 0, 0)") {
            _index = $(this).index();
            bgc = '.diy_pickFruit_leftItem' + $(this).attr('id');
            $(bgc).css('background-color', "rgb(199, 129, 50)");
            // $(this).after('<img class="highlightClick" src="images/hightlight.png" alt="已選到">');
            // $(this).after('<img class="highlightUnclick" src="images/hightlight.png" alt="已選到">');
            // alert('no');  
        } else if ($("#diy_pickFruit_bottle3").css('background-color') == "rgba(0, 0, 0, 0)") {
            _index = $(this).index();
            bgc = '.diy_pickFruit_leftItem' + $(this).attr('id');
            $(bgc).css('background-color', "rgb(199, 129, 50)");
            // $(this).after('<img class="highlightClick" src="images/hightlight.png" alt="已選到">');
            // $(this).after('<img class="highlightUnclick" src="images/hightlight.png" alt="已選到">');
            // alert('no');  
        } else {
            bgc = '.diy_pickFruit_leftItem' + $(this).attr('id');
            $(bgc).css('background-color', "rgb(233, 201, 165)");
            // $('.highlightUnclick').remove();
            // alert('no');
        }

    })

})

//重新選擇鍵

$(document).ready(function () {
    var _index = 0;
    $("#resetButton").click(function () {
        // alert('clear');

        //REMOVE HIGHLIGHT
        // $('.highlightClick').remove();
        // $('.highlightUnclick').remove();

        //REMOVE HIGHTLIGHT
        $('.diy_pickFruit_leftItem').css('background-color', "rgb(233, 201, 165)");

        //REMOVE BOTTLEFILL
        $("#diy_pickFruit_bottle1").remove();
        $("#diy_pickFruit_bottle2").remove();
        $("#diy_pickFruit_bottle3").remove();
        $('.diy_pickFruit_bottleBox').append('<div class="diy_pickFruit_bottle diy_pickFruit_bottle3" id="diy_pickFruit_bottle3"></div>');
        $("#diy_pickFruit_bottle3").css('background-color', 'rgba(0, 0, 0, 0)');
        $('.diy_pickFruit_bottleBox').append('<div class="diy_pickFruit_bottle diy_pickFruit_bottle2" id="diy_pickFruit_bottle2"></div>');
        $("#diy_pickFruit_bottle2").css('background-color', 'rgba(0, 0, 0, 0)');
        $('.diy_pickFruit_bottleBox').append('<div class="diy_pickFruit_bottle diy_pickFruit_bottle1" id="diy_pickFruit_bottle1"></div>');
        $("#diy_pickFruit_bottle1").css('background-color', 'rgba(0, 0, 0, 0)');

        //REMOVE TEXT
        $('.diy_pickFruit_righItemContent').remove();
        // alert($('.diy_pickFruit_righItemContent').length);

        //REMOVE AND RESET CHART
        // alert('resetchart');
        $('#myChart').remove(); // this is my <canvas> element
        $('#chart').prepend('<canvas id="myChart" height="300"><canvas>');
        chartPre();

        function chartPre() {
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['熱量', '纖維', '維他命', '鐵質'],
                    datasets: [{
                        label: ['果汁成分 (cal)', '熱量(cal)'],
                        data: [0, 0, 0, 0],
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




            $('#apple').click(function () {
                // alert($('.diy_pickFruit_rightItem > p').length);
                filljuice(243, 28, 21, 0.8);
                changeData(20, 30, 40, 10);
            });

            $('#guava').click(function () {

                filljuice(158, 213, 101, 0.8);
                changeData(40, 10, 10, 20);
            });

            $('#grape').click(function () {

                filljuice(137, 90, 137, 0.8);
                changeData(10, 30, 10, 40);
            });

            $('#cantaloupe').click(function () {

                filljuice(148, 208, 164, 0.8);
                changeData(10, 30, 10, 40);
            });

            $('#pineapple').click(function () {

                filljuice(246, 188, 41, 0.8);
                changeData(10, 30, 10, 40);
            });

            $('#tomato').click(function () {

                filljuice(228, 54, 48, 0.8);
                changeData(10, 30, 10, 40);
            });

            $('#watermelon').click(function () {

                filljuice(140, 198, 63, 0.8);
                changeData(10, 30, 10, 40);
            });

            $('#banana').click(function () {

                filljuice(247, 210, 34, 0.8);
                changeData(10, 30, 10, 40);
            });

            $('#orange').click(function () {

                filljuice(247, 147, 30, 0.8);
                changeData(10, 30, 10, 40);
            });

            function filljuice(r, g, b, a) {
                if ($("#diy_pickFruit_bottle1").css('background-color') == "rgba(0, 0, 0, 0)") {
                    $('#diy_pickFruit_bottle1').css('background-color', 'rgba( ' + r + ',' + g + ' ,' + b + ', ' + a + ')');
                    $('#diy_pickFruit_bottle1').css('flex-grow', '1');
                } else if ($("#diy_pickFruit_bottle2").css('background-color') == "rgba(0, 0, 0, 0)") {
                    $('#diy_pickFruit_bottle2').css('background-color', 'rgba( ' + r + ',' + g + ' ,' + b + ', ' + a + ')');
                    $('#diy_pickFruit_bottle2').css('flex-grow', '1');
                } else if ($("#diy_pickFruit_bottle3").css('background-color') == "rgba(0, 0, 0, 0)") {
                    $('#diy_pickFruit_bottle3').css('background-color', 'rgba( ' + r + ',' + g + ' ,' + b + ', ' + a + ')');
                    $('#diy_pickFruit_bottle3').css('flex-grow', '1');
                } else {
                    // alert("果汁已經滿了哦!");
                }
            }

            function changeData(n1, n2, n3, n4) {
                var data0 = myChart.data.datasets[0].data[0];
                var data1 = myChart.data.datasets[0].data[1];
                var data2 = myChart.data.datasets[0].data[2];
                var data3 = myChart.data.datasets[0].data[3];

                myChart.data.datasets[0].data = [data0 + n1, data1 + n2, data2 + n3, data3 + n4];
                //更新
                if ($("#diy_pickFruit_bottle1").css('background-color') == "rgba(0, 0, 0, 0)") {
                    myChart.update();
                } else if ($("#diy_pickFruit_bottle2").css('background-color') == "rgba(0, 0, 0, 0)") {
                    myChart.update();
                } else if ($("#diy_pickFruit_bottle3").css('background-color') == "rgba(0, 0, 0, 0)") {
                    myChart.update();
                }
            }


            $(function () {
                $(".logoimg").draggable({
                    containment: ".juicebottle"
                });
            });

            $('#needimg').click(function () {
                $('.logoimg').show();
            });
        }
    })
})