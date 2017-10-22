<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
    <header>
        <ul>
            <li class="ino">inovatiQ</li>
            <?php
            if (!empty($_SESSION["uname"])) {?>
              <li><a href="book.php">Book</a></li>
              <li><a href="logout.php">Logout</a></li><?php
            }
            elseif (!empty($_SESSION["pname"])) {?>
              <li><a href="addservices.php">Add Services</a></li>
              <li><a href="logout.php">Logout</a></li><?php
            }
            else {?>
              <li><a href="signup.php">Sign Up</a></li>
              <li><a href="login.php">Log In</a></li><?php
            }?>
        </ul>
    </header>
    <div class="parallax1">
        <div class="caption">
            <span class="border-above">Welcome To</span>
            <span class="border">inovatiQ</span>
        </div>
        <?php
        if (empty($_SESSION["pname"]) && empty($_SESSION["uname"])){
        ?>
        <div class="caption2">
            <span class="captionGuest"><a href="book.php">Continue As Guest</a></span>
        </div>
      <?php } ?>
    </div>

</body>

</html>
