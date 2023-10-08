<?php
    class Connection{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $db_name = "chatroom";
        public $connection;
        public function __construct(){
            $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }
    class Registration extends Connection{
        public function registration($first_name, $last_name, $email, $password, $image){
            $check_duplicate = mysqli_query($this->connection, "SELECT * FROM user_info WHERE email='$email'");
            if(mysqli_num_rows($check_duplicate) > 0){
                return false;
            } else{
                $random_id = rand(time(), 1000000);
                mysqli_query($this->connection, "INSERT INTO user_info VALUES('$random_id','', '$first_name', '$last_name', '$email', '$password', '$image', 'Online now')");
                return true;
            }
        }
    }
    class Login extends Connection{
        public function login($email, $password){
            $check_data = mysqli_query($this->connection, "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'");
            if(mysqli_num_rows($check_data) > 0){
                return true;
            } else{
                return false;
            }
        }
    }
?>