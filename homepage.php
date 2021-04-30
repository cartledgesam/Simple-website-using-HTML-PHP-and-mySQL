
<?php

session_start();
//print_r($_SESSION);

?>
<html>

<style type="text/css">
#info{
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
#ooo{

  text-align: center;
}
#he{
  text-align: center;
  float: center;



}
#ooi{


  text-align: center;
  border: 3px solid black;
  padding: 0.5em;
  background-color: #92A8D1;
  margin-bottom: 20px;



}
#oii{

  text-align: center;
  border: 3px solid black;
  padding: 0.5em;
  background-color: #92A8D1;
  margin-bottom: 20px;


}
#iii{

  text-align: center;
  border: 3px solid black;
  padding: 0.5em;
  background-color: #92A8D1;
  margin-bottom: 20px;

}
#new{


  text-align: center;
  border: 3px solid black;
  padding: 0.5em;
  background-color: #92A8D1;
  margin-bottom: 20px;



}
#buttons{
  text-align: center;


}
table, tr, th {text-align: center;}
body {background-color:#34568B;
  background-image: url('crrrrueswcx.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

  </style>

  <?php
  date_default_timezone_set('America/Los_Angeles');
  $date = date('Y-m-d');
  ?>
  <button onclick="window.location.href='/logout.php'">Logout</button><br>
  <?php
  //print ("Current Date: " . $date);

  $servername = getenv('IP');
  $username = "root";
  $password = "1234";
  $database = "egr223";
  $dbport = 3306;
  $db = new mysqli($servername, $username, $password, $database, $dbport);



?>
<body>

  <div id="topmenu">
   <h1 style = "Font-family: Baskerville, Baskerville Old Face, Garamond, Times New Roman, serif; text-shadow: white 0px 0 20px;">Homework Helper</h1>
   <p id="ooo" >The best homework organization service on the web.<p>



 <hr/>
 </div>
 <div id="buttons">
   <button onclick="window.location.href='/addWork.php'">Go to Add Assignment</button>
   <button onclick="window.location.href='/deleteo.php'">Go to Delete Assignment</button><br></br>
 </div>
 <div id="iii">
<h3>Due Today!</h3>
<hr/>

<?php
$sql = "SELECT * FROM work WHERE due LIKE '$date%'";

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

 </div>


 <div id="oii">

<h3>All Assignments </h3>
<hr/>
<div id="he">
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
                echo "<th>Completion Status</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";

                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['course_id'] . "</td>";
                echo "<td>" . $row['due'] . "</td>";
                if($row['done'] == 1)
                {
                  echo "<td>Completed</td>";
                }else
                {
                  echo "<td>Not Completed</td>";
                }

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

 </div>
</div>
 <div id="ooi">


<h3>Already done Assignments:</h3>
<hr/>

<?php
$sql = "SELECT * FROM work WHERE done=1";
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
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
  }

?>


 </div>

 <div id="new">
  <button onclick="window.location.href='/calendar.php'">Go to Calendar</button>


 <?php





 ?>

</div>





</body>
</html>
