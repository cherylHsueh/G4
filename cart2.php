<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>果然配</title>
    <link rel="stylesheet" type="text/css" href="css/loginFruit.css">
    <link rel="stylesheet" href="css/cart2.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script src="js/plugin/jquery-3.3.1.min.js"></script>
    <script src='js/global.js'></script>
    <script src="js/plugin/sweetalert2.min.js"></script>
</head>


<body>

<?php
 require_once('php/nav.php');
 require_once('connectBooks.php');
?>
 


    <div class="space"></div>
    <div class="cart_shoppingProcess_control clearfix">
        <div class="cart_shoppingProcess_step">
            <span>STEP1</span>
            <img src="images/cart/cart.png" alt="">
            <!-- <p>購物車清單</p> -->
        </div>
        <img class="cart_shoppingProcess_arrow" src="images/cart/right01.png" alt="">
        <div class="cart_shoppingProcess_step2">
            <span>STEP2</span>
            <img src="images/cart/note.png" alt="">
            <!-- <p>填寫寄送資料</p> -->
        </div>
        <img class="cart_shoppingProcess_arrow" src="images/cart/right01.png" alt="">
        <div class="cart_shoppingProcess_step">
            <span>STEP3</span>
            <img src="images/cart/pass.png" alt="">
            <!-- <p>完成訂單</p> -->
        </div>
    </div>
    <div class="cart_shoppingProcess_box">
        <p>購物車清單</p>
        <p class="p_p">填寫寄送資料</p>
        <p>完成訂單</p>
    </div>
    <div class="cart_fillInData_title_control">
        <div class="cart_fillInData_title">
            <h2>填寫寄送資料</h2>
        </div>
    </div>
    <div class="cart_fillInData">
        <form action="cart3.php" id="fillData" method="POST">
        <div class="cart_fillInData_control">
            <div class="cart_fillInData_content" >
                <h4>收件人</h4>
                <input type="text" id="receiver" name="receiverName">
            </div>
            <div class="cart_fillInData_content">
                <h4>連絡電話</h4>
                <input type="text" id="recePhone" name="receiverPhone">
            </div>
            <div class="cart_fillInData_content">
                <h5>付款方式</h5>
                <div class="cart_fillInData_paymentMethod_comtrol">
                    <input type="radio" checked="checked" name="paymentMethod" id="paymentMethod"  value="0">
                    <label for="paymentMethod">
                        <p class="cart_fillInData_paymentMethod">1.信用卡付款</p>
                        <img src="images/cart/credictcard.png" alt="">
                    </label>
                    <img id="check_1" class="cart_checked" src="images/cart/checked.png" alt="">
                </div>
                <div class="cart_fillInData_paymentMethod_comtrol">
                    <input type="radio" checked="checked" name="paymentMethod" id="paymentMethod2" value="1">
                    <label for="paymentMethod2">
                        <p class="cart_fillInData_paymentMethod">2.貨到付款</p>
                        <img src="images/cart/noteBox.png" alt="">
                    </label>
                    <img id="check_2" class="cart_checked" src="images/cart/checked.png" alt="">
                </div>
            </div>
            <div class="cart_fillInData_content">
                <h4>郵寄地址</h4>
                <input type="text" id="address" name="address">
            </div>
            <div class="cart_fillInData_content d-flex">
                <h4>商品金額</h5>
                <p id="price"><?php echo $_GET["total"];?></p>
            </div>
            <div class="cart_fillInData_content d-flex">
                <h4>折價卷</h4>
            
                
<?php 
        $sql = "select * from couponitem where memNo = :memNo";
        $coupon = $pdo->prepare($sql);
        $coupon->bindValue(":memNo", $_SESSION["memNo"] );
        $coupon->execute();
        if($coupon->rowCount()!=0){
?>
             <select name="coupon" id="coupon">
<?php            while($couponRow= $coupon->fetchObject()){
            


?>  
                    <option id="<?php echo  $couponRow->couponNo; ?>" value="<?php echo  $couponRow->couponNo; ?>"><?php echo $couponRow->discount,'折'; ?></option>
<?php



            }   
?>


                </select>
<?php
        }else{
            echo "<p>您尚未有優惠卷!!</p>";
        }
?>
                    
                 
            </div>
            <div class="cart_fillInData_content d-flex">
                <h4>總計 :$</h4>
                <p class="total" id="total"></p>
                <input style="display:none;" name="total" id="total2">
            </div>
            
        </div>

        </form>
    </div>


    <div class="cart_nextstepBox">
        <a id="nextButton" class="common_btn common_btn_first">
            <span class="common_btn_txt">下一步</span>
            <div class="common_btn_blobs">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </a>
    </div>
    <div class="cart_cart2Background">
        <img src="images/cart/City(02-1).png" alt="">
        <!-- <img src="images/cart/City(01-1).png" alt=""> -->
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
            phonerule =/^[09]{2}[0-9]{8}$/;


            var fromButton = document.getElementById('nextButton');
            fromButton.addEventListener('click',fromSubmit);
            var couponNo = $('#coupon').val();
            discount = $('#'+couponNo).text().replace('折','');
            if($('#coupon').val()!=null){
                $('#total').text($('#price').text()*discount/10);
                $('#total2').val($('#price').text()*discount/10);
            }else{
                $('#total').text($('#price').text());
                $('#total2').val($('#price').text());
            }
        }

        $('#coupon').change(function(){
            var couponNo = $('#coupon').val();
            discount = $('#'+couponNo).text().replace('折','');
            $('#total').text($('#price').text()*discount/10);
            $('#total2').val($('#price').text()*discount/10);
        })




        var paymentMethod = document.getElementById('paymentMethod');
        var paymentMethod2 = document.getElementById('paymentMethod2');
        var check_1 = document.getElementById('check_1');
        var check_2 = document.getElementById('check_2');

        paymentMethod.onclick = function () {
            check_1.style.opacity = '1';
            check_1.style.transition = '.5s';
            check_2.style.opacity = '0';
        }

        paymentMethod2.onclick = function () {
            check_1.style.opacity = '0';
            check_2.style.opacity = '1';
            check_2.style.transition = '.5s';
        }

        function fromSubmit(){
            
            var loginStatus = document.getElementById('spanLogin');
            if( loginStatus.innerHTML == "登入"){
                showLoginForm();
            }
            else if(phonerule.test($('#recePhone').val()) == false){
                    swal({
                    type: 'error',
                    title: '手機格式不對哦!',
                    text: '請輸入正確格式',
                    })
            }
            else{
           document.getElementById('fillData').submit();
            }
        }
        
        window.addEventListener('load',doFirst);
    </script>
</body>

</html>