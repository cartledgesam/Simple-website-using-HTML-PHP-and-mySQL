<?php

session_start();


?>
<html>

<style type="text/css">
body {
  background-image: url('https://img.17qq.com/images/crrrrueswcx.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
#info{
  text-align: center;
  text-shadow: white 0px 0 20px;
}
#connect{
  position: fixed;
  position: absolute;
  bottom: 30px;
}
body {background-color: coral;}

  </style>
<body>
  <div id="info">


<h1><i><span style="color: black; font-size: 60">Welcome to the Homework Helper Service</span></i></h1>
<h2>LOGIN FAILED! Please Try logging in again, or register if not already done so.</h2>

<form action="login.php" method="post">



Username: </br> <input type="text" name="userName" /><br><br>

Password: </br> <input type="text" name="password" /><br><br>



<input type="submit" value="Login" style="width:25%" name="submit" />

<br><h3>Not yet Registered? Click the link below.</h3>

<a href="register.php">Register Here</a>
</div>


<?php
$servername = getenv('IP');
$username = "root";
$password = "1234";
$database = "egr223";
$dbport = 3306;
$db = new mysqli($servername, $username, $password, $database, $dbport);



if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
echo "<div id=\"connect\">Connected successfully (".$db->host_info.")</div>";







if (isset($_POST['submit'])) {


  $query = "select * from users where username = '" . $_POST['userName'] . "' and password = '" . $_POST['password'] ."' ";

  $result = mysqli_query($db, $query);

  $row = mysqli_fetch_assoc($result);
  if (!$row) {
        header("Location: tryagain.php");
  } else {
    $_SESSION["username"] = $row['username'];
    $_SESSION["userid"] = $row['id'];
        header("Location: homepage.php");
  }

}


?>
</form>

</body>
</html>
