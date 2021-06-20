<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>
Search bar
</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
session_start();
?>
<div>

<p class="main-head">Search engine</b></p>
<div class="main">
<form action="" target="_self" method="post">
<input type="hidden" name="page" id="pagesetId" value ="1"/>
<input type="hidden" name="minlimit" id="mId" value ="0"/>
<input type="hidden" name="diffultcount" id="diffId" value ="3"/>
<input type="hidden" name="limit" id="lId" value ="3"/>
<input type="text" name="text" class="input-box" id="searchdata" onkeyup="inputdata()" size="50" placeholder="Search">
<div class="form" style="
   text-align: center;">
    <!-- <button onclick="Search()" >Search</button> -->
    <a href="javascript:void(0);" class="btnsize1 sub-btn " onclick="Search()" >Search</a>
<!-- <input type="submit" name="Submit" value="Search" > -->
<a href="javascript:void(0);" class="btnsize sub-btn " onclick="document.location='/searchengine/index1.php'" >Cancel</a>

</div>
</form>

</div>
<button onclick="document.location='/searchengine/suggestor.php'" class="seo-main" >Seo suggestor: </button>

        <button class="log-btn" onclick="document.location='/searchengine/index.php'">Register your website</button>
<div id="hiddiv" style="    width: 1140px;
    background: #ffffffe8;
    border-radius: 22px;
    height: auto;
    position: relative;
    left: 121px;
    padding-left: 43px;
    padding-right: 31px;
    border: 0;
    outline: none;">


</div>

<div id="error_id" style="width: 1140px;
    background: white;
    height: 130px;
    position: relative;
    left: 121px;
    display:none;
    padding-left: 43px;
    padding-right: 31px;
    padding-top:6%;
    text-align:center;
    font-size:35px"></div>





</body>
</html>
<style>

body{
	
	background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)),url(http://localhost/searchengine/img/image.jpg);
	background-size:cover;
}
.abc{
    margin-right: 5%;
    margin-top: 3%;
    border-radius: 9%;
    color: #fff;
    background: transparent;
    border: 0;
    outline: none;
    font-size: 30px;
    font-family: cursive;
    background: #CA4246;
    background-color: #CA4246;
    background: conic-gradient( #CA4246 16.666%, #E16541 16.666%, #E16541 33.333%, #F18F43 33.333%, #F18F43 50%, #8B9862 50%, #8B9862 66.666%, #476098 66.666%, #476098 83.333%, #A7489B 83.333%);
    background-size: 57%;
    background-repeat: repeat;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: rainbow-text-animation-rev 0.5s ease forwards;
    cursor: pointer;
}

</style>

<script>
function inputdata()
{
    $('#error_id').hide();  
}
function Search(){
   var data = $("#searchdata").val();
   var limit = $("#diffId").val();
   var minlimit = $("#mId").val();
   var diffultvalue = $("#diffId").val();
   
   $('#error_id').hide();
   if (data.length>2)
   {
    
   $("#hiddiv").hide();
$.ajax({

type:'post',
data:{'data':data, 'limit':limit,'minlimit':minlimit,'diffultpagelimit' : diffultvalue,'visit':10000000000,'pageconut' : 1,'pagetype': "home" },
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
   else{
    $("#hiddiv").hide();
    $('#error_id').html("OOPS! No record found!");
       $('#error_id').show();
       
   }


}
</script>

<style>
*{
    font-family:sans-serif;
}
.main{
    color: #ffff;
    display: flex;
    justify-content: center;
    position: relative;
    margin-top: -3%;
    left: 5px;
}

.main-head{
    text-align: center;
    background-color: transparent;
    color: #d9e4d4;
    font-size: 60px;
    font-family: cursive;
    position: relative;
    margin-top: 4%;
  
}
.sub-btn{
    text-decoration: none;
    width: 28%;
    height: 36px;
    background-color: white;
    color: black;
    padding: 7px;
    box-sizing: border-box;
    text-align: center;
}

.log-btn{

    background-color: transparent;
    color: black;
    width: 164px;
    height: 38px;
    border-radius: 54px;

    cursor: pointer;
    border: 0;
    font-family: cursive;
    font-size: 21px;
    font-weight: 700;
    position: absolute;
    top: 0px;
    left: 1190px;
    margin-top: 22px;
    outline: none;
}
.log-btn:hover
{
    color:#39ff14;
}
.btnsize{
    margin-right: 5%;
    margin-top: 3%;
    border-radius: 9%;
    color: #fff;
    background: transparent;
    border: 0;
    outline: none;
    font-size: 30px;
    font-family: cursive;
     /* Double percentages to avoid blur (#000 10%, #fff 10%, #fff 20%, ...). */
  background: #CA4246;
  background-color: #CA4246;
  background: conic-gradient(
    #CA4246 16.666%, 
    #E16541 16.666%, 
    #E16541 33.333%, 
    #F18F43 33.333%, 
    #F18F43 50%, 
    #8B9862 50%, 
    #8B9862 66.666%, 
    #476098 66.666%, 
    #476098 83.333%, 
    #A7489B 83.333%);
  
  /* Set thee background size and repeat properties. */
  background-size: 57%;
  background-repeat: repeat;
  
  /* Use the text as a mask for the background. */
  /* This will show the gradient as a text color rather than element bg. */
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent; 
  
  /* Animate the text when loading the element. */
  /* This animates it on page load and when hovering out. */
  animation: rainbow-text-animation-rev 0.5s ease forwards;

  cursor: pointer;
}
.btnsize1{
    margin-right: 5%;
    margin-top: 3%;
    border-radius: 9%;
    color: #fff;
    background: transparent;
    border: 0;
    outline: none;
    font-size: 30px;
    font-family: cursive;
     /* Double percentages to avoid blur (#000 10%, #fff 10%, #fff 20%, ...). */
  background: #CA4246;
  background-color: #CA4246;
  background: conic-gradient(
    #CA4246 16.666%, 
    #E16541 16.666%, 
    #E16541 33.333%, 
    #F18F43 33.333%, 
    #F18F43 50%, 
    #8B9862 50%, 
    #8B9862 66.666%, 
    #476098 66.666%, 
    #476098 83.333%, 
    #A7489B 83.333%);
  
  /* Set thee background size and repeat properties. */
  background-size: 57%;
  background-repeat: repeat;
  
  /* Use the text as a mask for the background. */
  /* This will show the gradient as a text color rather than element bg. */
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent; 
  
  /* Animate the text when loading the element. */
  /* This animates it on page load and when hovering out. */
  animation: rainbow-text-animation-rev 0.5s ease forwards;

  cursor: pointer;
}
.input-box
{
    width: 323px;
    padding: 10px 0px;
    margin: 5px 0;
    border-radius: 10px;
    border: 0;
    outline: none;
    background: #ffffffb5;
    box-shadow: 0 0 16px 9px;
    color: black;
}
.input-box:hover
{
    color: #39ff14;;
}
}

::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #ffff;
  opacity: 2; /* Firefox */
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #fff;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: #fff;
}
.seo-main{

    position: absolute;
    top: 3%;
    left: 26px;
    background: transparent;
    color: #ffff;
    cursor: pointer;
    border: 0;
    outline: none;
    font-size: 23px;
    font-weight: bold;
    font-family: cursive;
}
.seo-main:hover
{
   color: #da1e1e;
}

/* a {
            
            color: #ffff;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            font-size: 1em;
            overflow: hidden;
        }
  
        /*creating animation effect*/
        /* a:hover {
            color: #111;
            background: #39ff14;
            box-shadow: 0 0 50px #39ff14;
        } */ */
</style>