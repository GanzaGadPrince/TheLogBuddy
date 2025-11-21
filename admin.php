<?php

session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['admin'])) {
    echo '
            <script>
            alert("Please Login!!");
            window.location.href="index.php";
            </script>
            ';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        height: 100vh;
        display: flex;
    }

    .body{
        width: 100%;
        height: 50%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .body h2{
        margin-top: 10px;
        text-align: center;
    }
    .body h1{
        font-family: arial;
        text-align: center;
        color: green;
    }

</style>
<body>
<?php
include("nav.php");
?>

<div class="body">
    <h2>Hello <?php echo $_SESSION['username']?></h2>
    <h1><?php echo date('l  d/m/y')?></h1>
</div>
    
</body>
</html>