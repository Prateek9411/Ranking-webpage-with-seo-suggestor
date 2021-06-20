<?php
require('connection.php');
$usertype = $_COOKIE['user_type'];
$user_id = $_COOKIE['user_id'];
if(!empty($user_id)){

    if($usertype =='admin'){
        $sql="select * from submition where user_id = $user_id  order by PR desc";
    }else{
        $sql="select * from submition order by PR desc";
    }
    
    $result=mysqli_query($conn,$sql);
}else{

    
			header("Location:http://localhost/searchengine/");
}

//echo '<pre>';print_r($result);die;
    
?>

<html>
<head>
<title>
Admin
</title>
</head>
<body>
<div class="shade">
<!-- <br><br>
<h1 style="text-align:center;background-color:lightgray;color:black;font-size:300%;"><b>Webpage Ranking Search engine project with Seo suggestor</b></p></h1> -->
<?php 
session_start();
$name=$_SESSION['Username'];


?>
<h1 style="        position: relative;
    left: 54px;
    margin-top: 57px;
    font-family: cursive;">Welcome <?= $name ?></h1>
<br>

<div class="main" style="    position: relative;
    top: 12px;
    left: 124px;">
<table style="width:80%">
<tr>
<th>URL:</th>
<th>Page clicks:</th>
<th>Visits:</th>
<th>Inbound:</th>
<th>PR:</th>
<th>Outbound:</th>
</tr>

<?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      // echo "Name: " . $row["url"]. "<br>";
    
 
?>
<tr>
<td><?=  !empty($row["url"]) ? $row["url"] : "0" ?></td>
<td style="    text-align: center;width: 10%;"><?=  !empty($row["page_click"]) ? $row["page_click"] : "0" ?></td>
<td style="    text-align: center;width: 10%;"><?=  !empty($row["Visits"]) ? $row["Visits"] : "0" ?></td>
<td style="    text-align: center;width: 10%;"><?=  !empty($row["Inbound"]) ? $row["Inbound"] : "0" ?></td>
<td style="    text-align: center;width: 10%;"><?=  !empty($row["PR"]) ? $row["PR"] : "0" ?></td>
<td style="    text-align: center;width: 10%;"><?=  !empty($row["Outbound"]) ? $row["Outbound"] : "0" ?></td>
</tr>
<?php
}}else {
    echo "0 results";
 }
?>

</table>
</div>

<a href="http://localhost/searchengine/admin_register.php" class="url">Url submition: </a><br><br>

        <button class="log-btn" onclick="document.location='/searchengine/Logout.php'">Logout</button>
</div>
</body>
</html>
<style>
    body{
	
	/* background-image:url("http://localhost/searchengine/img/image4.jpg");
	background-size:cover; */
    background:#b9b3b3a3;
}
.shade{
    background: #ffffff73;
    border: 0;
    outline: none;
    border-radius: 25px;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  background-color: aliceblue;
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
    margin-top: 16px;
}

.url {
            margin: 0;
            padding: 0;
            display: flex;
            height: 8vh;
            width:201;
            justify-content: center;
            align-items: center;
            background-color: #000;
            font-family: sans-serif;
            border-radius:48px;
            position:relative;
            left:558px;
            bottom:-16px
        }
  
        /* styling the button*/
        a {
            
            color: #ffff;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            font-size: 1em;
            overflow: hidden;
        }
  
        /*creating animation effect*/
        a:hover {
            color: #111;
            background: #39ff14;
            box-shadow: 0 0 50px #39ff14;
        }
</style>
