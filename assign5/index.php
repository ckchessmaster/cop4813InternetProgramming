<?php session_start(); ?>
<?php include('../shared/header.html'); ?>
<?php
if(isset($_GET)) {
  validate();
}//end isset
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
  displayServices();
} else {
  displayLogin();
}//end loggedIn check
 ?>
<?php include('../shared/footer.html'); ?>

<?php
function displayLogin() {
  echo '<div class="container">
  <form action="index.php">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" />
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" />
  </div>
  <button type="submit" class="btn btn-custom">Log In</button>
  </form></div>';
}//end displayLogin

function displayServices() {
  echo "Hello World!";
}//end displayServices

function validate() {
  if(isset($_GET["username"]) && isset($_GET["password"])) {
    $users = fopen("users.txt", "r") or die("Unable to open file!");

    // search for the matching username/password
    while(!feof($users)) {
      $line = explode(" ", fgets($users));
      if($_GET["username"] == $line[0]) {
        if(password_verify($_GET["password"], $line[1])) {
          echo $line[0];
          $_SESSION["loggedIn"] = true;
          $_SESSION["usernamae"] = $line[0];
        } else {
          echo password_hash($_GET["password"]);
          echo $line[1];
          $_SESSION["loggedIn"] = false;
          //tell user login failed
        }//end password check
      }//end username check
    }//end user search

    fclose($users);
  }//end isset
}//end validate()
 ?>
