<?php include('../shared/header.php'); ?>

<?php createUser(); ?>

<form action="manage.php">
  Username:<br />
  <input type="text" style="color:black;" name="username" />
  <br />
  Password:<br />
  <input type="text" style="color:black;" name="password" />
  <br />
  <br />
  <input type="submit" value="Submit" />
</form>

<?php include('../shared/footer.html'); ?>

<?php
function createUser() {
  if(isset($_GET["username"]) && isset($_GET["password"])) {
    $users = fopen("users.txt", "r+") or die("unable to open file!");
    while(!feof($users)) {
      $line = explode(" ", fgets($users));
      if($line[0] == $_GET["username"]) {
        fclose($users);
        return;
      }
    }//end while
    $password = password_hash($_GET["password"], 1);
    fwrite($users, $_GET["username"] . " " . $password . PHP_EOL);
    fclose($users);
  }
}
 ?>
