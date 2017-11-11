<?php session_start();
require_once('log.php');
// prevent unauthorized access to this page
if(!isset($_SESSION) || $_SESSION["loggedIn"] == false) {
  header('Location: index.php');
  exit();
}//end auth check

if(isset($_GET["stock"]) && isset($_GET["shares"])) {
  // set to uppercase for consistancy
  $_GET["stock"] = strtoupper($_GET["stock"]);

  // open the portfolio file
  $portfolio = fopen($_SESSION["username"] . "-portfolio", "r+") or die("Unable to open file!");

  // see if we already have some shares of this stock
  while(!feof($portfolio)) {
    $line = explode(" ", rtrim(fgets($portfolio)));

    // if we already have some of this stock add to it
    if($line[0] == $_GET["stock"]) {
      fwrite($portfolio, $line[0] . " " . ($line[1] += $_GET["shares"]) . "\n");

      // log the transaction
      logTransaction($_GET["stock"], $_GET["shares"], "buy");

      fclose($portfolio);
      header('Location: admin.php');
      exit();
    }//end if
  }//end while

  // didn't find any shares so lets add them
  fwrite($portfolio, $_GET["stock"] . " " . $_GET["shares"] . "\n");

  // log the transaction
  logTransaction($_GET["stock"], $_GET["shares"], "buy");

  fclose($portfolio);
  header('Location: admin.php');
  exit();
}

// display header
include('../shared/header.php');
echo '</echo>'
include('../shared/menu.php')
?>
<!-- Still need validation -->
<div class="container container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <form action="add.php">
        <div class="form-group">
          <label for="stock">Stock Ticker</label>
          <input type="text" class="form-control" id="stock" placeholder="Ex: GOOGL" name="stock" />
        </div>
        <div class="form-group">
          <label for="stock">Number of shares</label>
          <input type="text" class="form-control" id="shares" name="shares" />
        </div>
        <button type="submit" class="btn btn-custom">Submit</button>
      </form>
    </div>
  </div>
</div>
<?php include('../shared/footer.html'); ?>
