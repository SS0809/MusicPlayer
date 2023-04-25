<?php
 session_start();
 include "database.php";
        $S =  $_SESSION['username'] ;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['timeline'])) {
        $status = $_POST['status'];
           $user = $_POST['timeline'];
 $connection = pg_connect("host=$servername dbname=$database user=$username password=$password");
 $result = pg_query($connection,"UPDATE players SET timeline='$status' WHERE username = '$user' ;");
    echo json_encode($_POST);
}
  else if (isset($_POST['temp_update'])) {
        $status = $_POST['statuss'];
           $user = $_POST['temp_update'];
 $connection = pg_connect("host=$servername dbname=$database user=$username password=$password");
 $result = pg_query($connection,"UPDATE players SET temp='$status' WHERE username = '$user' ;");
    echo json_encode($_POST);
}
}
 else {
    //echo json_encode(array());
}
if($_SERVER["REQUEST_METHOD"] == "GET")  {
 $connection = pg_connect("host=$servername dbname=$database user=$username password=$password");
 $result = pg_query($connection, "SELECT temp from players where username = '$S';");
        $num = pg_num_rows($result);
   while($row = pg_fetch_assoc($result)) {
    echo $row["temp"];
  }
 if($_SERVER["REQUEST_METHOD"] == "POST")  {
 $connection = pg_connect("host=$servername dbname=$database user=$username password=$password");
 $result = pg_query($connection,"SELECT * FROM players WHERE username = '$S';");
        $num = pg_num_rows($result);
   while($row = pg_fetch_assoc($result)) {
    $arr = array('a' => $row["temp"], 'b' => $row["timeline"]);
    echo json_encode($arr);
   }}}

 ?>