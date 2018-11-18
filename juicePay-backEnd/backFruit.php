<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/backEndFruit.css">
    <script src="../js/plugin/jquery-3.3.1.min.js"></script>
</head>
<style>
    * {
        /* outline: 1px #f00 solid; */
    }
</style>
<body>
   <div class="d-flex">
 <?php
 try{
    require_once("../connectBooks.php");
    require_once('backNav.php'); 
 ?>
        <div class="col-xl-10">
            <div class="container">
                <div class="banner">
                    <img src="images/banner.png" alt="">
                </div>
                <div class="newPdUpArea">
                    <button id="showUpPd">上傳新水果</button>
                    <div class="newPdUp">
                        <table class="table">
                            <form action="backAddfruit.php" enctype="multipart/form-data" method="post" id="upForm">
                                <tr class="newPd">
                                    <th>水果名稱</th>
                                    <td><input type="text" name="fruitName"></td>
                                </tr>
                                <tr class="newPd">
                                    <th>色碼</th>
                                    <td style="vertical-align: middle;"><input type="text" name="fruitCol"><div class="colorShow"></div></td>
                                </tr>
                                <tr class="newPd">
                                    <th>照片</th>
                                    <td><input type="file" name="fruitImg" id="upFile" ><div id="upImg"></div></td>
                                </tr>
                                <tr class="newPd">
                                    <th>熱量</th>
                                    <td><input type="text" name="cal"></td>
                                </tr>
                                <tr class="newPd">
                                    <th>纖維含量</th>
                                    <td><input type="text" name="iron"></td>
                                </tr>
                                <tr class="newPd">
                                    <th>鐵含量</th>
                                    <td><input type="text" name="fiber"></td>
                                </tr>
                                <tr class="newPd">
                                    <th>維他命Ｃ含量</th>
                                    <td><input type="text" name="vinC"></td>
                                </tr>
                                <tr class="newPd">
                                    <th>商品功效</th>
                                    <td><textarea name="fruitInfo" cols="30" rows="10"></textarea></td>
                                </tr>
                                <tr class="newPd_status">
                                    <th>上下架狀態</th>
                                    <td><label for="upFruit" style="display: block;"><p><input type="radio" name="fruitStatus" value="1" id="upFruit">上架</p></label>
                                        <label for="downFruit"><p><input type="radio" name="fruitStatus" value="0" style="" id="downFruit">下架</p></label></td>
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

                <table class="haveFruit table">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>名稱</th>
                            <th>顏色</th>
                            <th>熱量</th>
                            <th>纖維</th>
                            <th>鐵</th>
                            <th>維他命</th>
                            <th>水果功效</th>
                            <th>圖片</th>
                            <th>狀態</th>
                            <th>詳情管理</th>
                            <th>上下架管理</th>
                        </tr>
                    </thead>
                    <tbody>
<?php   
    $sql = "select * from fruititem";
    $fruit = $pdo ->query($sql);
    $i=0;
    while($rowFruit=$fruit->fetch(PDO::FETCH_ASSOC)){
    ?>                        
                    <tr>
                                <form action="backFruitInfo.php" method="post" enctype="multipart/form-data" id="changeInfo<?php echo $rowFruit['fruitNo'] ?>">
                                    <td ><input style="display: none;" name="fruitNo" value="<?php echo $rowFruit['fruitNo'] ?>"><?php echo $rowFruit['fruitNo'] ?></td>
                                    <td><input class="fruitNotRead" type="text" name="fruitName" readonly value="<?php echo $rowFruit['fruitName'] ?>"></td>
                                    <td><input class="fruitNotRead" type="text" name="fruitCol" readonly value="<?php echo $rowFruit['fruitCol'] ?>"><div class="colorShow" style="background-color: #<?php echo $rowFruit['fruitCol'] ?>"></div></td>
                                    <td><input class="fruitNotRead" type="text" name="cal" readonly value="<?php echo $rowFruit['cal'] ?>"></td>
                                    <td><input class="fruitNotRead" type="text" name="iron" readonly value="<?php echo $rowFruit['iron'] ?>"></td>
                                    <td><input class="fruitNotRead" type="text" name="fiber" readonly value="<?php echo $rowFruit['fiber'] ?>"></td>
                                    <td><input class="fruitNotRead" type="text" name="vinC" readonly value="<?php echo $rowFruit['vinC'] ?>"></td>
                                    <td class="fruit_info"><textarea class="fruitNotRead" readonly name="fruitInfo"><?php echo $rowFruit['fruitInfo'] ?></textarea></td>
                                    <td class="fruit_pic"><label for="changeImg<?php echo $i; ?>"><img src="../images/<?php echo $rowFruit['fruitImg'] ;?>" alt="<?php echo $rowFruit['fruitName'] ;?>"><input type="file" name="fruitImg"  style="opacity: 0; position:absolute;left:-1000000000px; " class="upFile<?php echo $i; ?>" id="changeImg<?php echo $i; ?>">
                                        <div class="changeImg_btn">修改圖檔</div></label><div class="changeImg<?php echo $i; ?>"></div></td>
                                        <input style="display: none;" name="fruitImg2" value="<?php echo $rowFruit['fruitImg'] ;?>">
                                    
                                </form>
                                <td class="status<?php echo $rowFruit['fruitNo'] ?>">
                                    <?php if($rowFruit['fruitStatus']==1){
                                        echo "上架";
                                    }else{
                                        echo "下架";
                                    } ?></td>
                                <td>
                                    <button class="turnFruitInfo" id="<?php echo $rowFruit['fruitNo']?>">修改</button>
                                    <input style="display:none;" name="fruitNo" value="">
                                </td>
                                <td><button class="changeStatus" id="status_<?php echo $rowFruit['fruitNo']?>">
                                    <?php if($rowFruit['fruitStatus']==1){
                                        echo "下架";
                                    }else{
                                        echo "上架";
                                    } ?></button></td>
                            </tr>
<?php
$i++;
}
?>   
                        
                    </tbody>
                </table>
                <!-- <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                </ul> -->
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
//新增水果
        $('#showUpPd').click(function () {
            $('.newPdUp').show();
        });
//取消上傳
        $('#cancle').click(function(){
            $('.newPdUp').hide();
        })
//即時看到水果照片
		document.getElementById('upFile').onchange=function(e){
			box = document.getElementById('upImg');
			box.textContent='';
			var file = e.target.files[0];
			var reader = new FileReader();
			reader.onload=function(){
				var image = document.createElement('img');
				box.appendChild(image);
                image.src=reader.result;
				image.style.width='60px';
                
			};
			reader.readAsDataURL(file);
		};
        trNum = document.querySelectorAll('.haveFruit tr');
        console.log(trNum);
        for (var i = 0;i<trNum.length - 1; i++) {
            document.querySelector('.upFile'+i).onchange=modifyImgForChange;
            // console.log(document.querySelector('.upFile'+i));
        }
        
        function modifyImgForChange(e){
            box = e.target.parentNode.parentNode.lastChild;
            console.log(e.target);

            console.log(box);
            box.textContent='';
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload=function(){
                var image = document.createElement('img');
                box.appendChild(image);
                image.src=reader.result;
                image.style.width='60px';
                
            };
            reader.readAsDataURL(file);
            this.previousElementSibling.style.display='none';
        };
//即時看到水果顏色
    $('input[name="fruitCol"]').change(function(){
        this.nextElementSibling.style.backgroundColor="#"+this.value;
    });
//更改內容
    $('.fruitNotRead').click(function(){
        this.className+=' info';
        this.removeAttribute('readonly');
    })
    $('.turnFruitInfo').click(function(){
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
            xhr.open('post','backChangeFruitStatus.php',true);
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
<?php
}catch(PDOException $e){
  echo $e->getMessage();
}
?> 
</body>

</html>