<?php session_start();
require_once('log.php');
// prevent unauthorized access to this page
if(!isset($_SESSION) || $_SESSION["loggedIn"] == false || !isset($_GET["stock"])) {
  header('Location: index.php');
  exit();
}//end auth check

$currentShares = 0;
// update the portfolio if we have just submitted
if(isset($_GET["newShares"])) {
  // open the portfolio file
  $portfolio = file($_SESSION["username"] . "-portfolio");
  $newPortfolio = "";
  $type = "";

  // find the stock to delete
  foreach($portfolio as $line) {
    $lineSplit = explode(" ", $line);

    // update the line if it's the one we are looking for
    if(rtrim($lineSplit[0]) == $_GET["stock"]) {
      // determine if we are buying or selling shares
      if($lineSplit[1] <= $_GET["newShares"]) {
        $type = "buy";
      } else {
        $type = "sell";
      }//end type check

      $currentShares = $lineSplit[1];

      // update line
      $newPortfolio .= $_GET["stock"] . " " . $_GET["newShares"];
    } else {
      $newPortfolio .= $line;
    }
  }//end foreach

  file_put_contents($_SESSION["username"] . "-portfolio", $newPortfolio);

  logTransaction($_GET["stock"], (abs($currentShares - $_GET["newShares"])), $type);

  header('Location: index.php');
  exit();
}

// set to uppercase for consistancy
$_GET["stock"] = strtoupper($_GET["stock"]);

// open the portfolio file
$portfolio = fopen($_SESSION["username"] . "-portfolio", "r+") or die("Unable to open file!");

// find the stock to modify
while(!feof($portfolio)) {
  $line = explode(" ", rtrim(fgets($portfolio)));
  if($line[0] == $_GET["stock"]) {
    $currentShares = $line[1];
  }
}

// display header
include('../shared/header.php');
?>
<!-- Still need validation -->
<div class="container container-fluid">
  <div class="row">
    <div class="col-sm-3"><h3>Stock: <?php echo $_GET["stock"]; ?></h3></div>
    <div class="col-sm-4"><h3>Current Shares: <?php echo $currentShares; ?></h3></div>
  </div>
  <div class="row">
    <div class="col-lg-7">
      <form action="modify.php">
        <div class="form-group">
          <label for="newShares">New Shares</label>
          <input type="number" class="form-control" id="newShares" placeholder="Enter the total number of shares that you want" name="newShares" />
        </div>
        <input type="hidden" id="stock" name="stock" value=<?php echo '"' . $_GET["stock"] . '"' ?> />
        <button type="submit" class="btn btn-custom">Submit</button>
      </form>
    </div>
  </div>
</div>
<?php include('../shared/footer.html'); ?>
