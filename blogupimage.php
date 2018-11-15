<?php

 $tmpfile=$_FILES["images"]["tmp_name"]; //檔案暫存的地方
 $file=$_FILES["images"]["name"]; //拿到檔案的名稱
 $uploaddir='images/';  //G3/event_create/image/  //圖片要存的地方
 if(move_uploaded_file($tmpfile,$uploaddir.$file)){ //傳到image的路徑
        $fname=$uploaddir.$file;  //資料夾+檔案的名子
        $ary=array();          //創一個陣列
        $ary["file"]=$fname;   //把檔案加到陣列裡面 //file是自己取的名子
        echo json_encode($ary);    //用JSON方法傳回去
 } 
?>