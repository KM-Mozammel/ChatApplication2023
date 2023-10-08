<?php
    session_start();
    include 'connection.php';
    $conn = new Connection();
    $user = $_SESSION["unique_id"];
    $select = mysqli_query($conn->connection, "UPDATE user_info SET status = 'Offline now' WHERE unique_id = '$user'");
    session_destroy();
    header("location: ../index.php");
?>