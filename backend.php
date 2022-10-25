<?php
 session_start();
$servername = "sql201.epizy.com";
    $username = "epiz_32860240";
    $password = "chutiya65";
    $database = "epiz_32860240_music";
    $conn = mysqli_connect($servername,
        $username, $password, $database);

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
