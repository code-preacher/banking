<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();


function Cleanse($Data)
{
$Data = htmlentities($Data, ENT_QUOTES, 'UTF-8'); 
$Data = stripslashes($Data);
return $Data;
}
?>

<?php
include("../inc/config.php");
if(isset($_POST['submit'])){
Cleanse(mysqli_real_escape_string($con,extract($_POST)));
$acc_no='30'.mt_rand(uniqid(),99999999);

$date=date("d-m-y @ g:i A");
$da=mysqli_query($con,"insert into account(acc_no,fname,lname,phone,email,balance,sex,nok,date) values('$acc_no','$fname','$lname','$phone','$email','0','$sex','$nok','$date')");
if ($da) {
$_SESSION['qmsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Car was created successfully....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} else {
  $_SESSION['qmsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error Adding Car....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GRACE OSUSU BANK</title>

  <?php
include 'inc/header.php';
  ?>



  <div id="wrapper">
<?php
include 'inc/sidebar.php';
?>


    <div id="content-wrapper">

<div class="container-fluid col-lg-12">
  <?php
               if (!empty($_SESSION['qmsg'])) {
                      echo $_SESSION['qmsg'];
                       $_SESSION['qmsg']="";
               }
         
               ?>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Create New Account</div>

      <div class="card-body">
       <form action="#" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputFName" class="form-control" name="fname" placeholder="Customer First Name" required="required" autofocus="autofocus">
              <label for="inputFName">First Name</label>
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputLName" class="form-control" name="lname" placeholder="Customer Last Name" required="required" autofocus="autofocus">
              <label for="inputLName">Last Name</label>
            </div>
          </div>
         
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputPh" class="form-control" name="phone" placeholder="Customer Phone Number" required="required" autofocus="autofocus">
              <label for="inputPh">Phone Number</label>
            </div>
          </div>


            <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputE" class="form-control" name="email" placeholder="Customer Email" required="required" autofocus="autofocus">
              <label for="inputE">Email</label>
            </div>
          </div>


            <div class="form-group">
            <div class="form-label-group">
             <select class="form-control" name="sex" required="required">
               <option value="null">-----Select Gender-----</option>
               <option value="MALE">MALE</option>
               <option value="FEMALE">FEMALE</option>
               <option value="BOTH">BOTH</option>
             </select>
            </div>
          </div>


          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputNOK" class="form-control" name="nok" placeholder="Customer Next of Kin" required="required" autofocus="autofocus">
              <label for="inputNOK">Next of King</label>
            </div>
          </div>

          <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Create Account</button>
          </div>
         
        </form>
        <div class="text-center">
         
        </div>
      </div>
    </div>
  </div>

      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>