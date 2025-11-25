<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("nav.php");
$connection=mysqli_connect("mainline.proxy.rlwy.net","root","fzLHpKHjmWBMpfJqLYebwNESuGgOmNUW","railway","41171");

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
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
    <title>My Logs</title>
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
    font-weight: 10px;
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
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 0 8px rgba(0,0,0,5);
    z-index: 1000;
    margin-top: 1%;
}

.close-btn {
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
form h2{
    color: orangered;
}

label {
    margin-top: 10px;
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
    width: 80%;
    text-align: right;
}
.addiv2{
    width: 100%;
    text-align: right;
    padding: 0.5%;
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
.warning{
    color: #28a745;
    border-radius: 10px;
    border: 4px solid orangered;
    padding: 2%;
}
.up{
    border-bottom: 1px solid #a1e6b1ff;
}
.delete {
    background: #ff5722;
    padding: 7px 12px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    color: white;
}
.delete:hover {
    background: orange;
}

</style>
<body>

    
<div class="body">
<?php
if (!isset($_SESSION['userid'])) {
echo"<h2 class='warning'>Please login to access this page!!</h2>";
}else {
$userid = $_SESSION['userid'];
?>

    <h2><span><?php echo date('l  d/m/y')?></span></h2>

<div class='tables'>


    <div class='table'>
     
        
        
        
        <?php



$select="SELECT * FROM helpee WHERE helpeefromuser = $userid and helpeetouser <> $userid ORDER BY helpeeid ASC";

$result=mysqli_query($connection,$select);


if (mysqli_num_rows($result)>0) {
    foreach ($result as $data) {

    $fromuser= $data['helpeetouser'];
    $selectUsername=mysqli_fetch_assoc(mysqli_query($connection,"SELECT username from users WHERE userid = $fromuser"));
    $fnUsername=$selectUsername['username'];

    $courseId= $data['helpeecourseid'];
    $selectCoursename=mysqli_fetch_assoc(mysqli_query($connection,"SELECT * from courses WHERE courseid = $courseId"));
    $fnCoursename=$selectCoursename['coursename'];
    $fnDescri=$selectCoursename['Descri'];
    $fnId=$selectCoursename['courseid'];

    $helpId= $data['helpeehelpid'];
    $selectHelpdata=mysqli_fetch_assoc(mysqli_query($connection,"SELECT * from help WHERE helpid = $helpId"));
    $fnHelpDescri=$selectHelpdata['HelpDecri'];
    $fnHelpId=$selectHelpdata['helpid'];

    // $toHelpId=$data['helpeehelpid'];

    // $helpcheck=mysqli_num_rows(mysqli_query($connection,"SELECT * from helpee where helpeehelpid='$toHelpId'"));
    // if ($helpcheck>0) {
        
    // }else {
        
  
    echo "
    <table cellspacing=0>
    <tr><td colspan=3 class='up'>".$fnUsername."</td><td class='up'><span><div class='addiv2'>".$data['datee']."</div></span></td></tr>
    <tr><td colspan=4>".$fnCoursename."</td></tr>
    <tr><td colspan=3>Location</td><td><div class='addiv2'>".$data['locationn']."</div></td></tr>
    <tr><td colspan=3>Time</td><td><div class='addiv2'>".$data['timee']."</div></td></tr>
    <tr><td colspan=4>".$fnDescri."</td></tr>
    <tr><td colspan=3>".$fnHelpDescri."</td><td><div class='addiv2'><a href='courses.php?id=".$data['helpeecourseid']."&helpeeid=".$data['helpeecourseid']."' class='delete'>Check Course</a></div></td></tr>
    </table>
    <br>
    ";
    
    // }

}
}else {
    echo '
    <table cellspacing=0>
    <tr>
    <td colspan=4>No Pending Logs!!</td>
    </tr>
    </table>
    ';
}


?>

        
        </div>
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
    $helpeeid=$_GET['helpeeid'];

    $masterCourse=mysqli_query($connection,"SELECT * from courses where courseid='$masterid'");
     $masterCourseData=mysqli_fetch_assoc($masterCourse);
     $masterCourseId=$masterCourseData['courseid'];
     $masterCourseDescri=$masterCourseData['Descri'];

    $master=mysqli_query($connection,"INSERT into masteredcourse(courseid, userid, mastereddescri) values('$masterCourseId','$userid','$masterCourseDescri')");
    $delete=mysqli_query($connection,"DELETE from helpee WHERE helpeeid=$helpeeid");

    if ($master && $delete) {
        echo '
        <script>
        alert("Added to Mastered Courses");
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