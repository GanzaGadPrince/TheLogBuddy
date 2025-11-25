<?php

include("nav.php");
if(!isset($_SESSION['userid'])){
    $userid='0';
}else{
$userid = $_SESSION['userid'];
}

$connection=mysqli_connect("sql5.freesqldatabase.com","sql5809449","XFZKmg35Fl","sql5809449");

$learnCourseName = "";
$learnCourseDescri = "";


if (isset($_GET['add2'])) {
    $learnid=$_GET['add2'];

    $learnCourse=mysqli_query($connection,"SELECT * from courses where courseid='$learnid'");
    $learnCourseData=mysqli_fetch_assoc($learnCourse);
    $learnCourseId=$learnCourseData['courseid'];
    $learnCourseName=$learnCourseData['coursename'];
    $learnCourseDescri=$learnCourseData['Descri'];

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
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
    background: white;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,0.15);
    padding: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
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
    border-bottom: 1px solid #ddd;
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

.add {
    border-radius: 20px;
    border: 5px solid orange;
    font-size: 15px;
    background: #28a745;
    margin: 10px;
    padding: 10px;
    display: inline-block;
}

.add:hover {
    background: #1e7e34;
}

.delete {
    background: #ff5722;
}

.delete:hover {
    background: orange;
}

.update {
    background: #007bff;
}
.update:hover {
    background: #1a89ffff;
}

.message-container {
    display: none;
    position: fixed;
    width: 300px;
    background: white;
    margin-top: 5%;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 0 8px rgba(0,0,0,5);
    z-index: 1000;
    /* border: 3px solid orangered; */
}

.message-container2 {
    display: none;
    position: fixed;
    width: 500px;
    background: white;
    margin-top: 5%;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 0 8px rgba(0,0,0,5);
    z-index: 1000;
    /* border: 3px solid orange; */
}

.close-btn {
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 22px;
    cursor: pointer;
    color: #ff5722;
}

.close-btn2 {
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 22px;
    cursor: pointer;
    color: #ff5722;
}

