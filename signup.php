<?php

session_start();

$connection=mysqli_connect("localhost","root","","thelogbuddy");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        text-align: left;
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
        <h2>       Signup        </h2>
        <label>Username: <input type="text" name="username" max-length=20></label>
        <label>Names: <input type="text" name="names"></label>
        <label>Password: <input type="password" name="password"></label>



        <button type="submit" name="submit">Signup</button>

        Already have an account? <a href="signup.php">Login</a>
    </form>


    <?php

    
    
    
    if (isset($_POST['submit'])) {

    $checkadmin=mysqli_query($connection,"SELECT * from users");
    $username=$_POST['username'];
    $name=$_POST['names'];
    $password=md5($_POST['password']);
    
    $usernamecheck=mysqli_query($connection,"SELECT * from users where username='$username'");

        if (mysqli_num_rows($usernamecheck)>0) {
            echo '
            <script>
            alert("Username Already Taken!!");
            window.location.href="signup.php";
            </script>
            ';
        }

        if (mysqli_num_rows($checkadmin)<1) {

        $usertype= 'admin';    
            
        
        }else {
            $usertype="normal";
                    
        }
        $insert="INSERT into users(username, password, names, usertype) values('$username','$password','$name','$usertype')";
        
        $result=mysqli_query($connection,$insert);

        if ($result) {
             $select="SELECT * from users where username='$username' and password='$password'";
            $result=mysqli_query($connection,$select);
            $data=mysqli_fetch_assoc($result);

            $_SESSION['username']=$username;
            $_SESSION['userid']=$data['userid'];
            $_SESSION['usertype']=$usertype;

            if ($usertype == 'admin') {
                echo '
            <script>
            window.location.href="admin.php";
            </script>
            '; 
            }else {
               echo '
            <script>
            window.location.href="index.php";
            </script>
            '; 
            }
            
        


        }

    }
    
    ?>

</body>
</html>