<?php
ob_start();
// session_start();
// $artNo = $_REQUEST['artNo'];
try {
    require_once("connectBooks.php");
    $sql = "select f.fruitName, f.fruitNo From fruititem f";
    $blogs = $pdo -> query( $sql );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>果然配</title>
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" type="text/css" href="css/loginFruit.css">
    <!-- <script src="http://i.gtimg.cn/qzone/biz/gdt/lib/jquery/jquery-2.1.4.js?max_age=31536000"></script> -->
    <script src="js/plugin/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src='js/global.js'></script>
    <script src="js/blog.js"></script>
</head>

<body>
<?php
	require_once("php/nav.php");
?>

    <div class="space"></div>
    <!-- <div class="blogSubmit_board">
            <img src="images/blogImg/board.png" alt="布告欄">
        </div> -->
    <!-- SUBMIT_ARTICAL -->

    <section class="blogSubmit_Share">
        <div class="blogSubmit_Share_cloud1">
            <img src="images/cloud(03).png" alt="雲">
        </div>
        <div class="blogSubmit_Share_cloud2">
            <img src="images/cloud(02).png" alt="雲">
        </div>
        <div class="wrapper">
            <div class="blogSubmit_board">
                <img src="images/blogImg/board.png" alt="布告欄">
            </div>
            <div class="blogSubmit_Headingbox">
                <img src="images/blogImg/boardTitle.png" alt="分享配方">
            </div>
            <form id="blogSubmit_form" method="post" action="bloguptext.php" enctype="multipart/form-data">
                <div class="blogSubmit_Container  clearfix">
                    <input id="picture" type="file" style="display: none" name="blogImg">
                    <div id='previewImg' class="blogSubmit_LeftBox cl-md-6">
                        <p>上傳圖檔</p>
                        <div class="blogSubmit_LeftBox_Pic">
                            <div id="viewimg">
                                <img id="image">
                            </div>
                            
                            <label for="picture">
                                <img id="upLoad" class="upload" src="images/sendPictureFile.png" style="cursor: pointer" alt="上傳圖片">
                            </label>
                        </div>
                    </div>
                    <div class="blogSubmit_RightBox cl-md-6 clearfix">
                        <div class="blogSubmit_RightBox_pin">
                            <img src="images/blogImg/pin.png" alt="圖釘">
                        </div>
                        <div class="blogSubmit_RightBox_TitleContainer clearfix">
                            <div class="blogSubmit_RightBox_TitleContent clearfix">
                                <div class="blogSubmit_RightBox_TitleName">
                                    <input id="fruitTitle" type="text" placeholder="請輸入果汁名稱" name="fruitTitle" maxlength='10'>
                                </div>
                                
                        
                                <div class="blogSubmit_RightBox_TitlePic cl-s-8  cl-md-8 clearfix">
                                    <div class="blogSubmit_RightBox_PicItem cl-s-4 cl-md-4">
                                        <select name="fruitselect1" id="fruitselect1">
                                            <?php
                                                $sql = "select f.fruitName, f.fruitNo From fruititem f";
                                                $blogs = $pdo -> query( $sql );
                                                while($blogRow = $blogs->FetchObject()){
                                            ?>
                                                <option value="<?php echo $blogRow->fruitNo?>"><?php echo $blogRow->fruitName?></option>
                                            <?php
                                                };
                                            ?>
                                        </select>
                                    </div>
                                    <div class="blogSubmit_RightBox_PicItem cl-s-4 cl-md-4">
                                        <select name="fruitselect2" id="fruitselect2">
                                            <?php
                                                $sql = "select f.fruitName, f.fruitNo From fruititem f";
                                                $blogs = $pdo -> query( $sql );
                                                while($blogRow = $blogs->FetchObject()){
                                            ?>
                                                    <option value="<?php echo $blogRow->fruitNo?>"><?php echo $blogRow->fruitName?></option>
                                            <?php
                                                };
                                            ?>
                                        </select>
                                    </div>
                                    <div class="blogSubmit_RightBox_PicItem cl-s-4 cl-md-4">
                                        <select name="fruitselect3" id="fruitselect3">
                                             <?php
                                                $sql = "select f.fruitName, f.fruitNo From fruititem f";
                                                $blogs = $pdo -> query( $sql );
                                                while($blogRow = $blogs->FetchObject()){
                                            ?>
                                                    <option value="<?php echo $blogRow->fruitNo?>"><?php echo $blogRow->fruitName?></option>
                                            <?php
                                                };
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                           <input type="hidden" id="fruitRatio1" name="fruitRatio1" value="">
                           <input type="hidden" id="fruitRatio2" name="fruitRatio2" value="">
                           <input type="hidden" id="fruitRatio3" name="fruitRatio3" value="">
                            <!-- 私藏分頁的 -->
                            <!-- <div class="blog_Rank_ContentBox cl-s-12 clearfix">
                                <div class="blog_Rank_ContentBox_Block clearfix">
                                    <div class="blog_Rank_ContentBox_Box">
                                        <div class="blog_Rank_ContentBox_Item">
                                            <div class="blog_Rank_ContentBox_Container">
                                                <div class="blog_Rank_ContentBox_Columnar blog_Rank_ContentBox_Columnar1"></div>
                                            </div>
                                            <p class="blog_Rank_BottomBox_Title">維他命C</p>
                                        </div>
                                        <div class="blog_Rank_ContentBox_Item">
                                            <div class="blog_Rank_ContentBox_Container">
                                                <div class="blog_Rank_ContentBox_Columnar blog_Rank_ContentBox_Columnar2"></div>
                                            </div>
                                            <p class="blog_Rank_BottomBox_Title">鐵質</p>
                                        </div>
                                        <div class="blog_Rank_ContentBox_Item">
                                            <div class="blog_Rank_ContentBox_Container">
                                                <div class="blog_Rank_ContentBox_Columnar blog_Rank_ContentBox_Columnar3"></div>
                                            </div>
                                            <div class="blog_Rank_BottomBox_Title">膳食纖維</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog_Rank_ContentBox_Desc">
                                    <p>熱量共50Cals</p>
                                </div>
                            </div> -->
                            <div class="blogSubmit_RightBox_ratio">
                                <div class="full">
                                    <span class="cursor cursorone" id="cursor1">1</span>
                                    <span class="cursor cursortwo" id="cursor2">2</span>
                                </div>
                            </div>

                            <div class="blogSubmit_RightBox_ShareContainer clearfix">
                                <div class="blogSubmit_RightBox_ShareContent clearfix">
                                    <textarea id="blogIn_Msg_Content" type="text" placeholder="嚐分享(100字以內)" name="mes" maxlength="100"></textarea> 
                                </div>
                            </div>


<script>



//create picture
document.getElementById('picture').onchange = uploadimage;
// document.getElementById('picture').onclick = uploadPic;
function uploadimage(e){
    
    box = document.getElementById('viewimg');
    box.textContent='';
    var file = e.target.files[0];
    var reader = new FileReader();
    reader.onload=function(){
    var image = document.createElement('img');
    image.id = 'image';
    box.appendChild(image);
    image.src=reader.result;
    alert(reader.result);
    image.style.width='150px';
    document.getElementById('viewimg').classList.add('imgSize');
    document.getElementById('upLoad').classList.add( "upload_active");
    
    
                 
    };
    reader.readAsDataURL(file);
   };


function $id(id){
  	return document.getElementById(id);
  }	
 
</script>



                            <a class="common_btn common_btn_first" id="uploadBtn" href="javascript:;">
                                <span class="common_btn_txt">上傳文章</span>
                                <div class="common_btn_blobs">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </a>

                        </div>
                    </div>

                </div>
                <!-- <a class="common_btn common_btn_first" id="uploadBtn" href="javascript:;">
                        <span class="common_btn_txt">上傳文章</span>
                        <div class="common_btn_blobs">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </a> -->
            </form>


<script>
function sendForm(){
    // alert(document.getElementById('spanLogin').innerHTML);
    if(document.getElementById('spanLogin').innerHTML == '登入'){
        document.getElementById('lightbox_section').style.display = 'block';
    }else{
    $id("blogSubmit_form").submit();
    };
    //   alert('ok');
    //   var xhr = new XMLHttpRequest();
    //   xhr.onload = function (){
    //     if( xhr.status == 200){
    //         alert('ok');
    //     }else{
    //       alert(xhr.status);
    //     }
    //   }
    //   xhr.open("post", "bloguptext.php", true);
    //   xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      
    //   var data ="fruitTitle=" + $id("fruitTitle").value + 
    //             "&fruitselect1=" + $id("fruitselect1").value+
    //             "&fruitselect2=" + $id("fruitselect2").value+
    //             "&fruitselect3=" + $id("fruitselect3").value+
    //             "&mes=" + $id("blogIn_Msg_Content").value;
    //             // "&img=" + $id('image').src;
    //   alert(data);
    //   xhr.send(data);    
    }
// function init(){
//     alert('ok');
    $id("uploadBtn").onclick = sendForm;
// }
//  window.onload = init;
</script>



<?php
}
catch(PDOException $e){
	echo "錯誤原因:",$e ->getMessage(),'<br>';
	echo "錯誤行列:",$e ->getLine();
 }
 
?>
        </div>
        <div class="blogSubmit_grass1">
            <img src="images/about/Grass(02).png" alt="草">
        </div>
        <div class="blogSubmit_grass2">
            <img src="images/about/Grass(02).png" alt="草">
        </div>
        <div class="blogSubmit_grass3">
            <img src="images/about/Grass(01).png" alt="草">
        </div>
        <img src="images/Flower.png" alt="花" class="flower1">
        <img src="images/blogImg/oneFlower.png" alt="花" class="flower2">
        <img src="images/blogImg/oneFlower.png" alt="花" class="flower3">
        <img src="images/blogImg/oneFlower.png" alt="花" class="flower4">
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
>
</body>

</html>