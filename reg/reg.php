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
        include_once __DIR__ ."/encrypt.php";
        $data = new Decryption();
//        $decryptData = $data->PassData()

        if(strlen($this->name) <= 2){
            return "Your name is too short!";
        }
        $email = strtolower($this->email);
        if(filter_var($email,FILTER_VALIDATE_EMAIL) === false)
        {
            return "Invalid Email provided";
        }
        if (strlen($this->password1) < 6){
            return "Passwords must contains attlist 6 characters";
        }
        if ($this->password1 !== $this->password2){
            return "Passwords do not match!";
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
            return "<p class='alert alert-danger'>Email tayari ipo</p>";
        }else{
            return "<p class='alert alert-info'>Unaweza kujiunga sasa email Haipo</p>";
        }

    }
}