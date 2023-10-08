<?php
        session_start();
        if(isset($_SESSION["unique_id"])){ 
            include_once 'connection.php';
            $conn = new Connection();
            $user = $_SESSION["unique_id"];
            $data = mysqli_query($conn->connection, "SELECT * FROM user_info WHERE unique_id = '$user'");
            $row = mysqli_fetch_assoc($data);
        } else{
            header("location: ../index.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application ~ Mozammel Khandakar</title>
    <link rel="stylesheet" href="../stylesheet/style.css">
</head>
<body>
    <div class="wrapper">
        <section>
            <header>
                <img src="../assets/icon_msg.png" alt="">
            </header>
        </section>

        <div class="my-account">
            <div class="userinfo">
                <img 
                    src="../assets/<?php echo $row['image'];?>" 
                    alt=""
                    style="width: 50px; height: 50px;"
                >
                <div>
                <p class="username"><?php echo $row['first_name']; echo " "; echo $row['last_name'];?> <br></p>
                <span><?php echo $row['status'];?></span>
                </div>
                
            </div>
            <a href="logout.php"><button class="logout">Logout</button></a>
        </div>

        <div class = "show_users">
            <div class="search_box">
                <input type="text" id="search" placeholder="Search user by name" onkeyup="search(this.value)">
                <div id="search_result"></div>
                <script>
                    function search(data){
                        if(data.length == 0){
                            document.getElementById("search_result").innerHTML = "";
                            return;
                        }
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function(){
                            if(this.readyState==4 && this.status==200){
                                document.getElementById("search_result").innerHTML = this.responseText;
                                
                            }
                        }
                        xmlhttp.open("GET", "searchuser.php?data="+data, true);
                        xmlhttp.send();
                    }
                </script>
            </div>
            <br>
            <h4>Available Users</h4><br>
            <div class="users"></div>
            <script>
                let message_box = document.querySelector(".users");
                setInterval(()=>{
                    fetch("userlist.php").then(
                        r=>{
                            if(r.ok){
                                return r.text();
                            }
                        }
                    ).then(
                        d=>{
                            message_box.innerHTML=d;
                        }
                    )
                }, 350);
            </script>
        </div>
    </div>
</body>