<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>果然配</title>
    <link rel="stylesheet" href="css/productitem.css">
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
                        </a>
                    </li>
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

    <section class="pdItem">
        <div class="cloud">
            <img src="images/pd/cloud1.png">
        </div>
        <div class="tree">
            <img src="images/pd/orchard.png">
        </div>
        <div class="bee">
            <img src="images/pd/bee.gif">
        </div>

<?php
$offPdNo = $_REQUEST["offPdNo"];
//連線資料庫
try{
  require_once("connectProducts.php");
  $sql = "select * from offcialpd where offPdNo = $offPdNo";
  $products = $pdo->query($sql);

  if( $products->rowCount() == 0){
    echo "查無此商品資料";
  }else{
    $prodRow = $products->fetchObject();
?>

        <div class="itemwrapper">
            <div class="wrapper clearfix">
                <div class="pdItem_imgBlock cl-s-12 cl-md-4">
                    <img src='images/pd/<?php echo $prodRow->offPdImg?>'>
                </div>
                <div class="pdItem_textBlock cl-s-12 cl-md-5">
                    <h2 class="pdName"><?php echo $prodRow->offPdName ?></h2>
                    <h3>$90</h3>
                    <h4 class="pdInfo">
                        <?php echo $prodRow->offPdInfo ?>
                    </h4>
                </div>
                <div class="pdItem_buyBlock cl-s-12 cl-md-3">

                    <form action="cartAdd.php">
                        
		    	        <span>數量 : </span>
                        <input type="text" name="Pdcount" class="pdItem_buyBlock_qty" size="2" value="1">
                        <input type="hidden" name="offPdNo" value='<?php echo $prodRow->offPdNo;?>'>
			            <input type="hidden" name="offPdName" value='<?php echo $prodRow->offPdName;?>'>
                        <input class="common_btn common_btn_first" type="submit" value="放入購物車">
                        <span class="common_btn_txt"></span>
                        <div class="common_btn_blobs">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
	                </form>

                </div>
            </div>
        </div>

<?php
  }
}catch(PDOException $e){
  echo "error~<br>";
  echo $e->getMessage() , "<br>";
}
?>  


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

</body>

</html>