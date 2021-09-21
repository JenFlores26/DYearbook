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
<style>
.alert {
  padding: 20px;
  background-color: #green;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
.loc{
    float: right;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 40%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  height: 30px;
  background-color: #5cb85c;
  color: white;
}

.topnav {
 display: inline-block;
    margin: 0 auto;
    width: 100%;
    max-width: 100%;
    box-shadow: none;
    background-color:#3a4af8;
    position: fixed;
    height: 53px!important;
    z-index: 10;
    opacity: 95%;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  opacity: 100%;
}

.active {
  background-color: darkcyan;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: white;
  color: black;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.pic{
  width: 200px;
  height: 250px;
}
.picbig{
  position: absolute;
  width:0px;
  -webkit-transform: translate(-84%, -27%);
  transform: translate(-84%, -27%);
  z-index:1;
}
.pic:hover + .picbig{
  width:280px;
  height:350px;
}
/* Media */
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

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
