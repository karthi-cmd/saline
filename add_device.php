<?php 

session_start();
include './firebase/dbcon.php';

if(isset($_POST['save'])){
    $deviceName = $_POST['name'];
    $deviceDesc = $_POST['desc'];
    $deviceid = $_POST['deviceid'];

    
    $postData = [
        'name' => $deviceName,
        'desc' => $deviceDesc,
        'deviceid' => $deviceid,
        ];

        $ref_table = 'devices'; //table Name

        $postRef_result = $database->getReference($ref_table)->push($postData);
    
        if($postRef_result)
        {
            $_SESSION['success'] = 'Variable Created Successfully';
            header('Location: devices.php');
            exit();
        }
        else
        {
            $_SESSION['error'] = 'Variable not created';
            header('Location: devices.php');
            exit();
        }
}
else{
    $_SESSION['error'] = 'Input admin credentials first';
    exit();
}
?>