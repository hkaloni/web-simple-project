<?php session_start(); ?>
<header>
<ul>
    <li class="ino">inovatiQ</li>
    <?php
    if (!empty($_SESSION["uname"])) {
      ?>
      <li><a href="logout.php" class="link-color">Logout</a></li>
      <li><a href="checkorder.php" class="link-color">Orders</a></li>
      <li><a href="cart.php" class="link-color">Cart</a></li>
      <li><a href="book.php" class="link-color">Book</a></li>
      <?php
    }
    else {
      ?>
      <li><a href="login.php" class="link-color">Login</a></li>
      <li><a href="signup.php" class="link-color">Login</a></li>
      <?php
    }
     ?>
</ul>
</header>
