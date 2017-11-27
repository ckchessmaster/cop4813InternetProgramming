<?php session_start();
include('../shared/header.html'); ?>
<script>
function addOrder() {
  window.location = "../assign6/manageOrders.php?function=add";
}

function cancelOrder(id) {
  window.location = "../assign6/manageOrders.php?function=cancel&id=" . $id;
}

function editOrder(id) {
  console.log("test");
  window.location = "../assign6/manageOrders.php?function=edit&id=" . $id;
}

function changeFilter() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange  = function() {
    if(xhttp.readyState == 4) {
      $("#data").html(xhttp.responseText);
    }
  };

  var tickerFilter = $("#ticker").val();
  var nameFilter = $("#name").val();
  var typeFilter = $("#orderType").val();
  var params = "tickF=" + tickerFilter + "&nameF=" + nameFilter + "&typeF=" + typeFilter;
  console.log(params);

  xhttp.open("GET", "dataManager.php?" + params, true);
  xhttp.send();
}
</script>
</head>
<?php include('../shared/menu.php'); ?>
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
          <tr>
            <th><input id="ticker" type="text" oninput="changeFilter()" style="width:70px"/></th>
            <th><input id="name" type="text" oninput="changeFilter()" style="width:200px"/></th>
            <th></th>
            <th></th>
            <th></th>
            <th><select id="orderType" onChange="changeFilter()">
              <option value="none">None</option>
              <option value="buy">BUY</option>
              <option value="sell">SELL</option>
            </select></th>
            <th><------</th>
            <th>Filter By</th>
          </tr>
        </thead>
        <tbody id="data" name="data">
          <?php include('dataManager.php'); ?>
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
?>
