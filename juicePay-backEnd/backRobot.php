<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/backEnd.css">
    <script src="../js/plugin/jquery-3.3.1.min.js"></script>
</head>
<style>
    * {
        /* outline: 1px #f00 solid; */
    }
    .selector a:nth-child(8) li{
    background-color: #F4D66D;
    color:#9C7837;
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
                    <button id="showUpPd">上傳新問答</button>
                    <div class="newPdUp">
                        <table class="table">
                            <form action="backAddKey.php" id="upForm">
                                <tr class="newPd">
                                    <th>問答關鍵字</th>
                                    <td><input type="text" name="keyContent"></td>
                                </tr>
                                <tr class="newPd">
                                    <th>回答</th>
                                    <td><input type="text" name="keyAns"></td>
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
                            <th>問答關鍵字</th>
                            <th>回答</th>
                            <th>刪除</th>
                        </tr>
                    </thead>
                    <tbody>
<?php   
    $sql = "select * from robot order by keyNo desc";
    $robot = $pdo ->query($sql);
    while($rowRobot=$robot->fetch(PDO::FETCH_ASSOC)){
    ?>                        
                            <tr id="<?php echo $rowRobot['keyNo'] ?>">
                                <form action="backFruitInfo.php" method="post" enctype="multipart/form-data">
                                    <td ><?php echo $rowRobot['keyNo'] ?></td>
                                    <td><?php echo $rowRobot['keyContent'] ?></td>
                                    <td><?php echo $rowRobot['keyAns'] ?></td>
                                </form>
                                <td><button class="delete">刪除</button></td>
                            </tr>
<?php
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
//新增表格
        $('#showUpPd').click(function () {
            $('.newPdUp').show();
        });
//取消上傳
        $('#cancle').click(function(){
            $('.newPdUp').hide();
        })
 //刪除
$('.delete').click(function(e){
    var no = this.parentNode.parentNode.id;
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
            // console.log(this.parentNode.previousSibling.previousSibling);
        if(xhr.status == 200){
            if( xhr.responseText.indexOf("succes") != -1){
                $('#'+no).remove();
            }
        }else{
            alert(xhr.status);
        }
    }
    xhr.open('post','backKeyRemove.php',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');

    var data_info = "keyNo=" +no;
    xhr.send(data_info);
})

        
    

    </script>
<?php
}catch(PDOException $e){
  echo $e->getMessage();
}
?> 
</body>

</html>