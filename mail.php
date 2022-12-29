<?php
ob_start();
session_start();
if(isset($_GET['deviceid']) && isset($_GET['authcode']))
{
  if($_GET['authcode']==$_SESSION['authentication_code'])
  {
    $_SESSION['id'] = $_GET['deviceid'];
  }
  else 
  {
    header("Location: index.php");
  }
} 
else 
{
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Service</title>
    <style>
body
{
    margin:0; 
    padding:0;
    background: #202124;
    font-family: Arial, Helvetica, sans-serif;
}

.container
{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
}

.lds-hourglass {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;
}
.lds-hourglass:after {
  content: " ";
  display: block;
  border-radius: 50%;
  width: 0;
  height: 0;
  margin: 6px;
  box-sizing: border-box;
  border: 26px solid #fff;
 border-color: #ff8d00 transparent #ff3004 transparent;
  animation: lds-hourglass 1.2s infinite;
}
@keyframes lds-hourglass {
  0% {
    transform: rotate(0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }
  50% {
    transform: rotate(900deg);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  100% {
    transform: rotate(1800deg);
  }
}

.loader-wrapper {
    width: 150px;
    height: 100px;
    float: left !important;
}
.align-items-center {
    align-items: center !important;
}
.justify-content-center {
    justify-content: center !important;
}
.d-flex {
    display: flex !important;
}
h2 
{
    color: white;
    text-align: center;
}
svg {
  width: 100px;
  display: block;
  margin: 40px auto 0;
}
.path {
  stroke-dasharray: 1000;
  stroke-dashoffset: 0;
}
.path.circle {
  -webkit-animation: dash 1s ease-in-out;
  animation: dash 1s ease-in-out;
}
.path.line {
  stroke-dashoffset: 1000;
  -webkit-animation: dash .5s .5s ease-in-out forwards;
  animation: dash .5s .5s ease-in-out forwards;
}
.path.check {
  stroke-dashoffset: -100;
  -webkit-animation: dash-check .5s .5s ease-in-out forwards;
  animation: dash-check .5s .5s ease-in-out forwards;
}
p {
  text-align: center;
  margin: 20px 0 60px;
  font-size: 1.25em;
}

@-webkit-keyframes dash {
  0% {
    stroke-dashoffset: 1000;
  }
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes dash {
  0% {
    stroke-dashoffset: 1000;
  }
  100% {
    stroke-dashoffset: 0;
  }
}
@-webkit-keyframes dash-check {
  0% {
    stroke-dashoffset: -100;
  }
  100% {
    stroke-dashoffset: 900;
  }
}
@keyframes dash-check {
  0% {
    stroke-dashoffset: -100;
  }
  100% {
    stroke-dashoffset: 900;
  }
}
.abc 
{
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  color: white;
  display: none;
}
h1
{
  text-align: center;
  font-family: sans-serif;
}
    </style>
</head>
<body>
    <?php
        include 'includes/conn.php';
    	use PHPMailer\PHPMailer\PHPMailer;
        require './PHPMailer/PHPMailer/PHPMailer.php';
        require './PHPMailer/PHPMailer/SMTP.php';

        $query = mysqli_query($conn,"SELECT * from users WHERE deviceid = '".$_SESSION['id']."'");
        $row = $query->fetch_assoc();
            if(is_null($row['auth']))
            {
                function randomPassword() {
                    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                    $pass = array();
                    $alphaLength = strlen($alphabet) - 1;
                    for ($i = 0; $i < 15; $i++) {
                        $n = rand(0, $alphaLength);
                        $pass[] = $alphabet[$n];
                    }
                    return implode($pass);
                }
                
                $authcode = randomPassword();

                if(isset($authcode))
                {
                    mysqli_query($conn,"UPDATE users SET auth = '".$authcode."' WHERE deviceid = '".$row['deviceid']."'");

                $subject = "Email Account Verification";

                $message = "<div style='display: flex;align-items: center;justify-content: center;'><div style='padding: 10px;'><h2 align='left'>Hello ".$row['username'].",</h2><br>
                <p>This email has been send to verify that ".$row['email']." is a valid email address.</p><br>
                <p>Please click the button below to verify your email address</p><br>
                <div align='center'><a href='http://localhost/VBIND/saline/user/authentication.php?deviceid=".$row['deviceid']."&auth=".$authcode."' style='text-decoration: none;'><button style='background-color: #044cd0; color: white;padding: 10px 15px; border:none; border-radius:5px;'><b>Verify Email</b></button></a></div></div></div>";

                $mail = new PHPMailer;
                $mail->isSMTP(); 
                $mail->Host = "smtp.gmail.com"; 
                $mail->Port = 587;
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = true;
                $mail->Username = 'sinehan22@gmail.com';
                $mail->Password = '7358175451';
                $mail->setFrom('sinehan22@gmail.com', 'Saline System');
                $mail->addAddress($row['email']);
                $mail->Subject = $subject;
                $mail->msgHTML($message);
                $mail->AltBody = 'HTML messaging not supported'; 
                $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
                );
                if($mail->send())
                {
                  //header("Location: demo.php");
                  //exit();
                }
                else 
                {
                  //header("Location: hari.php");
                  //exit();               
                }
    }
}
    ?>
    <h2 id="fade-1">Sending Email</h2>
    <div class="container fade-2">
        <div class="loader-wrapper d-flex justify-content-center align-items-center">
            <div class="lds-hourglass"></div>
        </div>
    </div>
    <div class="abc">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
            <circle class="path circle" fill="none" stroke="#00E236" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
            <polyline class="path check" fill="none" stroke="#00E236" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
        </svg>
        <h1>Email Sent successfully!!!</h1>
        <script>
        setTimeout(()=>{
            document.getElementById('fade-1').style.display='none';
            document.getElementsByClassName('fade-2')[0].style.display='none';
            document.getElementsByClassName('abc')[0].style.display='block';
            setTimeout(()=>{
                window.location.href='index.php';
            },2000);
        },3000);
            </script>
    </div>
</body>
</html>