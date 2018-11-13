<?php
try{
  require_once("connectBooks.php");
  $sql = "SELECT b.artNo, b.photo, b.artTitle, b.artContent, b.thumbFq, b.postTime, m.memName, f1.fruitImg fruitImg1, f2.fruitImg fruitImg2, f3.fruitImg fruitImg3, f1.fruitName fruitName1, f2.fruitName fruitName2, f3.fruitName fruitName3 From blog b, member m, fruititem f1, fruititem f2, fruititem f3 where m.memNo=b.memNo and b.fruitNo1=f1.fruitNo and b.fruitNo2=f2.fruitNo and b.fruitNo3=f3.fruitNo order by b.thumbFq DESC";
  $highScore = $pdo->prepare( $sql );
//   $member->bindValue(":memId", $_REQUEST["memId"]);
  $highScore->execute();
  //如果找得資料,將會員資料送出
?>
<div id="filter" class="blog_Forum_Container clearfix">
<div id="container">

<?php
$i=1;
    while($highScoreRow = $highScore->fetchObject()){
?>

        
            <div class='blog_Forum_Block blog_Forum_Block<?php echo $i ?> cl-s-6'> 
                <a href='blogIn.php?artNo=<?php echo $highScoreRow ->artNo ?>'>
                <div class='blog_Forum_Box clearfix'>
                    <div class='blog_Forum_Date'>
                        <div>上傳日期:<?php echo $highScoreRow ->postTime; ?></div>
                        <div><?php echo $highScoreRow ->memName?></div>
                    </div>
                    <div class='blog_Forum_Pic'>
                        <img src='images/blogImg/<?php echo $highScoreRow->photo?>' alt='文章分享' class='blog_Forum_Img'>
                    </div>
                    <div class='blog_Share_Box clearfix'>
                        <div class='blog_Share_BoxItem clearfix'>
                            <div class='blog_Forum_item cl-s-8 clearfix'>
                                <div class='blog_Forum_item_pic'>
                                    <img src='images/<?php echo $highScoreRow->fruitImg1?>' alt='<?php echo $highScoreRow->fruitName1?>' class='blog_Forum_FruitIcon'>
                                </div>
                                <div class='blog_Forum_item_pic'>
                                    <img src='images/<?php echo $highScoreRow->fruitImg2?>' alt='<?php echo $highScoreRow->fruitName2?>' class='blog_Forum_FruitIcon'>
                                </div>
                                <div class='blog_Forum_item_pic'>
                                    <img src='images/<?php echo $highScoreRow->fruitImg3?>' alt='<?php echo $highScoreRow->fruitName3?>' class='blog_Forum_FruitIcon'>
                                </div>
                            </div>
                            <div class='blog_Forum_Score cl-s-4 clearfix'>
                                <div class='blog_Forum_Score_Pic'>
                                    <img id="imgNum<?php echo $highScoreRow ->artNo ?>" src='images/blogImg/Score.png' alt='按讚總數' class='blog_Score_Img'>
                                </div>
                                <div class='blog_Forum_Score_Num'>
                                    <p class='greatNum' id='greatNum<?php echo $highScoreRow ->artNo ?>'><?php echo $highScoreRow->thumbFq?></p>
                                </div>
                            </div>
                        </div>

                        <div class='blog_Forum_Title'>
                            <h4><?php echo $highScoreRow->artTitle?></h4>
                        </div>
                        <div class='blog_Forum_Desc'>
                            <p><?php echo $highScoreRow->artContent?></p>
                        </div>
                        <div class='blog_Forum_SubButtonContainer'>
                            <a href='javascript:;' id='Num<?php echo $highScoreRow ->artNo ?>' class='blog_Forum_SubButtonContainer_Box blog_Forum_SubButtonContainer_Box<?php echo $highScoreRow ->artNo ?> pushGreat cl-s-6 cl-md-6'>
                                <div class='blog_Forum_SubButtonContainer_Pic'>
                                    <img src='images/blogImg/noScore.png' alt='按讚總數' class='blog_Score_Img'>
                                </div>
                                <input id="artNo" type="hidden" name="artNo" value="<?php echo $highScoreRow ->artNo?>">
                                <input id="thumbNo" type="hidden" name="thumbNo" value="<?php echo $highScoreRow ->thumbFq?>">
                                <span id="spanNum<?php echo $highScoreRow ->artNo ?>" class='blog_Forum_SubButton'>按讚</span>
                            </a>
                            <a href='blogIn.php?artNo=<?php echo $highScoreRow ->artNo ?>' class='blog_Forum_SubButtonContainer_Box cl-s-6 cl-md-6'>
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