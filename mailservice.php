<?php 
session_start();
ob_start();
if(isset($_GET['verify']))
{
    if($_GET['verify']==$_SESSION['verifymailservice'])
    {

    }
    else
    {
        header("Location: index.php");
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
    <title>Mail Service</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .newsletter-subscribe {
    color: #ffffff;
    background-color: #000000;
    padding: 55px 74px;
}

.newsletter-subscribe p {
    color: #7d8285;
    line-height: 1.5;
}

.newsletter-subscribe h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 25px;
    line-height: 1.5;
    padding-top: 0;
    margin-top: 0;
    color: inherit;
}

.newsletter-subscribe .intro {
    font-size: 16px;
    max-width: 500px;
    margin: 0 auto 25px;
}

.newsletter-subscribe .intro p {
    margin-bottom: 35px;
}

.newsletter-subscribe form {
    justify-content: center;
}

.newsletter-subscribe form .form-control {
    background: #eff1f4;
    border: none;
    color: black !important;
    border-radius: 3px;
    box-shadow: none;
    outline: none;
    color: inherit;
    text-indent: 9px;
    height: 45px;
    margin-right: 10px;
    min-width: 250px;
}

.newsletter-subscribe form .btn {
    padding: 16px 32px;
    border: none;
    background: none;
    box-shadow: none;
    text-shadow: none;
    opacity: 0.9;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 13px;
    letter-spacing: 0.4px;
    line-height: 1;
}

.newsletter-subscribe form .btn:hover {
    opacity: 1;
}

.newsletter-subscribe form .btn:active {
    transform: translateY(1px);
}

.newsletter-subscribe form .btn-primary {
    background-color: #055ada !important;
    color: #fff;
    outline: none !important;
}

body {
    background: #333;
}

.newsletter {
    color: #0062cc !important;
}
@media only screen and (max-width: 768px) {
    .form-group 
    {
        margin-bottom: 1rem !important;
    }
}
    </style>
</head>
<body>
    <div class="newsletter-subscribe mt-5 container">
    <div class="container">
        <div class="intro">
            <h2 class="text-center newsletter">New Device Found!</h2>
            <p class="text-center"> Please enter your email address to verify yourself and authenticate with Physical Device </p>
        </div>
        <form class="form-inline" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Your Email"></div>
            <div class="form-group"><input class="btn btn-primary" name="submit" type="submit" value="Set Email"></div>
        </form>
    </div>
</div>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        include 'includes/conn.php';
        $sql = mysqli_query($conn,"UPDATE users SET email = '$email' WHERE deviceid = '".$_SESSION['deviceid']."'");
        if($sql)
        {
            header("Location: authuser.php?deviceid=".$_SESSION['deviceid']);
            exit();
        }
        else 
        {
            header("Location: mailservice.php?verify=".$_SESSION['verifymailservice']);
            exit();
        }
    }
}
?>
</body>
</html>