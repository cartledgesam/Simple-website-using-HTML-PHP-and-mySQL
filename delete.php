
<?php

$servername = getenv('IP');
$username = "root";
$password = "1234";
$database = "egr223";
$dbport = 3306;
$db = new mysqli($servername, $username, $password, $database, $dbport);

if(isset($_GET['name'])) {
    $delete_id = mysqli_real_escape_string($db, $_GET['name']);
    $sql = mysqli_query($db, "DELETE FROM work WHERE name = '".$delete_id."'");
    if($sql) {
        echo "<br/><br/><span>Deleted successfully...!!</span>";
        //echo "<a href=\"deleteo.php\">Return</a>";
        header("Location: deleteo.php");
    } else {
        echo "ERROR";
    }
}
?>
