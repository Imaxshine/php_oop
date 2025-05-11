<?php
abstract class LoginUser{
    abstract public function credentials($email,$pass);
}
class userCredentials extends LoginUser{
    public function credentials($email, $pass):string
    {
        require_once __DIR__ . "/../reg/config.php";
        require_once __DIR__ . "/../reg/encrypt.php";
        $decrypt = new Decryption();
        $conn = new Connection();

        $select = $conn->getConnection()->prepare("SELECT `id`,`name`,`email`,`password` FROM `users`");
        $select->execute();
        $result = $select->get_result();
        $existEmail = false;
        while($rows = $result->fetch_assoc()){
          $decryptedEmail = $decrypt->PassData($rows['email']);
          if ($decryptedEmail === $email){
              $existEmail = true;
              $userId = $rows['id'];
              $password = $rows['password'];
              $name = $rows['name'];
              break;
          }
        }
        if($existEmail){
            if(password_verify($pass,"{$password}")){
                session_start();
                $_SESSION['id'] = $userId;
                $_SESSION['email'] = strtolower($email);
                $_SESSION['name'] = $name;
                return "Login success";
            }else{
                return "Invalid password provided!";
            }
        }
            return "Unknown or invalid email provided!";
    }
}
//$cred = new useCredentials();
////echo $cred->credentials("imaxshine18@gmail.com",'123456');