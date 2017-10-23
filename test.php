<?php
session_start();
if(empty($_SESSION["pname"]))
{
  header('Location: login.php');
}
require 'databaseInclude.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pname = $_SESSION["pname"];
  $type = $_POST["type"];
  $type1 = "venue";
  $type2 = "caterer";
  $type3 = "decorator";
  if ($type == $type1) {
    $company = $_POST["name"];
    $address = $_POST["address"];
    $landmark = $_POST["landmark"];
    $contact1  = $_POST["contact1"];
    $contact2 = $_POST["contact2"];

    $query = "INSERT INTO venue (uname,name,address,landmark,contact1,contact2) VALUES ('$pname','$company','$address','$landmark','$contact1','$contact2');";
  }
  elseif ($type == $type2) {
    $company = $_POST["name"];
    $address = $_POST["address"];
    $contact1  = $_POST["contact1"];
    $contact2 = $_POST["contact2"];
    $query = "INSERT INTO caterer (uname,name,address,contact1,contact2) VALUES ('$pname','$company','$address','$contact1','$contact2');";
  }
  elseif ($type == $type3) {
    $company = $_POST["name"];
    $address = $_POST["address"];
    $contact1  = $_POST["contact1"];
    $contact2 = $_POST["contact2"];
    $query = "INSERT INTO decorator (uname,name,address,contact1,contact2) VALUES ('$pname','$company','$address','$contact1','$contact2');";
  }

  $dbc = mysqli_connect(db_host,db_user,"",db_name)
      or die("no database");
  mysqli_query($dbc,$query)
    or die("no query");
  mysqli_close($dbc);
}
?>

<html>
     <head>
         <title>Sign-Up</title>
         <link rel="stylesheet" type="text/css" href="addservices.css">
         <link rel="stylesheet" type="text/css" href="loginheader.css">
        <script>
        function venueSelect(){
            document.getElementById("venue").style.display = "block";
            document.getElementById("caterer").style.display = "none"
            document.getElementById("decorator").style.display = "none"
            document.getElementById("venueButton").style.backgroundColor = "green";
            document.getElementById("catererButton").style.backgroundColor = "white";
            document.getElementById("decoratorButton").style.backgroundColor = "white"
        }
        function catererSelect(){
            document.getElementById("venue").style.display = "none";
            document.getElementById("caterer").style.display = "block"
            document.getElementById("decorator").style.display = "none"
            document.getElementById("venueButton").style.backgroundColor = "white";
            document.getElementById("catererButton").style.backgroundColor = "green";
            document.getElementById("decoratorButton").style.backgroundColor = "white";
        }
        function decoratorSelect(){
            document.getElementById("venue").style.display = "none";
            document.getElementById("caterer").style.display = "none"
            document.getElementById("decorator").style.display = "block"
            document.getElementById("venueButton").style.backgroundColor = "white";
            document.getElementById("decoratorButton").style.backgroundColor = "green";
            document.getElementById("catererButton").style.backgroundColor = "white";
        }
        </script>
     </head>
     <body>

       <div class="addservice-form">
         <div class="addservice-inside-form">
           <form>
             <input type="button" id="venueButton" name="venue" value="Venue" onclick="venueSelect()">
             <input type="button" id="catererButton" name="caterer" value="Caterer" onclick="catererSelect()">
             <input type="button" id="decoratorButton" name="decorator" value="Decorator" onclick="decoratorSelect()"><br/><br/>
           </form>
             <div id="venue" style="display:none;">
             <form name="addservicevenue" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
               <input type="hidden" name="type" value="venue">
               <input type="text" name="name" placeholder="Service Company Name"><br/><br/>
               <input type="text" name="address" placeholder="Address"><br/><br/>
               <input type="text" name="landmark" placeholder="Landmark"><br/><br/>
               <input type="number" name="contact1" placeholder="Contact"><br/><br/>
               <input type="number" name="contact2" placeholder="Contact"><br/><br/>
               <input type="submit" name="submit" Value="Submit">
             </form>
             </div>
             <div id="caterer" style="display:none;">
               <form name="addservicecaterer" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
               <input type="hidden" name="type" value="caterer">
               <input type="text" name="name" placeholder="Service Company Name"><br/><br/>
               <input type="text" name="address" placeholder="Address"><br/><br/>
               <input type="number" name="contact1" placeholder="Contact"><br/><br/>
               <input type="number" name="contact2" placeholder="Contact"><br/><br/>
               <input type="submit" name="submit" Value="Submit">
             </form>
             </div>
             <div id="decorator" style="display:none;">
               <form name="addservicedecorator" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
               <input type="hidden" name="type" value="decorator">
               <input type="text" name="name" placeholder="Service Company Name"><br/><br/>
               <input type="text" name="address" placeholder="Address"><br/><br/>
               <input type="number" name="contact1" placeholder="Contact"><br/><br/>
               <input type="number" name="contact2" placeholder="Contact"><br/><br/>
               <input type="submit" name="submit" Value="Submit">
             </form>
             </div>
        </body>
        </html>




        $query1 = "SELECT * FROM cart WHERE vdcid=$id AND type='$type' AND confirmed=1";
        $result1 = mysqli_query($dbc,$query1)
          or die("No Query");
        if(mysqli_num_rows($result1) > 0) {
          while ($row1 = mysqli_fetch_array($result1)) {
            if ($eventdate == $row1['eventdate']) {
              ?>
              <script>
                alert("Date Not Available");
              </script>
              <?php
                if ($type == 'venue') {
                  ?>
                  <script>
                    window.location="venue.php";
                  </script>
                  <?php
                }
                elseif ($type == 'caterer') {
                  ?>
                  <script>
                    window.location="caterer.php";
                  </script>
                  <?php
                }
                elseif ($type == 'decorator') {
                  ?>
                  <script>
                    window.location="decorator.php";
                  </script>
                  <?php
                }
            }
          }
        }
