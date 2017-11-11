<?php session_start();
require_once('DBManager.php');
if(isset($_GET["function"])) {
  switch($_GET["function"]) {
    case "add":
      add();
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
    default:
      header('Location: index.php');
      exit();
      break;
  }//end switch
}//end isset function

function add() {
  include('../shared/header.php');
  echo '</echo>';
  include('../shared/menu.php');?>

  <div class="container container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <form action="add.php">
          <div class="form-group">
            <label for="stock">Stock Ticker</label>
            <input type="text" class="form-control" id="stock" placeholder="Ex: GOOGL" name="stock" />
          </div>
          <div class="form-group">
            <label for="stock">Quantity</label>
            <input type="text" class="form-control" id="shares" name="shares" />
          </div>
          <button type="submit" class="btn btn-custom">Submit</button>
        </form>
      </div>
    </div>
  </div>

<?php include('../shared/footer.php');
}

function cancel($id) {
  $conn = getConnection();

  $sql = $conn->prepare("DELETE FROM StockExchange WHERE idStockExchange=:id");
  $sql->bindParam(':id', $id);

  $sql->execute();

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
