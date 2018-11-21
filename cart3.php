<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>果然配</title>
    <link rel="stylesheet" type="text/css" href="css/loginFruit.css">
    <link rel="stylesheet" href="css/cart3.css">
    <script src='js/global.js'></script>
</head>

<body>

<?php
 require_once('php/nav.php');
?>

    <div class="space"></div>
    <section>
        <div class="cart_shoppingProcess_control clearfix">
            <div class="cart_shoppingProcess_step">
                <span>STEP1</span>
                <img src="images/cart/cart.png" alt="">
            </div>
            <img class="cart_shoppingProcess_arrow" src="images/cart/right01.png" alt="">
            <div class="cart_shoppingProcess_step">
                <span>STEP2</span>
                <img src="images/cart/note.png" alt="">
            </div>
            <img class="cart_shoppingProcess_arrow" src="images/cart/right01.png" alt="">
            <div class="cart_shoppingProcess_step2">
                <span>STEP3</span>
                <img src="images/cart/pass.png" alt="">
            </div>
        </div>
        <div class="cart_shoppingProcess_box">
            <p>購物車清單</p>
            <p class="p_p">填寫寄送資料</p>
            <p>完成訂單</p>
        </div>
        <div class="cart_completeOrder_control">
            <img src="images/cart/bigcheck.png" alt="" class="cart_completeOrder_img">

<h2>

<?php 
	try {
        require_once("connectBooks.php");
        $pdo->beginTransaction();
	    //寫入訂單主檔
        $sql = "insert into ordermaster values (null, :memId , :memNo ,'0', NOW(), :receiverName , :address , :payment , :receiverPhone, :total)";
        $ordermaster = $pdo->prepare($sql);
        $ordermaster->bindValue(":memNo", $_SESSION["memNo"] );
        $ordermaster->bindValue(":memId", $_SESSION["memId"] );
        $ordermaster->bindValue(":receiverName", $_POST["receiverName"]);
        $ordermaster->bindValue(":address", $_POST["address"]);
        $ordermaster->bindValue(":payment", $_POST["paymentMethod"]);
        $ordermaster->bindValue(":receiverPhone", $_POST["receiverPhone"]);
        $ordermaster->bindValue(":total", $_POST["total"]);
        $ordermaster->execute();
        $orderNo = $pdo->lastInsertId();

        //delete coupon
        if(isset( $_POST["coupon"])==true){
            $sql = "delete from couponitem WHERE couponNo = :couponNo";
            $coupondelete = $pdo->prepare($sql);
            $coupondelete->bindValue(":couponNo", $_POST["coupon"] );
            $coupondelete->execute();
        }
        

      
	    //寫入訂單明細
		$sql = "insert into orderdetails values (null , :orderNo , :offPdName , :orderQty, :pdPrice , :subTotal, :pdClassNo , :offPdImg)";
        $orderitems = $pdo->prepare( $sql );
		foreach( $_SESSION["quantity"] as $offPdNo => $quantity ){
            if( strstr($offPdNo,'c') == true){
                // $orderitems->bindValue(":productNo", null);
                $orderitems->bindValue(":pdClassNo", '1');
            } 
            else{
                // $orderitems->bindValue(":productNo", $offPdNo);
                $orderitems->bindValue(":pdClassNo", '0');
            }
            $orderitems->bindValue(":orderNo", $orderNo);
            $orderitems->bindValue(":offPdName", $_SESSION["offPdName"][$offPdNo]  );
            $orderitems->bindValue(":orderQty", $_SESSION["quantity"][$offPdNo]);
            $orderitems->bindValue(":pdPrice", $_SESSION["pdPrice"][$offPdNo]);
            $orderitems->bindValue(":offPdImg", $_SESSION["offPdImg"][$offPdNo]);
            $orderitems->bindValue(":subTotal", $_SESSION["pdPrice"][$offPdNo]*$_SESSION["quantity"][$offPdNo]);
            $orderitems->execute();
        }

        $pdo->commit(); //確認交易

        echo "下單成功";
        //清除購物車資料
        unset($_SESSION["offPdName"]);
        unset($_SESSION["offPdNo"]);
        unset($_SESSION["offPdImg"]);
	    unset($_SESSION["quantity"]);
		}
	catch(PDOException $e){
        echo "錯誤原因 : ", $e -> getMessage(), "<br>";
		echo "錯誤行號 : ", $e -> getLine(), "<br>";
    }//try ... catch
?>

</h2>

            <div class="cart_completeOrder_content">
                <p>1.本店僅提供台灣本島寄送服務(暫無提供離島)，果然配會
                    於1~4個工作天內將商品寄送到您的收貨地址。
                </p>
                <p>2.本店不會用任何理由要您去提款機做任何取消交易或轉帳
                    的動作，詐騙猖獗，小心詐騙。
                </p>
            </div>
        </div>
        <div class="cart_button">
             <a id="nextButton" class="common_btn common_btn_first" href="blog.php">
            <span class="common_btn_txt">看看別人的果汁配方 ➜</span>
            <div class="common_btn_blobs">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </a>
        </div>
       
        <div class="cart_completeOrder_bg">
            <div class="cart_completeOrder_carRun">
                <img src="images/cart/car.png" alt="" class="cart_completeOrder_car">
            </div>
            <div class="cart_completeOrder_roadControl">
                <img src="images/cart/road.png" alt="" class="cart_completeOrder_road">
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
</body>

</html>