<!DOCTYPE html>
<?php
require 'databaseInclude.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $type = $_POST["type"];
  $type1 = 'user';
  $type2 = 'provider';
  $uname = $_POST["uname"];
  $email = $_POST["email"];
  $dbc = mysqli_connect(db_host,db_user,"",db_name)
       or die("Connection failed");
  if ($type == $type1) {
    $query1 = "SELECT * FROM users WHERE uname='$uname'";
    $query2 = "SELECT * FROM users WHERE email='$email'";
  }
  elseif ($type == $type2) {
    $query1 = "SELECT * FROM providers WHERE pname='$uname'";
    $query2 = "SELECT * FROM providers WHERE email='$email'";
  }
  $result1 = mysqli_query($dbc,$query1)
              or die("No query");
  $result2 = mysqli_query($dbc,$query2)
              or die("No query");

  if (mysqli_num_rows($result1) == 0 && mysqli_num_rows($result2) == 0) {
    if ($type == $type1) {
      $uname = $_POST["uname"];
      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $email = $_POST["email"];
      $pass = $_POST["password"];
      $phone = $_POST["contact"];

      $query = "INSERT INTO users (uname,fname,lname,email,pass,contact) VALUES ('$uname','$fname','$lname','$email','$pass','$phone')";
    }
    elseif ($type == $type2) {
      $name = $_POST["name"];
      $uname = $_POST["uname"];
      $email = $_POST["email"];
      $pass = $_POST["password"];
      $phone1 = $_POST["contact1"];
      $phone2 = $_POST["contact2"];

      $query = "INSERT INTO providers (name,uname,email,pass,contact1,contact2) VALUES ('$name','$uname','$email','$pass','$phone1','$phone2')";
    }

    mysqli_query($dbc,$query)
      or die("Query error");
    header('Location: login.php');
  }
  else {
    if (mysqli_num_rows($result1) >= 1) {
      ?>
    <script>
      alert("Select Another Username");
    </script>
    <?php
    }
    elseif (mysqli_num_rows($result2) >= 1) {
      ?>
    <script>
      alert("Select Another Email-Id");
    </script>
    <?php
    }
  }
}
?>

<html>
    <head>
        <title>Sign-Up</title>
        <link rel="stylesheet" type="text/css" href="signup.css">
        <link rel="stylesheet" type="text/css" href="index.css">
        <script>
          function validate() {
            var pass1 = document.forms["sign-up"]["password"].value;
            var pass2 = document.forms["sign-up"]["password2"].value;
            if (pass1 != pass2) {
              alert("Password Incorrect");
              return false;
            }
            else {
              return true;
            }
          }
        </script>
    </head>
    <body>
        <header>
        <ul>
            <li class="ino">inovatiQ</li>
        </ul>
    </header>
    <div class="sign-form-left">
			<div class="sign-form-left-inside">
        <fieldset>
          <legend>User</legend>
  				<form name="sign-up" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <input type="hidden" name="type" value="user">
  					<input type="text" name="fname" placeholder="First Name" required="required"><br/><br/>
  					<input type="text" name="lname" placeholder="Last Name" required="required"><br/><br/>
  					<input type="text" name="uname" placeholder="User Name" required="required"><br/><br/>
            <input type="email" name="email" placeholder="email id" required="required"><br/><br/>
            <input type="password" name="password" placeholder="Password" required="required" pattern=".{8,}" title="Minimum 8 characters"><br/><br/>
            <input type="password" name="password2" placeholder="Rewrite Password" required="required" pattern=".{8,}" title="Minimum 8 characters"><br/><br/>
            <input type="number" name="pnumber" maxlength="10" placeholder="e.g. 9876543210" required="required"><br/><br/>
  					<input type="submit" name="submit" value="Sign Up" onclick="return validate()">
  				</form>
        </fieldset>
			</div>
		</div>

    <div class="sign-form-right">
			<div class="sign-form-right-inside">
        <fieldset>
          <legend>Provider</legend>
  				<form name="sign-up" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <input type="hidden" name="type" value="provider">
  					<input type="text" name="name" placeholder="Company Name" required="required"><br/><br/>
  					<input type="text" name="uname" placeholder="User Name" required="required"><br/><br/>
            <input type="email" name="email" placeholder="email id" required="required"><br/><br/>
            <input type="password" name="password" placeholder="Password" required="required" pattern=".{8,}" title="Minimum 8 characters"><br/><br/>
            <input type="password" name="password2" placeholder="Rewrite Password" required="required" pattern=".{8,}" title="Minimum 8 characters"><br/><br/>
            <input type="number" name="contact1" maxlength="10" placeholder="e.g. 9876543210" required="required"><br/><br/>
            <input type="number" name="contact2" maxlength="10" placeholder="e.g. 9876543210"><br/><br/>
  					<input type="submit" name="submit" value="Sign Up">
  				</form>
        </fieldset>
			</div>
		</div>
    </body>
</html>
