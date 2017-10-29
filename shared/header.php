<html>
<head>
  <title>Form</title>
  <meta charset="utf-8" />
  <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../styles.css" type="text/css" rel="stylesheet" />
  <script src="../lib/jquery-3.2.1.min.js"></script>
</head>
<body>
<h1 class="text-center">Christopher Kingdon ePortfolio</h1>
<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.html">ePortfolio</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="../index.html">Home</a></li>
      <li><a href="../assign1/index.html">Assign1</a></li>
      <li><a href="../assign2/index.html">Assign2</a></li>
      <li><a href="../assign3/index.html">Assign3</a></li>
      <li><a href="../assign4/index.html">Assign4</a></li>
      <li><a href="../assign5/index.php">Assign5</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php
      if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
        echo '<li><a href="../assign5/index.php?logout=true">' . $_SESSION["username"] . ', Logout</a></li>';
      } else {
        echo '<li><a href="../assign5/index.php?logout">Login</a></li>';
      }//end loggedIn check
      ?>
    </ul>
  </div>
</nav>