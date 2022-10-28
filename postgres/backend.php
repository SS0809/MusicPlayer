<?php
 session_start();
 include "database.php";
        $S =  $_SESSION['username'] ;
        $query  = "
SELECT * FROM player where username = 'saurabhss';
 ";
$result = pg_query($connect, $query);


while ($row = pg_fetch_row($result)) {
 // echo " $row[1]$row[2]$row[3]$row[4] ";
  //echo "<br />\n";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
           $username = $_POST['timeline'];
            $sql = "UPDATE `player` SET `timeline` = '$status' WHERE `username` = '$username' LIMIT 1;";
     $result = pg_query($connect, $sql);
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
     $result = pg_query($connect, $sql);
    echo json_encode($_POST);
}
}
 else {
    //echo json_encode(array());
}
if($_SERVER["REQUEST_METHOD"] == "GET")  {
     $sql = "SELECT temp from player where username = '$S';";
     $result = pg_query($connect, $sql);
while ($row = pg_fetch_row($result)) {
    echo $row[5];
   }
  }
 if($_SERVER["REQUEST_METHOD"] == "POST")  {
    $sql = "SELECT * from player where username = '$S';";
     $result = pg_query($connect, $sql);
while ($row = pg_fetch_row($result)) {
    $arr = array('a' => $row[5], 'b' => $row[1]);
    echo json_encode($arr);
   }
} 
 ?>