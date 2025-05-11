<?php
class RegisterUser{
    public $name;
    public $email;
    public $password1;
    public $password2;
    public mysqli $conn;
    public function __construct($name,$email,$password1,$password2,$conn)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password1 = $password1;
        $this->password2 = $password2;
        $this->conn = $conn;
    }
    public function ValidateAndSave():string {
        date_default_timezone_set('Africa/Nairobi');
        include_once __DIR__ ."/encrypt.php";
        $data = new Decryption();
        $encData = new Encryption();

        $encryptedEmail = $encData->PassData($this->email);
        $encName = $encData->PassData($this->name);
        $hashedPass = password_hash($this->password1,PASSWORD_DEFAULT);
        $created = date("l - Y/m/d - H:i:s");

        if(strlen($this->name) <= 2){
            return "<p class='alert alert-danger'>Your name is too short!</p>";
        }
        $email = strtolower($this->email);
        if(filter_var($email,FILTER_VALIDATE_EMAIL) === false)
        {
            return "Invalid Email provided";
        }
        if (strlen($this->password1) < 6){
            return "<p class='alert alert-danger'>Passwords must contains attlist 6 characters</p>";

        }
        if ($this->password1 !== $this->password2){
            return "<p class='alert alert-danger'>Passwords do not match!</p>";
        }
        //Check if email already exist
        $check = "SELECT `email` as `adress` FROM `users`";
        $stmt = $this->conn->prepare($check);
        $stmt->execute();
        $result = $stmt->get_result();
        $existEmail = false;
        while($row = $result->fetch_assoc())
        {
            $decryptedEmail = $data->PassData($row['adress']);
            if ($decryptedEmail === $email){
                $existEmail = true;
                break;
            }
        }
        if ($existEmail){
            return "<p class='alert alert-danger'>Email already exist!</p>";
        }else{
            $insert = "INSERT INTO `users` (`name`,`email`,`password`,`created_at`) VALUES (?,?,?,?)";
            $stmt2 = $this->conn->prepare($insert);
            $stmt2->bind_param("ssss",$encName,$encryptedEmail,$hashedPass,$created);
            if($stmt2->execute()){
                return "<p class='alert alert-success'>Registration success</p>";
            }
            return "<p class='alert alert-danger'>We failed to keep you log in, try again later!</p>";
        }
    }
}