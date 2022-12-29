<?php 
session_start();
include 'includes/conn.php';
if(isset($_POST['save'])){
    $deviceName = $_POST['name'];
    $deviceDesc = $_POST['desc'];
    $deviceId = $_SESSION['id'];

    $sql = "SELECT * from users WHERE deviceid = '$id'";
    $query = $conn->query($sql);
    if($query->num_rows < 1){
        $_SESSION['error'] = 'Cannot find the device';
    }
    else{
        $row = $query->fetch_assoc();
        if($row['deviceid']==$id)
        {
            $sql = "UPDATE `users` SET `username`='$username', `firstname`='$firstname', `location`='$location', `phone`='$phone', `dpm`='$dpm' WHERE `deviceid`='$id'";
            mysqli_query($conn,$sql);
            $_SESSION['success'] = 'Device Added Successfully';
            header("Location: devices.php");
            exit();
        }
        else 
        {
            $_SESSION['error'] = 'Wrong User Authentication';
        }
    }
}
else{
    $_SESSION['error'] = 'Input admin credentials first';
}
?>