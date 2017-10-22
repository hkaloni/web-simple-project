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
    $query = "SELECT * FROM cart WHERE uname='$uname' AND confirmed=1"
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
            <form method="post" name="order" action="cancel.php">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <input type="submit" name="submit" value="Cancel Order">
            </form>
          </div>
      </div>
    </div>

    <?php
  }
  mysqli_close($dbc);
  ?>
</body>
</html>
