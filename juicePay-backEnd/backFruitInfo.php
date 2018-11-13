<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/backEnd.css">
    <script src="../js/plugin/jquery-3.3.1.min.js"></script>
</head>
</head>
<body>
<div class="d-flex">
<?php
    echo $_POST["fruitNo"];

try{
    require_once("../connectBooks.php");	  
    require_once('backNav.php'); 
?>
	<div class="col-xl-10">
	    <div class="container">
	        <div class="banner">
	             <img src="images/banner.png" alt="">
	        </div>
	        <div class="fruitsInfo">
			<table class="table">
			   <form action="backFruitModify.php" enctype="multipart/form-data" method="post" id="upForm">
<?php
    $sql = "select * from fruititem where fruitNo = :fruitNo";
    $fruit = $pdo ->prepare($sql);
    $fruit->bindValue(':fruitNo',$_POST["fruitNo"]);
    $fruit->execute();
    while($rowFruit=$fruit->fetch(PDO::FETCH_ASSOC)){
?>	    
	                <tr class="newPd">
	                    <th>水果名稱</th>
	                    <td><input type="text" name="fruitName" value="<?php echo $rowFruit['fruitName'] ?>"></td>
	                </tr>
	                <tr class="newPd">
	                    <th>色碼</th>
	                    <td style="vertical-align: middle;"><input type="text" name="fruitCol" id="upColor" value="<?php echo $rowFruit['fruitCol'] ?>"><div style="background-color: #<?php echo $rowFruit['fruitCol'] ?>;width: 30px;height: 30px;"></div></td>
	                </tr>
	                <tr class="newPd">
	                    <th>照片</th>
	                    <td><img src="" alt=""><input type="file" name="fruitImg" id="upFile"  accept="fruitImages/*" value="更換圖片"><div id="upImg"></div></td>
	                </tr>
	                <tr class="newPd">
	                    <th>熱量</th>
	                    <td><input type="text" name="cal" value="<?php echo $rowFruit['cal'] ?>"></td>
	                </tr>
	                <tr class="newPd">
	                    <th>纖維含量</th>
	                    <td><input type="text" name="iron" value="<?php echo $rowFruit['iron'] ?>"></td>
	                </tr>
	                <tr class="newPd">
	                    <th>鐵含量</th>
	                    <td><input type="text" name="fiber" value="<?php echo $rowFruit['fiber'] ?>"></td>
	                </tr>
	                <tr class="newPd">
	                    <th>維他命Ｃ含量</th>
	                    <td><input type="text" name="vinC" value="<?php echo $rowFruit['vinC'] ?>"></td>
	                </tr>
	                <tr class="newPd">
	                    <th>商品功效</th>
	                    <td><textarea name="fruitInfo" cols="30" rows="10"><?php echo $rowFruit['fruitInfo'] ?></textarea></td>
	                </tr>
	                <tr class="newPd_status">
	                    <th>上下架狀態</th>
	                    <td> <?php if($rowFruit['fruitStatus']==1){
	                             echo "上架";
	                         }else{
	                             echo "下架";
	                         } ?>
	                    </td>
	                </tr>
	                <tr class="newPd">
	                    <td colspan="2">
	                        <button type="submit">確認修改</button>
	                        <button id="cancle">放棄修改</button>
	                    </td>
	                </tr>
	            

<?php
}
?>
				</form>
		     </table>
		 </div>
     </div>
  </div>
</div>
<?php
}catch(PDOException $e){
  echo $e->POSTMessage();
}
?>   
</body>
</html>
