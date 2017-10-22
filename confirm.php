<!DOCTYPE  html>
<html>
  <head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="loginheader.css">
    <link rel="stylesheet" type="text/css" href="confirm.css">
    <script src="confirm.js"></script>
  </head>
  <body>
    <?php
      session_start();
      if (!empty($_SESSION["uname"])) {
        $uname = $_SESSION["uname"];
        require 'loginuserheader.php';
        require 'databaseInclude.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $dbc = mysqli_connect(db_host,db_user,"",db_name);
          $type = $_POST["type"];
          $id = $_POST["id"];
          $type1 = 'venue';
          $type2 = 'caterer';
          $type3 = 'decorator';
          $query = "SELECT * FROM $type WHERE id=$id";
          $result = mysqli_query($dbc,$query)
                      or die("No query");
          if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            ?>
            <div class="confirm-main">
              <div class="confirm-main-sub">
                <div class="confirm-name">
                  <span>Company Name : </span><?php echo $row['name']; ?><br/><br/>
                </div>
                <div class="confirm-form">
                  <form method="post" name="confirm" action="cart.php">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                    <span>Event Date : </span><br/><input type="date" name="eventdate"><br/><br/>
                    <?php
                    if ($type == $type1) {?>
                      <span>Days of Booking : </span><br/><input type="number" name="duration" placeholder="Days of booking"><br/><br/>
                      <span>Price per Day : </span><br/><input type="text" name="price" value="<?php echo $row['price'] ?>" readonly><br/><br/>
                      <?php
                    }
                    elseif ($type == $type2) {?>
                      <span>Number of Dishes : </span><br/><input type="number" name="dishes" placeholder="Number of dishes"><br/><br/>
                      <span>Price per Dish : </span><br/><input type="text" name="price" value="<?php echo $row['price'] ?>" readonly><br/><br/>
                      <?php
                    }
                    elseif ($type == $type3) {?>
                      <span>Area to Decorate : </span><br/><input type="number" name="area" placeholder="Area to decorate"><br/><br/>
                      <span>Price per Area : </span><br/><input type="text" name="price" value="<?php echo $row['price'] ?>" readonly><br/><br/>
                      <?php
                    }?>
                    <span>Final Price : </span><br/><input type="text" name="finalprice" id="fprice" readonly><br/><br/>
                    <input type="button" name="calculate" value="Calculate Amount" onclick="calcualteAmount()">
                    <input type="submit" name="submit" value="Book" onclick="return validate()">
                  </form>
                </div>
              </div>
            </div>
            <?php
          }
        }
      }
      else {
        ?>
        <script>
          alert("Login First");
          window.location="login.php";
        </script>
        <?php
      }
    ?>
  <!-- </body>
</html> -->
