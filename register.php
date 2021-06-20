<?php




$showalert=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
// echo '<pre>';print_r($_POST);die;
       require'connection.php';
       $phnno=$_POST['Phoneno'];
       $usrname=$_POST['Username'];
       $email=$_POST['Email'];
       $password=$_POST['pwd1'];
    //    echo $password;die;
       $sql="INSERT INTO `register`(`name`,`email`,`password`,`phn_no`) VALUES ('$usrname','$email','$password','$phnno')";
       $result=mysqli_query($conn,$sql);
       if(!empty($result))
       {
           $showalert=true;
           header("Location:http://localhost/searchengine/index.php");
       }
       
}





?>


