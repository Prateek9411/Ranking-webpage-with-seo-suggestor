<?php
require'connection.php';

if(!empty($_POST))
{
    $url=$_POST['id'];
    $sql="SELECT * from submition where id='$url' ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    $temparray=[];
    while($row=mysqli_fetch_assoc($result))
    {
        $data['page_click']=$row['page_click'];
        $data['id']=$row['id'];
        $data['url']=$row['url'];
        $temparray[]=$data;
    }
    foreach ($temparray as $data)
    {
        $page_click = $data['page_click'] + 1;
        $page_rank=0;
        $id = $data['id'];
        $url=$data['url'];
        if($page_click >60)
        {
            $page_rank=10;
        }
        else if($page_click >=50 && $page_click<60)
        {
            $page_rank=9;
        } 
        else if($page_click >=40 && $page_click<50)
        {
            $page_rank=8;
        } 
        else if($page_click >=30 && $page_click<40)
        {
            $page_rank=7;
        } 
        else if($page_click >=25 && $page_click<30)
        {
            $page_rank=6;
        } 
        else if($page_click >=20 && $page_click<=25)
        {
            $page_rank=5;
        }
        else  if($page_click >=15 && $page_click<20)
        {
            $page_rank=4;
        }
        else if($page_click >=10 && $page_click<15)
        {
            $page_rank=3;
        } 
        else if($page_click >=5 && $page_click<10)
        {
            $page_rank=2;
        } 
        else if($page_rank <5)
        {
            $page_rank=1;
        }
     
       $sql="UPDATE `submition` SET `page_click`= $page_click,`PR`=$page_rank  WHERE `id`= $id";
       mysqli_query($conn,$sql);
    }
}
echo "1";
?>

    

