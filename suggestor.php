

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<head>
<title>
Seo suggestor
</title>
</head>
<body>
<div class='header'>
<div class="heading">
<h1>Seo suggestor</h1>
</div>
</div  >
<div class="main">
<form target="_self" method="post">
<br><br>
<div style="  font-size: 37px;
    color: #c000ff;    position: relative;
    left: 9px; ;">Enter your website url:</div>
    <input type="text" id="search" name="search" size="50" class="input-bx" placeholder="Search" >
<br><br>
    <a href="javascript:void(0);" class="btnsize1 sub-btn "style="text-align: center;
    position: relative;
    left: 133px;" onclick="Search()" >Search</a>
</form>
</div>
<div id="maindiv" >
</div>
<button class="log-btn" onclick="document.location='/searchengine/index1.php'">Back</button>
</body>
</html>
<style>
.input-bx
{
    height: 5%;
    border-radius: 11px;
    outline: none;
}
.header{
    background: linear-gradient(#be08ce,#5b26d4);
    height: 237px;
    border-radius: 7px;
    border: 0;
    outline: none;
    box-shadow: 0 0 25px 7px;

}
.heading{
    color: #ffff;
    text-align: center;
    /* margin-top: 6px; */
    position: relative;
    top: 67px;
    font-family: cursive;
    font-size: 34px;
}
body
{
    background:#ffff;
    height: auto;
    width:auto;
}
.main{
    position: relative;
    left: 497px;
}
.keywords
{
    background:transparent;
}
.btnsize1{
    margin-right: 5%;
    margin-top: 3%;
    border-radius: 9%;
    color: #fff;
}
.sub-btn{
    text-decoration: none;
    width: 28%;
    height: 36px;
    font-size: x-large;
    color: black;
    padding: 7px;
    box-sizing: border-box;
    text-align: center;
}
.log-btn{

    background-color: #ffffff00;
    border: 0;
    font-weight: 700;
    position: absolute;
    top: 0px;
    left: 1250px;
    margin-top: 16px;
    outline: none;
    cursor: pointer;
    font-size: x-large;
    font-family: cursive;
    color: #ffff;
}
#maindiv
{
    background-color: #2b252bba;
    border-radius: 27px;
    border: 0;
    outline: none;
}
}
}
</style>
<script>
function Search()
{
    $('#maindiv').hide();
    var data = $("#search").val();
     $.ajax({
             type:'post',
             data:{'value': data },
             url:'seo.php',
             success:function(result)
             {
                if(result !='')
              {
                $("#maindiv").html(result);
                  $("#maindiv").show();
              }
         }
         }
     );
}
</script>
