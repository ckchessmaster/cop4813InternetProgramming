<?php session_start(); ?>
<?php
// have we tried to login but failed?
$loginAttempt = false;

if(isset($_GET["logout"])) {
  logout();
}//end isset
if(isset($_GET["username"]) && isset($_GET["password"])) {
  $loginAttempt = validate();
}//end isset

if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
  header('Location: admin.php');
  exit();
} else {
  // display header
  include('../shared/header.html');
  echo '</head>';
  include('../shared/menu.php');
  displayLogin($loginAttempt);
}//end loggedIn check
 ?>
<?php include('../shared/footer.html'); ?>

<?php
/* Display the login prompt */
function displayLogin($loginAttempt) {
  echo '<div class="container">';
  // check if we have attempted to login
  if($loginAttempt) {
    echo '<div class="alert alert-danger">Incorrect username or password.</div>';
  }//end loginAttempt check
  echo '<form action="index.php">
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

/* Validate user credentials */
function validate() {
  // start by setting loggedIn to false
  $_SESSION["loggedIn"] = false;

  // open file
  $users = fopen("users.txt", "r") or die("Unable to open file!");

  // search for the matching username/password
  while(!feof($users)) {
    // split up the line and remove characters stored for file
    $line = fgets($users);
    $lineClean = rtrim($line);
    $lineCleanSplit = explode(" ", $lineClean);

    // check for username and then password
    if($_GET["username"] == $lineCleanSplit[0]) {
      if(password_verify($_GET["password"], $lineCleanSplit[1])) {
        $_SESSION["loggedIn"] = true;
        $_SESSION["username"] = $lineCleanSplit[0];

        // successful login
        fclose($users);
        return false;
      }//end password check
    }//end username check
  }//end file search

  // failed login
  fclose($users);
  return true;
}//end validate()

/* Clear session to "logout" the user */
function logout() {
  session_unset();
  session_destroy();
}
 ?>
