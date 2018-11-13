<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>果然配</title>
    <link rel="stylesheet" href="css/product.css">
    <script src="js/plugin/jquery-3.3.1.min.js"></script>
    <script src="js/plugin/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/ScrollToPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/animation.gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/ScrollToPlugin.min.js"></script>


</head>

<body>
    <header>
        <input type="checkbox" name="" id="hb_control">
        <nav>
            <svg preserveAspectRatio="none" id="svg-2" viewBox="0 0 100 80" enable-background="new 0 0 100 80">
                <animate dur="2s" attributeName="x" repeatCount="indefinite" from="0" to="100" xlink:href="#wave"></animate>
                <defs>
                    <filter id="f4" x="0" y="0" width="100%" height="100%">
                        <feOffset result="offOut" in="SourceGraphic" dx="0" dy="0"></feOffset>
                        <feColorMatrix result="matrixOut" in="offOut" type="matrix" values="0.2 0 0 0 0 0 0.2 0 0 0 0 0 0.2 0 0 0 0 0 1 0"></feColorMatrix>
                        <feGaussianBlur result="blurOut" in="matrixOut" stdDeviation="2"></feGaussianBlur>
                        <feBlend in="SourceGraphic" in2="blurOut" mode="normal"></feBlend>
                    </filter>
                </defs>
                <path x="0" y="0" d="M 100,0 L 0,0 L 0,65 Q 12.5,80 25,65T 50,65 Q62.5,80 75,65 T 100,65Z" filter="url(#f4)"
                    id="wave"></path>
                <path x="30" y="0" d="M 100,0 L 0,0 L 0,65 Q 12.5,80 25,65T 50,65 Q62.5,80 75,65 T 100,65Z" filter="url(#f4)"
                    id="wave2"></path>
            </svg>
            <div class="ph_nav">
                <label for="hb_control" class="hb"><span></span></label>
                <a href="index.html">
                    <h1 class="phone_logo"><img src="images/logo.png" alt="果然配">果然配</h1>
                </a>
            </div>

            <div class="menu">
                <ul>
                    <li class="menu_item"><a href="diy.html">果汁DIY</a></li>
                    <li class="menu_item"><a href="product.html">果然特調</a></li>
                    <li><a href="index.html">
                            <h1 class="menu_logo"><img src="images/logo.png" alt="果然配">果然配</h1>
                        </a> </li>
                    <li class="menu_item"><a href="blog.html">果然私藏</a></li>
                    <li class="menu_item"><a href="about.html">關於果然</a></li>
                </ul>
            </div>
            <div class="nav_mem">
                <p><a href="login.html">登入</a></p>
                <div class="mem_pic"><a href="member.html"><img src="images/user.png" alt="會員中心"></a></div>
                <div class="mem_pic"><a href="cart.html"><img src="images/cart.png" alt="購物車"></a></div>
            </div>
        </nav>
        <div class="coupon"><img src="images/coupon.png" alt="優惠小遊戲"></div>
        <div class="robot"><img src="images/robot.png" alt="果然配客服機器人"></div>
    </header>


    <section class="pdcate">
        <div id="trigger01"></div>
        <div class="cloud">
            <img src="images/pd/cloud1.png">
        </div>
        <div class="cloud2">
            <img src="images/pd/cloud2.png">
        </div>
        <div class="ballon">
            <img src="images/pd/ballon.png">
        </div>
        <div class="bee">
            <img src="images/pd/bee.gif">
        </div>
        <div class="wrapper">
            <div class="pdcate_container clearfix">
                <div class="pdcate_item cl-s-6 cl-md-6" id="whitening">
                    <a href="#">
                        <div class="item">
                            <img src="images/pd/cate_whitening.png">
                        </div>
                    </a>
                </div>
                <div class="pdcate_item cl-s-6 cl-md-6" id="Iron">
                    <a href="#">
                        <div class="item">
                            <img src="images/pd/cate_Iron.png">
                        </div>
                    </a>
                </div>
                <div class="pdcate_item cl-s-6 cl-md-6" id="health">
                    <a href="#">
                        <div class="item">
                            <img src="images/pd/cate_health.png">
                        </div>
                    </a>
                </div>
                <div class="pdcate_item cl-s-6 cl-md-6" id="dieting">
                    <a href="#">
                        <div class="item">
                            <img src="images/pd/cate_dieting.png">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="pd">
        
        <!-- <div class="bottom">
            <img src="images/pd/bottom.png">
            //被砍掉的樹
        </div> -->
        <div class="wrapper">

            <div id="pd_cate_whitening"></div>
            <div class="pd_cate">
                <div class="cloud">
                    <img src="images/pd/cloud1.png">
                </div>
                <div class="cloud2">
                    <img src="images/pd/cloud2.png">
                </div>
                <h2>美白系列</h2>
                <div class="pd_cate_list clearfix">
<?php 

