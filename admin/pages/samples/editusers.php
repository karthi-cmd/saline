<?php
  ob_start();
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Saline Admin Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/dataTables.bootstrap.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../dist/js/jquery.dataTables.min.js" defer></script>
    <script type="text/javascript" src="../../dist/js/dataTables.bootstrap.min.js" defer></script>	
    <script type="text/javascript" src="../../dist/js/ajax.js"></script>		

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <style>
      .dataTables_length
      {
        color: white !important;
        display: flex;
        justify-content: center;
        width: auto;
      }
      table,tr,td,th
      {
        text-align: center;
        color: white !important;
        border-color: white !important;
      }
      .row 
      {
        width: 100% !important;
      }
      ul.pagination
      {
        float: right;
      }
      ul.pagination li 
      {
        padding: 10px 10px;
      }
      .dataTables_length select
      {
        color: white;
      }
      .dataTables_filter
      {
        margin-top: 30px;
      }
      label
      {
        margin: 1.5rem 0rem;
        display: inline-flex;
      }
      .dataTables_filter input 
      {
        color: white;
      }
      .dataTables_wrapper.paginate_button
      {
        color: white !important;
      }
      .dataTables_filter,.dataTables_info,.dataTables_info
      {
        color: white !important;
      }
      .dataTables_wrapper .dataTable .btn
      {
        padding: 0.5rem 1rem;
      }
      .dt-buttons
      {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-top: 20px;
      }
      .dt-buttons button
      {
        padding: 6px 20px;
        border-radius: 12px;
        border: 2px solid white;
        background-color: #333;
        color: white;
      }
      #datatables_button_info h2
      {
        background-color: white;
      }
      #addRecord,.add
      {
        white-space: nowrap;
      }
      .close 
      {
        color: white !important;
      }
      @media (max-width: 570px)
      {
        .dt-buttons
        {
          width: 500px;
          flex-wrap: nowrap;
        }
      }
      tbody tr:nth-of-type(odd) td
      {
        color: white;
      }
      #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    text-align: center;
    width: 100%;
  }
  
  #customers td, #customers th {
    border: 1px solid #fff;
    padding: 8px;
  }
  
  #customers tr{background-color: transparent; color: white;}
  
  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    color: white;
  }
  .success {
    padding: 10px;
    background-color: #28a745;
    color: white;
    position: absolute;
    top: -10%;
    left: 50%;
    transform: translate(-50%,0%);
    border-radius: 5px;
  }
  .alert {
    padding: 10px;
    background-color: #f44336;
    color: white;
    position: absolute;
    top: -10%;
    left: 50%;
    transform: translate(-50%,0%);
    border-radius: 5px;
  }
  .closebtn 
  {
    cursor: pointer;
  }
  .navbar-menu-wrapper, .navbar-brand-wrapper, .navbar-brand, .sidebar, .dropdown-menu, .dropdown-item
  {
    background-color: white !important;
    color: black !important;
  }
  .dropdown-item:hover
  {
    background-color: black !important;
    color: white !important;
  }
  .sidebar-brand-wrapper, .sidebar-brand, .sidebar .nav.sub-menu .nav-item .nav-link.active
  {
    background-color: white !important;
    color: black !important;
  }
  .content-wrapper
  {
    background-color: #333;
  }
  .footer 
  {
    background-color: #333;
  }
  @media (min-width: 576px)
  {
.d-sm-flex {
    float: right;
}
  }
  @media only screen and (max-width: 475px)
  {
  .mb-0
  {
    font-size: large;
  }
}
@media only screen and (min-width: 1200px)
  {
  .mb-0
  {
    font-size: large;
  }
  .l-bg-orange-dark .mb-0
  {
    font-size: large;
  }
}
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <!-- <a class="sidebar-brand brand-logo" href="home.php"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="home.php"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a> -->
          <a class="sidebar-brand brand-logo Chead" href="home.php"><h2>S A L I N E</h2></a>
          <a class="sidebar-brand brand-logo-mini Chead" href="home.php"><h2>S</h2></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../../assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['username']; ?></h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../home.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./editusers.php"> Edit Users </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="https://www.vbindinnovation.com/">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <!-- <a class="navbar-brand brand-logo-mini" href="home.php"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a> -->
            <a class="navbar-brand brand-logo-mini Chead" href="home.php"><h2>S</h2></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <button type="button" class="btn btn-success add" onclick="window.location.href='./editusers.php'"> + Add Users</button>
              </li>
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                      <p class="text-muted mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                      <p class="text-muted mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../../assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['username']; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" onclick="window.location.href='../../logout.php'">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Dashboard </h3>
            </div>
            <div class="row">
            <div class="container contact col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-12">	
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">   		
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="addRecord" class="btn btn-success"> + Add New Record</button>
				</div>
			</div>
		</div>
    <div style="display:block;overflow-x:auto;">
		<table id="recordListing" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Device Id</th>
					<th>Patient Name</th>					
					<th>Location</th>					
					<th>Phone Number</th>
					<th>Pressure</th>
					<th>Fullname</th>					
					<th>Update</th>
					<th>Delete</th>				
				</tr>
			</thead>
		</table>
    </div>
	</div>
	<div id="recordModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="recordForm">
    			<div class="modal-content">
    				<div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
    				</div>
    				<div class="modal-body">
						<div class="form-group">
							<label for="username" class="control-label">UserName</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>			
						</div>
            <div class="form-group">
							<label for="firstname" class="control-label">Full Name</label>							
							<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">			
						</div>		
						<div class="form-group">
							<label for="location" class="control-label">Location</label>							
							<input type="text" class="form-control" id="location" name="location" placeholder="Location">							
						</div>	   	
						<div class="form-group">
							<label for="phone" class="control-label">Phone Number</label>							
							<input type="number" class="form-control"  id="phone" name="phone" placeholder="Phone Number" required>							
						</div>	 
						<div class="form-group">
							<label for="pressure" class="control-label">Pressure</label>							
							<input class="form-control" type="number" id="pressure" name="pressure" placeholder="Pressure"></textarea>							
						</div>				
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="deviceid" id="deviceid" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Copyright © <a href="https://www.vbindinnovation.com/" target="_blank">VBIND Innovations</a> 2022</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>