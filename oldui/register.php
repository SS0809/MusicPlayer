<?php
 include "database.php";
$conn = mysqli_connect($servername,$username, $password, $database);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['user'];
        $playlist = $_POST['playlist'];
$sql = "INSERT INTO `player`(`username`, `playlist`) VALUES ('$user','$playlist');";
  $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
 </head>
<body>
  <h1>REGISTER</h1>
  <form id="myForm" action="register.php" method="post">
    <label>type the root name
    <input id="user" name="user">
    </label>
    <br><br>
     <label>type the playlist
    <input id="playlist" name="playlist">
    </label>
    <br>    <br>
    <input type="submit">
  </form>
</body>
</html>