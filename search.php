<?php
require'connection.php';

if(!empty($_POST)){
$name1 = $_POST['data'];
$per_page_record = $_POST['limit'];
$page =  $_POST['minlimit'];  
$visit=  $_POST['visit']; 
$pageconut_val = $_POST['pageconut'];
$pagetype = $_POST['pagetype'];

$diffult_limit =  $_POST['diffultpagelimit'];    
$sqldata = "select * from submition where name Like '%$name1%' or title Like '%$name1%' order by Visits desc";
$resultdata =mysqli_query($conn,$sqldata);
$count = 0;
if (mysqli_num_rows($resultdata) > 0) {
  while($row = mysqli_fetch_assoc($resultdata)) {
    $tempcountdata['id'] = $row['id'];
    $tempcountdata['Visits'] = $row['Visits'];
    $totalcountdata[] =   $tempcountdata;
    $count ++;
  }
}
//echo $pageconut_val;die;
if($pageconut_val == 1){
  $sql = "select * from submition where (name Like '%$name1%' or title Like '%$name1%' ) and Visits <= $visit order by Visits desc limit 0, $diffult_limit ";

}else{
  if($pagetype == 1)
  {
    $sql = "select * from submition where (name Like '%$name1%' or title Like '%$name1%' ) and Visits >= $visit order by Visits desc limit 0, $diffult_limit ";
  }else{
    $sql = "select * from submition where (name Like '%$name1%' or title Like '%$name1%' ) and Visits <= $visit order by Visits desc limit 0, $diffult_limit ";
  }

}

$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
   $temparray =[];
    while($row = mysqli_fetch_assoc($result)) {
      $data['url']=$row['url'];
      $data['name']=$row['Name'];
      $data['description']=$row['description'];
      $data['title']=$row['title'];
      $data['page_click']=$row['page_click'];
      $data['visits']=$row['Visits'];
      $data['id']=$row['id'];
      $temparray[] = $data;    
    
}

$table ='';
 foreach($temparray as $val)
 {
   $page_visit = $val['visits'] + 1;
   $id = $val['id'];

  $sql="UPDATE `submition` SET `Visits`= $page_visit  WHERE `id`= $id";
  mysqli_query($conn,$sql);

$table .= '<hr><a href="javascript:void(0);" onclick="pageclick('.$val['id'].')"><p>'. $val['url'] .'</p></a>
<input type="hidden" id="'. $val['id'] .'" value="'. $val['url'] .'" />
<a style= "font-size: 18px;"href="javascript:void(0);" onclick="pageclick('.$val['id'].')"  id="w3s">'.$val['name'].'|  ' .$val['title'].'</a> <p>'. $val['description'].'.....</p><br>';
 }


}
$pagenation="";
}
$pagecount = 1;
$pageround = ceil($count/$diffult_limit);


for($i =1; $i<= $pageround; $i++)
{
  $count_val = 0;
  $valuedata1 = $i * $diffult_limit; 
  foreach($totalcountdata as $valdata)
  {
  
    $count_val ++;
   // echo $count_val;
if($count_val <= $valuedata1){
  $Visits = $valdata["Visits"];
}
    
 
  }
  $table .= '<a href="javascript:void(0)" class="abc" onclick=pagenation('.$i.','. $Visits .') >'. $i .'</a>';


}
//die;


echo $table;


?>

<script>
function pageclick(id)
{

  var url = $("#"+ id).val();
 $.ajax({

type:'post',
data:{'id':id},
url:'increase.php',
success:function(result){
   window.location.href = url;
}

});

}

function pagenation(page,visit)
{
  $("#pagesetId").val(page);
  var diffultvalue = $("#diffId").val();
  var maxvalue =0;
  var minvalue =0;
  maxvalue = page * diffultvalue;
  minvalue = maxvalue - diffultvalue;
  var data = $("#searchdata").val();
  $("#hiddiv").hide();
$.ajax({

type:'post',
data:{'data':data, 'limit':maxvalue,'minlimit':minvalue,'diffultpagelimit' : diffultvalue,'visit' : visit,'pageconut' : 2,'pagetype': page },
url:'search.php',
success:function(result){

if(result != ''){

    $("#hiddiv").html(result);
    $("#hiddiv").show();
}else{
    $("#hiddiv").hide();
}
}

});

  

}

</script>