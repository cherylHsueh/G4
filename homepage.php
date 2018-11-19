<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0,shrink-to-fit=no">
    <title>果然配</title>
    <script src="js/plugin/TweenMax.min.js"></script>
    <script src="js/plugin/jquery-3.3.1.min.js"></script>
    <script src="js/plugin/parallax.min.js"></script>
    <script src="js/plugin/typed.min.js"></script>
    <script src="js/plugin/anime.min.js"></script>
    <script src="js/plugin/jquery.transit.js"></script>
    <script src="js/plugin/scrollMagic/ScrollMagic.min.js"></script>
    <script src="js/plugin/scrollMagic/animation.gsap.min.js"></script>
    <script src="js/plugin/scrollMagic/debug.addIndicators.min.js"></script>
    <script src="js/plugin/sweetalert2.min.js"></script>
    <script src="js/plugin/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/plugin/jquery.slotmachine.min.js"></script>
    <script src="js/global.js"></script>
    <script src="js/homepage.js"></script>

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/docs.theme.min.css">
    
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/tweenmax.css">
    <link rel="stylesheet" href="css/parallax.css">
    <link rel="stylesheet" type="text/css" href="css/loginFruit.css">
    <link rel="stylesheet" href="css/homepage.css">
</head>

<body onselectstart="return false">
<?php 
    require_once("php/nav.php");
