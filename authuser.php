<?php
session_start();
include 'includes/conn.php';
if(isset($_GET['deviceid']))
{
    $sql = mysqli_query($conn,"SELECT * from users WHERE deviceid = '".$_GET['deviceid']."'");
    $row = mysqli_fetch_assoc($sql);
    if(!isset($row['email']))
    {
        function randomPass() {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = array();
            $alphaLength = strlen($alphabet) - 1;
            for ($i = 0; $i < 15; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass);
        }
        
        $verify = randomPass();
        $_SESSION['verifymailservice'] = $verify;
        $_SESSION['deviceid'] = $_GET['deviceid'];
        header("Location: mailservice.php?verify=$verify");
        exit();
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <style>
    body
    {
        padding:0;
        margin:0; 
        font-family: Arial, Helvetica, sans-serif;
        background: #202124;
    }
    .abc 
    {
        left: 50%;
        position: absolute;
        -webkit-transform: translate(-50%, -50%);
        top: 50%;
        color: white;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 90%;
    }
    </style>
</head>
<body>
    <div class="abc">
        <h2>Email Authentication Required</h2>
        <p>Please click the button below to send verification mail for your email address.</p>
        <?php
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
                        $_SESSION['authentication_code'] = $authcode;
        $sql = mysqli_query($conn,"SELECT * from users WHERE deviceid = '".$_SESSION['id']."'");
        $row = mysqli_fetch_assoc($sql);
        echo "<a href='http://localhost/VBIND/saline/user/mail.php?deviceid=".$row['deviceid']."&authcode=".$authcode."' style='text-decoration: none;'><button style='background-color: #044cd0; color: white;padding: 10px 15px; border:none; border-radius:5px;'><b>Send Email</b></button></a>";
        ?>
    </div>
</body>
</html>