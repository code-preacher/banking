
    <!-- Sidebar open -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fa fa-fw fa-tachometer"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-fw fa-users"></i>
          <span>Account</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           <a class="dropdown-item" href="add-a.php"><i class="fa fa-fw fa-plus"></i>Create Account</a>
          <a class="dropdown-item" href="view-a.php"><i class="fa fa-fw fa-eye"></i>View Account</a>
      
         
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-fw fa-book"></i>
          <span>Transaction</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="add-t.php"><i class="fa fa-fw fa-plus"></i>Add Transaction</a>
          <a class="dropdown-item" href="view-t.php"><i class="fa fa-fw fa-eye"></i>View Transaction</a>     
        </div>
      </li>

       

      <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <i class="fa fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../inc/logout.php" data-toggle="modal" data-target="#logoutModal">
          <i class="fa fa-fw fa-arrow-right"></i>
          <span>Logout</span></a>
      </li>
    </ul>

    <!-- Sidebar close -->