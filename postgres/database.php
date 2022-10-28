<?php
$host        = "host=ec2-54-75-26-218.eu-west-1.compute.amazonaws.com";
$port        = "port=5432";
$dbname      = "dbname=daljvr7olhtgm6";
$credentials = "user=uikhcbrlxxfmkm password=0ebcd89816cde7d9ead418b591e91132369966445ddb67c136da270dca2071e8";

$connect= pg_connect( "$host $port $dbname $credentials"  );


if(!$connect){
  echo "Error : Unable to open database\n";
}
else
{
   //echo "connect!";
}
?>