<?php
session_start();
error_reporting(0);
include("config.php");
if(isset($_POST['submit']))
{
$email=Cleanse(mysqli_real_escape_string($con,$_POST['email']));
$pass=Cleanse(mysqli_real_escape_string($con,$_POST['password']));
	

#admin
$ret3=mysqli_query($con,"SELECT * FROM admin WHERE email='$email' and password='$pass'");
$num3=mysqli_fetch_array($ret3);


if($num3>0)
{
$extra="../admin/dashboard.php";//
$_SESSION['email']=$_POST['email'];
$_SESSION['login']=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else{
$_SESSION['msg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Invalid email or password...</strong>
</div>';
header("Location: ../login.php");
}
}


function Cleanse($Data)
{
#$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
$Data = htmlentities($Data, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
$Data = stripslashes($Data); /** Add Strip Slashes Protection */
return $Data;
}
?>

