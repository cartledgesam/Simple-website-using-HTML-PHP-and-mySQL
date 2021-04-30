<?php

session_start();

// $_SESSION["username"];
//echo $_SESSION["userid"];
?>
<html>
  <style type="text/css">
#first{
  border: 3px solid black;
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
  <h2>Delete Assignment</h2>

  <hr/>
  <br>
  <?php

  $sql = "SELECT * FROM work";
  if($result = mysqli_query($db, $sql)){
      if(mysqli_num_rows($result) > 0){
          echo "<table>";
              echo "<tr>";

                  echo "<th>Assignment Type: &emsp;&emsp;</th>";
                  echo "<th>Assignment Name: &emsp;&emsp;</th>";
                  echo "<th>Course ID:</th>";
                  echo "<th>Due Date:</th>";
              echo "</tr>";
          while($row = mysqli_fetch_array($result)){
              echo "<tr>";

                  echo "<td>" . $row['type'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['course_id'] . "</td>";
                  echo "<td>" . $row['due'] . "</td>";
                  echo "<td> &emsp;<a href='delete.php?name=".$row['name']."'>Delete</a></td>";

              echo "</tr>";
          }
          echo "</table>";
          // Close result set
          mysqli_free_result($result);
      } else{
          echo "No assignments are available, YAY!";
      }
    }

  ?>

<br>
<a href="homepage.php">Return to home page</a><br><br>
</div>



<?php

if (isset($_POST['submit'])) {
$sql = "DELETE from work WHERE
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
  print "Successfully deleted assignment!";
}

}


?>

</body>

</html>
