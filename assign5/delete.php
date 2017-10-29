<?php session_start();
require_once('log.php');
// prevent unauthorized access to this page
if(!isset($_SESSION) || $_SESSION["loggedIn"] == false || !isset($_GET["stock"])) {
  //header('Location: index.php');
  //exit();
}//end auth check

// open the portfolio file
$portfolio = file($_SESSION["username"] . "-portfolio");

$sellAmount = 0;
$newPortfolio = "";

// find the stock to delete
foreach($portfolio as $line) {
  $lineSplit = explode(" ", $line);

  // ignore the line if it is the stock we are looking for
  if(rtrim($lineSplit[0]) != $_GET["stock"]) {
    $newPortfolio .= $line;
  } else {
    $sellAmount = rtrim($lineSplit[1]);
  }
}//end foreach

file_put_contents($_SESSION["username"] . "-portfolio", $newPortfolio);

// log the transaction
logTransaction($_GET["stock"], $sellAmount, "sell");

header('Location: index.php');
exit();
?>
