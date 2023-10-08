<?php
if(isset($_POST['submit'])){
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        include_once 'connection.php';
        $login = new Login();
        $result = $login->login($_POST['email'], $_POST['password']);
        if($result == true){
            $conn = new Connection();
            $email = $_POST['email'];
            $query = mysqli_query($conn->connection, "SELECT * FROM user_info WHERE email='$email'");
            if(mysqli_num_rows($query) > 0 ){
                $row = mysqli_fetch_assoc($query);
                mysqli_query($conn->connection, "UPDATE user_info SET status='Online now' WHERE email = '$email'");
                session_start();
                $_SESSION['unique_id'] = $row['unique_id'];
                header("location: operation/chatroom.php");
            }
        } else{
            echo "<script>alert('Password Or Username is wrong');</script>";
        }
    } else{
        echo "<script>alert('Fill all the form');</script>";
    }
}
?>
