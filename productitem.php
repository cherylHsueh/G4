<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>果然配</title>
    <script src="js/global.js"></script>
    <link rel="stylesheet" type="text/css" href="css/loginFruit.css">
    <link rel="stylesheet" href="css/productitem.css">
</head>

<body>
<?php
 require_once('php/nav.php');
?>

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
  require_once("connectBooks.php");
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
                    <h3> $<?php echo $prodRow->pdPrice ?></h3>
                    <h4 class="pdInfo">
                        <?php echo $prodRow->offPdInfo ?>
                    </h4>
                </div>
                <div class="pdItem_buyBlock cl-s-12 cl-md-3">

                    <form action="cartAdd.php"  id="buyform">
                        
		    	        <span>數量 : </span>
                        <input type="text" name="quantity" class="pdItem_buyBlock_qty" size="2" value="1">
                        <input type="hidden" name="offPdNo" value='<?php echo $prodRow->offPdNo;?>'>
                        <input type="hidden" name="offPdName" value='<?php echo $prodRow->offPdName;?>'>
                        <input type="hidden" name="offPdImg" value='<?php echo $prodRow->offPdImg;?>'>
                        <input type="hidden" name="pdPrice" value='<?php echo $prodRow->pdPrice;?>'>
                        
                        <a id="nextButton" class="common_btn common_btn_first">
                        <span class="common_btn_txt">放入購物車</span>
                        <div class="common_btn_blobs">
                        <div></div>
                        <div></div>
                        <div></div>
                        </div>
                        </a>
	                
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

<script>
function doFirst(){
    var fromButton = document.getElementById('nextButton');
    fromButton.addEventListener('click',fromSubmit);
}
function fromSubmit(){
           document.getElementById('buyform').submit();
}

window.addEventListener('load',doFirst);
</script>
</body>

</html>