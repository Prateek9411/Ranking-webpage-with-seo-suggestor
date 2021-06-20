<?php

$servername="localhost";
$username="root";
$password="";
$db="searchengine";
// create connection

$conn=new mysqli($servername,$username,$password,$db);
// if(!empty($conn)){
//     echo "hii";die;
// }
if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}else{
   // echo 'hello kd'; die;
}
//echo "Connected successfully";
?>