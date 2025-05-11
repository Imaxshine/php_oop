<?php
session_start();
require_once __DIR__ . "/../reg/encrypt.php";
if (!isset($_SESSION['name'])){
    header('Location:/oop/login/');
    exit();
}
$name = $_SESSION['name'];
$decrypt = new Decryption();
$name1 = $decrypt->PassData($name);
$name2 = strtolower($name1);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <style>
        .container{
            display: flex;
            justify-content: center;
            height: 300px;
            margin-top: 25px;
            box-shadow: 3px 2px 3px 4px rgba(0,0,0,0.4);
            padding: 20px 35px;
        }
        .welcome{
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #DDC;
            font-family: Verdana,Arial, Tahoma,sans-serif;
            width: 80%;
            height: auto;
            box-shadow: 3px 7px 8px 4px rgba(0,0,0,0.2);
            padding: 8px;
            margin-top: 18px;
        }
        .texts{
            box-shadow: 3px 2px 3px 4px rgba(0,0,0,0.4);
            padding: 16px 20px;
        }
        .btn{
            border: none;
            border-radius: 8px;
            background-color: blue;
            color: white;
            font-weight: bold;
            padding: 12px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome">
            <p>Welcome, <?php echo htmlspecialchars(strip_tags(ucfirst($name2))) . "🤜"; ?></p>

            <div class="texts">
                This is your Home dashboard ✨
            </div>

            <div style="margin: 10px">
                <button class="btn" onclick="Logout()">Logout</button>
            </div>

            <p style="box-shadow: 2px 2px 4px rgba(0,0,0,0.5); padding: 3px; border-radius: 9px;">
                <code>Powered by PHP OOP</code>
            </p>
        </div>
    </div>
    <script>
        function Logout(){
           return  window.location.href = "/oop/login/logout.php";
        }
    </script>
</body>
</html>
