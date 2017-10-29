<?php session_start();
// prevent unauthorized access to this page
if(!isset($_SESSION) || $_SESSION["loggedIn"] == false || !isset($_GET["val"]) {
  header('Location: index.php');
  exit();
}//end auth check

header('Location: index.php');
exit();
?>
