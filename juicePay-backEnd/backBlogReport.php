<?php
ob_start();
// session_start();
// m.memId = '1' and m.memPsw = '111'

try {
    require_once("../connectBooks.php");
    $sql = "SELECT * FROM blog b, member m WHERE b.memNo=m.memNo and not(b.artReportFq=0) and b.artResult=0 order by b.artNo";
    $blogs = $pdo -> query( $sql );
?>
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

    .content{
        width: 50%;
    }
</style>

<body>

    <div class="d-flex">
        <div class="col-xl-2">
            <ul class="list-group selector">
                <a href="#">
                    <li class="left list-group-item text-center"><img src="images/logo.png" alt=""></li>
                </a>
                <a href="backFruit.php">
                    <li class="left list-group-item text-center">水果管理</li>
                </a>
                <a href="backBottle.php">
                    <li class="left list-group-item text-center">瓶子圖片管理</li>
                </a>
                <a href="backProduct.php">
                    <li class="left list-group-item text-center">官方商品管理</li>
                </a>
                <a href="backFarmer.php">
                    <li class="left list-group-item text-center">小農管理</li>
                </a>
                <a href="backBlogReport.php">
                    <li class="left list-group-item text-center">文章檢舉審核</li>
                </a>
                <a href="backMesReport.php">
                    <li class="left list-group-item text-center">留言檢舉審核</li>
                </a>
                <a href="backOrderlist.php">
                    <li class="left list-group-item text-center">訂單管理</li>
                </a>
                <a href="backMemManage.php">
                    <li class="left list-group-item text-center">會員帳號管理</li>
                </a>
                <a href="backEmpManage.php">
                    <li class="left list-group-item text-center">管理員帳號管理</li>
                </a>
            </ul>
        </div>
        <div class="col-xl-10">
            <div class="container">
                <div class="banner">
                    <img src="images/banner.png" alt="">
                </div>
                

                

                <table class="table">
                    <thead>
                        <tr>
                            <th>被檢舉文章</th>
                            <th>被檢舉人名稱</th>
                            <th>檢舉內容</th>
                            <th>狀態</th>
                            <th>停權/駁回</th>
                        </tr>
<?php
    while($blogRow = $blogs -> FetchObject()){

?>

                <tr>
                    <td><?php echo $blogRow ->artNo; ?></td>
                    <td><?php echo $blogRow ->memName; ?></td>
                    <td class="content"><?php echo $blogRow ->artContent; ?></td>
                    <td class="status<?php echo $blogRow ->artNo; ?>"></td>
                    <td>
                        <button class="agreeResult" id="agree_<?php echo $blogRow ->artNo;?>">停權</button>
                        <button class="rejectResult" id="reject_<?php echo $blogRow ->artNo;?>">駁回</button>
                    </td>
                </tr>

<?php
    };
?>

                    </thead>
                    <tbody>

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

//文章檢舉-停權狀態改變
$('.agreeResult').click(function () {

var artNo=this.id.split('_')[1];
var artResult= '1' ;
this.parentNode.previousElementSibling.innerText='停權';
agreeResult(artNo,artResult);
});

//文章檢舉-停權ajax改變資料庫
function agreeResult(artNo,artResult){
alert('ok');
var xhr = new XMLHttpRequest();
xhr.onload = function(){
    // console.log(this.parentNode.previousSibling.previousSibling);
    if(xhr.status == 200){
        if( xhr.responseText.indexOf("succes") != -1){
            console.log('succes');
            if(artNo = '1'){

            }            
        }
    }else{
        alert(xhr.status);
    }
}
xhr.open('post','backBlogAgreeResult.php',true);
xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
var obj = {
    artNo:artNo,
    artResult:artResult,
}
var loginInfo = JSON.stringify(obj);
var data_info = "loginInfo=" + loginInfo;
alert(data_info);
xhr.send(data_info);

};

//-------------------------------------------------

//文章檢舉-駁回狀態改變
$('.rejectResult').click(function () {

var artno=this.id.split('_')[1];
var artresult= '0' ;
this.parentNode.previousElementSibling.innerText='駁回';
rejectResult(artno,artresult);
});

//文章檢舉-駁回ajax改變資料庫
function rejectResult(artno,artresult){
alert('ok');
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
xhr.open('post','backBlogRejectResult.php',true);
xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
var obj = {
    artno:artno,
    artresult:artresult,
}
var loginInfo = JSON.stringify(obj);
var data_info = "loginInfo=" + loginInfo;
alert(data_info);
xhr.send(data_info);

};

</script>

    <?php
}catch (PDOException $e) {
	echo "錯誤原因 : ", $e -> getMessage(), "<br>";
	echo "錯誤行號 : ", $e -> getLine(), "<br>";
	// echo "請聯絡系通人員";
}
?>

</body>

</html>