try{
    require_once("connectBooks.php");
?>
<!-- 第一屏 -->
        <section class="homepage_header" data-hover-only="false">
            <div class="homepage_header_fixedBg">
                <div class="homepage_header_container">
                    <div class="homepage_header_cloudsPic"><img src="images/homepage/clouds.png" alt=""></div>
                    <div class="homepage_header_ballBox">
                        <div class="homepage_header_ballPic"><img src="images/homepage/ball.png" alt=""></div>
                        <div class="homepage_header_animatePic homepage_header_customerPic"><img src="images/homepage/custom.png" alt=""></div>
                        <div class="homepage_header_animatePic homepage_header_farmerPic"><img src="images/homepage/farmer.png" alt=""></div>
                        <div class="homepage_header_animatePic homepage_header_makerPic"><img src="images/homepage/mader.png" alt=""></div>
                        <div class="homepage_header_flatePic"><img src="images/homepage/flate-1.png" alt=""></div>


                    </div>
                    <div class="homepage_header_carBox">
                        <div class="homepage_header_carPic"><img src="images/homepage/car2.png" alt=""></div>
                        <div class="homepage_header_carPart"><img src="images/homepage/car3.png" alt=""></div>
                        <div class="homepage_header_carPart2"><img src="images/homepage/car4.png" alt=""></div>
                    </div>
                    <div class="homepage_header_titleBlock">
                        <div class="homepage_header_textBox">
                            <span class="homepage_header_textWrapper homepage_header_text1">
                                <span class="homepage_header_texts ">果汁天然自由配</span>
                            </span>
                        </div>
                        <div class="homepage_header_contentBox">
                            <div class="homepage_header_content1">
                                <div class="homepage_header_contentPic1"><img src="images/homepage/headTitle1.png" alt=""></div>
                                <h3>挑選水果</h3>
                            </div>
                            <div class="homepage_header_markPic"><img src="images/homepage/headPlus.png" alt=""></div>
                            <div class="homepage_header_content2 cl-s-3">
                                <div class="homepage_header_contentPic2"><img src="images/homepage/headTitle2.png" alt=""></div>
                                <h3>客製瓶身</h3>
                            </div>
                            <div class="homepage_header_markPic"><img src="images/homepage/headBe.png" alt=""></div>
                            <div class="homepage_header_content3">
                                <div class="homepage_header_contentPic3"><img src="images/homepage/headTitle3.png" alt=""></div>
                                <h3>果然配為您<br>打造專屬果汁</h3>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            

        </section>
<!-- 果汁DIY -->
<?php
    $sql1 = "select * from fruititem where fruitStatus=1";
    $fruit = $pdo ->query($sql1);
    $i=0;
    while($rowFruit=$fruit->fetch(PDO::FETCH_ASSOC)){
        $arrNo[$i]=$rowFruit["fruitNo"];
        $arrImg[$i]=$rowFruit["fruitImg"];
        $arrName[$i]=$rowFruit["fruitName"];
        $arrCol[$i]=$rowFruit["fruitCol"];
        $arrInfo[$i]=$rowFruit["fruitInfo"];
        $i++;
        // if ($i==9) {
        //     break;
        // }
    };
?>
        <section class="homepage_diy" id="homepageDiy">
                <div class="homepage_title">
                    <a href="diy.html"><img src="images/homepage/title-2.png" alt="果汁DIY"></a>
                    <h2>果汁DIY</h2>
                </div>
                <div class="homepage_diy_container clearfix">
                    <div class="homepage_diy_fruitBlock cl-xl-7">
                        <div style="position:relative;">
                            <div class="homepage_diy_Box cl-s-12 clearfix" id="lightRotation">
                                <div class="homepage_diy_fruitBox clearfix cl-md-4">
                                    <div class="homepage_diy_fruitPic homepage_diy_1Pic cl-s-4">
                                        <img class="diy_pickFruit_leftItem" src="images/<?php echo $arrImg[0];?>"
                                            alt="<?php echo $arrName[0];?>">
                                        <input style="display:none;" value="<?php echo $arrNo[0],',',$arrCol[0],',',$arrInfo[0];?>">
                                        <div class="trigger"></div>
                                        <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
                                            <polyline class="tick path" style="fill:none;stroke:#56ea23;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
                                            11.6,20 15.9,24.2 26.4,13.8 "/>
                                        </svg>

                                    </div>
                                    <div class="homepage_diy_fruitPic homepage_diy_2Pic cl-s-4">
                                        <img class="diy_pickFruit_leftItem" src="images/<?php echo $arrImg[1]; ?>"
                                            alt="<?php echo $arrName[1];?>">
                                        <input style="display:none;" value="<?php echo $arrNo[1],',',$arrCol[1],',',$arrInfo[1];?>">
                                        <div class="trigger"></div>
                                        <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
                                            <polyline class="tick path" style="fill:none;stroke:#56ea23;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
                                            11.6,20 15.9,24.2 26.4,13.8 "/>
                                        </svg>

                                        </div>
                                    <div class="homepage_diy_fruitPic homepage_diy_3Pic cl-s-4">
                                        <img class="diy_pickFruit_leftItem" src="images/<?php echo $arrImg[2]; ?>"
                                            alt="<?php echo $arrName[2];?>">
                                        <input style="display:none;" value="<?php echo $arrNo[2],',',$arrCol[2],',',$arrInfo[2];?>">
                                        <div class="trigger"></div>
                                        <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
                                            <polyline class="tick path" style="fill:none;stroke:#56ea23;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
                                            11.6,20 15.9,24.2 26.4,13.8 "/>
                                        </svg>

                                        </div>
                                </div>
                                <div class="homepage_diy_fruitBox clearfix cl-md-4">
                                    <div class="homepage_diy_fruitPic homepage_diy_4Pic cl-s-4">
                                        <img class="diy_pickFruit_leftItem" src="images/<?php echo $arrImg[3]; ?>"
                                            alt="<?php echo $arrName[3];?>">
                                        <input style="display:none;" value="<?php echo $arrNo[3],',',$arrCol[3],',',$arrInfo[3];?>">
                                        <div class="trigger"></div>
                                        <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
                                            <polyline class="tick path" style="fill:none;stroke:#56ea23;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
                                            11.6,20 15.9,24.2 26.4,13.8 "/>
                                        </svg>

                                    </div>
                                    <div class="homepage_diy_fruitPic homepage_diy_5Pic cl-s-4">
                                        <img class="diy_pickFruit_leftItem" src="images/<?php echo $arrImg[4]; ?>"
                                            alt="<?php echo $arrName[4];?>">
                                        <input style="display:none;" value="<?php echo $arrNo[4],',',$arrCol[4],',',$arrInfo[4];?>">
                                        <div class="trigger"></div>
                                        <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
                                            <polyline class="tick path" style="fill:none;stroke:#56ea23;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
                                            11.6,20 15.9,24.2 26.4,13.8 "/>
                                        </svg>

                                    </div>
                                    <div class="homepage_diy_fruitPic homepage_diy_6Pic cl-s-4">
                                        <img class="diy_pickFruit_leftItem" src="images/<?php echo $arrImg[5]; ?>"
                                            alt="<?php echo $arrName[5];?>">
                                        <input style="display:none;" value="<?php echo $arrNo[5],',',$arrCol[5],',',$arrInfo[5];?>">
                                        <div class="trigger"></div>
                                        <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
                                            <polyline class="tick path" style="fill:none;stroke:#56ea23;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
                                            11.6,20 15.9,24.2 26.4,13.8 "/>
                                        </svg>

                                    </div>
                                </div>
                                <div class="homepage_diy_fruitBox clearfix cl-md-4">
                                    <div class="homepage_diy_fruitPic homepage_diy_7Pic cl-s-4">
                                        <img class="diy_pickFruit_leftItem" src="images/<?php echo $arrImg[6]; ?>"
                                            alt="<?php echo $arrName[6];?>">
                                        <input style="display:none;" value="<?php echo $arrNo[6],',',$arrCol[6],',',$arrInfo[6];?>">
                                        <div class="trigger"></div>
                                        <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
                                            <polyline class="tick path" style="fill:none;stroke:#56ea23;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
                                            11.6,20 15.9,24.2 26.4,13.8 "/>
                                        </svg>
                                        

                                    </div>
                                    <div class="homepage_diy_fruitPic homepage_diy_8Pic cl-s-4">
                                        <img class="diy_pickFruit_leftItem" src="images/<?php echo $arrImg[7]; ?>"
                                            alt="<?php echo $arrName[7];?>">
                                        <input style="display:none;" value="<?php echo $arrNo[7],',',$arrCol[7],',',$arrInfo[7];?>">
                                        <div class="trigger"></div>
                                        <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
                                            <polyline class="tick path" style="fill:none;stroke:#56ea23;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
                                            11.6,20 15.9,24.2 26.4,13.8 "/>
                                        </svg>

                                    </div>
                                    <div class="homepage_diy_fruitPic homepage_diy_9Pic cl-s-4">
                                        <img class="diy_pickFruit_leftItem" src="images/<?php echo $arrImg[8]; ?>"
                                            alt="<?php echo $arrName[8];?>">
                                        <input style="display:none;" value="<?php echo $arrNo[8],',',$arrCol[8],',',$arrInfo[8];?>">
                                        <div class="trigger"></div>
                                        <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
                                            <polyline class="tick path" style="fill:none;stroke:#56ea23;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
                                            11.6,20 15.9,24.2 26.4,13.8 "/>
                                        </svg>

                                    </div>
                                </div>
                                <div class="homepage_diy_labaPhone clearfix">
                                    <img src="images/homepage/game.png" alt="隨機選三個水果">
                                </div>
                            </div>
                            <div class="homepage_diy_fruitContent">
                                <h4>任選<span>3</span>種水果</h4>
                                <h4>客製您的專屬果汁</h4>
                            </div>
                        </div>
                    </div>
                    <div class="homepage_diy_arrowBox">
                        <h4>
                            請拖拉！
                        </h4>
                        <div class="homepage_diy_arrowPic">
                            <img src="images/homepage/arrow.png" alt="">
                        </div>
                    </div>
                    <div class="homepage_diy_buttleBlock cl-xl-5">
                        <!-- <div class="homepage_diy_pickFruit"> -->
                            <div class="homepage_diy_pickFruit_wrapperBottleBox">
                                <form method="get" action="diy.php" id="diyForm">
                                    <div class="homepage_diy_pickFruit_bottleBox">
                                        <div class="diy_pickFruit_bottle diy_pickFruit_bottle3"></div>
                                            <input name ="fruit3" id="bottle3" style="display:none" value="">
                                        <div class="diy_pickFruit_bottle diy_pickFruit_bottle2"></div>
                                            <input name ="fruit2" id="bottle2" style="display:none" value="">
                                        <div class="diy_pickFruit_bottle diy_pickFruit_bottle1"></div>
                                            <input name ="fruit1" id="bottle1" style="display:none" value="">
                                        <!-- <img src="images/diy/emptyBottle.png" alt="空瓶"> -->
                                    </div>
                                </form>
                                <img src="images/bottle.png" alt="空瓶" >
                            </div>
                        <!-- </div> -->
                        <a class="diy_start common_btn common_btn_first">
                        <span class="common_btn_txt">開始製作</span>
                            <div class="common_btn_blobs">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </a>
                    </div>
                    
                </div>
                <div class="homepage_diy_labaBox clearfix">
                    <div class="homepage_diy_labaPic">
                        <img src="images/homepage/game.png" alt="隨機選三個水果">
                    </div>
                    <p class="homepage_diy_labaContent">還在猶豫嗎？拉霸機幫你挑水果！</p>
                </div>
<!-- 拉霸 -->
                <div class="homepage_labaBlockPre">
                        <div class="homepage_gameBlock">
                            <div class="content homepage_gameBox" id="homepage_gameContainer">
                                <div class="homepage_labaPic"><img src="images/homepage/test.png" alt="拉霸"></div>
                                <div  class="homepage_threeFruitBlcok" >
                                    <div id="machine4" class="slotMachine">
                <?php
                    $sql = "select * from fruititem where fruitStatus=1";
                    $fruit = $pdo ->query($sql);
                    $i=1;
                    while($rowFruit=$fruit->fetch(PDO::FETCH_ASSOC)){
                ?>
                                        <div class="fruit fruit<?php echo $i?>"><img src="images/<?php echo $rowFruit["fruitImg"]?>" alt="<?php echo $rowFruit["fruitName"]?>"></div>
                <?php
                $i++;
                    if ($i==10) {
                        break;
                    }
                }
                ?>
                                    </div>
                                    <div id="machine5" class="slotMachine">
                <?php
                    $sql= "select * from fruititem where fruitStatus=1";
                    $fruit = $pdo ->query($sql);
                    $i=1;
                    while($rowFruit=$fruit->fetch(PDO::FETCH_ASSOC)){
                ?>
                                        <div class="fruit fruit<?php echo $i?>"><img src="images/<?php echo $rowFruit["fruitImg"]?>" alt="<?php echo $rowFruit["fruitName"]?>"></div>
                <?php
                $i++;
                    if ($i==10) {
                        break;
                    }
                }
                ?>
                                    </div>
                                    <div id="machine6" class="slotMachine">
                <?php
                    $sql= "select * from fruititem where fruitStatus=1";
                    $fruit = $pdo ->query($sql);
                    $i=1;
                    while($rowFruit=$fruit->fetch(PDO::FETCH_ASSOC)){
                ?>
                                        <div class="fruit fruit<?php echo $i?>"><img src="images/<?php echo $rowFruit["fruitImg"]?>" alt="<?php echo $rowFruit["fruitName"]?>"></div>
                <?php
                $i++;
                    if ($i==9) {
                        break;
                    }
                }
                ?>
                                    </div>	
                <?php
                    $sql= "select * from fruititem where fruitStatus=1";
                    $fruit = $pdo ->query($sql);
                    $i=1;
                    while($rowFruit=$fruit->fetch(PDO::FETCH_ASSOC)){
                ?>
                                    <input id="fruit<?php echo $i?>" style="display: none;" value="<?php echo $rowFruit["fruitName"]?>">
                <?php
                $i++;
                    if ($i==10) {
                        break;
                    }
                }
                ?>			
                                </div>		
                            </div>	
                            <div class="text-center homepage_labaBtn">
                                <div class="content text-center homepage_startBtn homepage_startBtn1">
                                    <div id="slotMachineButtonShuffle" class="slotMachineButton">Shuffle!</div>
                                    <div id="slotMachineButtonStop" class="slotMachineButton">Stop!</div>
                                </div>
                                <div class="homepage_startBtn2">
                                    <a class="common_btn common_btn_first" id="labaNext">
                                        <span class="common_btn_txt">開始製作</span>
                                        <div class="common_btn_blobs">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </a>
                                    <a class="common_btn common_btn_second" id="labaCancle">
                                        <span class="common_btn_txt">返回首頁</span>
                                        <div class="common_btn_blobs">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <form method="get" action="diy.php" id="diyForm2">
                                <input style="display:none" name="fruit1" id="labaFruit1" value="">
                                <input style="display:none" name="fruit2" id="labaFruit2" value="">
                                <input style="display:none" name="fruit3" id="labaFruit3" value="">
                            </form>
                            <div class="clearfix"></div>
                            
                        </div>
                        <!-- <h3 class="resultFruit">你挑到的水果是:</h3> -->
                    
                    
                    
                    </div>

        </section>
        <div class="homepage_animate">
<!-- 果然特調 -->
            <section class="homepage_test" id="homepageTest" >
                <div class="homepage_title">
                    <a href="product.html"><img src="images/homepage/title-3.png" alt="果然特調"></a>
                    <h2>果然特調</h2>
                </div>
                <div class="homepage_test_Container">
                    <div class="homepage_test_shipContainer" id="homepageTestShip">
                        <div class="homepage_test_shipBlock">
                            <img src="images/homepage/FlyingShip.png" alt="">
                        </div>
                        <div class="homepage_test_questionContainer">
                            <div class="homepage_test_questionBlock">
                                <div class="homepage_test_questionPic">
                                    <!-- <img src="images/homepage/question.png" alt="測驗問題">： -->
                                </div>
                                <div class="homepage_test_questionContent">
                                    <h3 id="question">你最近有沒有以下情況呢？</h3>
                                </div>
                            </div>
                            <div class="homepage_test_answerBlock clearfix">
                                <div class="homepage_test_answerBox">
                                    <h4 id="1_1">1.牙齦常出血</h4>
                                    <h4 id="1_2">2.常常睡不好</h4>
                                </div>
                                <div class="homepage_test_answerBox">
                                    <h4 id="1_3">3.排便不順暢</h4>
                                    <h4 id="1_4">4.視力模糊</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
<!-- 果粉私藏 -->


            <section class="clearfix homepage_blog" id="homepageBlog">
                <div class="homepage_title">
                    <img src="images/homepage/title-4.png" alt="">
                    <h2>熱門文章</h2>
                </div>
                
                <div class="homepage_blog_container clearfix">
                    <div class="homepage_blog_platBlock cl-md-12 cl-xl-4">
                        <div id='homepage_blog_ribbon'>
                            <!-- 飘花 -->
                            <div id="snowflake"></div>
                        </div>
                        <div class="homepage_blog_personsBox clearfix">
                            <div class="homepage_blog_person1 cl-s-4 cl-md-4 cl-xl-4"><img src="images/homepage/NUM2.png" alt="" id="blogPerson2"></div>
                            <div class="homepage_blog_person2 cl-s-4 cl-md-4 cl-xl-4"><img src="images/homepage/NUM1.png" alt="" id="blogPerson1"></div>
                            <div class="homepage_blog_person3 cl-s-4 cl-md-4 cl-xl-4"><img src="images/homepage/NUM3.png" alt="" id="blogPerson3"></div>
                        </div>
                        <div class="homepage_blog_platBox">
                            <img src="images/homepage/plat.png" alt="">
                        </div>
                    </div>

    

                   
<?php  
 $j=1;
 $sql2 = "select artNo , artTitle , mem.memName ,f1.fruitImg fruitImg1,f1.fruitName fruitName1, f2.fruitImg fruitImg2,f2.fruitName fruitName2,f3.fruitImg fruitImg3,f3.fruitName fruitName3,artContent,postTime,photo,thumbFq from blog b , fruititem f1 ,fruititem f2,fruititem f3,member mem where b.fruitNo1=f1.fruitNo and b.fruitNo2=f2.fruitNo and b.fruitNo3=f3.fruitNo and b.memNo=mem.memNo order by thumbFq desc LIMIT 3 ";
    $blog = $pdo ->query($sql2);
    while($rowBlog=$blog->fetch(PDO::FETCH_ASSOC)){
echo '                 
                    <div class="homepage_blog_papperBlock homepage_blog_papper1 cl-s-12 cl-md-12 cl-xl-7 clearfix homepage_blog_papperBlock',$j,'">
                        <div class="homepage_blog_papperBox clearfix">
                            <div class="homepage_blog_titleAndPic cl-xl-6">
                                <div class="homepage_blog_titleBox clearfix">
                                    <div class="homepage_blog_title cl-s-7 cl-md-6"><h3>',$rowBlog["artTitle"],'</h3></div>
                                    <div class="homepage_blog_fruits clearfix cl-s-5 cl-md-6">
                                        <div class="homepage_blog_fruit cl-s-4 cl-md-4"><img src="images/',$rowBlog["fruitImg1"],'" alt="',$rowBlog["fruitName1"],'"></div>
                                        <div class="homepage_blog_fruit cl-s-4 cl-md-4"><img src="images/',$rowBlog["fruitImg2"],'" alt="',$rowBlog["fruitName2"],'"></div>
                                        <div class="homepage_blog_fruit cl-s-4 cl-md-4"><img src="images/',$rowBlog["fruitImg3"],'" alt="',$rowBlog["fruitName3"],'"></div>
                                    </div>
                                </div>
                                <div class="homepage_blog_picBox">
                                    <div class="homepage_blog_pic "><img src="images/blogImg/',$rowBlog["photo"],'" alt="',$rowBlog["artTitle"],'"></div>
                                    <div class="homepage_blog_goodBox clearfix">
                                        <div class="homepage_blog_goodPic cl-s-6"><img src="images/Score.png" alt="讚"></div>
                                        <p class="cl-s-6">',$rowBlog["thumbFq"],'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="homepage_blog_contentAndMessage cl-xl-6">
                                <div class="homepage_blog_contentBlock">
                                    <div class="homepage_blog_contentBox">
                                        <div class="homepage_blog_author">
                                            <div class="homepage_blog_authorPic"><img src="images/memberPic.png" alt=""></div>
                                            <p>',$rowBlog["memName"],'</p>
                                        </div>
                                        <h4 class="homepage_blog_content">',$rowBlog["artContent"],'</h4>
                                        <p class="homepage_blog_time">',$rowBlog["postTime"],'</p>
                                    </div>
                                    <div class="homepage_blog_messageBlock">
';
    $sql3="select * from message mes ,member mem where mes.memNo=mem.memNo and mes.artNo =:artNo  order by  mestime  desc";
    $message = $pdo ->prepare($sql3);
    $message -> bindValue(":artNo",$rowBlog["artNo"]);
    $message -> execute();
    while($rowmessage=$message->fetch(PDO::FETCH_ASSOC)){
                                echo '
                                         <div class="homepage_blog_messageBox homepage_blog_messageBox1 clearfix">
                                                <div class="homepage_blog_messageAuthor cl-xl-2"><img src="images/memberPic.png" alt=""></div>
                                                <div class="homepage_blog_messageText cl-xl-10">
                                                    ',$rowmessage["memName"],'
                                                    <p class="homepage_blog_message ">',$rowmessage["mesContent"],'</p>
                                                </div>
                                        </div>
                                ';                       
};
echo '
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                        <div class="homepage_blog_plate homepage_blog_plate1"><img src="images/tag',$j,'.png" alt=""></div>
                        <div class="homepage_blog_btnBlock">

                                <a class="common_btn common_btn_first" href="blog.html">
                                    <span class="common_btn_txt">我要分享</span>
                                    <div class="common_btn_blobs">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </a>
                                <a class="common_btn common_btn_second" href="blogSubmit.html">
                                    <span class="common_btn_txt">更多文章</span>
                                    <div class="common_btn_blobs">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </a>
                        </div>
                    </div>
';     
$j++;                   
};

?>                     
                </div>
              
                
            </section>
            <div class="homepage_test_animatePic homepage_test_animatePic1"><img src="images/cloud(02).png" alt=""></div>
            <div class="homepage_test_animatePic homepage_test_animatePic2"><img src="images/cloud(03).png" alt=""></div>
            <div class="homepage_test_animatePic homepage_test_animatePic3"><img src="images/cloud(01).png" alt=""></div>
            <div class="homepage_test_animatePic homepage_test_animatePic4"><img src="images/cloud(04).png" alt=""></div> 
            <div class="homepage_test_animatePic homepage_test_animatePic5"><img src="images/HotAirBallon01.png" alt=""></div>
            <div class="homepage_test_animatePic homepage_test_animatePic6"><img src="images/HotAirBallon02.png" alt=""></div>
            <!-- <div class="homepage_test_animatePic homepage_test_animatePic7">7<img src="images/HotAirBallon03.png" alt=""></div> -->
            <div class="homepage_test_animatePic homepage_test_animatePic8"><img src="images/HotAirBallon04.png" alt=""></div>    
        </div>
<!-- 關於果然 -->
            <section class="homepage_about" id="homepageAbout">
                 <div class="homepage_title">
                    <a href="aboutNew".html"><img src="images/homepage/title-5.png" alt="關於果然"></a>
                    <h2>關於果然</h2>
                </div>
                <div class="homepage_about_underGround">
                    <img src="images/About_Png/ground.png" alt="" id="homepage_about_ground">
                    <img src="images/About_Png/roud01.png" alt="" id="homepage_about_roud01">
                    <div class="grass" id="homepage_about_grass02"><img src="images/About_Png/Grass(02).png" alt=""></div>
                    <div class="grass" id="homepage_about_grass03"><img src="images/About_Png/Grass(02).png" alt=""></div>
                    <div class="grass" id="homepage_about_grass04"><img src="images/About_Png/Grass(02).png" alt=""></div>
                    <div class="grass" id="homepage_about_grass05"><img src="images/About_Png/Grass(02).png" alt=""></div>
                    <div class="grass" id="homepage_about_grass06"><img src="images/About_Png/Grass(02).png" alt=""></div>
                    <div class="mountain" id="homepage_about_mountain03"><img src="images/About_Png/mountain(03-1).png" alt=""></div>
                    <!-- <div class="mountain" id="homepage_about_mountain02"><img src="images/About_Png/mountain(02).png" alt=""></div> -->
                    <div class="mountain" id="homepage_about_mountain06"><img src="images/About_Png/mountain(06).png" alt=""></div>
                    <div class="mountain" id="homepage_about_mountain01"><img src="images/About_Png/mountain(01).png" alt=""></div>
                    <div class="mountain" id="homepage_about_mountain05"><img src="images/About_Png/mountain(05).png" alt=""></div>
                    <div class="mountain" id="homepage_about_mountain04"><img src="images/About_Png/mountain(04).png" alt=""></div>
                    <div class="aaa" id="homepage_about_factory"><img src="images/About_Png/Factory.png" alt=""></div>
                </div>
                <div id="illustration_france">



                    <div class="grass" id="homepage_about_grass01"><img src="images/About_Png/Grass(01).png" alt=""></div>
                    <div class="tree" id="homepage_about_tree01"><img src="images/About_Png/tree01.png" alt=""></div>
                    <div class="tree" id="homepage_about_tree04"><img src="images/About_Png/tree05.png" alt=""></div>
                    <div class="tree" id="homepage_about_tree02"><img src="images/About_Png/tree01.png" alt=""></div>
                    <div class="tree" id="homepage_about_tree03"><img src="images/About_Png/tree03.png" alt=""></div>
                    <div class="tree" id="homepage_about_tree05"><img src="images/About_Png/tree05.png" alt=""></div>
                    <!-- <div class="aaa" id="homepage_about_orchard"><img src="images/About_Png/orchard.png" alt=""></div> -->

                    <div class="aaa" id="homepage_about_streetLight01"><img src="images/About_Png/Street light.png" alt=""></div>
                    <div class="aaa" id="homepage_about_streetLight02"><img src="images/About_Png/Street light.png" alt=""></div>
                    <div class="aaa" id="homepage_about_streetLight03"><img src="images/About_Png/Street light.png" alt=""></div>
                    <div class="aaa" id="homepage_about_streetLight04"><img src="images/About_Png/Street light.png" alt=""></div>
                    <div class="aaa" id="homepage_about_car"><img src="images/About_Png/car(01).png" alt=""></div>
                    <div class="cloud" id="homepage_about_cloud01"><img src="images/About_Png/cloud(01).png" alt=""></div>
                    <div class="cloud" id="homepage_about_cloud03"><img src="images/About_Png/cloud(03).png" alt=""></div>
                    <div class="cloud" id="homepage_about_cloud02"><img src="images/About_Png/cloud(02).png" alt=""></div>
                    <div class="cloud" id="homepage_about_cloud04"><img src="images/About_Png/cloud(04).png" alt=""></div>

                    <div class="ddd" id="homepage_about_content">
                        <div class="homepage_about_content_box aaa">
                            <div class="homepage_about_step1 aaa">
                                <img src="images/About_First step/aboutUs.png" alt="" id="homepage_about_step1Title">
                                <p>
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp說到果汁，你會想到什麼呢？不外乎是加水、加糖、加香精的飲品，且多半是在夜市、路邊攤等處販售的，對吧？！
                                    果然配有別於一般的市售果汁，消費者可以挑選3種水果還 能依照自己喜歡的比例做調整，果然配強調100%水果原汁，亦即不加水、不加糖、不加人工添加物的現作果汁。我們
                                    採用歐洲原裝進口設備，不需預先去皮、去籽，可將整顆水果丟入機器中，因此能完整保留水果的原味及營養。果然配期許喚起社會大眾對於飲食健康的覺醒，進而帶動一場劃時代的飲食革命。
                                    <!-- <a href="about.html">&nbsp看更多&nbsp <img src="images/About_Png/arrow.png" alt=""></a> -->
                                </p>
                                <div class="homepage_about_btn aaa">
                                    <input type="button" value="next▼" id="a1">
                                </div>
                            </div>
                            <div class="homepage_about_step2 aaa">
                                <img src="images/About_First step/farmer_flag.png" alt="" id="homepage_about_step2Title">
                                <div class="homepage_about_step2_content aaa">
                                    <div class="homepage_about_step2_farmer aaa">
                                        <img src="images/About_First step/farmer.png" alt="">
                                    </div>

                                    <div class="homepage_about_step2_arrow aaa">
                                        <img src="images/About_First step/truck_horizontal line.png" alt="">
                                        <br>
                                        <img src="images/About_First step/cart_horizontal line.png" alt="">

                                    </div>
                                    <div class="homepage_about_step2_logopay aaa">
                                        <img src="images/About_First step/logopay.png" alt="">
                                    </div>
                                    <div class="homepage_about_btn aaa">
                                        <input type="button" value="next▼" id="a2">
                                    </div>
                                    <div class="homepage_about_btn2 aaa">
                                        <input type="button" value="back▲" id="a3">
                                    </div>
                                </div>

                            </div>
                            <div class="homepage_about_step3 aaa">
                                <img src="images/About_First step/brandConcept.png" alt="" id="homepage_about_step3Title">
                                <p>如 果 你 為 了 夢 想 ，付 出 了 所 有 時 間 顧 不 得 自 己 的 健 康；<br>
                                    如 果 你 遠 離 家 鄉 ，抽 不 出 身 照 顧 遠 在 另 一 端 的 家 人 ；<br>
                                    那 麼 就 讓 果 然 配 為 大 家 的 健 康 來 把 關 吧 !
                                </p>
                                <div class="homepage_about_btn aaa">
                                    <input type="button" value="back▲" id="a4">
                                </div>
                                <div class="homepage_about_btn3 aaa">
                                    <a href="about.php">more&nbsp➥ </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div data-posx="37" class="aaa" style="left: 20%; opacity: 0;"></div>
                </div>

                <footer>
                    <div class="footer_wrapper">
                        <div class="footer_block clearfix">
                            <div class="footer_rightBox">
                                <div class="footer_rightContent">
                                    <!-- <p class="desc">地址:桃園市中壢區中大路111號</p>
                                    <p class="desc">電話:(03)49111853</p> -->
                                    <p class="copyright">Copyright © All Rights Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </section>
            <script>
            //私藏文章限制字數
             var len = 30; // 超過50個字以"..."取代
            $(".homepage_blog_content").each(function(i){
                if($(this).text().length>len){
                    $(this).attr("title",$(this).text());
                    var text=$(this).text().substring(0,len-1)+"...";
                    $(this).text(text);
                }
             });  
            //關於果然
                $('#a1').click(function () {

                    $('.homepage_about_content_box').animate({
                        top: '-100%',
                    }, 1000);

                });
                $('#a2').click(function () {

                    $('.homepage_about_content_box').animate({
                        top: '-200%',
                    }, 1000);

                });
                $('#a3').click(function () {

                    $('.homepage_about_content_box').animate({
                        top: '0',
                    }, 1000);

                });
                $('#a4').click(function () {

                    $('.homepage_about_content_box').animate({
                        top: '-100%',
                    }, 1000);

                });
            </script>
<?php
}catch(PDOException $e){
  echo $e->getMessage();
}
?> 
</body>

</html>