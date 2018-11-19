<?php
ob_start();
// session_start();
$artNo = $_REQUEST['artNo'];
try {
    require_once("connectBooks.php");
    $sql = "SELECT b.artNo, b.photo, b.artTitle, b.artContent, b.thumbFq, b.artReportFq,b.fruitRatio1 fruitRatio1,
    b.fruitRatio2 fruitRatio2, b.fruitRatio3 fruitRatio3, m.memName, m.memImg, f1.fruitImg fruitImg1, f2.fruitImg fruitImg2,
     f3.fruitImg fruitImg3, f1.fruitName fruitName1, f2.fruitName fruitName2, f3.fruitName fruitName3, me.mesNo, 
     me.mesContent, me.mesTime, me.mesReportFq, f1.cal cal1,f1.iron iron1, f1.fiber fiber1, f1.vinC vinC1, f2.cal cal2,
    f2.iron iron2, f2.fiber fiber2, f2.vinC vinC2,f3.cal cal3, f3.iron iron3, f3.fiber fiber3, f3.vinC vinC3  
    From blog b, member m, message me,fruititem f1, fruititem f2, fruititem f3 where m.memNo=b.memNo and b.fruitNo1=f1.fruitNo 
    and b.fruitNo2=f2.fruitNo and b.fruitNo3=f3.fruitNo and b.artNo = $artNo
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
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script src='js/global.js'></script>
    <script src="js/plugin/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
    <script src="js/plugin/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/blogIn.js"></script>
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

    <input type="hidden" id="hiddenmemNo" value="<?php if( isset($_SESSION["memName"])){ echo $_SESSION["memNo"];}else{echo "";}?>">

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
                                <img src="images/member/photo/<?php echo $blogRow["memImg"]?>" alt="分享者">
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

                                <input type="hidden" id="blogratio1" class='blogratio1' value="<?php echo $blogRow["fruitRatio1"]?>">
                                <input type="hidden" id="blogratio2" class='blogratio2' value="<?php echo $blogRow["fruitRatio2"]?>">
                                <input type="hidden" id="blogratio3" class='blogratio3' value="<?php echo $blogRow["fruitRatio3"]?>">
                                <input type="hidden" id="blogcal1" class='blogCal1' value="<?php echo $blogRow["cal1"]?>">
                                <input type="hidden" id="blogcal2" class='blogCal2' value="<?php echo $blogRow["cal2"]?>">
                                <input type="hidden" id="blogcal3" class='blogCal3' value="<?php echo $blogRow["cal3"]?>">
                                <input type="hidden" id="blogiron1" class='blogIron1' value="<?php echo $blogRow["iron1"]?>">
                                <input type="hidden" id="blogiron2" class='blogIron2' value="<?php echo $blogRow["iron2"]?>">
                                <input type="hidden" id="blogiron3" class='blogIron3' value="<?php echo $blogRow["iron3"]?>">
                                <input type="hidden" id="blogfiber1" class='blogFiber1' value="<?php echo $blogRow["fiber1"]?>">
                                <input type="hidden" id="blogfiber2" class='blogFiber2' value="<?php echo $blogRow["fiber2"]?>">
                                <input type="hidden" id="blogfiber3" class='blogFiber3' value="<?php echo $blogRow["fiber3"]?>">
                                <input type="hidden" id="blogvinc1" class='blogVinc1' value="<?php echo $blogRow["vinC1"]?>">
                                <input type="hidden" id="blogvinc2" class='blogVinc2' value="<?php echo $blogRow["vinC2"]?>">
                                <input type="hidden" id="blogvinc3" class='blogVinc3' value="<?php echo $blogRow["vinC3"]?>">


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
                                        $sql = "select me.mesContent, b.artNo, b.thumbFq, m.memimg from blog b, message me,member m where b.memNo=m.memNo and b.artNo =$artNo" ;
                                        $message = $pdo -> query( $sql );    
                                        $mesRow = $message->fetchObject();
                                     ?>                                        
                                        <input id="thumbArtNo" type="hidden" name="thumbArtNo" value="<?php echo $mesRow->artNo?>">
                                        <input id="thumbNo" type="hidden" name="thumbNo" value="<?php echo $mesRow->thumbFq?>">
                                   <?php
                                        
                                    ?>


                                    <a href="#messagearea" class="blogIn_RightBox_subButtonItem">
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
            swal('檢舉+1');
            doreport();
        }else{
            alert(xhr.status);
            }
        };
        xhr.open("post", "blogartreportNumPlus.php", true);
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
        var data = "artNo=" + $id("artNo").value + "&artReportFq=" + $id('FqNum').value;
        xhr.send(data);     
    }else if($id('FqNum').value != ''){
        var xhr = new XMLHttpRequest();
        xhr.onload = function (){
        if( xhr.status == 200){
            swal('檢舉+1');
            doreport();
        }else{
            alert(xhr.status);
            }
        };
        xhr.open("post", "blogartreportNumPlus.php", true);
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
        var data = "artNo=" + $id("artNo").value + "&artReportFq=" + $id('FqNum').value;
        // alert(data);
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
        dodeleteIn();
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
           doplusIn();
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
                    <div id="blogIn_Msg_SendBlock_id" class="blogIn_Msg_SendBlock clearfix">
  
                        <?php
                            $sql = "SELECT b.artNo, b.photo, b.artTitle, b.artContent, b.thumbFq, b.artReportFq, 
                            m.memNo, m.memName, m.memImg, me.mesNo, me.mesContent, me.mesTime, me.mesReportFq From blog b,
                             member m, message me where m.memNo = me.memNo and b.artNo = me.artNo and me.mesResult = '0' and b.artNo = $artNo order by mesNo
                            ";
                            $mess = $pdo -> query( $sql );
                            while($mesRow = $mess->fetchObject()){
                        ?>   
                            <div class="blogIn_Msg_SendWrapper clearfix">
                        
                            <div class="blogIn_Msg_SendBox cl-s-2 cl-md-2">
                                <div class="blogIn_Msg_SendPic">
                                    <img id="blogIn_Img_<?php echo $mesRow->memNo?>" src="images/member/photo/<?php echo $mesRow->memImg?>" alt="留言者">
                                    <input type="hidden" value="<?php echo $mesRow->memNo?>">
                                </div>
                                <p class="memname"><?php echo $mesRow->memName?></p>
                            </div>
                            <div class="blogIn_Msg_SendBox blogIn_Msg_SendBox2 cl-s-7 cl-md-8">
                                <div class="blogIn_Msg_SendContent">
                                    <p><?php echo $mesRow->mesContent?></p>
                                </div>
                                <div class="blogIn_Msg_SendDate">
                                    <p><?php echo $mesRow->mesTime?></p>
                                </div>
                            </div>
                            <!-- <a href="javascript:;" > -->
                            <form>
                                <input type="button" id="Num<?php echo $mesRow->mesNo?>" class="blogIn_Msg_SendBox subButtonItem reportNum cl-s-2 cl-md-1" name="report" value="檢舉">
                                <input type="hidden" id="FqNum<?php echo $mesRow->mesNo?>" name='Fqnum' value="<?php echo $mesRow->mesReportFq?>">
                                <input type="hidden" class="mesNo" id="mesNum<?php echo $mesRow->mesNo?>" name="mesNum" value="<?php echo $mesRow->mesNo?>">
                           </form><!-- </a> -->
                      </div>
                        <?php
                                };     
                        ?> 
     </div>


<script>
    window.addEventListener('load',function(){
        $id();
        sendFormReportclick()
    })

    function $id(id){
        return document.getElementById(id);
    };
    function sendFormReportclick(){
        var pushreport = document.querySelectorAll('.reportNum');  
        for( i=0 ; i<pushreport.length; i++){  
            pushreport[i].addEventListener('click',function(){
                num = this.id
                // alert(num);
                mesnum = 'mes' + this.id;
                // alert(mesnum);
                Fqnum = 'Fq' + this.id;
                // alert($id(Fqnum).value);
                sendFormReport();
        });
        };
    }

    function sendFormReport(){
        // alert($id(Fqnum).value);
        // alert(pushreport.length);
        // if($id(Fqnum).value == ''){
        if($id(Fqnum).value == ''){
            $id(Fqnum).value = 0;

            var xhr = new XMLHttpRequest();
            xhr.onload = function (){
            if( xhr.status == 200){
                swal('檢舉+1');
                
            }else{
                alert(xhr.status);
                }
            };
            xhr.open("post", "blogmesreportNumPlus.php", true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            var data = "artNo=" + $id("artNo").value + "&mesReportFq=" + $id(Fqnum).value +"&mesNo="+$id(mesnum).value;
            // alert(data);
            xhr.send(data);     
        }else{
            var xhr = new XMLHttpRequest();
            xhr.onload = function (){
            if( xhr.status == 200){
                swal('檢舉+1');
            }else{
                alert(xhr.status);
                }
            };
            xhr.open("post", "blogmesreportNumPlus.php", true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            var data = "artNo=" + $id("artNo").value + "&mesReportFq=" + $id(Fqnum).value +"&mesNo=" + $id(mesnum).value;
            // alert(data);
            xhr.send(data);     
        }
    }
    
</script>   
               

                    <form method="post">
                        <div id="blogIn_Msg_Container" class="blogIn_Msg_Containerc clearfix">
                            <div class="blogIn_Msg_Block clearfix">
                                <div class="blogIn_Msg_Box cl-s-10 cl-md-10">
                                    
                                    <div class="blogIn_Msg_ContentInput">

                                     <?php 
                                        $sql = "select b.artNo, b.thumbFq, m.memName, me.mesNo from blog b,member m, message me where m.memNo = me.memNo and b.artNo= $artNo order by mesNo DESC limit 1";
                                        $message = $pdo -> query( $sql );    
                                        $mesRow = $message->fetchObject()
                                     ?>                                        
                                        <input id="artNo" type="hidden" name="artNo" value="<?php echo $mesRow->artNo?>">
                                        <input id="hidmesNo" type="hidden" name="artNo" value="<?php echo $mesRow->mesNo?>">

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
    // alert(document.getElementById('spanLogin').innerHTML);
    if(document.getElementById('spanLogin').innerHTML == '登入'){
        showLoginForm();
    }else{
        if($id('blogIn_Msg_Content').value == ''){
            swal('請填寫內容');
        }else{
             var xhr = new XMLHttpRequest();
            xhr.onload = function (){
                if( xhr.status == 200){
                    mesno = xhr.responseText;
                    // alert(mesno);
                    addItem();
                    // alert('ok');
                    sendFormReportclick();
                    $id('blogIn_Msg_Content').value = '';
                    // alert('ok');
                   
                }else{
                alert(xhr.status);
                }
            }
            xhr.open("post", "blogInMes.php", true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            
            var data = "artNo=" + $id("artNo").value +
            "&mes=" + $id("blogIn_Msg_Content").value;
            //   alert(data);
            xhr.send(data);    
        }
    }   
};
 function init(){
    $id("blogIn_Msg_BoxBtn").onclick = sendForm;
    $id("blogIn_Msg_Content").onkeydown= keydown;
    };
 
 window.onload = init;
</script>







                       
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
                <span class="common_btn_txt">我也要自己做</span>
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
    <?php 
}catch (PDOException $e) {
            echo "錯誤原因 : ", $e -> getMessage(), "<br>";
            echo "錯誤行號 : ", $e -> getLine(), "<br>";
            // echo "請聯絡系通人員";
        };
?> 
   

</body>

</html>