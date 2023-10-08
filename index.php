<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: operation/chatroom.php");
    }
   include "operation/login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application ~ Mozammel Khandakar</title>
    <link rel="stylesheet" href="stylesheet/style.css">
</head>
<body>
    <div class="wrapper">
        <section>
            <header>
                <img src="assets/icon_msg.png" alt="">
                <h3>Chat Application</h3>
                <p>Login</p>
            </header>
            <div class="error"></div>
            <form action="" method = "POST">
                <label for="">Email</label>
                <input 
                    type="text"
                    placeholder="Email"
                    name="email"
                >
                <label for="">Password</label>
                <input 
                    type="password"
                    placeholder="Enter your password"
                    name="password"
                ><br>
                <input type="submit" name="submit" value="Continue to Chat">
            </form>
            <p>Don't have a account? <a href="registration.php">Sign up</a></p>
        </section>
    </div>
</body>
</html>