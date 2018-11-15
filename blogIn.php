<?php
ob_start();
// session_start();
$artNo = $_REQUEST['artNo'];
try {
    require_once("connectBooks.php");
    $sql = "SELECT b.artNo, b.photo, b.artTitle, b.cal, b.iron, b.fiber, b.vinC, b.artContent, b.thumbFq, b.artReportFq, m.memName, f1.fruitImg fruitImg1, f2.fruitImg fruitImg2, f3.fruitImg fruitImg3, f1.fruitName fruitName1, f2.fruitName fruitName2, f3.fruitName fruitName3, me.mesNo, me.mesContent, me.mesTime, me.mesReportFq From blog b, member m, message me,fruititem f1, fruititem f2, fruititem f3 where m.memNo=b.memNo and b.fruitNo1=f1.fruitNo and b.fruitNo2=f2.fruitNo and b.fruitNo3=f3.fruitNo and b.artNo = me.artNo and b.artNo = $artNo
    ";
    $blogs = $pdo -> query( $sql );

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>果然配</title>
    <link rel="stylesheet" type="text/css" href="css/loginFruit.css">
    <link rel="stylesheet" href="css/blog.css">
    <script src='js/global.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
    <script src="js/plugin/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/blog.js"></script>
</head>

<body>
    
<?php
    require_once("php/nav.php");
?>

    <div class="umbrellaApple">
        <img src="images/blogImg/umbrellaApple.png" alt="降落傘蘋果">
    </div>

    <div class="blogIn_bgc">
        <div class="space"></div>

        <!-- SHARE_ARTICAL -->


        <section class="blogIn_Share">
            <div class="wrapper">
                <div class="blogIn_Headingbox">
                    <div class="blogIn_umbrellaguava">
                        <img src="images/blogImg/umbrellaGuava.png" alt="熱氣球芭樂">
                    </div>
                    <h2 class="blog_Heading">分享配方</h2>
                    <div class="blogIn_cloud">
                        <img src="images/cloud(03).png" alt="雲">
                    </div>
                </div>

                <?php
                    $blogRow = $blogs->Fetch(PDO:: FETCH_ASSOC);

                ?>

                <div class="blogIn_Container clearfix">
                    <div class="blogIn_LeftBox cl-md-6">
                        <div class="blogIn_LeftBox_Pic">
                            <img src="images/blogImg/<?php echo $blogRow["photo"]?>" alt="文章分享">
                        </div>
                        <div class="blogIn_LeftBox_NameContainer clearfix">
                            <div class="blogIn_LeftBox_NamePic cl-s-6 cl-md-6">
                                <img src="images/blogImg/memberPic.png" alt="分享者">
                            </div>
                            <div class="blog_LeftBox_NameTitle cl-s-5 cl-md-5">
                                <p><?php echo $blogRow["memName"]?></p>
                            </div>
                            <div class="blog_Rank_Score cl-s-2 cl-md-2">
                                <div class="blog_Score_Pic">
                                    <img id="imgNum" src="images/blogImg/Score.png" alt="按讚總數" class="blog_Score_Img">
                                </div>
                                <div class="blog_Score_Num">
                                    <p id="greatNum"><?php echo $blogRow["thumbFq"]?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blogIn_RightBox cl-md-6">
                        <div class="blogIn_RightBox_TitleContainer clearfix">
                            <div class="blogIn_RightBox_TitleContent clearfix">
                                <div class="blogIn_RightBox_TitleName cl-s-4 cl-md-6">
                                    <h4><?php echo $blogRow["artTitle"]?></h4>
                                </div>
                                <div class="blogIn_RightBox_TitlePic cl-s-8  cl-md-6 clearfix">
                                    <div class="blogIn_RightBox_PicItem cl-s-4 cl-md-2">
                                        <img src='images/<?php echo $blogRow["fruitImg1"]?>' alt='<?php echo $blogRow["fruitName1"]?>'>
                                    </div>
                                    <div class="blogIn_RightBox_PicItem cl-s-4 cl-md-2">
                                        <img src='images/<?php echo $blogRow["fruitImg2"]?>' alt='<?php echo $blogRow["fruitName2"]?>'>
                                    </div>
                                    <div class="blogIn_RightBox_PicItem cl-s-4 cl-md-2">
                                        <img src='images/<?php echo $blogRow["fruitImg3"]?>' alt='<?php echo $blogRow["fruitName3"]?>'>
                                    </div>
                                </div>
                            </div>

                            <!-- 私藏分頁的 -->
                            <div class="blog_Rank_ContentBox cl-s-12 clearfix">
                            <div class="chart diy_pickFruit_rightBox">
                                            <canvas class="blogcanvas" id="blogmyChart" height="300"></canvas>
                                        </div>
                                        <input type="hidden" id="blogcal" class='blogCal' value="<?php echo $blogRow["cal"]?>">
                                        <input type="hidden" id="blogiron" class='blogIron' value="<?php echo $blogRow["iron"]?>">
                                        <input type="hidden" id="blogfiber" class='blogFiber' value="<?php echo $blogRow["fiber"]?>">
                                        <input type="hidden" id="blogvinc" class='blogVinc' value="<?php echo $blogRow["vinC"]?>">

                                    </div>

                            <form action="post">
                            <div class="blogIn_RightBox_ShareContainer clearfix">
                                <div class="blogIn_RightBox_ShareContent clearfix">
                                    <p><?php echo $blogRow["artContent"]?></p>
                                </div>
                                <div class="blogIn_RightBox_subButtonContainer clearfix">
                                    <a id="Numthumb" href="javascript:;" class="blogIn_RightBox_subButtonItem">
                                        <div>
                                            <img src="images/blogImg/noScore.png" alt="按讚">
                                        </div>
                                        <span id="spanNum">按讚</span>
                                    </a>
                                    <?php 
                                        $sql = "select me.mesContent, b.artNo, b.thumbFq from blog b, message me where b.artNo=me.artNo and b.artNo = $artNo" ;
                                        $message = $pdo -> query( $sql );    
                                        while($mesRow = $message->fetchObject()){
                                     ?>                                        
                                        <input id="thumbArtNo" type="hidden" name="thumbArtNo" value="<?php echo $mesRow->artNo?>">
                                        <input id="thumbNo" type="hidden" name="thumbNo" value="<?php echo $mesRow->thumbFq?>">
                                     <?php
                                        };
                                    ?>


                                    <a href="#messagearea" class="blogIn_RightBox_subButtonItem">
                                        <div>
                                            <img src="images/blogImg/messagewhite.png" alt="留言">
                                        </div>
                                        <span>留言</span>
                                    </a>
                                    <a id="ReportNum" href="javascript:;" class="blogIn_RightBox_subButtonItem">
                                        <div>
                                            <img src="images/blogImg/alertwhite.png" alt="檢舉">
                                        </div>
                                        <span>檢舉</span>
                                    </a>
                                    <input type="hidden" id="FqNum" name='Fqnum' value="<?php echo $blogRow["artReportFq"]?>">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>

<script>
function $id(id){
  	return document.getElementById(id);
  };
$id('ReportNum').onclick = sendFormFq;

function sendFormFq(){
    
    if($id('FqNum').value == ''){
        $id('FqNum').value = 0;

        var xhr = new XMLHttpRequest();
        xhr.onload = function (){
        if( xhr.status == 200){
            alert('plus');
        }else{
            alert(xhr.status);
            }
        };
        xhr.open("post", "blogartreportNumPlus.php", true);
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
        var data = "artNo=" + $id("artNo").value + "&artReportFq=" + $id('FqNum').value;
        alert(data);
        xhr.send(data);     
    }else if($id('FqNum').value != ''){
        var xhr = new XMLHttpRequest();
        xhr.onload = function (){
        if( xhr.status == 200){
            alert('add');
        }else{
            alert(xhr.status);
            }
        };
        xhr.open("post", "blogartreportNumPlus.php", true);
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
        var data = "artNo=" + $id("artNo").value + "&artReportFq=" + $id('FqNum').value;
        alert(data);
        xhr.send(data);     
    }
}
</script>



<script>
// alert('ok');
function $id(id){
  	return document.getElementById(id);
  }	
function sendFormthumb(){
    // alert($id('spanNum').innerHTML);
   if( $id('spanNum').innerHTML === '收回'){
    //    alert('收回');
   var xhr = new XMLHttpRequest();
     xhr.onload = function (){
       if( xhr.status == 200){

        //    alert($id('greatNum').innerHTML);
           dodeleteIn();
        //    alert('ok');
        //    alert($id('greatNum').innerHTML);
           
       }else{
         alert(xhr.status);
       }
     }
     xhr.open("post", "blogthumbdeleteIn.php", true);
     xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
     var data = "artNo=" + $id('thumbArtNo').value +"&thumbFq=" + $id('greatNum').innerHTML ;
    //  alert(data);
     xhr.send(data);
   }
   
   else if($id('spanNum').innerHTML === '按讚'){
    //    alert('按讚');
   var xhr = new XMLHttpRequest();
//    alert('123');
     xhr.onload = function (){
       if( xhr.status == 200){
        //    alert($id('greatNum').innerHTML);
           doplusIn();
        //    alert('ok');
        //    alert($id('greatNum').innerHTML);
       }else{
         alert(xhr.status);
       }
     }
     xhr.open("post", "blogthumbplusIn.php", true);
     xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
     var data = "artNo=" + $id('thumbArtNo').value +"&thumbFq=" + $id('greatNum').innerHTML;
    //  alert(data);
     xhr.send(data);  
   }
};   

// function initthumb(){
//     alert('ok');
    $id("Numthumb").onclick = sendFormthumb;
//    $id('Num').onclick = sendFormthumb;
   
// }
// window.onload = initthumb;
</script>





        <section id="messagearea" class="blogIn_Msg">
            <div class="umbrellaOrange">
                <img src="images/blogImg/umbrellaOrange.png" alt="降落傘柳橙">
            </div>
              
            <div class="wrapper">
                <div class="blogIn_Msg_sendContainer">
                    <div id="blogIn_Msg_SendBlock" class="blogIn_Msg_SendBlock clearfix">
  
                        <?php
                                while($blogRow = $blogs->fetchObject()){
                        ?>   
                            <div class="blogIn_Msg_SendWrapper clearfix">
                        
                            <div class="blogIn_Msg_SendBox cl-s-2 cl-md-2">
                                <div class="blogIn_Msg_SendPic">
                                    <img src="images/blogImg/memberPic.png" alt="留言者">
                                </div>
                                <p><?php echo $blogRow->memName?></p>
                            </div>
                            <div class="blogIn_Msg_SendBox blogIn_Msg_SendBox2 cl-s-7 cl-md-8">
                                <div class="blogIn_Msg_SendContent">
                                    <p><?php echo $blogRow->mesContent?></p>
                                </div>
                                <div class="blogIn_Msg_SendDate">
                                    <p><?php echo $blogRow->mesTime?></p>
                                </div>
                            </div>
                            <!-- <a href="javascript:;" > -->
                            <input type="button" id="Num<?php echo $blogRow->mesNo?>" class="blogIn_Msg_SendBox subButtonItem reportNum cl-s-2 cl-md-1" name="report" value="檢舉">
                            <input type="hidden" id="FqNum<?php echo $blogRow->mesNo?>" name='Fqnum' value="<?php echo $blogRow->mesReportFq?>">
                            <input type="hidden" class="mesNo" id="mesNum<?php echo $blogRow->mesNo?>" name="mesNum" value="<?php echo $blogRow->mesNo?>">
                           <!-- </a> -->
                      </div>
                        <?php
                                };     
                        ?> 
<script>
function $id(id){
  	return document.getElementById(id);
  };
var pushreport = document.querySelectorAll('.reportNum');  
    for( i=0 ; i<pushreport.length; i++){  
        pushreport[i].addEventListener('click',function(){
            num = this.id
            alert(num);
            mesnum = 'mes' + this.id;
            alert($id(mesnum).value);
            Fqnum = 'Fq' + this.id;
            alert($id(Fqnum).value);
            sendFormReport();
     });
    };
    function sendFormReport(){
        // alert($id(Fqnum).value);
        alert(pushreport.length);
        // if($id(Fqnum).value == ''){
        if($id(Fqnum).value == ''){
            $id(Fqnum).value = 0;

            var xhr = new XMLHttpRequest();
            xhr.onload = function (){
            if( xhr.status == 200){
                alert('plus');
            }else{
                alert(xhr.status);
                }
            };
            xhr.open("post", "blogmesreportNumPlus.php", true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            var data = "artNo=" + $id("artNo").value + "&mesReportFq=" + $id(Fqnum).value +"&mesNo="+$id(mesnum).value;
            alert(data);
            xhr.send(data);     
        }else{
            var xhr = new XMLHttpRequest();
            xhr.onload = function (){
            if( xhr.status == 200){
                alert('add');
            }else{
                alert(xhr.status);
                }
            };
            xhr.open("post", "blogmesreportNumPlus.php", true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            var data = "artNo=" + $id("artNo").value + "&mesReportFq=" + $id(Fqnum).value +"&mesNo=" + $id(mesnum).value;
            alert(data);
            xhr.send(data);     
        }
    }
    // else if($id(Fqnum).value != ''){
    //     var xhr = new XMLHttpRequest();
    //   xhr.onload = function (){
    //     if( xhr.status == 200){
    //      alert('delete');
    //     }else{
    //       alert(xhr.status);
    //     }
    //     };
    //     xhr.open("post", "reportNumDelete.php", true);
    //   xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      
    //   var data = "artNo=" + $id("artNo").value +"&mesNo=" + $id("mesNo").value+ "&artReportFq=" + $id(Fqnum).value;
    //   alert(data);
    //   xhr.send(data);    
    
    // }
    
</script>   
                    </div>




                    <form method="post">
                        <div id="blogIn_Msg_Container" class="blogIn_Msg_Containerc clearfix">
                            <div class="blogIn_Msg_Block clearfix">
                                <div class="blogIn_Msg_Box cl-s-10 cl-md-10">
                                    
                                    <div class="blogIn_Msg_ContentInput">

                                     <?php 
                                        $sql = "select me.mesContent, b.artNo, b.thumbFq from blog b, message me where b.artNo=me.artNo and b.artNo = $artNo" ;
                                        $message = $pdo -> query( $sql );    
                                        while($mesRow = $message->fetchObject()){
                                     ?>                                        
                                        <input id="artNo" type="hidden" name="artNo" value="<?php echo $mesRow->artNo?>">
                                     <?php
                                        };
                                    ?>

                                        <textarea id="blogIn_Msg_Content" type="text" placeholder="嚐分享" name="mes"></textarea>
                                    </div>
                                </div>
                                    <input type="button" id="blogIn_Msg_BoxBtn" class="blogIn_Msg_Box subButtonItem cl-s-2 cl-md-1" name="btnChange" value="留言">
                            </div>
                        </div>





<script>
function $id(id){
  	return document.getElementById(id);
  }	

  function keydown(event){
        if (event.keyCode == 13) { 
            sendForm();
        }
  };

 function sendForm(){
      var xhr = new XMLHttpRequest();
      xhr.onload = function (){
        if( xhr.status == 200){
            addItem();
            // sendFormReport();
            // alert('ok');
            $id('blogIn_Msg_Content').value='';
        }else{
          alert(xhr.status);
        }
      }
      xhr.open("post", "blogInMes.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      
      var data = "artNo=" + $id("artNo").value + "&mes=" + $id("blogIn_Msg_Content").value;
      alert(data);
      xhr.send(data);    
    }
 function init(){
    $id("blogIn_Msg_BoxBtn").onclick = sendForm;
    $id("blogIn_Msg_Content").onkeydown= keydown;
    };
 
 window.onload = init;
</script>







 <?php 
}catch (PDOException $e) {
            echo "錯誤原因 : ", $e -> getMessage(), "<br>";
            echo "錯誤行號 : ", $e -> getLine(), "<br>";
            // echo "請聯絡系通人員";
        }
?>                        
                    </form>

                </div>

                <div class="umbrellaMandarin">
                    <img id="blogIn_umbrellaMandarin" src="images/blogImg/umbrellaMandarin.png" alt="熱氣球橘子">
                </div>
        </section>



        <section class="blogIn_ButtonContainer">
            <a class="common_btn common_btn_first" href="blog.php">
                <span class="common_btn_txt">看看別人怎麼做</span>
                <div class="common_btn_blobs">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </a>
            <a class="common_btn common_btn_second" href="diy.php">
                <span class="common_btn_txt">試試他的配方</span>
                <div class="common_btn_blobs">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </a>
        </section>
    </div>

    <!-- <div class="umbrellaMandarin">
        <img id="blogIn_umbrellaMandarin" src="images/blogImg/umbrellaMandarin.png" alt="熱氣球橘子">
    </div> -->

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

   

</body>

</html>