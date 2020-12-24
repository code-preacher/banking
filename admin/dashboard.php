<?php
ob_start();
session_start();
error_reporting(0);
include '../inc/checklogin.php';
include '../inc/config.php';
checkLogin();
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

<!-- Main open -->
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-users"></i>
                </div>
                <div class="mr-5">
<?php 
$cn=mysqli_query($con,"select * from account");
$nc=mysqli_num_rows($cn);
echo "CUSTOMER ACCOUNT : ".$nc;

?>
               </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="view-a.php">
                <span class="float-left">View Customer Account</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-book"></i>
                </div>
                <div class="mr-5">
<?php 
$jn=mysqli_query($con,"select * from transaction");
$pc=mysqli_num_rows($jn);
echo "ALL TRANSACTIONS: ".$pc;

?>
               </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="view-t.php">
                <span class="float-left">View Transactions</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>


          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="mr-5">My Profile</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="profile.php">
                <span class="float-left">View Profile</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-arrow-right"></i>
                </div>
                <div class="mr-5">Logout  </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="../inc/logout.php" data-toggle="modal" data-target="#logoutModal">
                <span class="float-left">Logout</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>


      

      </div>
      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>