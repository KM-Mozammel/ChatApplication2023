<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: operation/chatroom.php");
    }
   include_once "operation/registration.php";
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
                <p>Registration</p>
            </header>
            <form action="" method="POST" enctype = "multipart/form-data">
                <label for="">First Name:</label>
                <input 
                    type="text"
                    placeholder="Enter your first name"
                    name="first_name"
                >
                <label for="">Last name:</label>
                <input 
                    type="text"
                    placeholder="Enter your last name"
                    name="last_name"
                >
                <label for="">Email Address:</label>
                <input 
                    type="text"
                    placeholder="Enter your first email"
                    name="email"
                >
                <label for="">Password:</label>
                <input 
                    type="password"
                    placeholder="Enter new password"
                    name="password"
                >
                <label for="">Select Image</label>
                <input 
                    class="file"
                    type="file"
                    name="image"
                    style="text-align: center; color: #05220b; height: 20px;"
                ><br>
                <input type="submit" name = "submit" value="Continue to Chat">
            </form>
            <p>Already signed up? <a href="index.php">Login Now</a></p>
        </section>
    </div>
</body>
</html>