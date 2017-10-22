<html>
  <body>
  <?php
    if (empty($_SESSION["uname"])) {
      ?>
      <script>
        alert("Login First");
        window.location="login.php";
      </script>
    <?php
  }
  ?>
  </body>
</html>
