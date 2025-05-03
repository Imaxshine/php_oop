<?php
require_once "config.php";
require_once __DIR__ . "/reg.php";
include_once __DIR__ . "/encrypt.php";

$name = htmlspecialchars(strip_tags($_POST['name'])) ?? "";
$email = htmlspecialchars(strip_tags($_POST['email'])) ?? "";
$pass1 = htmlspecialchars(strip_tags($_POST['pass1'])) ?? "";
$pass2 = htmlspecialchars(strip_tags($_POST['pass2'])) ?? "";


$connection = new Connection();
$conn = $connection->getConnection();
$encrypt = new Encryption();
$decrypt = new Decryption();

//echo $encName = $encrypt->PassData("maxshine8@gmail.com") . "<br>";
//echo "Email Kamili: " . $decrypt->PassData($encName);

$register = new RegisterUser($name,$email,$pass1,$pass2,$conn);
echo $register->ValidateAndSave();
