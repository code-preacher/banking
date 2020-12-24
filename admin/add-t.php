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

$ty=mysqli_query($con,"select * from account where acc_no='".$_POST['acc_no']."'");
$yt=mysqli_fetch_array($ty);

if ($yt) {

$tid='57'.mt_rand(uniqid(),9999);

if ($_POST['type']=='CREDIT') {
$gy=$yt['balance'];
$f=$gy+$_POST['amount'];  
$date=date("d-m-y @ g:i A");
$da=mysqli_query($con,"insert into transaction(tid,acc_no,amount,type,date) values('$tid','$acc_no','$amount','$type','$date')");
$dc=mysqli_query($con,"update account set balance='$f' where acc_no='".$_POST['acc_no']."'");
if ($da && $dc) {
$_SESSION['qmsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Account was successfully credited....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} }
else if ($_POST['type']=='DEBIT') {
$gy=$yt['balance'];
$f=$gy-$_POST['amount'];  
$date=date("d-m-y @ g:i A");
$dm=mysqli_query($con,"insert into transaction(tid,acc_no,amount,type,date) values('$tid','$acc_no','$amount','$type','$date')");
$dn=mysqli_query($con,"update account set balance='$f' where acc_no='".$_POST['acc_no']."'");
if ($dm && $dn) {
$_SESSION['qmsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Account was successfully debited....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

}

}
 else {
 $_SESSION['qmsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Unknown or Invalid Account Number, Check and try again....</strong>
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
   
           <div class="form-group"><label>Account Number : </label>
           
              <input type="number" class="form-control" name="acc_no" placeholder="Customer Account Number" required="required" autofocus="autofocus">
     
          </div>
         

          <div class="form-group"><label>Amount : </label>
           
              <input type="number" class="form-control" name="amount" placeholder="Amount to transact" required="required" autofocus="autofocus">
     
          </div>
          


            <div class="form-group"><label>Select Transaction Type : </label>
           
             <select class="form-control" name="type" required="required">
             
               <option value="CREDIT">CREDIT</option>
               <option value="DEBIT">DEBIT</option>
    
             </select>
           
          </div>



          <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Process Transaction</button>
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