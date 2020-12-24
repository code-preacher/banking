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

$da=mysqli_query($con,"update account set acc_no='$acc_no',fname='$fname',lname='$lname',phone='$phone',email='$email',balance='$balance',sex='$sex',nok='$nok' where id='".$_GET['id']."'");
if ($da) {
$_SESSION['qmsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Account was updated successfully....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} else {
  $_SESSION['qmsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error updating account....</strong>
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

               <?php
$mz=$con->query("select * from account where id='".$_GET['id']."'");
$my=$mz->fetch_array();
               ?>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Update Account</div>

      <div class="card-body">
       <form action="#" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputFName" class="form-control" name="fname" value="<?php echo $my['fname']; ?>" required="required" autofocus="autofocus">
              <label for="inputFName">First Name</label>
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputLName" class="form-control" name="lname" value="<?php echo $my['lname']; ?>" required="required" autofocus="autofocus">
              <label for="inputLName">Last Name</label>
            </div>
          </div>
         
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputPh" class="form-control" name="phone" value="<?php echo $my['phone']; ?>" required="required" autofocus="autofocus">
              <label for="inputPh">Phone Number</label>
            </div>
          </div>


            <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputE" class="form-control" name="email" value="<?php echo $my['email']; ?>" required="required" autofocus="autofocus">
              <label for="inputE">Email</label>
            </div>
          </div>


            <div class="form-group">
            <div class="form-label-group">
             <select class="form-control" name="sex" required="required">
               <option value="<?php echo $my['sex']; ?>">-----Selected Gender was : <?php echo $my['sex']; ?>-----</option>
               <option value="MALE">MALE</option>
               <option value="FEMALE">FEMALE</option>
               <option value="BOTH">BOTH</option>
             </select>
            </div>
          </div>


          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputNOK" class="form-control" name="nok" value="<?php echo $my['nok']; ?>" required="required" autofocus="autofocus">
              <label for="inputNOK">Next of King</label>
            </div>
          </div>

          <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Update Account</button>
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