<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>官方產品管理</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/backEnd.css">
</head>

<style>
.displayimg img{
    width:100px;
}

body .selector a:nth-child(4) li{
    background-color: #F4D66D;
    color:#9C7837;
}
.pdimg{
    width:100px;
}
input.info,textarea.info{
    border:#26c029 2px solid;
    border-radius: 10px;
    padding:  0 10px;
    background-color: transparent;
}
input,.newPd input ,.newPd textarea{
    border:#ccc 1px solid;
    border-radius: 0px;
}

</style>

<body>
    <div class="d-flex">
        <?php require_once('backNav.php'); 
              require_once("../connectBooks.php");?>
        <div class="col-xl-10">
            <div class="container">
                <div class="banner">
                    <img src="images/banner.png" alt="">
                </div>
                <div class="newPdUpArea">
                    <button id="showUpPd">上傳新產品</button>
                    <div class="newPdUp">
                        <table class="table">
                            <form action="backAddproduct.php" enctype="multipart/form-data" method="post" id="upForm">
                                <tr class="newPd">
                                    <th>商品名稱</th>
                                    <td><input type="text" name="pdName"></td>
                                </tr>
                                <tr class="newPd">
                                    <th>系列選擇</th>
                                    <td>
                                    <label for="c1"><p><input style="display: block;" type="radio" name="newpdcate" value="1" id="c1">美白系列</p></label>
                                    <label for="c2"><p><input style="display: block;" type="radio" name="newpdcate" value="2" id="c2">健康系列</p></label>
                                    <label for="c3"><p><input style="display: block;" type="radio" name="newpdcate" value="3" id="c3">補鐵系列</p></label>
                                    <label for="c4"><p><input style="display: block;" type="radio" name="newpdcate" value="4" id="c4">減肥系列</p></label>
                                    </td>
                                </tr>
                                <tr class="newPd">
                                    <th>價錢</th>
                                    <td><input type="text" name="pdPrice"></td>
                                </tr>
                                <tr class="newPd">
                                    <th>照片</th>
                                    <td><input type="file" name="pdImg" id="upFile" ><div id="upImg"></div></td>
                                </tr>
                                <tr class="newPd">
                                    <th>商品功效</th>
                                    <td><textarea name="offPdInfo" cols="30" rows="3"></textarea></td>
                                </tr>
                                <tr class="newPd_status">
                                    <th>上下架狀態</th>
                                    <td><label for="upFruit" style="display: block;"><p><input type="radio" name="pdStatus" value="1" id="upFruit">上架</p></label>
                                        <label for="downFruit"><p><input type="radio" name="pdStatus" value="0" style="" id="downFruit">下架</p></label></td>
                                </tr>
                                <tr class="newPd">
                                    <td colspan="2">
                                        <button type="submit">確認新增</button>
                                        <button type="reset" id="cancle">取消上傳</button>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>

                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>商品編號</th>
                            <th>商品名稱</th>
                            <th>商品分類</th>
                            <th>商品價格</th>
                            <th>商品敘述</th>
                            <th>商品圖片</th>
                            <th>狀態</th>
                            <th>商品詳情</th>
                            <th>上下架管理</th>
                        </tr>
                    </thead>
                    <tbody>

<?php
try {
    $sql = "select * from offcialpd a ,officalpdcate b where a.offCateNo = b.offCateNo" ;
    $products = $pdo -> query( $sql );
    while($prodRow = $products->fetch(PDO::FETCH_ASSOC)){
    $i=0;
?>


                <tr>
                    <form action="backProductInfo.php" method="post" enctype="multipart/form-data" id="changeInfo<?php echo $prodRow['offPdNo'] ?>">
                            <td><input class="fruitNotRead" name="offPdNo" type="text" value="<?php echo $prodRow['offPdNo']?>"></td>
                            <td><input class="fruitNotRead" name="offPdName" type="text" value="<?php echo $prodRow['offPdName']?>"></td>
                            <td><input class="fruitNotRead" name="offCateNo" type="text" value="<?php echo $prodRow['offCateNo']?>"></td>
                            <td><input class="fruitNotRead" name="pdPrice" type="text" value="<?php echo $prodRow['pdPrice']?>"></td>
                            <td><input class="fruitNotRead" name="offPdInfo" type="text" value="<?php echo $prodRow['offPdInfo']?>"></td>
                            <td class="displayimg"><img src="../images/pd/<?php  echo $prodRow['offPdImg']?>"></td>
                    </form>

                            <td>
                                <?php if($prodRow['offPdStatus']==1){
                                    echo "上架";}
                                     else{
                                    echo "下架";}
                                ?>
                            </td>
                            <td>
                                <button class="turnpdInfo" id="<?php echo $prodRow['offPdNo']?>">修改</button>         
                            </td>
                        <td>
                            <button class="changeStatus" id="status_<?php echo $prodRow['offPdNo']?>">
                                <?php if($prodRow['offPdStatus']==1){
                                    echo "下架";
                                }else{
                                    echo "上架";
                                } ?>
                            </button>
                        </td>
                </tr>


                    </tbody>

                    <?php
    }
 
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e -> getMessage(), "<br>";
    echo "錯誤行號 : ", $e -> getLine(), "<br>";
}
?>


                </table>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

    <script>

    //新增商品
        $('#showUpPd').click(function () {
            $('.newPdUp').show();
        });
    //取消上傳
        $('#cancle').click(function(){
            $('.newPdUp').hide();
        })
    //更改內容
        $('.fruitNotRead').click(function(){
            this.className+=' info';
            this.removeAttribute('readonly');
        })
        $('.turnpdInfo').click(function(){
            $('#changeInfo'+this.id).submit();
        })

    //水果上下架狀態改變
        $('.changeStatus').click(function () {
        var fruitNo=this.id.split('_')[1];
        var fruitStatus=this.innerText;
        if(this.innerText=='下架'){
            this.innerText='上架';
            this.parentNode.previousElementSibling.previousElementSibling.innerText='下架';
        }else{
            this.innerText='下架';
            this.parentNode.previousElementSibling.previousElementSibling.innerText='上架';
        } 
        changeStatus(fruitNo,fruitStatus);
        });

    //水果上下架ajax改變資料庫
    function changeStatus(fruitNo,fruitStatus){
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        // console.log(this.parentNode.previousSibling.previousSibling);
        if(xhr.status == 200){
            if( xhr.responseText.indexOf("succes") != -1){
                console.log('succes');
            }
        }else{
            alert(xhr.status);
        }
    }
    xhr.open('post','backChangeProductStatus.php',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    var obj = {
        fruitsNo:fruitNo,
        fruitsStatus:fruitStatus,
    }
    var loginInfo = JSON.stringify(obj);
    var data_info = "loginInfo=" + loginInfo;
    xhr.send(data_info);
    }  
    </script>

</body>

</html>