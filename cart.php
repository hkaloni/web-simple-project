<!DOCTYPE  html>
<html>
<head>
  <title>Cart</title>
  <link rel="stylesheet" type="text/css" href="loginheader.css">
  <link rel="stylesheet" type="text/css" href="cart.css">
</head>
  <body>
    <?php
    session_start();
    require 'redirect.php';
    require 'loginuserheader.php';
    require 'databaseInclude.php';
    $uname = $_SESSION["uname"];
    $dbc = mysqli_connect(db_host,db_user,"",db_name);
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $id = $_POST["id"];
      $type = $_POST["type"];
      $type1 = 'venue';
      $eventdate = $_POST["eventdate"];
      $finalprice = $_POST["finalprice"];

      $query = "SELECT * FROM $type WHERE id=$id";
      $result = mysqli_query($dbc,$query)
                or die("No query");
      $row = mysqli_fetch_array($result);

      $pname = $row['pname'];
      $service = $row['name'];
      if ($type == $type1) {
        $duration = $_POST["duration"];
        $query = "INSERT INTO cart (uname,pname,type,service,eventdate,duration,amount,confirmed) VALUES ('$uname','$pname','$type','$service','$eventdate','$duration','$finalprice',0)";
      }
      else {
        $query = "INSERT INTO cart (uname,pname,type,service,eventdate,amount,confirmed) VALUES ('$uname','$pname','$type','$service','$eventdate','$finalprice',0)";
      }

      mysqli_query($dbc,$query);
    }

      $query = "SELECT * FROM cart WHERE uname='$uname' AND confirmed=0"
                or die("No query");
      $result = mysqli_query($dbc,$query)
                or die("No query");
      while ($row = mysqli_fetch_array($result)) {
      ?>

      <div class="cart-main">
        <div class="cart-main-sub">
            <div class="cart-service">
              <?php echo $row['service']; ?>
            </div>
            <div class="cart-date-duration">
              <span class="date">Event Date : </span><?php echo 'Event Date : '.$row['eventdate'];?>
              <?php
              if ($row['type'] == 'venue'){?>
                <span class="days">Duration days : </span><?php echo $row['duration'];?>
              <?php } ?>
            </div>
            <div class="cart-price">
              <span>Amount : </span><?php echo $row['amount']; ?>
            </div>
            <div class="cart-submit">
              <div class="order">
                <form method="post" name="order" action="order.php">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <input type="hidden" name="cancel" value="nocancel">
                  <input type="submit" name="submit" value="Confirm">
                </form>
              </div>
              <div class="cancel">
                <form method="post" name="order" action="order.php">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <input type="hidden" name="cancel" value="cancel">
                  <input type="submit" name="submit" value="Cancel">
                </form>
              </div>
            </div>
        </div>
      </div>

      <?php
    }
    mysqli_close($dbc);
    ?>
  </body>
</html>
