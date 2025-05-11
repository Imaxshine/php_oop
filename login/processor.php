<?php
require_once __DIR__ . "/login_requests.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST"){
    echo "Invalid request method!";
    exit();
}
//get user details
if (isset($_POST['email'],$_POST['password'])){
    $email = htmlspecialchars(strip_tags($_POST['email']));

    $password = $_POST['password'];

    //Prepare the Instance class
    $userLogIn = new userCredentials();
    echo $userLogIn->credentials($email,$password);
}else{
    echo "No any data were provided";
}