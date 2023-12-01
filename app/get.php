<?php
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
$temp = $json['temp'];
$timeline = $json['timeline'];