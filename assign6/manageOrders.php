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
      if(isset($_GET["id"])) {
        processEdit($_GET["id"]);
      } else {
        header('Location: index.php');
        exit();
      }
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
        <h1>Add New Order</h1>
      </div>
    </div>
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
    $stmt  = $conn->prepare("INSERT INTO StockExchange(StockType, Price, DateAdded, Quantity, Name, OrderType, Notify)
                             VALUES(:ticker, :price, NOW(), :quantity, :name, :orderType, :notify)");
    $stmt->bindParam(':ticker', $_GET["ticker"]);
    $stmt->bindParam(':price', $_GET["price"]);
    $stmt->bindParam(':quantity', $_GET["quantity"]);
    $stmt->bindParam(':name', $_GET["name"]);
    $stmt->bindParam(':orderType', $_GET["orderType"]);
    $stmt->bindParam(':notify', $_GET["notify"]);
    $stmt->execute();
  }

  if(isset($_GET["continue"]) && $_GET["continue"] == 1) {
    header('Location: manageOrders.php?function=add');
  } else {
    header('Location: index.php');
  }
  exit();
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
  // get the info from the db
  $conn = getConnection();
  $stmt = $conn->prepare("SELECT StockType, Price, DateAdded, Quantity, Name, OrderType, Notify FROM StockExchange WHERE idStockExchange=:id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $obj = $stmt->fetchObject();

  include('../shared/header.html');
  echo '</echo>';
  include('../shared/menu.php');?>

  <div class="container container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1>Edit Order</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <form action="manageOrders.php">
          <input type="hidden" name="function" value="processEdit">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="form-group">
            <label for="ticker">Stock Ticker</label>
            <input type="text" class="form-control" id="ticker" value="<?php echo $obj->StockType; ?>" name="ticker" />
          </div>
          <div class="form-group">
            <label for="name">Stock Name</label>
            <input type="text" class="form-control" id="name" value="<?php echo $obj->Name; ?>" name="name" />
          </div>
          <div class="form-group">
            <label for="price">Asking Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $obj->Price; ?>"/>
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $obj->Quantity; ?>"/>
          </div>
          <div class="form-group">
            <label for="orderType">Order Type</label>
            <select class="form-control" name="orderType" id="orderType">
              <option <?php if($obj->OrderType == "BUY") {echo 'selected="selected"';} ?>>BUY</option>
              <option <?php if($obj->OrderType == "SELL") {echo 'selected="selected"';} ?>>SELL</option>
            </select>
          </div>
          <div class="form-group">
            <label class="radio-inline"><input type="radio" name="notify" value="1" <?php if($obj->Notify == 1) {echo 'checked="checked"';} ?>>Notify On Complete</label>
            <label class="radio-inline"><input type="radio" name="notify" value="0" <?php if($obj->Notify == 0) {echo 'checked="checked"';} ?>>Do Not Notify</label>
          </div>
          <button type="submit" class="btn btn-custom">Submit</button>
        </form>
      </div>
    </div>
  </div>

<?php include('../shared/footer.html');
}

function processEdit($id) {
  if(isset($_GET["ticker"]) && isset($_GET["price"]) && isset($_GET["name"]) && isset($_GET["quantity"]) && isset($_GET["orderType"]) && isset($_GET["notify"])) {
    $conn = getConnection();
    $stmt  = $conn->prepare("UPDATE StockExchange
                             SET StockType = :ticker, Price = :price, Quantity = :quantity, Name = :name, OrderType = :orderType, Notify = :notify
                             WHERE idStockExchange = :id");
    $stmt->bindParam(':ticker', $_GET["ticker"]);
    $stmt->bindParam(':price', $_GET["price"]);
    $stmt->bindParam(':quantity', $_GET["quantity"]);
    $stmt->bindParam(':name', $_GET["name"]);
    $stmt->bindParam(':orderType', $_GET["orderType"]);
    $stmt->bindParam(':notify', $_GET["notify"]);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
  header('Location: index.php');
}
?>
