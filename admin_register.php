<?php
//echo '<pre>';print_r($_POST);die;
$showalert="";
$user_id = $_COOKIE['user_id'];
if(!empty($user_id)){
if($_SERVER['REQUEST_METHOD']=='POST')
{
     require('connection.php');

$url=$_POST['url'];
$desciption=$_POST['Metadesciption'];
$inbound=$_POST['Inbound'];
$outbound=$_POST['Outbound'];
$title=$_POST['title'];
$Keyword=$_POST['keywords'];

$sql="INSERT INTO `submition`(`url`,`description`,`Inbound`,`Outbound`,`title`,`keyword`,`user_id`)VALUES('$url','$desciption','$inbound','$outbound','$title','$keyword','$user_id')";
$result=mysqli_query($conn,$sql);
if(!empty($result))
{
    header("Location:http://localhost/searchengine/admin.php");
   
}
}
}
else
{
    header("Location:http://localhost/searchengine/");
}
?>

<html>
<head>
<title>
admin_register
</title>
</head>
<body>
<button class="log-btn" onclick="document.location='/searchengine/admin.php'"><-Back</button>
<div class="heading" style="    text-align: center;
    padding: 35px;
    background-color: lightslategrey;
    color: #ffff;
    ">
<h1>Submition form:</h1>
</div>
<div class="main" style="    display: table;
    position: relative;
    left: 461px;
    box-sizing: border-box;
    padding: 93px;
    width: 582px;
    height: 549px;    background-color: aliceblue;">
<form action='/searchengine/admin_register.php' target='_self' method='post'>
Url:<br><input type="url" name="url" id="url" required="true" size="45">
<br><br>
Metadescription:<br><input type="text" name="Visits" id="Metadesciption" required="true"size="45 ">
<br><br>
Inbound:<br><input type="text" name="Inbound" id="Inbound" required="true"size="45">
<br><br>
Outbound:<br><input type="text" name="Outbound" id="Outbound" required="true"size="45">
<br><br>
Title:<br><input type="text" name="title" id="title" required="true" size ="45">
<br><br>
keyword:<br><input type="text" name="keywords" id="keywords" required="true" size="45" > 
<br><br>
<input type="submit" name="submit" value="Submit" >
<input type="reset" value="Cancel"><br>
</div>
</form>
</body>
<style>
body{
    background-image:url("http://localhost/searchengine/img/image3.jpg");
    background-size:cover;

}
.log-btn{

background-color: white;
color: black;
width: 97px;
    height: 39px;
border-radius: 54px;
font-weight: 700;
position: absolute;
top: 0px;
left: 1190px;
margin-top: 22px;
}


</style>