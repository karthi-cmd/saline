<?php
  ob_start();
  header("Cache-Control: no-cache, must-revalidate");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <style>
      .card 
      {
        background-color: #e0e0e0 !important;
        color: black !important;
      }
      .new
      {
        margin-top: 10px !important;
      }
      .cardnew
      {
        margin-bottom: 10px !important;
      }
      select 
      {
        width: 100%;
        height: 40px;
        border-radius: 10px;
        text-indent: 5px;
      }
      .progress
      {
        height: 30px;
        border-radius: 15px;
      }
      .progress-bar
      {
        padding: 15px;
        font-weight: bold;
        font-size: 24px;
      }
      .ref-con
      {
        display: block;
      }
      .refresh 
      {
        width: 160px;
        float: right;
        border-radius: 12px;
        padding: 10px 0px;
      }
      .container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}
.container .buttons {
  display: flex;
  flex-direction: column;
}
.container input {
  padding: 10px 0px;
  width: 100px;
  font: 16px "Montserrat", sans-serif;
  font-weight: bold;
  text-transform: uppercase;
  text-decoration: none;
  text-align: center;
  margin: 1em;
}

.button1 {
  color: white;
  cursor: pointer;
  background-color: #2d7eff;
  border: 2px solid transparent;
  transition: 0.2s ease;
  border-radius: 10px;
}

.button1:hover {
  color: #2d7eff;
  background-color: white;
  transform: scale(1.1);
  border: 2px solid #2d7eff;
}
input[type='time']
{
  border-radius: 10px;
  padding: 8px 20px;
  border: none;
}
    </style>
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
              <span class="page-title" style="font-weight: bold;"> Patient Status </span>
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
				<!-- <div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="updateRecord" class="btn btn-success update"> + Update</button>
				</div> -->
			</div>
      <br>
      <?php
    include './includes/conn.php';
    $sql = mysqli_query($conn,"SELECT * from users WHERE deviceid = '".$_SESSION['id']."'");
    $row = mysqli_fetch_assoc($sql);
     ?>
    <div class="row ">
    <div class="col-md-12">
        <h5 class="black">status</h5> 
        <div class="card black"> 
            <div class="card-statistic-3 p-4">
                <div class="card-icon "></div>
                <div class="mb-4">
                    <h5 class=" black mb-0"><?php echo $row['status']; ?></h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                        <?php echo $row['cmnt']; ?>
                        </h2>
                    </div>
                </div>
                <!-- <div class="progress">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;">
                      80%
                  </div>
                </div> -->
            </div>
      </div>
    </div>
    <div class="col-md-12 ">
        <div class="row ">
        <h5 class="black">Monitoring</h5> 

            <div class="col-xl-4 col-lg-6">

                <div class="card cardnew">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon "></div>
                        <div>
                            <h4 class=" black mb-0"><?php echo $row['dpm']; ?> dpm</h4>
                        </div>
                        <!-- <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    15278
                                </h2>
                            </div>
                        </div> -->
                    </div>
                </div>
                <center><h5 class="black">Drips Per Minute</h5></center>

            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card cardnew">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon "></div>
                        <div>
                            <h4 class="black mb-0"><?php echo $row['remain']; ?> ml</h4>
                        </div>
                        <!-- <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    Sinehan S
                                </h2>
                            </div>
                        </div> -->
                    </div>
                </div>
                <center><h5 class="black">Remaining volume</h5></center>

            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card cardnew">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon "></div>
                        <div>
                            <h4 class="black mb-0"><?php echo $row['consume'];?> ml</h4>
                        </div>
                        <!-- <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    130
                                </h2>
                            </div>
                        </div> -->
                    </div>
                </div>
                <center><h4 class="black">consumed volume</h4></center> 
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card cardnew">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon "></div>
                        <div>
                            <h4 class="black mb-0"><?php echo $row['total'];?> ml</h4>
                        </div>
                        <!-- <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    130
                                </h2>
                            </div>
                        </div> -->
                    </div>
                </div>
                <center><h4 class="black">Total volume</h4></center> 
            </div>
            </div>
        </div>
    </div>
    <br>
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
    <script>
      $(function(){     
  var d = new Date(),        
      h = d.getHours(),
      h1 = d.getHours()+1,
      m = d.getMinutes();
  if(h < 10) h = '0' + h; 
  if(h1 < 10) h1 = '0' + h1; 
  if(m < 10) m = '0' + m; 
  $('input[type="time"][value="now"]').each(function(){ 
    $(this).attr({'value': h + ':' + m});
  });
  $('input[type="time"][value="then"]').each(function(){ 
    $(this).attr({'value': h1 + ':' + m});
  });
});
    </script>
      <?php 
date_default_timezone_set("Asia/Kolkata");
$did = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * from users WHERE deviceid = '$did'");
$get = mysqli_fetch_assoc($query);
$start = $get['start'];
$end = $get['end'];
$current = date("Y-m-d H:i",);
// echo "<script>alert('".$start."<br>".$end."<br>".$current."')</script>";
if($start <= $current)
{
  if($current <= $end)
  {
    echo "<script>";
    echo "document.getElementById('set').disabled=true;";
    echo "</script>";
  }
}
$conn->close();
?>
  </body>
</html>