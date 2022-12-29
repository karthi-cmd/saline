<?php
  ob_start();
  session_start();
  include 'includes/conn.php';
  if(!isset($_SESSION['username'])){
    header('Location: index.php');
    exit();
  }
  else
  {
    $sql = mysqli_query($conn,"SELECT * from users WHERE deviceid = '".$_SESSION['id']."'");
    $row = mysqli_fetch_assoc($sql);
    if(!isset($row['authsuccess']))
    {
      header("Location: authuser.php?deviceid='".$_SESSION['id']."'");
      exit();
    }
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
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="./dist/css/dataTables.bootstrap.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./dist/js/jquery.dataTables.min.js" defer></script>
    <script type="text/javascript" src="./dist/js/dataTables.bootstrap.min.js" defer></script>	
    <script type="text/javascript" src="./dist/js/ajax.js"></script>		

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <?php require('./includes/Sidebar.php') ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
      <?php require('./includes/Topbar.php') ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Patient Details </h3>
            </div>
<div class="col-md-12 ">
<div class="row">
<?php
  		if(isset($_SESSION['success'])){
  			echo "<div class='success container-2 text-align-center justify-content-center col-xl-8 col-md-8 col-sm-10 col-xs-10'>";?>
        <span class="closebtn" style="padding-left: 10px;font-size:28px;font-weight:bold;float:right;" onclick="this.parentElement.style.display='none';">&times;</span> 
        <?php 
        echo "<strong style='display:table;margin:0 auto; margin-top:10px;text-align:center;'>".$_SESSION['success']."</strong>
        </div>
  			";
  			unset($_SESSION['success']);
  		}
      if(isset($_SESSION['error'])){
  			echo "<div class='alert container text-align-center justify-content-center col-xl-8 col-md-8 col-sm-10 col-xs-10'>";?>
        <span class="closebtn" style="padding-left: 10px;font-size:28px;font-weight:bold;float:right;" onclick="this.parentElement.style.display='none';">&times;</span> 
        <?php 
        echo "<strong style='display:table;margin:0 auto; text-align:center;'>".$_SESSION['error']."</strong>
        </div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="updateRecord" class="btn btn-success update"> + Update</button>
				</div>
			</div>
      <br>
      <?php
    include './includes/conn.php';
    $sql = mysqli_query($conn,"SELECT * from users WHERE deviceid = '".$_SESSION['id']."'");
    $row = mysqli_fetch_assoc($sql);
     ?>
    <div class="row ">
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-hdd"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Device Id</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo $row['deviceid']; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Patient Name</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php echo $row['firstname']; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-box"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">dpm</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php echo $row['dpm']; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-envelope"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Email</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php echo $row['email']; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-cherry1">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-hdd"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Location</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php echo $row['location']; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-blue-dark1">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Phone Number</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php echo $row['phone']; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-green-dark1">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-box"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Username</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php echo $row['username']; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-orange-dark1">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-envelope"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Title 8</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                Content
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <div class="row">
            <div class="container contact col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-12">	
	<div id="recordModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" action="editrecord.php">
    			<div class="modal-content">
    				<div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
    				</div>
    				<div class="modal-body">
						<div class="form-group">
							<label for="username" class="control-label">Patient Name</label>
							<input type="text" class="form-control" id="username" value="<?php echo $row['username']; ?>" name="username" placeholder="Patient Name" required>			
						</div>
            <div class="form-group">
							<label for="firstname" class="control-label">Full Name</label>							
							<input type="text" class="form-control" id="firstname" value="<?php echo $row['firstname']; ?>" name="firstname" placeholder="First Name">			
						</div>
						<div class="form-group">
							<label for="location" class="control-label">Location</label>							
							<input type="text" class="form-control" id="location" value="<?php echo $row['location']; ?>" name="location" placeholder="Location">							
						</div>	   	
						<div class="form-group">
							<label for="phone" class="control-label">Phone Number</label>							
							<input type="number" class="form-control"  id="phone" value="<?php echo $row['phone']; ?>" name="phone" placeholder="Phone Number" required>							
						</div>	 
						<div class="form-group">
							<label for="dpm" class="control-label">dpm</label>							
							<input class="form-control" type="number" id="dpm" value="<?php echo $row['dpm']; ?>" name="dpm" placeholder="dpm"></textarea>							
						</div>						
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="deviceid" id="deviceid" value="<?php echo $row['deviceid']; ?>" />
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
      <?php require('./includes/Footer.php') ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/misc.js"></script>
    <script src="./assets/js/settings.js"></script>
    <script src="./assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>