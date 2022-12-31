<?php
ob_start();
session_start();
include 'includes/conn.php';
if (!isset($_SESSION['username'])) {
  header('Location: index.php');
  exit();
} else {
  $sql = mysqli_query($conn, "SELECT * from users WHERE deviceid = '" . $_SESSION['id'] . "'");
  $row = mysqli_fetch_assoc($sql);
  if (!isset($row['authsuccess'])) {
    header("Location: authuser.php?deviceid='" . $_SESSION['id'] . "'");
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
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
  <link rel="stylesheet" href="./dist/css/dataTables.bootstrap.min.css" />

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
            <h3 class="page-title"> Variables </h3>
          </div>
          <div class="col-md-12 ">
            <div class="row">
              <?php
              if (isset($_SESSION['success'])) {
                echo "<div class='success container-2 text-align-center justify-content-center col-xl-8 col-md-8 col-sm-10 col-xs-10'>";
              ?>
                <span class="closebtn" style="padding-left: 10px;font-size:28px;font-weight:bold;float:right;" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php
                echo "<strong style='display:table;margin:0 auto; margin-top:10px;text-align:center;'>" . $_SESSION['success'] . "</strong>
              </div>
              ";
                unset($_SESSION['success']);
              }
              if (isset($_SESSION['error'])) {
                echo "<div class='alert container text-align-center justify-content-center col-xl-8 col-md-8 col-sm-10 col-xs-10'>";
              ?>
                <span class="closebtn" style="padding-left: 10px;font-size:28px;font-weight:bold;float:right;" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php
                echo "<strong style='display:table;margin:0 auto; text-align:center;'>" . $_SESSION['error'] . "</strong>
              </div>
              ";
                unset($_SESSION['error']);
              }
              ?>
              <div class="col-md-10">
                <h3 class="panel-title"></h3>
              </div>
              <div class="col-md-2" align="right">
                <button type="button" name="add" id="updateRecord" class="btn btn-dark update"> + Add Variable</button>
              </div>
            </div>
            <br>
            <?php
            include './includes/conn.php';
            $sql = mysqli_query($conn, "SELECT * from users WHERE deviceid = '" . $_SESSION['id'] . "'");
            $row = mysqli_fetch_assoc($sql);
            ?>
            <div id="variables" class="row ">

              <?php
              $arr = array('Variable 1', 'Variable 2', 'Variable 3', 'Variable 4'); #Variables list
              foreach ($arr as $item) {
                echo '<div class="col-xl-3 col-lg-6">
                <div class="card l-bg-black">
                  <div class="card-statistic-3 p-4">
                    <div class="mb-4">
                      <h5 class="card-title mb-0">'
                  . $item .
                  '</h5>
                      </div>
                      <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                          <h2 class="d-flex align-items-center mb-0">'
                  . $item .
                  '</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>';
              }
              ?>

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
            </div>
          </div>
          <div class="row">
            <div class="container contact col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xl-12">
              <div id="recordModal" class="modal fade">
                <div class="modal-dialog">
                  <form method="post" action="add_variable.php">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Variable</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="username" class="control-label">Variable Name</label>
                          <input type="text" class="form-control" id="name" value="" name="name" placeholder="Device Name" required>
                        </div>
                        <div class="form-group">
                          <label for="firstname" class="control-label">Description</label>
                          <input type="text" class="form-control" id="desc" value="" name="desc" placeholder="Description">
                        </div>
                        <div class="form-group">
                          <label for="firstname" class="control-label">Variable Unit</label>
                          <input type="text" class="form-control" id="unit" value="" name="unit" placeholder="Description">
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
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/misc.js"></script>
    <script src="./assets/js/settings.js"></script>
    <script src="./assets/js/todolist.js"></script>


    <script type="text/javascript" src="./dist/js/jquery.dataTables.min.js" defer></script>
    <script type="text/javascript" src="./dist/js/dataTables.bootstrap.min.js" defer></script>
    <script type="text/javascript" src="./dist/js/ajax.js"></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./assets/js/sort-resize.js"></script>
    <!-- End custom js for this page -->
</body>

</html>