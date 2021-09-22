<!DOCTYPE html>
<html>
<head>
  <title>Database File Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/style6.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>-->
<link rel="shortcut icon" href="styles/CvSU/logo.ico">
<script src="styles/js/jquery-3.6.0.js"></script>

</style>
</head>
<body style="background-color:lightgray;">
<section>
    <center><header style="background-color:green;color:white;font-size: 30px;">Database File Manager</header></center>
    <button style="float: right;" id="myBtn">+ New Database</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>New Data</h2>
    </div>
    <div class="modal-body">
        <form action="filem.php" method="post">
        Data Year:
        <?php $goose=date("Y"); ?>
      <input type="number" min='2018' max="<?php echo $goose; ?>" name="f1" style="width:100%">
    </div>
    <div class="modal-footer">
        <div>
      <button class="loc" name="submit1">ADD</button>
    </div>
</div>
</form>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

   <div class="yb-php" style="background-color:lightgray;">
    <form action="" method="get">
     <?php
  $db=mysqli_connect('localhost','root','','yearbook');
  $goo= 2021;
         $user_check_query = "SELECT * FROM folder ORDER BY year";
         $result = mysqli_query($db, $user_check_query);

         while ($row = mysqli_fetch_array($result)){
            echo "<div class='container' style='float:left;'>";
            echo "<div class='imgBx' style='border:none;'>";
            echo '<a href="sample.php?call='.$row['year'].'"><img name="nooo" class="pic" src="styles/CvSU/db-icon.png"/></a>';

            echo "<div class='contentt'>";
            echo "<center>".$row['year'].".sql</center>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
      }
  ?>
</form>
   </div>
</section>
</body>
</html>

<?php
if (isset($_POST['submit1'])) {
    $db=mysqli_connect('localhost', 'root', '', 'yearbook');
    $yr= mysqli_real_escape_string($db, $_POST['f1']);

         $user_check_query = "SELECT * FROM folder where year='$yr' LIMIT 1";
         $result = mysqli_query($db, $user_check_query);
         $user = mysqli_fetch_assoc($result);
         if ($user) { // if user exists
    if ($user['year'] === $yr) {
              echo "<script>alert('Database already exist!'); window.location='filem.php';</script>";
         }
  }
         else{
            $adds="INSERT INTO folder (year) VALUES ('$yr')";
            mysqli_query($db, $adds);
            echo "<script>window.location='filem.php';</script>";
         }
}

?>
