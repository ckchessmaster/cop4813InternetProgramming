<?php
function logTransaction($stock, $shares, $type) {
  if(isset($_SESSION["username"])) {
    // open or create a log failed
    $log = fopen("transactions.log", "a") or die("Unable to open or create file.");

    $dateTime = date("m/d/Y h:i:sa");

    fwrite($log, $_SESSION["username"] . " " . $dateTime . " " . $stock . " " . $type . " " . $shares . "\n");
    fclose($log);
  }//end username check
}//end log()
?>
