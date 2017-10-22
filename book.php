<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Book</title>
        <link rel="stylesheet" type="text/css" href="book.css">
        <link rel="stylesheet" type="text/css" href="loginheader.css">
    </head>
    <body>
      <!-- <header>
        <ul>
          <li class="ino">inovatiQ</li>
          <?php
          if (!empty($_SESSION["uname"])) {
            ?>
            <li><a href="logout.php" class="link-color">Logout</a></li>
            <?php
          }
          else {
            ?>
            <li><a href="login.php">Login</a></li>
            <?php
          }
           ?>
      </ul>
    </header> -->
    <?php include 'loginuserheader.php'; ?>
    <div class="book-option-main">
      <div class="book-option-inside">
        <ul class="book-option">
          <li><a href="venue.php">Book Venue</a></li>
          <li><a href="caterer.php">Book Caterer</a></li>
          <li><a href="decorator.php">Book Decorator</li>
        </ul>
      </div>
    </div>
  </body>
</html>
