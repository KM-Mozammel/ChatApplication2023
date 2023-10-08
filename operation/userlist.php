<?php
    session_start();
    $user_id = $_SESSION['unique_id'];
    include_once 'connection.php';
    $conn = new Connection();
    $query = mysqli_query($conn->connection, "SELECT * FROM user_info WHERE NOT unique_id = '$user_id'");
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $result = '
            <div class="userinfo">
            <a href = "chat.php?sid='.$row['unique_id'].'">
            <img 
                src="../assets/'.$row['image'].'" 
                alt=""
                style="width: 50px; height: 50px;"
            >
            <p>'.$row['first_name'].' '.$row['last_name'].'<br> <span>'.$row['status'].'</span></p>
            </a>
            </div> <hr style="background-color: yellow;">
            ';
            echo $result;
        }
    } else{
        $result = "No User Founded!";
        echo $result;
    }
?>