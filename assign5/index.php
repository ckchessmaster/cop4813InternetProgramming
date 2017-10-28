<?php session_start(); ?>
<?php include('../shared/header.html'); ?>
<?php
if(isset($_GET["logout"])) {
  logout();
}
if(isset($_GET["username"]) && isset($_GET["password"])) {
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
  $users = fopen("users.txt", "r") or die("Unable to open file!");

  // search for the matching username/password
  while(!feof($users)) {
    // split up the line and remove characters stored for file
    $line = preg_replace('/[\x00-\x1F\x7F\xA0]/u', '',explode(" ", fgets($users)));
    if($_GET["username"] == $line[0]) {
      if(password_verify("Password123", $line[1])) {
        $_SESSION["loggedIn"] = true;
        $_SESSION["usernamae"] = $line[0];
      } else {
        $_SESSION["loggedIn"] = false;
        //tell user login failed
      }//end password check
    }//end username check
  }//end user search
  fclose($users);
}//end validate()

function logout() {
  session_unset();
  session_destroy();
}
 ?>
