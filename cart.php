<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>果然配</title>
    <link rel="stylesheet" type="text/css" href="css/loginFruit.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="js/plugin/jquery-3.3.1.min.js"></script>
    <script src='js/global.js'></script>

</head>

<body>

<?php
 require_once('php/nav.php');
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
                <th>商品圖片</th>
                <th>商品名稱</th>
                <th>數量</th>
                <th>單品金額</th>
                <th>合計</th>
                <th></th>
            </tr>

<?php 
if(isset($_SESSION["offPdName"]) == false){ //尚無購物資料
    echo "<tr><td>尚無購物資料</td></tr>";
    $total=0;
}else{
    $total=0;
	foreach( $_SESSION["offPdName"] as $offPdNo => $offPdName){
     ?>
      <tr>
        <td >
        <img class="pdimg" src='images/pd/<?php echo $_SESSION["offPdImg"][$offPdNo]; ?>' alt="">
        </td>
        <td>  
            <p><?php echo $_SESSION["offPdName"][$offPdNo];?> </p> 
        </td>


        <td>
            <input type="hidden" value="<?php echo $_SESSION["offPdNo"][$offPdNo]; ?>">
            <img src="images/cart/des.png" class="btnMins" alt="">
            <span class="qty2"><?php echo $_SESSION["quantity"][$offPdNo];?></span>
            <img src="images/cart/plus.png" class="btnPlus" alt="">
        </td>


        <td>
            <p><?php echo $_SESSION["pdPrice"][$offPdNo];?></p>
        </td>

        <td>
            <p class="cartsubtotal"><?php echo $_SESSION["pdPrice"][$offPdNo]*$_SESSION["quantity"][$offPdNo];?> </p>
        </td>
        
        <td>
            <form action="cartDelete.php">
               <input type="hidden" value="<?php echo $_SESSION["offPdNo"][$offPdNo]?>" name="offPdNo">
               <input class="delete" type="submit" name="btnDelete" value="刪除">
            </form>
        </td>
        </tr>
    <?php 
    $total = $total + $_SESSION["pdPrice"][$offPdNo]* $_SESSION["quantity"][$offPdNo];
	}//foreach
}
?>	   

        </table>
    </div>
    <div class="cart_priceCalculation clearfix">
    
        <div class="cart_priceCalculation_content">
            <p id="cartTotal">小計:$<?php echo $total;?> </p>
            <p>運費: $100 </p>
            <p id="cartTotalde">總金額(含運):$<?php echo $total+100;?></p>
            <br>
            <form action="cart2.php" id="myForm">
                <input type="hidden" value="<?php echo $total+100;?>" name="total" id="formTotal">
            </form>
            <a id="nextButton" class="common_btn common_btn_first">
                <span class="common_btn_txt" >下一步</span>
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
   
<script>
    function doFirst(){

        document.getElementById('nextButton').addEventListener('click',loginCheck);


    }
     
   function loginCheck(){
        var loginStatus = document.getElementById('spanLogin');
        if( loginStatus.innerHTML == "登入"){
            showLoginForm();
        }else{
            document.getElementById('myForm').submit();
        }
    }


    $('.btnPlus').click(function(){
        var cartTotal=0;
        var productNo = $(this).prev().prev().prev().val();
        // alert(productNo);
        var cartgearQty= parseInt($(this).prev().text());
        // alert(cartgearQty);
        var gearPrice = ($(this).parent().next().children().text());
        // alert(gearPrice);
        
        cartgearQty += 1;
        $(this).prev().text(cartgearQty);

        var cartsubtotal = gearPrice * cartgearQty;

        $(this).parent().next().next().children().text(cartsubtotal);
    
        for(var i= 0;i<$('.cartsubtotal').length;i++){
                cartTotal+=parseInt($('.cartsubtotal').eq(i).text());
                $('#cartTotal').text('小計:$'+cartTotal);
                // $('#confirmTotal').text(+Total+'元');
                $('#cartTotalde').text('總金額(含運):$' + (cartTotal+100));
                $('#formTotal').val(cartTotal+100);
        }
        var xhr = new XMLHttpRequest();
        xhr.onload = function (){   //checking function
            if( xhr.status == 200){
                var pNu=document.getElementById("pNu");
                // window.alert( xhr.status );
                pNu.innerHTML = xhr.responseText;
                console.log( xhr.responseText );
            }
        }
        var url = "cartUpdate.php?productNo=" + productNo + "&quantity=" + cartgearQty;
        console.log(url);
        xhr.open("get", url, true);
        xhr.send(null);

    });


    $('.btnMins').click(function(){
        var cartTotal=0;
        var productNo = $(this).prev().val();
        // alert(productNo);
        var cartgearQty= parseInt($(this).next().text());
        // alert(cartgearQty);
        var gearPrice = ($(this).parent().next().children().text());
        // alert(gearPrice);
        
        if (cartgearQty >1) {

            cartgearQty -= 1;

            $(this).next().text(cartgearQty);


            var cartsubtotal = gearPrice * cartgearQty;

            $(this).parent().next().next().children().text(cartsubtotal);

        for(var i= 0;i<$('.cartsubtotal').length;i++){
            cartTotal+=parseInt($('.cartsubtotal').eq(i).text());
            $('#cartTotal').text('小計:$'+cartTotal);
            // $('#confirmTotal').text(+Total+'元');
            $('#cartTotalde').text('總金額(含運):$' + (cartTotal+100));
            $('#formTotal').val(cartTotal+100);
        }
        
        var xhr = new XMLHttpRequest();
        xhr.onload = function (){   //checking function
            if( xhr.status == 200){
                var pNu=document.getElementById("pNu");
                // window.alert( xhr.status );
                pNu.innerHTML = xhr.responseText;
                console.log( xhr.responseText );
            }
        }
        var url = "cartUpdate.php?productNo=" + productNo + "&quantity=" + cartgearQty;
        console.log(url);
        xhr.open("get", url, true);
        xhr.send(null);
    }



});

    
    window.addEventListener('load',doFirst);
   
</script>
</body>

</html>
