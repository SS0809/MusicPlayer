<?php
 session_start();
 include "database.php";
    $conn = mysqli_connect($servername,
        $username, $password, $database);
        $dsn = 'mysql:dbname='.$database.';host='.$servername.'';
$db = new PDO($dsn, $username, $password);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['timeline_update'])) {
        $update = $db->prepare("UPDATE `player` SET `timeline` = ? WHERE `id` = '2' LIMIT 1;");
        $update->execute([$_POST['status']]);
        echo json_encode($_POST);
    }
    else if (isset($_POST['play_update'])) {
        $update = $db->prepare("UPDATE `player` SET `ytcode` = ? WHERE `id` = '2' LIMIT 1;");
        $update->execute([$_POST['status']]);
        echo json_encode($_POST);
    }
}
 else {
    //echo json_encode(array());
}
    if($conn) {
    //  echo "success";
           //$sql = "INSERT INTO `player`( `timeline`, `username`, `ytcode`) VALUES ('0:00','saurabhss','M7lc1UVf-VE')";
        $sql= "SELECT * FROM player WHERE username = 'saurabhss';";
      $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result);
   while($row = mysqli_fetch_assoc($result)) {
  $ytcode =  $row["ytcode"];
$timeline =  $row["timeline"];
  }
    }
    else {
        die("Error". mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"] == "GET")  {
    $sql = "SELECT * from player where id = 2;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
   $dataa="";   $namee="";while($row = $result->fetch_assoc()) {
    echo $row["timeline"];
   }}}
 ?>