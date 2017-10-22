<html>
  <body>
    <?php
      session_start();
      require 'redirect.php';
      require 'databaseInclude.php';
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $dbc = mysqli_connect(db_host,db_user,"",db_name);
        $query = "DELETE FROM cart WHERE id=$id AND confirmed=1";
        mysqli_query($dbc,$query)
          or die("No query");
        mysqli_close($dbc);
      }
    ?>
    <script>
      alert("Successfully Cancelled");
      window.location="checkorder.php";
    </script>
  </body>
</html>
