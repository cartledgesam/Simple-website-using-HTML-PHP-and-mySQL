<?php
  //first load existing session
  session_start();
  session_destroy();
  header("Location: login.php");
?>
