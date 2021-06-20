<html>
<head>
<title>
Search engine
</title>
</head>
<body>
<?php
$login=false;
$showerror=false;
setcookie( "user_id", '0', time()+(60*60*24*30) );
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	require 'connection.php';
	$Username=$_POST['Usr_name'];
	$passwd=$_POST['pwd'];
    
	$sql="select * from register where ( name='$Username' or phn_no ='$Username')  AND password='$passwd' ";
    $result=mysqli_query($conn,$sql);
	$num=mysqli_fetch_assoc($result);
	if(!empty($num))
	{
        
        $id = $num['id'];
        $type = $num['user_type'];
		$login=true;
		session_start();
		$_SESSION['loggedin']=true;
		$_SESSION['Username']=$Username;
        setcookie( "user_id", $id, time()+(60*60*24*30) );
        setcookie( "user_type", $type, time()+(60*60*24*30) );

			header("Location:http://localhost/searchengine/admin.php");
	}
	else{

		$showerror="Invalid Username and password";
        echo $showerror;
	}
}
?>


<a class="log-btn" style="cursor:pointer; " onclick="document.location='/searchengine/index1.php'"><-Back</a>
<div class="form-box" >
<div class="toggle_btn">
<div id="btn" ></div>
<button class="main-btn" onclick="login()">Login</button>
<button class="main-btn" onclick="register()">Register</button>
</div>
<div class="main">
<form action="/searchengine/index.php" target="_self" method="post" class="input-grp" id="login">
<input type="text" class="input-field" id="Usr_name" name="Usr_name"  required="true"placeholder="Username"><br>
<input type="password" class="input-field" id="pwd" name="pwd" required="true"placeholder="Password"><br><br>
<input type="submit"  value="Login" class="submit-btn">
</form>
<form action="/searchengine/register.php" target="_self" method="post" class="input-grp" id="register">
<input  class="input-field" type="text" id="Username" name="Username" required="true" placeholder ="Username" ><br>
<input  class="input-field" type="Number" id="Phoneno" name="Phoneno" required="true" placeholder ="Phone no"><br>
<input  class="input-field" type="Email" id="Email" name="Email" required="true" placeholder ="Email"><br>
<input  class="input-field" type="password" id="pwd1" name="pwd1" required="true"placeholder ="Password"><br><br>
<input type="submit" id="submit" value="Submit" class="submit-btn">
</div>
</form>


</div>
</div>

<br>

</body>
</html>

<style>

body{
	
	background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)),url("http://localhost/searchengine/img/image1.jpg");
	background-size:cover;
}
.log-btn{
color: #ffff;
    font-family: cursive;
    font-weight: 700;
    position: absolute;
    top: 0px;
    left: 1190px;
    margin-top: 22px;

}
.form-box{
	background: #ffffff2e;
    height: 427px;
    margin-top: 128px;
    width: 387px;
    position: absolute;
    background-position: center;
    left: 507px;
    border-radius: 31px;
	box-shadow: 0 0 20px 6px;
    overflow:hidden;
}
.toggle_btn{
	text-align: center;
    /* background: transparent; */
    width: 256px;
    border-radius: 16px;
    margin: 28px auto;
    box-shadow: 0 0 20px 9px;
    color: #ffffff94;
}
.main-btn{
	padding: 10px 30px;
    cursor: pointer;
	background:transparent;
    border: 0;
    outline: none;
    position: relative;
	color: #ffff;
}
#btn
{
    top: 27px;
    left: 65px;
    position: absolute;
    width: 131px;
    height: 9%;
    border-radius: 30px;
    transition: .5s;
    background: linear-gradient(to right, #ff10ade8, #16aeafe8);
}
.input-grp
{
    transition: .5s;
    position: absolute;
    left: 36px;
    top: -21px;
}
.input-field
{
	
	width: 323px;
    /* height: 5px; */
    padding: 10px 0px;
    margin: 5px 0;
    border-left: 0;
    border-radius: 6px;
    border-top: 0;
    border-right: 0;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
}
.input-field:hover
{
	color:black;
	background-color:#ffffff47;
	box-shadow: 0 0 20px 9px;
}
.submit-btn{
	width: 85%;
    padding: 10px 30px;
    cursor: pointer;
    display: block;
    margin: auto;
	background: linear-gradient(#ff108f, transparent);
    border: 0;
    outline: none;
    border-radius: 8px;
}
.main{
    text-align: center;
    justify-content: center;
    position: relative;
    top: 50px  
}
#login
{
left:40px;
}
#register
{
left:440px;

}
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #fff;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #fff;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: #fff;
}
  

</style>
<script>
var x=document.getElementById("login");
var y=document.getElementById("register");
var z=document.getElementById("btn");
function register()
{
   x.style.left="-400px";
   y.style.left="40px";
   z.style.left="50%";

}
function login()
{
   x.style.left="40px";
   y.style.left="440px";
   z.style.left="16%";

}
</script>