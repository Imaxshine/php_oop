<?php
require_once "config.php";
require_once __DIR__ . "/reg.php";
include_once __DIR__ . "/encrypt.php";

$connection = new Connection();
$conn = $connection->getConnection();
$encrypt = new Encryption();
$decrypt = new Decryption();

//echo $encName = $encrypt->PassData("maxshine8@gmail.com") . "<br>";
//echo "Email Kamili: " . $decrypt->PassData($encName);

$register = new RegisterUser("Ema","maxshine9@gmail.com","123456","123456",$conn);
echo $register->ValidateAndSave();
