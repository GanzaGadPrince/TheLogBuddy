<?php 

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    display: flex;
    font-family: Arial, sans-serif;
    min-height: 100vh;
}

/* --- FIXED SIDEBAR --- */
nav {
    background-color: #fff;
    width: 200px;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: fixed;
    border-right: 1px solid #ccc;
    padding-top: 20px;
    align-items: center;
}

/* Push the main content so it doesn't hide under the nav */
.body, .content {
    margin-left: 200px;
}

/* Links */
nav .links {
    width: 100%;
    display: flex;
    flex-direction: column;
    text-align: left;
}

nav .links a {
    text-decoration: none;
    color: black;
    padding: 12px 20px;
    margin: 5px 10px;
    border-radius: 5px;
    font-size: 16px;
    transition: 0.2s;
}

nav .links a:hover {
    background-color: rgb(62, 233, 0);
}

/* Logout */
.logout {
    text-decoration: none;
    color: black;
    padding: 12px 20px;
    margin: 10px;
    margin-bottom: 40px;
    background-color: orange;
    border-radius: 5px;
    font-size: 16px;
    transition: 0.2s;
}

.logout:hover {
    background-color: orangered;
}

.addd, .updatee {
    width: 90%;
    padding: 10px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 15px;
    color: white;
    border: 0px;
    text-align: center;
}

.addd {
    background: #28a745;
}

.addd:hover {
    background: #03f13bff;
}


.updatee {
    background: #007bff;
}
.updatee:hover {
    background: #3094ffff;
}


</style>
<body>
    
<nav>

<div class="links">
    <a href="Index.php">Home</a>
    <a href="courses.php">Courses</a>
    <a href="helpee.php">Given Logs</a>
    <a href="mylogs.php">My Logs</a>
</div>
<?php

if(!isset($_SESSION['userid'])){

    echo '
    <a href="signup.php" class="updatee">Signup</a>
    <a href="login.php" class="addd">Login</a>
    ';

}

?>
<a href="logout.php" class="logout">Logout</a>

</nav>
</body>
</html>