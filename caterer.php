<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Venue</title>
  <link rel="stylesheet" type="text/css" href="venue.css">
  <link rel="stylesheet" type="text/css" href="loginheader.css">
</head>
<body>
<?php
require 'loginuserheader.php';
require 'databaseInclude.php';

$dbc = mysqli_connect(db_host,db_user,"",db_name);
$query = "SELECT * FROM caterer";
$result = mysqli_query($dbc,$query);
if (mysqli_num_rows($result) >= 0) {
  while ($row = mysqli_fetch_array($result)) {
    ?>
    <div class="info-block-main">
      <div class="info-block-main-sub">
        <div class="info-block-name">
          <?php echo $row['name']; ?>
        </div>
        <div class="info-block-main-sub-inside">
          <div class="info-block-address">
            <span>Address : </span><?php echo $row['address'] ?>
          </div>
          <div class="pnumber">
            <span>Contact : </span><?php echo $row['contact1'] ?>
          </div>
          <div class="price">
            <span>Per Day Price : </span><?php echo $row['price']; ?>
          </div>
          <div class="book">
            <form action="confirm.php" method="post" name="order">
              <input type="hidden" name="type" value="caterer">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <input type="submit" name="submit" value="Add to Cart">
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
}
mysqli_close($dbc);
 ?>
 </body>
</html>
