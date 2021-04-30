
<?php

session_start();

//echo $_SESSION["username"];
//echo $_SESSION["userid"];
?>
<html>
<style type="text/css">
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;


  background-image: url('crrrrueswcx.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}


#topmenu{
  border: 3px solid black;
  padding: 0.5em;
  background-color: #92A8D1;
  margin-bottom: 10px;
  clear: none;
  text-align: center;

}
#tabe{
  margin: auto;
 width: 50%;
 text-align: center;
display: block;
margin-left: auto;
  margin-right: auto;
 padding: 10px;
}
table {

            background-color: yellow;
            text-align: center;
        }
        table, td {
            border: 2px solid black;
            background-color: rgba(0, 0, 0, 0.0);
            text-align: center;
        }
        th {
            border: 1px solid black;
            background-color: #92A8D1;
        }
        caption {
            color: black;
        }
body {background-color:#34568B;}
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
  <?php






$days = date("t");
$month = date("m");
$monthNum  = $month;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F');
$currentDay = date("d");


date_default_timezone_set('America/Los_Angeles');
$date = date('Y-m-d');
$unixTimestamp = strtotime($date);
$dayOfWeek = date("l", $unixTimestamp);



//echo"$monthNum";







$start = firstDayOfMonth($monthName);


function firstDayOfMonth($month) {
    $day =  (int) date("w", strtotime($month . ' 01,' . date('Y') . ' 00:00:00'));
    return $day;
}
date_default_timezone_set('America/Los_Angeles');
$date = date('Y-m');





  ?>


    <div id="tabe">
      <?php

$count = 1;
$tab = 0;
      echo "<table>
          <caption><h3 style=\"text-shadow: white 0px 0 10px;\">$monthName</h3></caption>
          <tr><th>Sunday</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th></tr>";
      for ($x = 1; $x <= 6; $x++) {
        echo "<tr>";
        for($y=1; $y <= 7; $y++)
        {
          if($y == $start +1)
          {
            $tab = 1;
          }
          if($tab ==1 && $count <= $days)
          {
              echo "<th> " . $count . "<hr/>" . "<br>";
              $test = $date . "-". $count . " ";


              $sql = "SELECT * FROM work WHERE due LIKE '{$test}%'";

              if($result = mysqli_query($db, $sql)){
                  if(mysqli_num_rows($result) > 0){
                      echo "<table>";
                          echo "<tr>";

                              echo "<th>Assignment Type: &emsp;&emsp;</th>";
                              echo "<th>Assignment Name: &emsp;&emsp;</th>";
                              echo "<th>Course ID:</th>";

                          echo "</tr>";
                      while($row = mysqli_fetch_array($result)){
                          echo "<tr>";

                              echo "<td>" . $row['type'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                              echo "<td>" . $row['course_id'] . "</td>";

                          echo "</tr>";
                      }
                      echo "</table>";
                      ?>
                        <br>
                      <?php
                      // Close result set
                      mysqli_free_result($result);
                  } else{
                      echo "<p>Nothing due</p><br>";

                  }
                }
              $count++;
              echo" ". "</th>";
          }else{
            ?>
            <th style="background-color:darkgray;"> &emsp;</th>
            <?php

          }

        }
        echo "</tr>";
      }
      echo"</table>";


      ?>
    </div>


<button onclick="window.location.href='/homepage.php'">Return to Home Page</button>
</body>



</html>
