<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>果然配</title>
    <link rel="stylesheet" type="text/css" href="css/loginFruit.css">
    <link rel="stylesheet" href="css/product.css">
    <script src="js/plugin/jquery-3.3.1.min.js"></script>
    <script src="js/plugin/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/ScrollToPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/animation.gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/ScrollToPlugin.min.js"></script>
    <script src="js/global.js"></script>


</head>

<body>
<?php
 require_once('php/nav.php');
?>
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

    require_once("connectBooks.php");
    $sql = "select * from offcialpd where offCateNo = 1 and offPdStatus = 1 ";
    $products = $pdo -> query( $sql );
    while($prodRow = $products->fetchObject()){

?>
                    <div class="pd_cate_item cl-s-6 cl-md-3">
                        <div class="item">
                            <div class="pd_cate_item_itemimg">
                                <a href="productitem.php?offPdNo=<?php echo $prodRow->offPdNo ?>"><img src='images/pd/<?php echo $prodRow->offPdImg?>'></a>
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

    $sql = "select * from offcialpd where offCateNo = 2 and offPdStatus = 1";
    $products = $pdo -> query( $sql );

    while($prodRow = $products->fetchObject()){

?>
                    <div class="pd_cate_item cl-s-6 cl-md-3">
                        <div class="item">
                            <div class="pd_cate_item_itemimg">
                                <a href="productitem.php?offPdNo=<?php echo $prodRow->offPdNo ?>"><img src='images/pd/<?php echo $prodRow->offPdImg?>'></a>
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

    $sql = "select * from offcialpd where offCateNo = 3 and offPdStatus = 1";
    $products = $pdo -> query( $sql );

    while($prodRow = $products->fetchObject()){

?>

                    <div class="pd_cate_item cl-s-6 cl-md-3">
                        <div class="item">
                            <div class="pd_cate_item_itemimg">
                               <a href="productitem.php?offPdNo=<?php echo $prodRow->offPdNo ?>"><img src='images/pd/<?php echo $prodRow->offPdImg?>'></a>
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

    $sql = "select * from offcialpd where offCateNo = 4 and offPdStatus = 1";
    $products = $pdo -> query( $sql );

    while($prodRow = $products->fetchObject()){

?>
                    <div class="pd_cate_item cl-s-6 cl-md-3">
                        <div class="item">
                            <div class="pd_cate_item_itemimg">
                                <a href="productitem.php?offPdNo=<?php echo $prodRow->offPdNo ?>"><img src='images/pd/<?php echo $prodRow->offPdImg?>'></a>
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