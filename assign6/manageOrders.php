<?php session_start();
require_once('DBManager.php');
if(isset($_GET["function"])) {
  switch($_GET["function"]) {
    case "add":
      add();
      break;
    case "processAdd":
      processAdd();
      break;
    case "cancel":
      if(isset($_GET["id"])) {
        cancel($_GET["id"]);
      } else {
        header('Location: index.php');
        exit();
      }//end isset id
      break;
    case "edit":
      if(isset($_GET["id"])) {
        edit($_GET["id"]);
      } else {
        header('Location: index.php');
        exit();
      }
      break;
    case "processEdit":
      processEdit();
      break;
    default:
      header('Location: index.php');
      exit();
      break;
  }//end switch
}//end isset function

function add() {
  include('../shared/header.html');
  echo '</echo>';
  include('../shared/menu.php');?>

  <div class="container container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <form action="manageOrders.php">
          <input type="hidden" name="function" value="processAdd">
          <div class="form-group">
            <label for="ticker">Stock Ticker</label>
            <input type="text" class="form-control" id="ticker" placeholder="Ex: GOOGL" name="ticker" />
          </div>
          <div class="form-group">
            <label for="name">Stock Name</label>
            <input type="text" class="form-control" id="name" placeholder="Ex: Google Inc." name="name" />
          </div>
          <div class="form-group">
            <label for="price">Asking Price</label>
            <input type="text" class="form-control" id="price" name="price" />
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" />
          </div>
          <div class="form-group">
            <label for="orderType">Order Type</label>
            <select class="form-control" name="orderType" id="orderType">
              <option>BUY</option>
              <option>SELL</option>
            </select>
          </div>
          <div class="form-group">
            <label class="radio-inline"><input type="radio" name="notify" value="1" checked="checked">Notify On Complete</label>
            <label class="radio-inline"><input type="radio" name="notify" value="0">Do Not Notify</label>
          </div>
          <button type="submit" class="btn btn-custom">Submit</button>
          <label><input type="checkbox" name="continue" value="1">Add another order</label>
        </form>
      </div>
    </div>
  </div>

<?php include('../shared/footer.html');
}

function processAdd() {
  if(isset($_GET["ticker"]) && isset($_GET["price"]) && isset($_GET["name"]) && isset($_GET["quantity"]) && isset($_GET["orderType"]) && isset($_GET["notify"])) {
    $conn = getConnection();
    $stmt  = $conn->prepare("INSERT INTO InternetProgramming.StockExchange(StockType, Price, DateAdded, Quantity, Name, OrderType, Notify)
                             VALUES(:ticker, :price, NOW(), :quantity, :name, :orderType, :notify)");
    $stmt->bindParam(':ticker', $_GET["ticker"]);
    $stmt->bindParam(':price', $_GET["price"]);
    $stmt->bindParam(':quantity', $_GET["quantity"]);
    $stmt->bindParam(':name', $_GET["name"]);
    $stmt->bindParam(':orderType', $_GET["orderType"]);
    $stmt->bindParam(':notify', $_GET["notify"]);
    $stmt->execute();
  }
  header('Location: index.php');
}

function cancel($id) {
  $conn = getConnection();

  $stmt = $conn->prepare("DELETE FROM StockExchange WHERE idStockExchange=:id");
  $stmt->bindParam(':id', $id);

  $stmt->execute();

  header("Location: index.php");
  exit();
}

function edit($id) {
  include('../shared/header.php');
  echo '</echo>';
  include('../shared/menu.php');?>



<?php include('../shared/footer.php');
}

?>
