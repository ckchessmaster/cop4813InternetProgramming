<?php
$servername = "192.168.1.98:3306";
$username = "ckingdon";
$password = "dxgBDmvja45!";
$dbname = "n00827188";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM StockExchange WHERE StockType LIKE :ticker AND Name LIKE :name AND OrderType LIKE :type");
if(!isset($_GET["tickF"]) || $_GET["tickF"] == "") {
  $stmt->bindValue(':ticker', '%');
} else {
  $stmt->bindValue(':ticker', $_GET["tickF"] . '%');
}

if(!isset($_GET["nameF"]) || $_GET["nameF"] == "") {
  $stmt->bindValue(':name', '%');
} else {
  $stmt->bindValue(':name', $_GET["nameF"] . '%');
}

if(!isset($_GET["typeF"]) || $_GET["typeF"] == "none" || $_GET["typeF"] == "") {
  $stmt->bindValue(':type', '%');
} else {
  $stmt->bindParam(':type', $_GET["typeF"]);
}

//$stmt->bindParam(':ticker', "GOOGL");
//$stmt->bindParam(':name', "Google Inc.");
//$stmt->bindParam(':ticker', "BUY");
$stmt->execute();

foreach($stmt as $row) {
  echo '<tr>
    <td>'.$row["StockType"].'</td>
    <td>'.$row["Name"].'</td>
    <td>'.$row["Quantity"].'</td>
    <td>'.$row["Price"].'</td>
    <td>'.$row["DateAdded"].'</td>
    <td>'.$row["OrderType"].'</td>
    <td><button type="button" class="btn btn-custom" onclick="editOrder(\'' . $row["idStockExchange"] . '\')">Edit</button></td>
    <td><button type="button" class="btn btn-custom" onclick="cancelOrder(\'' . $row["idStockExchange"] . '\')">Cancel</button></td>
  </tr>';
}
?>