form {
    display: flex;
    flex-direction: column;
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
.adddiv{
    width: 100%;
    text-align: left;
}

</style>
<body>

    
<div class="body">


    <h2><?php echo date('l  d/m/y')?></h2>

        <div class="adddiv"><a href="courses.php?add" class="add">Add course</a></div>


<h1>Mastered Courses</h1>
<div class='tables'>


    <div class='table'>
     
        
        <table cellspacing=0>

        <tr>
            <th>Course</th>
            <th>Description</th>
        </tr>
        
        <?php


$select="SELECT *
FROM masteredcourse
JOIN courses ON masteredcourse.courseid = courses.courseid
JOIN users ON masteredcourse.userid = users.userid
WHERE masteredcourse.userid = $userid ORDER BY masteredcourse.mcourseid DESC";

$result=mysqli_query($connection,$select);


if (mysqli_num_rows($result)>0) {
    foreach ($result as $data) {
  
    echo "
    <tr>
    <td>".$data['coursename']."</td>
    <td>".$data['mastereddescri']."</td>
    <tr>
    ";

}
}else {
    echo '
    <tr>
    <td colspan=2>No Mastered Courses Yet!!</td>
    </tr>
    ';
}



?>

        </table>
        </div>
</div>
    <h1>Available Courses</h1>

<div class="tables">

<div class='table'> 
        
        <table cellspacing=0>

        <tr>
            <th>Course</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        
        <?php
 
$selectCourse="SELECT * from courses ORDER BY courseid DESC";
$resultCourse=mysqli_query($connection,$selectCourse);

if (mysqli_num_rows($resultCourse)>0) {

    foreach ($resultCourse as $data) {
        $courseid= $data['courseid'];
        $idcheck= mysqli_query($connection,"SELECT * from masteredcourse where courseid='$courseid' and userid='$userid'");
    echo "
    <tr>
    <td>".$data['coursename']."</td>
    <td>".$data['Descri']."</td>
    <td><a href='courses.php?add2=".$data['courseid']."' class='update'>Learn</a>"?>
    <?php

    if (mysqli_num_rows($idcheck)<1) {

    echo "<a href='courses.php?id=".$data['courseid']."' class='delete'>Mastered</a>"?>
    
    <?php
    }
    echo "</td>
    <tr>
    ";

}

}else {
    echo '
    <tr>
    <td>No Courses Yet!!</td>
    </tr>
    ';
}



?>

        </table>
        </div>


    </div>

<div class="message-container" id="messageContainer">
    <span class="close-btn" onclick="closeMessage()">×</span>
    <form method="post">
        <h2>Add course</h2><br>
        <label>Course Name (20 characters): <input type="text" name="name" maxlength="20" required></label>
        <label>Decription max (100 characters): <textarea id="address" name="description" rows="4" cols="50" maxlength="100" required></textarea></label>

        <button type="submit" name="submit">Add</button>
    </form>
</div>



<div class="message-container2" id="messageContainer2">
    <span class="close-btn2" onclick="closeMessage()">×</span>
    <form method="post">
        <h2>Learn Concept</h2><br>
        <label>Course Name: <input type="text" name="name" value="<?php echo $learnCourseName?>" maxlength="20" readonly></label>
        <label>Decription: <textarea id="address" rows="4" cols="50" maxlength="100" readonly><?php echo $learnCourseDescri?></textarea></label>
        <label>What do you know already(on this subject): <textarea id="address" name="description2" placeholder="max (100 characters)" rows="4" cols="50" maxlength="100" required></textarea></label>

        <button type="submit" name="submit2">Add</button>
    </form>
</div>



</div>

        

</div>
<?php


if (isset($_GET['id'])) {

    if (!isset($_SESSION['userid'])) {
         echo '
        <script>
        alert("Please Login to Access this feature");
        window.location.href="courses.php";
        </script>
        ';
    }else {
      

    $masterid=$_GET['id'];

    $masterCourse=mysqli_query($connection,"SELECT * from courses where courseid='$masterid'");
     $masterCourseData=mysqli_fetch_assoc($masterCourse);
     $masterCourseId=$masterCourseData['courseid'];
     $masterCourseDescri=$masterCourseData['Descri'];

    $master=mysqli_query($connection,"INSERT into masteredcourse(courseid, userid, mastereddescri) values('$masterCourseId','$userid','$masterCourseDescri')");

    if ($master) {
        echo '
        <script>
        alert("Added to Mastered Courses");
        window.location.href="courses.php";
        </script>
        ';
    }
  
    }
}


if (isset($_GET['add2'])) {

 echo'<script>
                var messageContainer2 = document.getElementById("messageContainer2");
                messageContainer2.style.display = "block";

                function closeMessage() {
                    var messageContainer2 = document.getElementById("messageContainer2");
                    messageContainer2.style.display = "none";
                }
                window.onclick = function(event) {
                    var messageContainer2 = document.getElementById("messageContainer2");
                    var targetElement = event.target;
            
                    if (!messageContainer2.contains(targetElement)) {
                        messageContainer2.style.display = "none";
                    }
                };
            </script>';     

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





if (isset($_POST['submit'])) {

    if (!isset($_SESSION['userid'])) {
         echo '
        <script>
        alert("Please Login to Access this feature");
        window.location.href="courses.php";
        </script>
        ';
    }else {
    $coursename=mysqli_real_escape_string($connection,$_POST['name']);
    $description=mysqli_real_escape_string($connection,$_POST['description']);
    
    $coursecheck=mysqli_query($connection,"SELECT * from courses where coursename='$coursename'");

        if (mysqli_num_rows($coursecheck)>0) {
            echo '
            <script>
            alert("Course Already Exist!!");
            window.location.href="courses.php";
            </script>
            ';
        }
        else {
        

        $insert="INSERT into courses(coursename, descri) values('$coursename','$description')";
        
        $result=mysqli_query($connection,$insert);

        if ($result) {
             echo '
            <script>
            alert("Course Added!!");
            window.location.href="courses.php";
            </script>
            ';       
        
        }    
        }
    }
    }


    if (isset($_POST['submit2'])) {

        if (!isset($_SESSION['userid'])) {
         echo '
        <script>
        alert("Please Login to Access this feature");
        window.location.href="courses.php";
        </script>
        ';
    }else {

    $helpDescri=mysqli_real_escape_string($connection,$_POST['description2']);
    
    $learnCheck=mysqli_query($connection,"SELECT * from help where helpcourseid='$learnid' and helpfromuser='$userid'");

        if (mysqli_num_rows($learnCheck)>0) {
            echo '
            <script>
            alert("Course Already Exist!!");
            window.location.href="courses.php";
            </script>
            ';
        }
        else {
            

        $insertHelp="INSERT into help(helpcourseid, helpfromuser, HelpDecri) values('$learnid','$userid','$helpDescri')";
        
        $resultHelp=mysqli_query($connection,$insertHelp);

        if ($resultHelp) {
             echo '
            <script>
            alert("Posted!!");
            window.location.href="courses.php";
            </script>
            ';       
        
        }
        }

    }
    }





?>
    
    
</body>
</html>