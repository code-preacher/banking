<?php
function checkLogin()
{
	if($_SESSION['login']=="")
	{	
	$_SESSION['msg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>You must login to access requested page...</strong>
</div>';

		header("Location: ../login.php");
	}

}

?>