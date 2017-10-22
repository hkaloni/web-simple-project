<?php
  require 'databaseInclude.php';
  session_start();
  if (!empty($_SESSION["uname"])) {
    header('Location: book.php');
  }
  elseif (!empty($_SESSION["pname"])) {
    header('Location: addservices.php');
  }
  elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    $type = $_POST["submit"];
    $type1 = 'User';
    $type2 = 'Provider';

    $dbc = mysqli_connect(db_host,db_user,"",db_name);
//      or die("No connect");
      if ($type == $type1) {
        $query = "SELECT * FROM users WHERE uname = '$uname' AND pass = '$pass'";
        $users = 1;
      }
      elseif ($type == $type2) {
        $query = "SELECT * FROM providers  WHERE pname = '$uname' AND pass = '$pass'";
        $users = 0;
      }

      $result = mysqli_query($dbc,$query);
    //   or die("Query Error");
      if(mysqli_num_rows($result) == 1){
        if ($users == 1) {
          $_SESSION["uname"] = $uname;
          header('Location: book.php');
        }
        else {
          $_SESSION["pname"] = $uname;
          header('Location: addservices.php');
        }
      }
      else{
        ?>
        <script>
        alert("Enter proper credentials");
        </script>
        <?php
      }
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="login.css">
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>
        <header>
          <ul>
              <li class="ino">inovatiQ</li>
          </ul>
        </header>
        <div class="signin-form">
          <div class="signin-form-inside">
            <form name="sign-in" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
              <input type="text" name="uname" placeholder="user name" required="required"><br/><br/>
              <input type="password" name="pass" placeholder="password" required="required"><br/><br/>
              <input type="submit" name="submit" value="User">
              <input type="submit" name="submit" value="Provider">
            </from>
          </div>
        </div>
    </body>
</html>
