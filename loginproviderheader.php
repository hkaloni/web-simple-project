<?php session_start(); ?>
<header>
<ul>
    <li class="ino">inovatiQ</li>
    <?php
    if (!empty($_SESSION["pname"])) {
      ?>
      <li><a href="logout.php" class="link-color">Logout</a></li>
      <li><a href="addservices.php" class="link-color">Add Services</a></li>
      <?php
    }
    else {
      ?>
      <li><a href="login.php" class="link-color">Login</a></li>
      <?php
    }
     ?>
</ul>
</header>
