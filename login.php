<?php

session_start();

$connection=mysqli_connect("sql5.freesqldatabase.com","sql5809449","XFZKmg35Fl","sql5809449");

$checkadmin=mysqli_query($connection,"SELECT * from users");

if (mysqli_num_rows($checkadmin)<1) {
    echo '
            <script>
            alert("Please Signup");
            window.location.href="signup.php";
            </script>
            ';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    body{
        height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: 1px solid gray;
        border-radius: 10px;
        padding: 70px;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
    }
    label {
    margin-top: 10px;
    font-weight: bold;
}

input, textarea {
    min-width: 100%;
    max-width: 100%;
    max-height: 150px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
@import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

    button{
        margin: 10px;
        padding: 7px 10px;
        background-color: rgb(62, 233, 0);
        border: 0px solid gray;
        border-radius: 5px;
        cursor: pointer;
    }
    h1{
        color: orangered;
        font-family: vandroit;
    }
    a{
        text-decoration: none;
        color: #28a745;
        font-size: 25px;
    }
    a:hover{
        font-size: 30px;
    }
</style>
<body>
    <h1>TheLogBuddy</h1>
    <form method="post">
        <h2>Login</h2>
        <label>Username: <input type="text" name="username"></label>
        <label>Password: <input type="password" name="password"></label>

        <button type="submit" name="submit">Login</button>

        Don't have an account yet? <a href="signup.php">Signup</a>
    </form>


    <?php
    
    if (isset($_POST['submit'])) {
        
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        $select="SELECT * from users where username='$username' and password='$password'";
        $result=mysqli_query($connection,$select);

        if (mysqli_num_rows($result)>0) {

            $userdata=mysqli_fetch_assoc($result);
            $usertype=$userdata['usertype'];
        $_SESSION['username']=$username;
        $_SESSION['userid']=$userdata['userid'];

            if ($usertype == 'admin') {
            $_SESSION['admin']=$usertype;

            echo '
            <script>
            alert("Welcome Admin");
            window.location.href="index.php";
            </script>
            ';

            }else{    
                echo '
                <script>
                window.location.href="index.php";
                </script>
                '; 
            }

        }else {
            echo '
                <script>
                alert("Incorrect Login");
                window.location.href="login.php";
                </script>
                ';
        }
    }
    
    ?>

</body>
</html>