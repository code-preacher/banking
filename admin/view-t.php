<?php 
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
include('../inc/config.php');
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
         <li class="breadcrumb-item active">Transaction</li>
        </ol>


 <?php
               if (!empty($_SESSION['umsg'])) {
                      echo $_SESSION['umsg'];
                       $_SESSION['umsg']="";
               }
         
               ?>

<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-users"></i>
            ALL TRANSACTIONS</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Transaction Id</th>
                    <th>Account Number</th>
                     <th>Customer Name</th>
                    <th>Amount</th>
                    <th>Transaction type</th>
                   
                    <th>Date Created</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                
                <tbody>
<?php
 $seat=mysqli_query($con,"SELECT * FROM transaction order by id desc");
 while($dy=mysqli_fetch_array($seat)){
?>
                  <tr>
                   <td><?php echo $dy['tid']; ?></td>
                    <td><?php echo $dy['acc_no']; ?></td>
                    <td><?php 
                    $rz=mysqli_query($con,"select fname,lname from account where acc_no='".$dy['acc_no']."'");
                    $rn=mysqli_fetch_array($rz);
                    echo $rn['lname'].' '.$rn['fname'];
                     ?></td>
                     <td><?php echo $dy['amount']; ?></td>
                      <td><?php echo $dy['type']; ?></td>
                       <td><?php echo $dy['date']; ?></td>
                    <td><a href="del-t.php?id=<?php echo $dy['id']; ?>" onClick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></a></td>
                    
                  </tr>
                <?php
}
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>