try {

    require_once("connectProducts.php");
    $sql = "select * from offcialpd where offCateNo = 1";
    $products = $pdo -> query( $sql );

    while($prodRow = $products->fetchObject()){

?>
                    <div class="pd_cate_item cl-s-6 cl-md-3">
                        <div class="item">
                            <div class="pd_cate_item_itemimg">
                                <img src='images/pd/<?php echo $prodRow->offPdImg?>' >
                            </div>
                            <h3><?php echo $prodRow->offPdName ?></h3>
                            <div class="buttonArea">
                                <a class="common_btn common_btn_first" href="productitem.php?offPdNo=<?php echo $prodRow->offPdNo ?>">
                                    <span class="common_btn_txt">瀏覽商品</span>
                                    <div class="common_btn_blobs">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

<?php
    }
 
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e -> getMessage(), "<br>";
    echo "錯誤行號 : ", $e -> getLine(), "<br>";
}
?>
                </div>
            </div>

            <div id="pd_cate_health"></div>
            <div class="pd_cate">
                <div class="cloud">
                    <img src="images/pd/cloud1.png">
                </div>
                <div class="cloud2">
                    <img src="images/pd/cloud2.png">
                </div>
                <h2>健康系列</h2>
                <div class="pd_cate_list clearfix">

<?php 

try {

    require_once("connectProducts.php");
    $sql = "select * from offcialpd where offCateNo = 2";
    $products = $pdo -> query( $sql );

    while($prodRow = $products->fetchObject()){

?>
                    <div class="pd_cate_item cl-s-6 cl-md-3">
                        <div class="item">
                            <div class="pd_cate_item_itemimg">
                                <img src='images/pd/<?php echo $prodRow->offPdImg?>' >
                            </div>
                            <h3><?php echo $prodRow->offPdName ?></h3>
                            <div class="buttonArea">
                            <a class="common_btn common_btn_first" href="productitem.php?offPdNo=<?php echo $prodRow->offPdNo ?>">
                                    <span class="common_btn_txt">瀏覽商品</span>
                                    <div class="common_btn_blobs">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

<?php
    }
 
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e -> getMessage(), "<br>";
    echo "錯誤行號 : ", $e -> getLine(), "<br>";
}
?>


                </div>
            </div>

            <div id="pd_cate_Iron"></div>
            <div class="pd_cate">
                <div class="cloud">
                    <img src="images/pd/cloud1.png">
                </div>
                <div class="cloud2">
                    <img src="images/pd/cloud2.png">
                </div>
                <h2>補鐵系列</h2>
                <div class="pd_cate_list clearfix">

<?php 

try {

    require_once("connectProducts.php");
    $sql = "select * from offcialpd where offCateNo = 3";
    $products = $pdo -> query( $sql );

    while($prodRow = $products->fetchObject()){

?>

                    <div class="pd_cate_item cl-s-6 cl-md-3">
                        <div class="item">
                            <div class="pd_cate_item_itemimg">
                                <img src='images/pd/<?php echo $prodRow->offPdImg?>' >
                            </div>
                            <h3><?php echo $prodRow->offPdName ?></h3>
                            <div class="buttonArea">
                            <a class="common_btn common_btn_first" href="productitem.php?offPdNo=<?php echo $prodRow->offPdNo ?>">
                                    <span class="common_btn_txt">瀏覽商品</span>
                                    <div class="common_btn_blobs">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

<?php
    }
 
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e -> getMessage(), "<br>";
    echo "錯誤行號 : ", $e -> getLine(), "<br>";
}
?>



                </div>
            </div>

            <div id="pd_cate_dieting"></div>
            <div class="pd_cate">
                <h2>減肥系列</h2>
                <div class="pd_cate_list clearfix">

<?php 

try {

    require_once("connectProducts.php");
    $sql = "select * from offcialpd where offCateNo = 4";
    $products = $pdo -> query( $sql );

    while($prodRow = $products->fetchObject()){

?>
                    <div class="pd_cate_item cl-s-6 cl-md-3">
                        <div class="item">
                            <div class="pd_cate_item_itemimg">
                                <img src='images/pd/<?php echo $prodRow->offPdImg?>' >
                            </div>
                            <h3><?php echo $prodRow->offPdName ?></h3>
                            <div class="buttonArea">
                            <a class="common_btn common_btn_first" href="productitem.php?offPdNo=<?php echo $prodRow->offPdNo ?>">
                                    <span class="common_btn_txt">瀏覽商品</span>
                                    <div class="common_btn_blobs">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

<?php
    }
 
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e -> getMessage(), "<br>";
    echo "錯誤行號 : ", $e -> getLine(), "<br>";
}
?>

                </div>
            </div>

        </div>
    </section>





    <footer>
        <div class="footer_wrapper">
            <div class="footer_block clearfix">
                <div class="footer_rightBox">
                    <div class="footer_rightContent">
                        <p class="copyright">Copyright © All Rights Reserved.</p>
                    </div>
                </div>
            </div>

        </div>

    </footer>


    <script src="js/product.js"></script>

</body>


</html>