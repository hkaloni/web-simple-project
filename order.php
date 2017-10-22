<html>
  <body>
    <?php
      session_start();
      require 'redirect.php';
      require 'databaseInclude.php';
      $dbc = mysqli_connect(db_host,db_user,"",db_name);
      $id = $_POST['id'];
      $cancel = $_POST['cancel'];
      if ($cancel == 'cancel'){
        $query = "DELETE FROM cart WHERE id=$id";
        mysqli_query($dbc,$query)
          or die("No Query");
        ?>
        <script>
          alert("Order Cancelled");
          window.location="cart.php";
        </script>
        <?php
      }
      else {
        $query = "UPDATE cart SET confirmed=1 WHERE id=$id";
        mysqli_query($dbc,$query)
          or die("No Query");
          ?>
          <script>
            alert("Order Confirmed");
            window.location="cart.php";
          </script>
          <?php
      }
    mysqli_close($dbc);
   ?>
  </body>
</html>
