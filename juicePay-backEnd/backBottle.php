<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>果然配-瓶子圖片管理</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/backEnd.css">
</head>
<style>
.selector a:nth-child(3) li{
    background-color: #F4D66D;
    color:#9C7837;
}

    .diy_designBottle_uploadBtn input{
     display: none;
    }
.diy_designBottle_uploadBtn p{
    width: 100px;
    border: 2px #26c029 solid;
    border-radius: 10px; 
    padding: 5px;
}

.bottleNewPdUp{
    margin: 30px 0; 
}
.btns input{
    width: 50px;
}
.statusChoose input{
    width: 10px;
}
</style>

<body>

    <div class="d-flex">
        <?php
try{
 require_once("../connectBooks.php");
 require_once('backNav.php'); 
  $sql = "select * from bottleimg";
  $bottlePics = $pdo->query($sql);
?>
        <div class="col-xl-10">
            <div class="container">
                <div  class="banner">
                    <img src="images/banner.png" alt="banner">
                </div>
                <div class="newPdUpArea">
                    <button id="showUpPd">新增圖檔</button>
                    <div class="newPdUp bottleNewPdUp">
                        <table class="table bottleTable">
                            <form action="backAddBottlePic.php" enctype="multipart/form-data" method="post" id="upForm">
                                <tr class="newPd">
                                    <th>瓶身圖案名稱</th>
                                   <td><input type="text" name="bottleName" id="bottleName"></td>                    
                                </tr>
                                <tr class="newPd">
                                    <th>圖檔</th>
                                    <td><div class="diy_designBottle_uploadBtn">
                                        <label class="diy_designBottle_uploadItem">
                                        <input type="file" accept="image/*"  name="uploadImg" id="uploadButton">
                                        <p>上傳圖片</p>
                                        <div id="upImg"></div>
                                        </label></td>
                                     </div>
                                </tr>
                                <tr class="newPd bottlenewPd">
                                    <th>上下架狀態</th> 
                                    <td class="statusChoose">
                                        <input type="radio" name="bottleStatus" value="1">上架
                                        <input type="radio" name="bottleStatus" value="0" >下架
                                    </td>                                        
                                </tr>
                                <tr>
                                    <td colspan="2" class="btns">
                                        <button type="submit">確認新增</button>
                                        <button type="reset" id="cancel">取消上傳</button>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>瓶身圖案編號</th>
                            <th>瓶身圖案名稱</th>
                            <th>瓶身圖案</th>
                            <th>目前狀態</th>
                            <th>上/下架</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php while($bottlePicRow = $bottlePics->fetchObject()){ ?>
                        <tr >
                            <td><?php echo $bottlePicRow->bottleNo ?></td>
                            <td><?php echo $bottlePicRow->bottleName ?></td>
                            <td class="bottlePic"><img src="../images/diy/<?php echo $bottlePicRow->bottleImg ?> " alt="officalPic" style="width:60px;"></td>
                            <td>
                                <div class="changeStatus">
                                <?php 
                                    if($bottlePicRow->bottleStatus==1){
                                        echo "上架";
                                    }else{
                                        echo "下架";
                                    } 
                                ?>               
                                </div>
                            </td>
                            <td>
                                <button class="changeStatus" id="status_<?php echo $bottlePicRow->bottleNo?>">
                                <?php 
                                    if($bottlePicRow->bottleStatus==1){
                                        echo "下架";
                                    }else{
                                        echo "上架";
                                    } 
                                ?>               
                                </button>
                            </td>
                        </tr>
                         <?php 
                            }
                                }catch(PDOException $e){
                                echo "error~<br>";
                                 echo $e->getMessage() , "<br>";
                             }
                          ?>
                    </tbody>
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
        $('#showUpPd').click(function () {
            $('.newPdUp').toggle();
        });
          $('#cancel').click(function () {
            $('.newPdUp').hide();
        });      

          //預覽上傳圖片
        document.getElementById('uploadButton').onchange=function(e){
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
        //上下架狀態改變
        $('.changeStatus').click(function () {
            var bottleNo=this.id.split('_')[1];
             var bottleStatus=this.innerText;
            if(this.innerText=='下架'){
                this.innerText='上架';
                this.parentNode.previousElementSibling.innerText='下架';
            }else{
                this.innerText='下架';
                this.parentNode.previousElementSibling.innerText='上架';
            } 
            changeStatus(bottleNo,bottleStatus);
         });
        //上下架ajax改變資料庫
        function changeStatus(bottleNo,bottleStatus){
        
            var xhr = new XMLHttpRequest();
            xhr.onload = function(){
                if(xhr.status == 200){
                    if( xhr.responseText.indexOf("success") != -1){
                        console.log('success');
                    }
                }else{
                    alert(xhr.status);
                }
            }
            xhr.open('post','backChangeBottleImgStatus.php',true);
            xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
            var obj = {
                bottlesNo:bottleNo,
                bottlesStatus:bottleStatus,
            }
            var loginInfo = JSON.stringify(obj);
            var data_info = "loginInfo=" + loginInfo;
            xhr.send(data_info);
         }   
    </script>

</body>

</html>