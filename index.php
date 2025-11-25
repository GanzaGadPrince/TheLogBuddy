<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("nav.php");
$connection=mysqli_connect("sql5.freesqldatabase.com","sql5809449","XFZKmg35Fl","sql5809449","3306");

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}else {
    echo "Connected!";
}

if (!isset($_SESSION['userid'])) {
    $userid = '0';
}else{
$userid = $_SESSION['userid'];
}
$formCourseName="";
$formCourseDescri="";
$username="";
$formHelpDescri="";
if (isset($_GET['add'])) {

    $formCourseId=$_GET['course'];
    $formHelp=$_GET['help'];
    $username=$_GET['uname'];

    $formCourse=mysqli_query($connection,"SELECT * from courses where courseid='$formCourseId'");

    $formCourseData=mysqli_fetch_assoc($formCourse);
    $formCourseName=$formCourseData['coursename'];
    $formCourseDescri=$formCourseData['Descri'];

    $formHelp=mysqli_query($connection,"SELECT * from help where helpid='$formHelp'");

    $formHelpData=mysqli_fetch_assoc($formHelp);
    $formHelpDescri=$formHelpData['HelpDecri'];
    $formHelpId=$formHelpData['helpid'];

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    background: #f4f4f4;
}

.body {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.body h2 {
    margin: 15px 0 5px;
    font-size: 18px;
}

.body h1 {
    margin: 5px 0 10px;
    font-size: 22px;
    color: green;
}

.tables {
    width: 95%;
    min-height: 300px;
    max-height: 600px;
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.table {
    width: 100%;
    overflow-y: auto;
    border-radius: 5px;
    /* box-shadow: 0 0 5px rgba(0,0,0,0.15); */
    padding: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background: #333;
    color: white;
    padding: 10px;
    position: sticky;
    top: 0;
}

td {
    padding: 10px;
    background: white;
}

tr:nth-child(odd) {
    background-color: #f0f0f0;
}

.add, .delete, .update {
    padding: 7px 12px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    color: white;
}


.delete {
    background: #ff5722;
}

.update {
    background: #007bff;
}

.message-container {
    display: none;
    position: fixed;
    width: 30%;
    height: 90%;
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 0 8px rgba(0,0,0,5);
    margin-top: 3%;
    z-index: 1000;
    overflow-y: auto;
}

.close-btn {
    position: absolute;
    top: 1%;
    right: 3%;
    font-size: 22px;
    cursor: pointer;
    color: #ff5722;
}

form {
    display: flex;
    flex-direction: column;
}
form h2{
    color: orangered;
    margin: 0px;
}

label {
    margin-top: 5px;
    font-weight: bold;
}

input, textarea, select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    margin-top: 15px;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background: #28a745;
    color: white;
    cursor: pointer;
}

button:hover {
    background: #1e7e34;
}
span{
        color: #28a745;
    }

.adddiv{
    width: 100%;
    text-align: right;
}
.add {
    border-radius: 20px;
    border: 5px solid #28a745;
    font-size: 15px;
    background: orangered;
    margin: 10px;
    padding: 10px;
    display: inline-block;
}

.add:hover {
    background: orangered;
}

</style>
<body>

    
<div class="body">


    <h2>Hello <span><?php if(isset($_SESSION['username'])){ echo $_SESSION['username'];}?></span> It's <span><?php echo date('l  d/m/y')?></span></h2>

<div class='tables'>


    <div class='table'>
     
        
        
        
        <?php



$select="SELECT * FROM help WHERE helpfromuser <> $userid ORDER BY helpid ASC";

$result=mysqli_query($connection,$select);


if (mysqli_num_rows($result)>0) {
    foreach ($result as $data) {

    $fromuser= $data['helpfromuser'];
    $selectUsername=mysqli_fetch_assoc(mysqli_query($connection,"SELECT username from users WHERE userid = $fromuser"));
    $fnUsername=$selectUsername['username'];

    $courseId= $data['helpcourseid'];
    $selectCoursename=mysqli_fetch_assoc(mysqli_query($connection,"SELECT * from courses WHERE courseid = $courseId"));
    $fnCoursename=$selectCoursename['coursename'];
    $fnDescri=$selectCoursename['Descri'];
    $fnId=$selectCoursename['courseid'];

    $fnHelpDescri=$data['HelpDecri'];
    $fnHelpId=$data['helpid'];

    $toHelpId=$data['helpid'];

    $helpcheck=mysqli_num_rows(mysqli_query($connection,"SELECT * from helpee where helpeehelpid='$toHelpId'"));
    if ($helpcheck<1) {
        
    echo "
    <table cellspacing=0>
    <tr><td colspan=4>".$fnUsername."</td></tr>
    <tr><td colspan=4>".$fnCoursename."</td></tr>
    <tr><td colspan=4>".$fnDescri."</td></tr>
    <tr><td colspan=3>".$fnHelpDescri."</td><td><div class='adddiv'>
    <a href='index.php?add&course=".$fnId."&uname=".$fnUsername."&help=".$fnHelpId."
    ' class='add'>Help!</a></div></td></tr>
    </table>
    <br>
    ";
    }

}
}else {
    echo '
    <table cellspacing=0>
    <tr>
    <td colspan=4>No Helpees Yet!!</td>
    </tr>
    </table>
    ';
}



?>

        
        </div>
</div>
    

<div class="message-container" id="messageContainer">
    <span class="close-btn" onclick="closeMessage()">×</span>
    <form method="post">
        <h2>Help a Buddy</h2><br>
        <label>Friend's Name(Here): <input type="text" name="username" maxlength="20" value="<?php echo $username?>" readonly></label>
        <label>Course Name: <input type="text" name="coursename" maxlength="20" value="<?php echo $formCourseName?>" readonly></label>
        <label>Course Decription: <textarea id="address" name="description" rows="4" cols="50" maxlength="100" readonly><?php echo $formCourseDescri?></textarea></label>
        <label>What they know: <textarea id="address" name="helpdescription" rows="4" cols="50" maxlength="100"readonly><?php echo $formHelpDescri?></textarea></label>
                <label><input type="text" name="helpid" value="<?php echo $formHelpId?>" hidden></label>

        <label>Location: <select name="location" required>
        <option value="" hidden>Select Prep room</option>
        <option value='Dining Hall'>Dining Hall</option>
        <option value='Library'>Library</option>
        <option value='Senior 1 A'>Senior 1 A</option>
        <option value='Senior 1 B'>Senior 1 B</option>
        <option value='Senior 2 A'>Senior 2 A</option>
        <option value='Senior 2 B'>Senior 2 B</option>
        <option value='Senior 3 A'>Senior 3 A</option>
        <option value='Senior 3 B'>Senior 3 B</option>
        <option value='LEVEL 3 SOD A'>LEVEL 3 SOD A</option>
        <option value='LEVEL 3 SOD B'>LEVEL 3 SOD B</option>
        <option value='LEVEL 3 NIT A'>LEVEL 3 NIT A</option>
        <option value='LEVEL 3 NIT B'>LEVEL 3 NIT B</option>
        <option value='LEVEL 4 SOD A'>LEVEL 4 SOD A</option>
        <option value='LEVEL 4 SOD B'>LEVEL 4 SOD B</option>
        <option value='LEVEL 4 NIT A'>LEVEL 4 NIT A</option>
        <option value='LEVEL 4 NIT B'>LEVEL 4 NIT B</option>
        <option value='LEVEL 5 SOD A'>LEVEL 5 SOD A</option>
        <option value='LEVEL 5 SOD B'>LEVEL 5 SOD B</option>
        <option value='LEVEL 5 NIT A'>LEVEL 5 NIT A</option>
        <option value='LEVEL 5 NIT B'>LEVEL 5 NIT B</option>
        <option value='LEVEL 5 ELO'>LEVEL 5 ELO</option>

    </select></label>


    <label>Time: <select name="time" required>
        <option value="" hidden>Select Prep Hour</option>
        <option value='5:40 a.m. - 7:30 a.m.'>5:40 a.m. - 7:30 a.m.</option>
        <option value='10:20 a.m. - 11:00 a.m.'>10:20 a.m. - 11:00 a.m.</option>
        <option value='3:10 p.m. - 3:30 p.m.'>3:10 p.m. - 3:30 p.m.</option>
        <option value='6:00 p.m. - 7:30 p.m.'>6:00 p.m. - 7:30 p.m.</option>
        <option value='8:20 p.m. - 9:20 p.m.'>8:20 p.m. - 9:20 p.m.</option>
            </select></label>

    <label>Date: <input type="date" name="datee" min="<?= date('Y-m-d'); ?>" required></label>

        <button type="submit" name="submit">Let's Do It</button>
    </form>
</div>

</div>

        

</div>
<?php


    if (isset($_POST['submit'])) {

        if (!isset($_SESSION['userid'])) {
         echo '
        <script>
        alert("Please Login to Access this feature");
        window.location.href="index.php";
        </script>
        ';
    }else {
    $location=$_POST['location'];
    $time=$_POST['time'];
    $date=$_POST['datee'];
    $fromuserUsername=$_POST['username'];
    $helpeeHelpId=$_POST['helpid'];
    $helpeeCoursename=$_POST['coursename'];
    $fromuserdata=mysqli_fetch_assoc(mysqli_query($connection,"SELECT * from users where username='$fromuserUsername'"));
    $fromuserId=$fromuserdata['userid'];
    
    $helpeeCourseId=mysqli_fetch_assoc(mysqli_query($connection,"SELECT * from courses where coursename='$helpeeCoursename'"));
    $fnhelpeeCourseId=$helpeeCourseId['courseid'];

    $learnCheck=mysqli_query($connection,"SELECT * from helpee where helpeefromuser='$fromuserId' and helpeehelpid='$helpeeHelpId'");

        if (mysqli_num_rows($learnCheck)>0) {
            echo '
            <script>
            alert("The User Just Got Helped!!");
            window.location.href="courses.php";
            </script>
            ';
        }
        else {
            

        $insertHelp="INSERT into helpee(helpeecourseid, helpeefromuser, helpeehelpid, helpeetouser, locationn, timee, datee) values('$fnhelpeeCourseId','$fromuserId','$helpeeHelpId','$userid','$location','$time','$date')";
        
        $resultHelp=mysqli_query($connection,$insertHelp);

        if ($resultHelp) {
             echo '
            <script>
            alert("Session created!!");
            window.location.href="index.php";
            </script>
            ';       
        
        }
        }
    }
    }





if (isset($_GET['add'])) {
    echo'<script>
                var messageContainer = document.getElementById("messageContainer");
                messageContainer.style.display = "block";

                function closeMessage() {
                    var messageContainer = document.getElementById("messageContainer");
                    messageContainer.style.display = "none";
                }
                window.onclick = function(event) {
                    var messageContainer = document.getElementById("messageContainer");
                    var targetElement = event.target;
            
                    if (!messageContainer.contains(targetElement)) {
                        messageContainer.style.display = "none";
                    }
                };
            </script>';
}





?>
    
    
</body>
</html>