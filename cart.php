<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>果然配</title>
    <link rel="stylesheet" href="css/cart.css">
    <script src='js/global.js'></script>
</head>

<body>
<?php
 require_once('nav.php');
?>

    <div class="space"></div>
    <div class="cart_shoppingProcess_control clearfix">
        <div class="cart_shoppingProcess_step2">
            <span>STEP1</span>
            <img src="images/cart/cart.png" alt="">
        </div>
        <img class="cart_shoppingProcess_arrow" src="images/cart/right01.png" alt="">
        <div class="cart_shoppingProcess_step">
            <span>STEP2</span>
            <img src="images/cart/note.png" alt="">
        </div>
        <img class="cart_shoppingProcess_arrow" src="images/cart/right01.png" alt="">
        <div class="cart_shoppingProcess_step">
            <span>STEP3</span>
            <img src="images/cart/pass.png" alt="">
        </div>
    </div>
    <div class="cart_shoppingProcess_box">
        <p>購物車清單</p>
        <p>填寫寄送資料</p>
        <p>完成訂單</p>
    </div>
    <div class="cart_shoppingNotes">
        <div class="cart_shoppingNotes_control">
            <h2>購物須知</h2>
            <div class="cart_shoppingNotes_content">
                <p>訂購與配送：訂單付款成功後，商品將依訂單順序於(本島3-5工作天)內出貨，到貨日依指定物流配送時間而定。
                出貨天數的工作天，不包含週末及例假假日。若遇缺貨、瑕疵等商品狀況，會以電話聯繫。週末與國定假日訂購及配送：出貨工作日為週一至週五，週末不出貨，訂單會於週一安排出貨。</p> 
            </div>
        </div>
    </div>


    <div class="cart_shoppingList_control">
        <table class="cart_shoppingList_content">
            <tr>
                <th>商品名稱</th>
                <th>數量</th>
                <th>金額</th>
                <th>取消</th>
            </tr>



<?php 
if(isset($_SESSION["offPdName"]) == false){ //尚無購物資料
	echo "<tr><td>尚無購物資料</th></td>";
}else{
	foreach( $_SESSION["offPdName"] as $offPdNo => $offPdName){
     
     ?>
        <tr>
        <td class="cart_productName">  
            <img src="images/pd/pd_cate1_item3.png" alt="">
            <p> <?php echo $_SESSION["offPdName"][$offPdNo];?> </p> 
        </td>
        <td class="cart_productQuantity">
            <select>
                <option value="0">1</option>
                <option value="1">2</option>
                <option value="2">3</option>
                <option value="3">4</option>
                <option value="4">5</option>
                <option value="5">6</option>
                <option value="6">7</option>
                <option value="7">8</option>
                <option value="8">9</option>
                <option value="8">10</option>
            </select>
        </td>
        <td class="cart_productPrice">
            <p>NT:90</p>
        </td>
        <td class="cart_productCancel">
            <a href="javascript:;"><img src="images/cart/trashcan.png" alt=""></a>
        </td>
        </tr>


	<?php 
	}//foreach
	
}
?>	   

        </table>
    </div>
    <div class="cart_priceCalculation clearfix">
        <div class="cart_priceCalculation_content">
            <p>小計:</p>
            <span>選擇優惠卷
                <select>
                    <option value="0">9折</option>
                    <option value="1">8折</option>
                    <option value="2">7折</option>
                    <option value="3">6折</option>
                </select>
            </span>
            <p>折數:</p>
            <p>總金額(含運):</p>
            <p>&nbsp</p>
        
            <a id="nextButton" class="common_btn common_btn_first" href="cart2.html">
                <span class="common_btn_txt">下一步</span>
                <div class="common_btn_blobs">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </a>
            
        </div>
        <img src="images/cart/3box3.png" alt="">
    </div>
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
