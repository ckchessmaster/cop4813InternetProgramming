<?php
function getConnection() {
  $servername = "192.168.1.70";
  $username = "n00827188";
  $password = "fall2017827188";
  $dbname = "InternetProgramming";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
}
?>
