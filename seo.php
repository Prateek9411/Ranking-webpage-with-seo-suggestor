<?php

require'connection.php';

if(!empty($_POST)){
    $name1 = $_POST['value'];
    $sql = "select * from submition where url='$name1' order by id desc limit 0,1";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        $temparray =[];
         while($row = mysqli_fetch_assoc($result)) {
           $data['keywords']= $row['keyword'];
           $data['description']=$row['description'];
           $data['title']=$row['title'];
           $data['visits']=$row['Visits'];
           $data['name']=$row['Name'];
           $temparray[] = $data;    
     }
     }
     else
     {
       $display='<div style="text-align: center;"><h1>No result found :</h1></div>';
      echo $display;die;
     }
      $keywordsarray  = explode(',',$temparray[0]['keywords']);
      $key_count = sizeof($keywordsarray);
      $visit=$temparray[0]['visits'];
      $string='';
      $string1='';
      $des_length=strlen($temparray[0]['description']);
      if($visit>=40)
      {
        $string="KEYWORD COUNT IS EXCELLENT";
      }
      else if($visit>=30 && $visits<=40)
      {
        $string="KEYWORD COUNT IS VERY GOOD";
      }
      else if($visits>=20 && $visits<=30)
      {
        $string="KEYWORD COUNT IS GOOD";
      }
      else
      {
        $string="KEYWORD COUNT IS BAD";
      }
      if($des_length>160)
      {
        $string1="Description too long:Try to keep it within 100-160";
      }
      else if($des_length>=100 && $des_length<=160)
      {
        $string1="Description perfect";
      }
      else if($visits<100)
      {
        $string1="Description too short:Try to keep it within 100-160";
      }
      $display='<hr><div style=" position: relative;
      left: 497px;
      color: #ffff; "><p>Title : '.$temparray[0]['title'].'| '.$temparray[0]['name'].'<br>Keywords : '.$key_count.' <br> '.$string.'
      <br><br><div style="    height: auto;
      width: 485px;font-size: 15px;
      ">Metadescription : '.$temparray[0]['description'].'</div><br>Description length='.$des_length.'<br>'.$string1.'</p></div> ';
      echo $display;

}