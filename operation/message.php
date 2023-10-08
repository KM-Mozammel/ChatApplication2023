<?php
    session_start();   
    $myid = $_SESSION['unique_id'];
    $sender_id = $_SESSION['sid'];
    $result = "";
    include_once 'connection.php';
    $conn = new Connection();
    $show = mysqli_query($conn->connection, "SELECT * FROM message LEFT JOIN user_info ON user_info.unique_id = message.sender_id WHERE (sender_id = '$sender_id' AND receiver_id = '$myid') OR (sender_id = '$myid' AND receiver_id = '$sender_id') ORDER BY message_id");
    while($row = mysqli_fetch_assoc($show)){
        if($row['receiver_id'] === $myid){
            $result= '
            <div class="receiver">
                <span>You:</span>
                <p>'.$row['message'].'</p>
            </div>';
        } else{
            $result= '
            <div class="sender">
                <img src="../assets/'.$row["image"].'" alt="">
                <p>'.$row['message'].'</p>
             </div>';
        }
        echo $result;
    }
?>