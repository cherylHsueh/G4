<?php
try{
  require_once("connectBooks.php");
  $sql = "SELECT b.artNo, b.photo, b.artTitle, b.artContent, b.thumbFq, b.postTime, m.memName, f1.fruitImg fruitImg1, f2.fruitImg fruitImg2, f3.fruitImg fruitImg3, f1.fruitName fruitName1, f2.fruitName fruitName2, f3.fruitName fruitName3 From blog b, member m, fruititem f1, fruititem f2, fruititem f3 where m.memNo=b.memNo and b.fruitNo1=f1.fruitNo and b.fruitNo2=f2.fruitNo and b.fruitNo3=f3.fruitNo order by b.postTime DESC";
  $newShare = $pdo->prepare( $sql );
//   $member->bindValue(":memId", $_REQUEST["memId"]);
  $newShare->execute();
  //如果找得資料,將會員資料送出
?>
<div id="filter" class="blog_Forum_Container clearfix">
<div id="container">

<?php
$i=1;
    while($newShareRow = $newShare->fetchObject()){
?>

        
            <div class='blog_Forum_Block blog_Forum_Block<?php echo $i ?> cl-s-6'> 
                <a href='blogIn.php?artNo=<?php echo $newShareRow ->artNo ?>'>
                <div class='blog_Forum_Box clearfix'>
                    <div class='blog_Forum_Date'>
                        <div>上傳日期:<?php echo $newShareRow ->postTime; ?></div>
                        <div><?php echo $newShareRow ->memName?></div>
                    </div>
                    <div class='blog_Forum_Pic'>
                        <img src='images/blogImg/<?php echo $newShareRow->photo?>' alt='文章分享' class='blog_Forum_Img'>
                    </div>
                    <div class='blog_Share_Box clearfix'>
                        <div class='blog_Share_BoxItem clearfix'>
                            <div class='blog_Forum_item cl-s-8 clearfix'>
                                <div class='blog_Forum_item_pic'>
                                    <img src='images/<?php echo $newShareRow->fruitImg1?>' alt='<?php echo $newShareRow->fruitName1?>' class='blog_Forum_FruitIcon'>
                                </div>
                                <div class='blog_Forum_item_pic'>
                                    <img src='images/<?php echo $newShareRow->fruitImg2?>' alt='<?php echo $newShareRow->fruitName2?>' class='blog_Forum_FruitIcon'>
                                </div>
                                <div class='blog_Forum_item_pic'>
                                    <img src='images/<?php echo $newShareRow->fruitImg3?>' alt='<?php echo $newShareRow->fruitName3?>' class='blog_Forum_FruitIcon'>
                                </div>
                            </div>
                            <div class='blog_Forum_Score cl-s-4 clearfix'>
                                <div class='blog_Forum_Score_Pic'>
                                    <img id="imgNum<?php echo $newShareRow ->artNo ?>" src='images/blogImg/Score.png' alt='按讚總數' class='blog_Score_Img'>
                                </div>
                                <div class='blog_Forum_Score_Num'>
                                    <p class='greatNum' id='greatNum<?php echo $newShareRow ->artNo ?>'><?php echo $newShareRow->thumbFq?></p>
                                </div>
                            </div>
                        </div>

                        <div class='blog_Forum_Title'>
                            <h4><?php echo $newShareRow->artTitle?></h4>
                        </div>
                        <div class='blog_Forum_Desc'>
                            <p><?php echo $newShareRow->artContent?></p>
                        </div>
                        <div id="blogNum" class='blog_Forum_SubButtonContainer'>
                            <a href='javascript:;' id='Num<?php echo $newShareRow ->artNo ?>' class='blog_Forum_SubButtonContainer_Box blog_Forum_SubButtonContainer_Box<?php echo $newShareRow ->artNo ?> pushGreat cl-s-6 cl-md-6'>
                                <div class='blog_Forum_SubButtonContainer_Pic'>
                                    <img src='images/blogImg/noScore.png' alt='按讚總數' class='blog_Score_Img'>
                                </div>
                                <input id="artNo" type="hidden" name="artNo" value="<?php echo $newShareRow ->artNo?>">
                                <input id="thumbNo" type="hidden" name="thumbNo" value="<?php echo $newShareRow ->thumbFq?>">
                                <span id="spanNum<?php echo $newShareRow ->artNo ?>" class='blog_Forum_SubButton'>按讚</span>
                            </a>
                            <a href='blogIn.php?artNo=<?php echo $newShareRow ->artNo ?>' class='blog_Forum_SubButtonContainer_Box cl-s-6 cl-md-6'>
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
$i++;
};

?>
   </div>
</div>
<?php

  }catch(PDOException $e){
    echo "錯誤原因:",$e ->getMessage(),'<br>';
    echo "錯誤行列:",$e ->getLine();
   }
?>