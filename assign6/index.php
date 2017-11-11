<?php session_start();
require_once('DBManager.php');
include('../shared/header.html'); ?>
</head>
<?php include('../shared/menu.php'); ?>
<script>
function addOrder() {
  window.location = "manageOrders.php?function=add";
}

function cancelOrder(id) {
  window.location = "manageOrders.php?function=cancel&id=" + id;
}

function editOrder(id) {
  window.location = "manageOrders.php?function=edit&id=" + id;
}
</script>
<div class="container container-fluid">
  <div class="row">
    <div class="col-lg-12"><h2>Welcome!</h2></div>
  </div>
  <div class="row equal">
    <div class="col-md-4"><h3>Your active orders:</h3></div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <table class="table">
        <thead>
          <tr>
            <th>Stock</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Offer</th>
            <th>Date Placed</th>
            <th>Order Type</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php displayOrders(); ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-1"><button type="button" class="btn btn-custom" onclick="addOrder()">Add Order</button></div>
  </div>
</div>
<?php include('../shared/footer.html'); ?>
<?php
function displayOrders() {
  $conn = getConnection();
  $sql = "SELECT * FROM StockExchange";
  $result = $conn->query($sql);

  foreach($result as $row) {
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
}
?>
