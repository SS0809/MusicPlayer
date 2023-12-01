<?php
 session_start();
 include "database.php";
        $S =  $_SESSION['username'] ;
   $connection = pg_connect("host=$servername dbname=$database user=$username password=$password")
        or die("🚫 Unable to Connect to '$host'.\n\n");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
           $username = $_POST['timeline'];
           $result = pg_query(
        $connection,
             "UPDATE players SET  timeline='$status'    WHERE username = 'saurabhss' ;");
        echo $result;
    }
  else if (isset($_POST['temp_update'])) {
        $status = $_POST['statuss'];
           $username = $_POST['temp_update'];
           $result = pg_query(
        $connection,
       "UPDATE players SET  temp='$status'    WHERE username = 'saurabhss' ;");
    echo json_encode($_POST);
}
}
 else {
    //echo json_encode(array());
}
if($_SERVER["REQUEST_METHOD"] == "GET")  {
$result = pg_query(
        $connection,
        "SELECT temp from player where username = '$S';");
        $num = pg_num_rows($result);
   while($row = pg_fetch_assoc($result)) {
$timeline =  $row["timeline"];
$temp =  $row["temp"];
  }
 if($_SERVER["REQUEST_METHOD"] == "POST")  {
$result = pg_query(
        $connection,
        "SELECT * FROM player WHERE username = '$S';");
        $num = pg_num_rows($result);
   while($row = pg_fetch_assoc($result)) {
    $arr = array('a' => $row["temp"], 'b' => $row["timeline"]);
    echo json_encode($arr);
   }}}
   
 ?>