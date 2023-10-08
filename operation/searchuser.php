<?php
    session_start();
    $user = $_SESSION["unique_id"];
    $data = $_GET['data'];
    include 'connection.php';
    $conn = new Connection();
    $search = mysqli_query($conn->connection, "SELECT * FROM user_info WHERE first_name LIKE '$data' OR last_name LIKE '$data'");
    $output = "";
    if(mysqli_num_rows($search)>0){
        while($row=mysqli_fetch_assoc($search)){
            $output = '
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
            echo $output;
        }
    } else {
        $output = "No user founded!";
    }
?>