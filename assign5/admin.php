<?php session_start();
// prevent unauthorized access to this page
if(!isset($_SESSION) || $_SESSION["loggedIn"] == false) {
  header('Location: index.php');
  exit();
}//end auth check

init();

// display header
include('../shared/header.html');
echo '</head>';
include('../shared/menu.php');
?>
<script>
function addShares() {
  window.location = "add.php";
}

function deleteStock(stock) {
  console.log("deleting:" + stock);
  window.location = "delete.php?stock=" + stock;
}

function modifyStock(stock) {
  window.location = "modify.php?stock=" + stock;
}
</script>
<div class="container container-fluid">
  <div class="row">
    <div class="col-lg-12"><?php echo '<h2>Welcome ' . $_SESSION["username"] . '!</h2>' ?></div>
  </div>
  <div class="row equal">
    <div class="col-md-4"><h3>Your current portfolio:</h3></div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <table class="table">
        <thead>
          <tr>
            <th>Stock</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Current Cost</th>
            <th>Total Value</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $grandTotal = displayPortfolio(); ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12"><h3>Total Value: $<?php echo number_format($grandTotal, 2); ?></h3></div>
  </div>
  <div class="row">
    <div class="col-lg-1"><button type="button" class="btn btn-custom" onclick="addShares()">Add Shares</button></div>
  </div>
</div>
<?php include('../shared/footer.html'); ?>
<?php
/* Setup for user portfolio */
function init() {
  // create new portfolio if one doesn't already exist
  $portfolio = fopen($_SESSION["username"] . "-portfolio", "a+") or die("Unable to open or create file!");
  fclose($portfolio);
}

/* get the info for the portfolio returns grandtotal portfolio value */
function displayPortfolio() {
  $portfolio = fopen($_SESSION["username"] . "-portfolio", "r") or die("Unable to open file!");
  $grandTotal = 0;

  while(!feof($portfolio)) {
    // split up the line and remove characters stored for file
    $pLine = explode(" ", rtrim(fgets($portfolio)));
    $open = fopen("http://finance.yahoo.com/d/quotes.csv?s=" . $pLine[0] . "&f=snl1&e=.csv", "r") or die("Unable to open link!");
    //$oLine = explode(",", rtrim(fgets($open)));
    $oLine = fgetcsv($open, 1000, ",");

    // create the line
    if(!$pLine[0] == "") {
      echo '<tr>
        <th>' . $pLine[0] .'</th>
        <th>' . $oLine[1] .'</th>
        <th>' . number_format($pLine[1]) .'</th>
        <th>$' . number_format($oLine[2], 2) .'</th>
        <th>$' . number_format($oLine[2] * $pLine[1], 2) .'</th>
        <th><button type="button" class="btn btn-custom" onclick="modifyStock(\'' . $pLine[0] . '\')">Modify</button></th>
        <th><button type="button" class="btn btn-custom" onclick="deleteStock(\'' . $pLine[0] . '\')">Delete</button></th>
      </tr>';

      // add line to grand total
      $grandTotal += $oLine[2] * $pLine[1];
    }//end if
  }//end while
  fclose($portfolio);
  return $grandTotal;
}//end displayPortfolio
?>
