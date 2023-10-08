<?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_FILES['image'])){
            $tmp_name = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp_name, "assets/".$_FILES['image']['name']);
            include_once 'connection.php';
            $registration = new Registration();
            $result = $registration->registration($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_FILES['image']['name']);
            if($result == true){
                $conn = new Connection();
                $query = mysqli_query($conn->connection, "SELECT * FROM user_info WHERE email='{$_POST["email"]}'");
                if(mysqli_num_rows($query) > 0 ){
                    $row = mysqli_fetch_assoc($query);
                    session_start();
                    $_SESSION["unique_id"] = $row['unique_id'];
                    header("location: operation/chatroom.php");
                }
            }else{
                echo "<script>alert('Not Registred');</script>";
            }
        } else{
            echo "<script>alert('Please Fill all the input Fields');</script>";
        }
    }
?>
