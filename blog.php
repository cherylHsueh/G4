<?php
ob_start();
// session_start();
// m.memId = '1' and m.memPsw = '111'

try {
    require_once("connectBooks.php");
    $sql = "SELECT b.artNo, b.photo, b.artTitle, b.artContent,b.artResult, b.thumbFq, b.postTime, m.memName, f1.fruitImg fruitImg1, f2.fruitImg fruitImg2, f3.fruitImg fruitImg3, f1.fruitName fruitName1, f2.fruitName fruitName2, f3.fruitName fruitName3 From blog b, member m, fruititem f1, fruititem f2, fruititem f3 where m.memNo=b.memNo and b.fruitNo1=f1.fruitNo and b.fruitNo2=f2.fruitNo and b.fruitNo3=f3.fruitNo and b.artResult='0'
    ";
    $blogone = $pdo -> query( $sql );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>果然配</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="css/loginFruit.css">       
    <link rel="stylesheet" href="css/blog.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
    <script src="js/plugin/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/plugin/masonry.pkgd.min.js"></script>
    <script src="js/plugin/jquery.gallery.js"></script>
    <script src="js/plugin/modernizr.custom.53451.js"></script>
    <script src='js/global.js'></script>
    <script src="js/blog.js"></script>
</head>

<body>
    <?php
	require_once("php/nav.php");
	?>

    <div class="space"></div>

    <!-- BLOG_RANK -->
    <section class="blog_Rank clearfix">
        <div class="wrapper">
            <div class="blog_Headingbox">
                <div class="blog_Heading_pic">
                    <h2 class="blog_Heading">熱門文章TOP3 </h2>
                </div>
                <h3 class="blog_Subheading">為你喜愛的文章按讚留言</h3>
            </div>





            <!-- 手機輪播 -->
            <section id="phone" class="phone clearfix">
            
<?php
$sql ="select b.artNo, b.photo, b.artTitle, b.artContent, b.postTime, b.thumbFq, b.fruitRatio1 fruitRatio1,
 b.fruitRatio2 fruitRatio2, b.fruitRatio3 fruitRatio3, m.memName, f1.fruitImg fruitImg1, f2.fruitImg fruitImg2,
  f3.fruitImg fruitImg3, f1.fruitName fruitName1, f2.fruitName fruitName2, f3.fruitName fruitName3, f1.cal cal1,
   f1.iron iron1, f1.fiber fiber1, f1.vinC vinC1, f2.cal cal2, f2.iron iron2, f2.fiber fiber2, f2.vinC vinC2,
    f3.cal cal3, f3.iron iron3, f3.fiber fiber3, f3.vinC vinC3 from blog b, member m,fruititem f1, fruititem f2,
     fruititem f3 where m.memNo=b.memNo and b.fruitNo1=f1.fruitNo and b.fruitNo2=f2.fruitNo and 
     b.fruitNo3=f3.fruitNo order by thumbFq desc LIMIT 3";
$blogRankM = $pdo -> query( $sql );
$i=1;
while($blogRankMRow = $blogRankM->fetch(PDO:: FETCH_ASSOC)){
?>           
                <div class="blog_Rank_Container blog_Rank_Container<?php echo $i?>  cl-s-12" data-rank="<?php echo $i?>">
                    <div class="blog_Rank_Block cl-s-12 clearfix">
                        <div class="blog_Rank_Prize">
                            <img src="images/tag<?php echo $i?>.png" alt="第一名">
                        </div>
                        <div class="blog_Rank_LeftBox cl-s-6">
                            <div class="blog_Rank_Content ">
                                <div class="blog_Rank_Title cl-s-6 clearfix">
                                    <h4><?php echo $blogRankMRow["artTitle"]?></h4>
                                </div>
                                <div class="blog_Rank_Item cl-s-6 clearfix">
                                    <div class="blog_Rank_ItemPic">
                                        <img src="images/<?php echo $blogRankMRow["fruitImg1"]?>" alt="<?php echo $blogRankMRow["fruitName1"]?>" class="blog_Rank_FruitIcon">
                                    </div>
                                    <div class="blog_Rank_ItemPic">
                                        <img src="images/<?php echo $blogRankMRow["fruitImg2"]?>" alt="<?php echo $blogRankMRow["fruitName2"]?>" class="blog_Rank_FruitIcon">
                                    </div>
                                    <div class="blog_Rank_ItemPic">
                                        <img src="images/<?php echo $blogRankMRow["fruitImg3"]?>" alt="<?php echo $blogRankMRow["fruitName3"]?>" class="blog_Rank_FruitIcon">
                                    </div>
                                </div>
                            </div>
                            <div class="blog_Rank_Pic">
                                <img src="images/blogImg/<?php echo $blogRankMRow["photo"]?>" alt="熱門文章排名第三名" class="blog_Rank_Img">
                            </div>
                            <div class="blog_Rank_Name">
                                <p><?php echo $blogRankMRow["memName"]?></p>
                            </div>
                            <div class="blog_Rank_Date">
                                <span><?php echo $blogRankMRow["postTime"]?></span>
                            </div>


                            <div class="blog_Rank_Score clearfix">
                                <div class="blog_Score_Pic">
                                    <img src="images/blogImg/Score.png" alt="按讚總數" class="blog_Score_Img">
                                </div>
                                <div class="blog_Score_Num">
                                    <p><?php echo $blogRankMRow["thumbFq"]?></p>
                                </div>
                            </div>
                        </div>
                        <div class="blog_Rank_RightBox cl-s-6">

                            <div class="blog_Rank_Content ">
                                <div class="blog_Rank_Desc clearfix">
                                    <p><?php echo $blogRankMRow["artContent"]?></p>
                                </div>
                                <div class="blog_Rank_ContentBox cl-s-12 clearfix">
                                    <div class="chart diy_pickFruit_rightBox">
                                        <canvas class="chartcanvasM" id="myChartM<?php echo $blogRankMRow["artNo"]?>" height="300"></canvas>
                                    </div>
                                    <input type="hidden" id="chartratio1M<?php echo $blogRankMRow["artNo"]?>" class='chartratio1M' value="<?php echo $blogRankMRow["fruitRatio1"]?>">
                                    <input type="hidden" id="chartratio2M<?php echo $blogRankMRow["artNo"]?>" class='chartratio2M' value="<?php echo $blogRankMRow["fruitRatio2"]?>">
                                    <input type="hidden" id="chartratio3M<?php echo $blogRankMRow["artNo"]?>" class='chartratio3M' value="<?php echo $blogRankMRow["fruitRatio3"]?>">
                                    <input type="hidden" id="chartcal1M<?php echo $blogRankMRow["artNo"]?>" class='chartCal1M' value="<?php echo $blogRankMRow["cal1"]?>">
                                    <input type="hidden" id="chartcal2M<?php echo $blogRankMRow["artNo"]?>" class='chartCal2M' value="<?php echo $blogRankMRow["cal2"]?>">
                                    <input type="hidden" id="chartcal3M<?php echo $blogRankMRow["artNo"]?>" class='chartCal3M' value="<?php echo $blogRankMRow["cal3"]?>">
                                    <input type="hidden" id="chartiron1M<?php echo $blogRankMRow["artNo"]?>" class='chartIron1M' value="<?php echo $blogRankMRow["iron1"]?>">
                                    <input type="hidden" id="chartiron2M<?php echo $blogRankMRow["artNo"]?>" class='chartIron2M' value="<?php echo $blogRankMRow["iron2"]?>">
                                    <input type="hidden" id="chartiron3M<?php echo $blogRankMRow["artNo"]?>" class='chartIron3M' value="<?php echo $blogRankMRow["iron3"]?>">
                                    <input type="hidden" id="chartfiber1M<?php echo $blogRankMRow["artNo"]?>" class='chartFiber1M' value="<?php echo $blogRankMRow["fiber1"]?>">
                                    <input type="hidden" id="chartfiber2M<?php echo $blogRankMRow["artNo"]?>" class='chartFiber2M' value="<?php echo $blogRankMRow["fiber2"]?>">
                                    <input type="hidden" id="chartfiber3M<?php echo $blogRankMRow["artNo"]?>" class='chartFiber3M' value="<?php echo $blogRankMRow["fiber3"]?>">
                                    <input type="hidden" id="chartvinc1M<?php echo $blogRankMRow["artNo"]?>" class='chartVinc1M' value="<?php echo $blogRankMRow["vinC1"]?>">
                                    <input type="hidden" id="chartvinc2M<?php echo $blogRankMRow["artNo"]?>" class='chartVinc2M' value="<?php echo $blogRankMRow["vinC2"]?>">
                                    <input type="hidden" id="chartvinc3M<?php echo $blogRankMRow["artNo"]?>" class='chartVinc3M' value="<?php echo $blogRankMRow["vinC3"]?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
$i++;
};
?>
            </section>

            <!-- 桌機輪播 -->
            <div class="blog_Rank_bg">
                <section id="dg-container" class="dg-container">
                    <div class="dg-wrapper">
<?php
$sql ="select b.artNo, b.photo, b.artTitle, b.artContent, b.postTime, b.thumbFq, b.fruitRatio1 fruitRatio1,
b.fruitRatio2 fruitRatio2, b.fruitRatio3 fruitRatio3, m.memName, f1.fruitImg fruitImg1, f2.fruitImg fruitImg2,
 f3.fruitImg fruitImg3, f1.fruitName fruitName1, f2.fruitName fruitName2, f3.fruitName fruitName3, f1.cal cal1,
  f1.iron iron1, f1.fiber fiber1, f1.vinC vinC1, f2.cal cal2, f2.iron iron2, f2.fiber fiber2, f2.vinC vinC2,
   f3.cal cal3, f3.iron iron3, f3.fiber fiber3, f3.vinC vinC3 from blog b, member m,fruititem f1, fruititem f2,
    fruititem f3 where m.memNo=b.memNo and b.fruitNo1=f1.fruitNo and b.fruitNo2=f2.fruitNo and 
    b.fruitNo3=f3.fruitNo order by thumbFq desc LIMIT 3";
$blogRank = $pdo -> query( $sql );
$i=1;
while($blogRankRow = $blogRank->fetch(PDO:: FETCH_ASSOC)){

?>                        
                        <div class="blog_Rank_ContainerLap blog_Rank_Container1 cl-md-12" data-rank=<?php echo $i?>>
                            <div class="blog_Rank_Block cl-md-12 clearfix">
                                <div class="blog_Rank_Prize">
                                    <img src="images/tag<?php echo $i?>.png" alt="第一名">
                                </div>
                                <div class="blog_Rank_LeftBox cl-md-6">
                                    <div class="blog_Rank_Content ">
                                        <div class="blog_Rank_Title cl-md-6 clearfix">
                                            <h4><?php echo $blogRankRow["artTitle"]?></h4>
                                        </div>
                                        <div class="blog_Rank_Item cl-md-6 clearfix">
                                            <div class="blog_Rank_ItemPic">
                                                <img src="images/<?php echo $blogRankRow["fruitImg1"]?>" alt="<?php echo $blogRankRow["fruitName1"]?>" class="blog_Rank_FruitIcon">
                                            </div>
                                            <div class="blog_Rank_ItemPic">
                                                <img src="images/<?php echo $blogRankRow["fruitImg2"]?>" alt="<?php echo $blogRankRow["fruitName2"]?>" class="blog_Rank_FruitIcon">
                                            </div>
                                            <div class="blog_Rank_ItemPic">
                                                <img src="images/<?php echo $blogRankRow["fruitImg3"]?>" alt="<?php echo $blogRankRow["fruitName3"]?>" class="blog_Rank_FruitIcon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog_Rank_Pic">
                                        <img src="images/blogImg/<?php echo $blogRankRow["photo"]?>" alt="熱門文章排名第三名" class="blog_Rank_Img">
                                    </div>
                                    <div class="blog_Rank_Name">
                                        <p><?php echo $blogRankRow["memName"]?></p>
                                    </div>
                                    <div class="blog_Rank_Date">
                                        <span><?php echo $blogRankRow["postTime"]?></span>
                                    </div>


                                    <div class="blog_Rank_Score clearfix">
                                        <div class="blog_Score_Pic">
                                            <img src="images/blogImg/Score.png" alt="按讚總數" class="blog_Score_Img">
                                        </div>
                                        <div class="blog_Score_Num">
                                            <p><?php echo $blogRankRow["thumbFq"]?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog_Rank_RightBox cl-md-6">

                                    <div class="blog_Rank_Content ">
                                        <div class="blog_Rank_Desc clearfix">
                                            <p><?php echo $blogRankRow["artContent"]?></p>
                                        </div>
                                         <div class="chart diy_pickFruit_rightBox">
                                            <canvas class="chartcanvas" id="myChart<?php echo $blogRankRow["artNo"]?>" height="300"></canvas>
                                        </div>
                                        <input type="hidden" id="chartratio1<?php echo $blogRankRow["artNo"]?>" class='chartratio1' value="<?php echo $blogRankRow["fruitRatio1"]?>">
                                        <input type="hidden" id="chartratio2<?php echo $blogRankRow["artNo"]?>" class='chartratio2' value="<?php echo $blogRankRow["fruitRatio2"]?>">
                                        <input type="hidden" id="chartratio3<?php echo $blogRankRow["artNo"]?>" class='chartratio3' value="<?php echo $blogRankRow["fruitRatio3"]?>">
                                        <input type="hidden" id="chartcal1<?php echo $blogRankRow["artNo"]?>" class='chartCal1' value="<?php echo $blogRankRow["cal1"]?>">
                                        <input type="hidden" id="chartcal2<?php echo $blogRankRow["artNo"]?>" class='chartCal2' value="<?php echo $blogRankRow["cal2"]?>">
                                        <input type="hidden" id="chartcal3<?php echo $blogRankRow["artNo"]?>" class='chartCal3' value="<?php echo $blogRankRow["cal3"]?>">
                                        <input type="hidden" id="chartiron1<?php echo $blogRankRow["artNo"]?>" class='chartIron1' value="<?php echo $blogRankRow["iron1"]?>">
                                        <input type="hidden" id="chartiron2<?php echo $blogRankRow["artNo"]?>" class='chartIron2' value="<?php echo $blogRankRow["iron2"]?>">
                                        <input type="hidden" id="chartiron3<?php echo $blogRankRow["artNo"]?>" class='chartIron3' value="<?php echo $blogRankRow["iron3"]?>">
                                        <input type="hidden" id="chartfiber1<?php echo $blogRankRow["artNo"]?>" class='chartFiber1' value="<?php echo $blogRankRow["fiber1"]?>">
                                        <input type="hidden" id="chartfiber2<?php echo $blogRankRow["artNo"]?>" class='chartFiber2' value="<?php echo $blogRankRow["fiber2"]?>">
                                        <input type="hidden" id="chartfiber3<?php echo $blogRankRow["artNo"]?>" class='chartFiber3' value="<?php echo $blogRankRow["fiber3"]?>">
                                        <input type="hidden" id="chartvinc1<?php echo $blogRankRow["artNo"]?>" class='chartVinc1' value="<?php echo $blogRankRow["vinC1"]?>">
                                        <input type="hidden" id="chartvinc2<?php echo $blogRankRow["artNo"]?>" class='chartVinc2' value="<?php echo $blogRankRow["vinC2"]?>">
                                        <input type="hidden" id="chartvinc3<?php echo $blogRankRow["artNo"]?>" class='chartVinc3' value="<?php echo $blogRankRow["vinC3"]?>">
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
$i++;
};
?>
                       


                    </div>
                    <nav>
                        <span class="dg-prev"><img src="images/left01.png" alt="左箭頭"></span>
                        <span class="dg-next"><img src="images/right01.png" alt="右箭頭"></span>
                    </nav>

                </section>
                <img class='cloudBr' src="images/cloudBg(02).png" alt="雲">
                <img class='cloud1' src="images/cloudBg(05).png" alt="雲">
            </div>

        </div>

    </section>



    <!-- BLOG_FORUM -->
    <section class="blog_Forum clearfix">
        <div class="blog_Forum_wrapper wrapper">
            <div class="blog_Headingbox">
                <div id="blog_cloud5_active" class="blog_Headingbox_cloud5">
                    <img id="blog_cloud5_fruit1" class="fruit1" src="images/apple.png" alt="蘋果">
                    <img class="fruit2" src="images/guava.png" alt="芭樂">
                    <img id="blog_cloud5_paused" class="cloud5" src="images/cloud(02).png" alt="雲">
                </div>

                <div class="blog_Heading_pic">
                    <h2 class="blog_Heading">寫下我的獨特配方</h2>

                </div>
                <h3 class="blog_Subheading">#水果混搭MIX</h3>

                <div class="blog_Headingbox_cloud6">
                    <img id="blog_cloud6_fruit3" class="fruit3" src="images/watermelon.png" alt="西瓜">
                    <img class="fruit4" src="images/orange.png" alt="橘子">
                    <img id="blog_cloud6_paused" class="cloud6" src="images/cloud(03).png" alt="雲">
                </div>


            </div>
            <div class="blog_Forum_ButtonContainer">
                <a class="common_btn common_btn_first" href="blogSubmit.php">
                    <span class="common_btn_txt">分享配方</span>
                    <div class="common_btn_blobs">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </a>
            </div>
            <div class="blog_Forum_OptionContainer clearfix">
                <form method="post">  
                    <div class="blog_Forum_OptionRightBox">
                  
                       <div class="blog_Forum_SearchBar">
                        
                            <textarea id="keyword" type="text" name="keyword" placeholder="輸入關鍵字"></textarea>
                            <i id="search" class="fas fa-search"></i>
     
                            

                            
<script type="text/javascript">
function $id(id){
  	return document.getElementById(id);
  }	
function keyPress(event){
// event.preventDefault();
        if (event.keyCode == 13) { 
            //  alert("ok");
            sendFormkey();
        }
  };

 function sendFormkey(){
    //  alert( $id("keyword").value);
    //   =====使用Ajax 回server端,取回登入者姓名, 放到頁面上 
      var xhr = new XMLHttpRequest();
      xhr.onload = function (){
        if( xhr.status == 200){
            document.getElementById("filter").innerHTML = xhr.responseText; 
            document.getElementById("keyword").value= ''; 
            document.getElementById('NewShare').style.backgroundColor='transparent';
            document.getElementById('NewShare').style.color='#000';
            document.getElementById('HighScore').style.backgroundColor='transparent';
            document.getElementById('HighScore').style.color='#000';
            $('#container').masonry({
                // options 
                itemSelector: '.blog_Forum_Block',
                columnWidth: 0
            });
            init();
            // alert('scoreok');


        }else{
          alert(xhr.status);
        }
      }
      xhr.open("post", "blogkeyword.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      var data = "keyword=" + $id("keyword").value;
      xhr.send(data);    
    }
 
    document.getElementById("search").onclick = sendFormkey;
    document.getElementById("keyword").onkeypress = keyPress;
    
</script>



                        
                        <!-- <i id="search" class="fas fa-search"></i> -->
                    </div>
                </div>
                <div class="blog_Forum_OptionLeftBox clearfix">
                  
                    <a id="NewShare" class="blog_Forum_OptionLeftBox_NewShare" name="" >最新分享</a>
                    <a id="HighScore" class="blog_Forum_OptionLeftBox_HighScore" name="" >最高評分</a>
                </div>
                </form>
            

<script>
function $id(id){
  	return document.getElementById(id);
  }	

 function sendFormShare(){
    // event.preventDefault();
    
      var xhr = new XMLHttpRequest();
    //   alert('share');
      xhr.onreadystatechange = function (){
        if( xhr.readyState == 4){
        if( xhr.status == 200 ){
          document.getElementById("filter").innerHTML = xhr.responseText;  
        //   alert('orange');
            document.getElementById('NewShare').style.backgroundColor='#f1900f';
            document.getElementById('NewShare').style.color='#fff';
            document.getElementById('HighScore').style.backgroundColor='transparent';
            document.getElementById('HighScore').style.color='#000';
          //瀑布流
            $('#container').masonry({
                // options 
                itemSelector: '.blog_Forum_Block',
                columnWidth: 0
            });
            
            init();
            // alert('scoreok');

        }else{
          alert( xhr.status );
        }
      }
  }
      xhr.open("post", "blogNewShare.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      
      var data;
    //   alert($id('artNo').value);
      xhr.send(data);    
    }
 
//最高評分
function sendFormScore(){
    // event.preventDefault();
// alert('ok');
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function (){
    if( xhr.readyState == 4){
    if( xhr.status == 200 ){
      document.getElementById("filter").innerHTML = xhr.responseText;  
    //   alert('orange');
        document.getElementById('HighScore').style.backgroundColor='#f1900f';
        document.getElementById('HighScore').style.color='#fff';
        document.getElementById('NewShare').style.backgroundColor='transparent';
        document.getElementById('NewShare').style.color='#000';
      //瀑布流
    
            $('#container').masonry({
                // options 
                itemSelector: '.blog_Forum_Block',
                columnWidth: 0
            });
      init();
    //   alert('scoreok');

    }else{
      alert( xhr.status );
    }
  }
}
  xhr.open("post", "blogHighScore.php", true);
  xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
  
  var data;
//   alert($id('artNo').value);
  xhr.send(data);    
}

$id("HighScore").onclick = sendFormScore;
$id("NewShare").onclick = sendFormShare;



</script> 

            </div>

            <div id="filter" class="blog_Forum_Container clearfix">
                <div id="container" style="overflow:hidden; margin:0 auto;">

<?php
        while($blogRow = $blogone->fetchObject()){

?>
                    
                        <div class='blog_Forum_Block blog_Forum_Block1 cl-s-6'>
                            <a href='blogIn.php?artNo=<?php echo $blogRow ->artNo ?>'>
                            <div class='blog_Forum_Box clearfix'>
                                <div class='blog_Forum_Date'>
                                    <div>上傳日期:<?php echo $blogRow ->postTime; ?></div>
                                    <div><?php echo $blogRow ->memName?></div>
                                </div>
                                <div class='blog_Forum_Pic'>
                                    <img src='images/blogImg/<?php echo $blogRow->photo?>' alt='文章分享' class='blog_Forum_Img'>
                                </div>
                                <div class='blog_Share_Box clearfix'>
                                    <div class='blog_Share_BoxItem clearfix'>
                                        <div class='blog_Forum_item cl-s-8 clearfix'>
                                            <div class='blog_Forum_item_pic'>
                                                <img src='images/<?php echo $blogRow->fruitImg1?>' alt='<?php echo $blogRow->fruitName1?>' class='blog_Forum_FruitIcon'>
                                            </div>
                                            <div class='blog_Forum_item_pic'>
                                                <img src='images/<?php echo $blogRow->fruitImg2?>' alt='<?php echo $blogRow->fruitName2?>' class='blog_Forum_FruitIcon'>
                                            </div>
                                            <div class='blog_Forum_item_pic'>
                                                <img src='images/<?php echo $blogRow->fruitImg3?>' alt='<?php echo $blogRow->fruitName3?>' class='blog_Forum_FruitIcon'>
                                            </div>
                                        </div>
                                        <div class='blog_Forum_Score cl-s-4 clearfix'>
                                            <div class='blog_Forum_Score_Pic'>
                                                <img id="imgNum<?php echo $blogRow ->artNo ?>" src='images/blogImg/Score.png' alt='按讚總數' class='blog_Score_Img'>
                                            </div>
                                            <div class='blog_Forum_Score_Num'>
                                                <p class='greatNum' id='greatNum<?php echo $blogRow ->artNo ?>'><?php echo $blogRow->thumbFq?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='blog_Forum_Title'>
                                        <h4><?php echo $blogRow->artTitle?></h4>
                                    </div>
                                    <div class='blog_Forum_Desc'>
                                        <p><?php echo $blogRow->artContent?></p>
                                    </div>
                                    <div id="blogNum" class='blog_Forum_SubButtonContainer'>
                                        <a href='javascript:;' id='Num<?php echo $blogRow ->artNo ?>' class='blog_Forum_SubButtonContainer_Box blog_Forum_SubButtonContainer_Box<?php echo $blogRow ->artNo ?> pushGreat cl-s-6 cl-md-6'>
                                            <div class='blog_Forum_SubButtonContainer_Pic'>
                                                <img src='images/blogImg/noScore.png' alt='按讚總數' class='blog_Score_Img'>
                                            </div> 
                                            <input id="artNo" type="hidden" name="artNo" value="<?php echo $blogRow ->artNo?>">
                                            <input id="thumbNo" type="hidden" name="thumbNo" value="<?php echo $blogRow ->thumbFq?>">
                                            <span id="spanNum<?php echo $blogRow ->artNo ?>" class='blog_Forum_SubButton'>按讚</span>
                                        </a>

                                           

                                        <a href='blogIn.php?artNo=<?php echo $blogRow ->artNo?>#messagearea' class='blog_Forum_SubButtonContainer_Box cl-s-6 cl-md-6'>
                                            <div class='blog_Forum_SubButtonContainer_Pic'>
                                                <img src='images/blogImg/messagewhite.png' alt='留言圖示' class='blog_Score_Img'>
                                            </div>
                                            <span class='blog_Forum_SubButton'>留言</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                     </div>
<?php        
    };
?>


<script>

 function sendForm(){
    if( spanNumIn === '收回'){
        // alert('收回');
    var xhr = new XMLHttpRequest();
      xhr.onload = function (){
        if( xhr.status == 200){

            // alert($id(greatNum).innerHTML);
            dodelete();
            // alert($id(greatNum).innerHTML);
            
        }else{
          alert(xhr.status);
        }
      }
      xhr.open("post", "blogthumbdelete.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      var data = "artNo=" + arvalue +"&thumbFq=" + $id(greatNum).innerHTML;
    //   alert(data);
      xhr.send(data);
    }
    
    else if(spanNumIn === '按讚'){
        // alert('按讚');
    var xhr = new XMLHttpRequest();
      xhr.onload = function (){
        if( xhr.status == 200){
            // alert($id(greatNum).innerHTML);
            doplus();
            // alert($id(greatNum).innerHTML);
        }else{
        //   alert(xhr.status);
        }
      }
      xhr.open("post", "blogthumbplus.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      var data = "artNo=" + arvalue +"&thumbFq=" + $id(greatNum).innerHTML;
    //   alert(data);
      xhr.send(data);     
    }
 };   

 function init(){
     
    var pushGreat = document.querySelectorAll('.pushGreat');  
    for( i=0 ; i<pushGreat.length; i++){  
        pushGreat[i].addEventListener('click',function(){
            // alert(('#'+this.id+' input').value);
            arvalue = document.querySelector('#'+this.id+' input').value;
            Num = this.id;
            spanNum = 'span' +this.id;
            greatNum = 'great' + this.id;
            spanNumIn = document.querySelector('#'+spanNum).innerHTML;
            imgNum = 'img' + this.id;
            // alert(arvalue);
            sendForm();
     });
    };
}
window.onload = init;

</script>


                </div>
            </div>
        </div>
        <div class="blog_Forum_bg">
        </div>
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
<?php
}catch (PDOException $e) {
	echo "錯誤原因 : ", $e -> getMessage(), "<br>";
	echo "錯誤行號 : ", $e -> getLine(), "<br>";
	// echo "請聯絡系通人員";
}
?>

    <!-- <script src="js/blog.js"></script> -->


</body>

</html>