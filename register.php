<?php
session_start();

?>
<html>

<style type="text/css">
body {
  background-image: url('crrrrueswcx.jpeg');
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
<body style=>
  <div id="info">

<h1><i><span style="color: black; font-size: 60">Welcome to the Homework Helper Service</span></i></h1>
<h2>Please Register Below</h2>

<form action="register.php" method="post">

First Name: </br> <input type="text" name="firstname" /><br><br>

Last Name: </br> <input type="text" name="lastname" /><br><br>

Email:  </br><input type="text" name="email" /><br><br>

Username: </br> <input type="text" name="username" /><br><br>

Password: </br> <input type="text" name="password" /><br><br>



<input type="submit" value="Submit" style="width:25%" name = "submit" />

<br><br><h3>Already Registered? Click the link below.</h3>

<a href="login.php">Login Here</a>
</div>


<?php
$servername = getenv('IP');
$username = "root";
$password = "1234";
$database = "egr223";
$word = "@";
$word2 = ".";
$dbport = 3306;
$db = new mysqli($servername, $username, $password, $database, $dbport);

if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
echo "<div id=\"connect\">Connected successfully (".$db->host_info.")</div>";

if (isset($_POST['submit'])) {
  if(strlen($_POST['firstname']) < 1 )
  {
    print "First name too short";
  }else if(strlen($_POST['lastname']) < 1 )
  {
      print "Last name too short";
  }else if((strlen($_POST['email']) < 3) || (strpos($_POST['email'], $word) == false) || (strpos($_POST['email'], $word2) == false) )
  {
      print "Invalid email";
  }else if(strlen($_POST['username']) < 3 )
  {
      print "Username must be 3 or more characters";
  }else if(strlen($_POST['password']) < 3 )
  {
      print "Password must be 3 or more characters";
  }else{
    $sql = "INSERT INTO users VALUES (null, '" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "' ,'" . $_POST['email'] . "' ,'" . $_POST['username'] . "'  ,'" . $_POST['password'] . "', null)";
    $result = mysqli_query($db, $sql);
    //$_SESSION["username"] = $_POST['username'];
    //$_SESSION["password"] = $_POST['password'];
    header("Location: login.php");
  }





}

?>








</form>

</body>
</html>
