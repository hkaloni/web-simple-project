<html>
  <body>
    <?php
      session_start();
      require 'redirect.php';
      require 'databaseInclude.php';
      $flag = 0;
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $dbc = mysqli_connect(db_host,db_user,"",db_name);
        $query1 = "SELECT * FROM cart WHERE id=$id AND confirmed=1";
        $result = mysqli_query($dbc,$query1)
              or die("No query");
        $row = mysqli_fetch_array($result);
        $date1 = date_create(date("Y-m-d"));
        $date2 = date_create($row['eventdate']);
        $diff = date_diff($date1,$date2);
        $diff_formatted = $diff->format("%R%a");
        if ($diff_formatted > 7) {
          $query = "DELETE FROM cart WHERE id=$id AND confirmed=1";
          mysqli_query($dbc,$query)
            or die("No query");
          $flag = 1;
        }
        else {
          ?>
          <script>
            var con = confirm("No refund on cancellation");
          </script>
          <?php
          $con = "<script>document.write(con);</script>";
          if ($con == true) {
            $query = "DELETE FROM cart WHERE id=$id AND confirmed=1";
            mysqli_query($dbc,$query)
              or die("No query");
            $flag = 1;
          }
        }
        mysqli_close($dbc);
      }

      if ($flag == 1){?>
    <script>
      alert("Successfully Cancelled");
    </script>
    <?php }
      else {?>
        <script>
          alert("Not Cancelled");
        </script>
      <?php } ?>
      <script>
      window.location="checkorder.php";
      </script>
  </body>
</html>
