<?php
        session_start();   
        $myid = $_SESSION['unique_id'];
        $sender_id = $_GET['sid'];
        $_SESSION['sid'] = $_GET['sid'];
        include 'connection.php';
        $conn = new Connection();
        $data = mysqli_query($conn->connection, "SELECT * FROM user_info WHERE unique_id = '$sender_id'");
        $row = mysqli_fetch_assoc($data);
        if(isset($_POST['submit'])){
            $sender_id = $_POST['sender_id'];
            $receiver_id = $_POST['my_id'];
            $message = $_POST['message'];
            $insert = mysqli_query($conn->connection, "INSERT INTO message VALUES('','$sender_id', '$receiver_id', '$message')");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application ~ Mozammel Khandakar</title>
    <link rel="stylesheet" href="../stylesheet/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
    <div class="chat">
        <div class="darkroom">
            <div class="chat-header">
            <a href="chatroom.php"><i class="fas fa-arrow-left back"></i></a>
                <img src="../assets/<?php echo $row['image'];?>" alt="">
                <div>
                    <p><?php echo $row['first_name']; echo " "; echo $row['last_name']; ?></p>
                    <span><?php echo $row['status'];?></span>
                </div>

            </div>
            <div class="chat-box">
                
            </div>
            <form style="flex-direction: row; padding: 5px; margin-top: 0px;" method="POST" action = "" class="msg" autocomplete="off">
                <input style="width: 350px; padding: 10px;" type="text" placeholder="Write Message" name="message">
                <input 
                    type="text"
                    value="<?php echo $myid?>"
                    name="my_id"
                    hidden
                >
                <input 
                    type="text"
                    name="sender_id"
                    value="<?php echo $sender_id?>"
                    hidden
                >
                <button type="submit" name="submit" style="width: 80px; padding: 15px 20px;"><i class="fab fa-telegram-plane"></i></button>
            </form>         
        </div>
    </div>
    <script>
        let chatBox = document.querySelector(".chat-box")
        setInterval(()=>{
            fetch("message.php").then(
                r=>{
                    if(r.ok){
                        return r.text();
                    }
                }
            ).then(
                d=>{
                    chatBox.innerHTML=d;
                }
            )
        }, 500);
    </script>
</body>