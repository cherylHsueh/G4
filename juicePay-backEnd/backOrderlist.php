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

                <table class="table">
                    <thead>
                        <tr>
                            <th>訂單編號</th>
                            <th>客戶名字</th>
                            <th>收件人</th>
                            <th>購買金額</th>
                            <th>訂單時間</th>
                            <th>訂單狀態</th>
                            <th>確認出貨</th>
                        </tr>
                    </thead>
                    <tbody>
     <?php   
    $sql = "select * from ordermaster, member where ordermaster.memNo=member.memNo order by ordermaster.orderNo";
    $order = $pdo ->query($sql);
    while($rowOrder=$order->fetch(PDO::FETCH_ASSOC)){
    ?> 
                        <tr>
                            <td><?php echo $rowOrder['orderNo'] ?></td>
                            <td><?php echo $rowOrder['memName'] ?></td>
                            <td><?php echo $rowOrder['receiverName'] ?></td>
                            <td><?php echo $rowOrder['orderPrice'] ?></td>
                            <td><?php echo $rowOrder['orderDate'] ?></td>
                            <td>
                            <?php if($rowOrder['orderStatus']==1){
                                        echo "已出貨";
                                    }else{
                                        echo "未出貨";
                                    } ?>
                            </td>
                            <td><button class="changeStatus" id="deliver_<?php echo $rowOrder['orderNo'] ?>" value='<?php echo $rowOrder['orderStatus'] ?>'>確認</button></td>
                        </tr>
    <?php
      };
    ?>

                    </tbody>
                </table>
                <ul class="pagination justify-content-center">

                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>

                </ul>
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
            $('.newPdUp').show();
        });
    </script>

    <script>
    //訂單出貨狀態改變
    $('.changeStatus').click(function () {

        orderNo=this.id.split('_')[1];
        orderStatus=this.value;
        this.parentNode.previousElementSibling.innerText='已出貨';
        // alert('ok');
        changeStatus();
        });


    //訂單出貨ajax改變資料庫
    function changeStatus(){
        // alert('ok');
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        // console.log(this.parentNode.previousSibling.previousSibling);
        if(xhr.status == 200){
            console.log('succes');
        }else{
            alert(xhr.status);
        }
    }
    xhr.open('post','backChangeOrderStatus.php',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    var data_info = "orderNo=" + orderNo + "&orderStatus=" + orderStatus;
    // alert(data_info);
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