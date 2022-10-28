<?php
 session_start();
 include "database.php";
        $S =  $_SESSION['username'] ;
    $conn = mysqli_connect($servername,
        $username, $password, $database);
        $dsn = 'mysql:dbname='.$database.';host='.$servername.'';
$db = new PDO($dsn, $username, $password);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
           $username = $_POST['timeline'];
            $sql = "UPDATE `player` SET `timeline` = '$status' WHERE `username` = '$username' LIMIT 1;";
            $result = $conn->query($sql);
        echo $result;
    }
    else if (isset($_POST['play_update'])) {
      $update = $db->prepare("UPDATE `player` SET `ytcode` = ? WHERE `username` = '$S' LIMIT 1;");
      $update->execute([$_POST['status']]);
      echo json_encode($_POST);
  }
  else if (isset($_POST['temp_update'])) {
        $status = $_POST['statuss'];
           $username = $_POST['temp_update'];
            $sql = "UPDATE `player` SET `temp` = '$status' WHERE `username` = '$username' LIMIT 1;";
            $result = $conn->query($sql);
    echo json_encode($_POST);
}
}
 else {
    //echo json_encode(array());
}
if($_SERVER["REQUEST_METHOD"] == "GET")  {
     $sql = "SELECT temp from player where username = '$S';";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo $row["temp"];
   }
  }
 if($_SERVER["REQUEST_METHOD"] == "POST")  {
    $sql = "SELECT * from player where username = '$S';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    $arr = array('a' => $row["temp"], 'b' => $row["timeline"]);
    echo json_encode($arr);
   }}}
   
 ?>