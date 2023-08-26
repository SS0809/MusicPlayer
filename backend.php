<?php
 session_start();
  include "DataApihost.php";
        $S =  $_SESSION['username'] ;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {//working
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
           $username = $_POST['timeline'];
$data = array('id' => '1','timeline' => $status);
$json = json_encode($data);
$url = $servername.'/api/projects/timeline';
$ch = curl_init($url);
 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json)
));
 
$response = curl_exec($ch);
if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo $response;
 }
curl_close($ch);
    }
  else if (isset($_POST['temp_update'])) {//working
        $status = $_POST['statuss'];
           $username = $_POST['temp_update'];
           // $sql = "UPDATE `player` SET `temp` = '$status' WHERE `username` = '$username' LIMIT 1;";//tobe removed
            // $conn->query($sql);
$data = array('id' => '1','temp' => $status);
$json = json_encode($data);
$url = $servername.'/api/projects/temp';
$ch = curl_init($url);
 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json)
));
 
$response = curl_exec($ch);
if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo $response;
 }
curl_close($ch);
}
}
 else {
    //echo json_encode(array());
}
if($_SERVER["REQUEST_METHOD"] == "GET")  {//working
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $servername.'/api/projects/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo $response;
  }
 /*if($_SERVER["REQUEST_METHOD"] == "POST")  {//error
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost:8090/api/projects/ok');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'id: 1',
    'Content-Length: ' . strlen($json)
));
$response = curl_exec($ch);
$json = json_decode($response, true);
$arr = array('temp' => $json["temp"], 'timeline' => $json["timeline"]);
    echo json_encode($arr);
   }
   */
 ?>