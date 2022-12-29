<?php
session_start();
if (isset($_SESSION['username'])) {
  header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="./assets/css/login.css" />
  <script type="text/javascript" src="./assets/js/script.js"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
</head>

<body>
  <div class="container d-flex justify-content-center">
    <div class="row col-xl-8 col-md-8 col-lg-8">
      <!-- Pills navs -->
      <ul class="nav nav-pills nav-justified mb-3 p-4" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
      </ul>
      <!-- Pills navs -->

      <!-- Pills content -->
      <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
          <form action="login.php" method="POST">

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" id="loginName" name="email" class="form-control" required />
              <label class="form-label" for="loginName">Email or Device Id</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="loginPassword" name="password" class="form-control" required />
              <label class="form-label" for="loginPassword">Password</label>
            </div>

            <!-- 2 column grid layout -->
            <div class="row mb-4">

              <div class="d-flex justify-content-center">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
              </div>
            </div>

            <!-- Submit button -->
            <button type="submit" name="login" class="btn btn-primary btn-block mb-4 btn-lg signin">Sign in</button>

            <p class="text-center" style="color: white;">OR</p>

            <div class="text-center mb-3">
              <a class="btn btn-success btn-lg btn-block" href="qrcodeverify.php" role="button">
                <i class="fas fa-qrcode"></i> Login with QR Code
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_SESSION['error'])) {
    echo "<div class='alert container text-align-center justify-content-center col-xl-8 col-md-8 col-sm-10 col-xs-10'>"; ?>
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <?php
    echo "<strong>" . $_SESSION['error'] . "</strong>
        </div>
  			";
    unset($_SESSION['error']);
  }
  ?>
</body>

</html>