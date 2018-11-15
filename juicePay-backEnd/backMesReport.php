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
        <div class="col-xl-2">
            <ul class="list-group selector">
                <a href="#">
                    <li class="left list-group-item text-center"><img src="images/logo.png" alt=""></li>
                </a>
                <a href="backFruit.html">
                    <li class="left list-group-item text-center">水果管理</li>
                </a>
                <a href="backBottle.html">
                    <li class="left list-group-item text-center">瓶子圖片管理</li>
                </a>
                <a href="backProduct.html">
                    <li class="left list-group-item text-center">官方商品管理</li>
                </a>
                <a href="backFarmer.html">
                    <li class="left list-group-item text-center">小農管理</li>
                </a>
                <a href="backBlogReport.html">
                    <li class="left list-group-item text-center">文章檢舉審核</li>
                </a>
                <a href="backMesReport.html">
                    <li class="left list-group-item text-center">留言檢舉審核</li>
                </a>
                <a href="backOrderlist.html">
                    <li class="left list-group-item text-center">訂單管理</li>
                </a>
                <a href="backMemManage.html">
                    <li class="left list-group-item text-center">會員帳號管理</li>
                </a>
                <a href="backEmpManage.html">
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
                            <th>停權/駁回</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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

</body>

</html>