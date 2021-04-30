<?php

session_start();

//echo $_SESSION["username"];
//echo $_SESSION["userid"];
?>
<html>
  <style type="text/css">
#first{
  border: 3px solid blue;
  padding: 0.5em;
  background-color: #92A8D1;
  overflow: auto;
  padding-top: 1px;
  margin-top: 10px;
  clear: none;
  text-align: center;

}
#topmenu{
  border: 3px solid black;
  padding: 0.5em;
  background-color: #92A8D1;
  margin-bottom: 10px;
  clear: none;
  text-align: center;

}
#error{

  color: red;
  font-size: 25;
}
body {background-color:#34568B;
  background-image: url('crrrrueswcx.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

<body>

<?php

  $servername = getenv('IP');
  $username = "root";
  $password = "1234";
  $database = "egr223";
  $dbport = 3306;
  $db = new mysqli($servername, $username, $password, $database, $dbport);

?>
<div id="topmenu">
 <h1 style = "Font-family: Baskerville, Baskerville Old Face, Garamond, Times New Roman, serif;">Homework Helper</h1>
 <p id="ooo" >The best homework organization service on the web.<p>



<hr/>
</div>
<div id="first">
  <br>
<form action="addWork.php" method="post">
  <h2>Add Assignment</h2>

  <hr/>
  <br>
Work Type:
<select name='type'>
  <option value="assign">ASSIGNMENT</option>
  <option value="hw">HW</option>
  <option value="project">PROJECT</option>
  <option value="quiz">QUIZ</option>
  <option value="exam">EXAM</option>
</select><br>


<br>Work Name: </br> <input type="text" name="workname" /><br><br>


Course ID: </br> <input type="text" name="courseid" /><br><br>


Due Date: </br> <input type="text" name="duedate" /><br><br>

Completed?:<br>
<input type="radio" name="done" value="0">NO<br>
<input type="radio" name="done" value="1">YES<br>
<br>
<input type="submit" value="Add Assignment" style="width:25%" name="submit" />
</form>
<br>
<a href="homepage.php">Return to home page</a><br><br>




<?php

if (isset($_POST['submit'])) {
  if(strlen($_POST['type']) == "" )
  {
    echo "<p id=\"error\">Please select assignment type</p>";
  }else if(strlen($_POST['workname']) < 1 )
  {
    echo "<p id=\"error\">Please enter work name</p>";
  }else if(strlen($_POST['courseid']) < 1 )
  {
    echo "<p id=\"error\">Please enter Course ID</p>";
  }else if(strlen($_POST['duedate']) < 19)
  {
    echo "<p id=\"error\">Invalid due date. Please use this format: YYYY-MM-DD hh:mm:ss</p>";

  }else if(isset($_POST['done'])==false )
  {
      echo "<p id=\"error\">Please select completion status</p>";
  }else{
      $sql = "INSERT INTO work VALUES
              (null,
               '".$_POST['type']."',
               '".$_POST['workname']."',
               '".$_POST['courseid']."',
               '".$_POST['duedate']."',
               '".$_POST['done']."')";

      $result = mysqli_query($db, $sql);
      if (!$result) {
        print "ERROR inserting!";
      }else
      {
        print "Successfully added assignment!";
      }
    }


}


?>
</div>

</body>

</html>
