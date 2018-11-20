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
</head>
<style>
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

                <table class="table">
                    <thead>
                        <tr>
                            <th>會員帳號</th>
                            <th>停權狀態</th>
                            <th>權限管理</th>
                        </tr>
                    </thead>
                 <!--    <tbody>
                        <tr>
                            <td>cherylG4</td>
                            <td>1</td>
                            <td><button>停權</button></td>
                        </tr>
                    </tbody> -->
                  <tbody>   
               <!--  <form id="fruitInfoForm" action="backmanageifo.php" method="post"> -->
<?php   
    $sql = "select * from member";
    $backmember = $pdo ->query($sql);
    while($rowmember=$backmember->fetch(PDO::FETCH_ASSOC)){
    ?>                        <tr>
                                <td><?php echo $rowmember['memId'] ?></td>
                                <td class="status<?php echo $rowmember['memNo'] ?>">
                                    <?php if($rowmember['memStatus']==1){
                                        echo "有權";
                                    }else{
                                        echo "停權";
                                    } ?></td>
                                <td><button class="changeStatus"  id="status_<?php echo $rowmember['memNo']?>">
                                    <?php if($rowmember['memStatus']==1){
                                        echo "停權";
                                    }else{
                                        echo "有權";
                                    } ?></button></td>
                            </tr>
<?php
}
?>   
                  <!--    </form> -->
                    </tbody>
                </table>
               <!--  <ul class="pagination justify-content-center">

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


//停權有權狀態改變
        $('.changeStatus').click(function () {
            memNo=this.id.split('_')[1];
            memStatus=this.innerText;
            if(this.innerText=='停權'){
                this.innerText='有權';
                this.parentNode.previousElementSibling.innerText='停權';
            }else{
                this.innerText='停權';
                this.parentNode.previousElementSibling.innerText='有權';
            } 
            changeStatus(memNo,memStatus);
         });
//水果上下架ajax改變資料庫
        function changeStatus(memNo,memStatus){
        
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
            xhr.open('post','backChangememStatus.php',true);
            xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
            var obj = {
                memNo:memNo,
                memStatus:memStatus,
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