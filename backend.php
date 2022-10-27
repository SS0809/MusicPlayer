<?php
 session_start();
 include "database.php";
        $S = "saurabhss";
    $conn = mysqli_connect($servername,
        $username, $password, $database);
        $dsn = 'mysql:dbname='.$database.';host='.$servername.'';
$db = new PDO($dsn, $username, $password);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['timeline_update'])) {
        $update = $db->prepare("UPDATE `player` SET `timeline` = ? WHERE `username` = '$S' LIMIT 1;");
        $update->execute([$_POST['status']]);
        echo json_encode($_POST);
    }
    else if (isset($_POST['play_update'])) {
      $update = $db->prepare("UPDATE `player` SET `ytcode` = ? WHERE `username` = '$S' LIMIT 1;");
      $update->execute([$_POST['status']]);
      echo json_encode($_POST);
  }
  else if (isset($_POST['temp_update'])) {
    $update = $db->prepare("UPDATE `player` SET `temp` = ? WHERE `username` = '$S' LIMIT 1;");
    $update->execute([$_POST['status']]);
    echo json_encode($_POST);
}
}
 else {
    //echo json_encode(array());
}
if($_SERVER["REQUEST_METHOD"] == "POST")  {
    $sql = "SELECT * from player where username = '$S';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
   // echo $row["temp"]."s".$row["timeline"];
    $arr = array('a' => $row["temp"], 'b' => $row["timeline"]);
    //echo json_encode($row["temp"],$row["timeline"]);
    echo json_encode($arr);
   }}}
 ?>