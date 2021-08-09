<!--this is a admin-style branch-->

<?php
    session_start();

    if(!isset($_SESSION['User2']))
    {
      echo "<script>alert('You must login as Admin first.');window.location='logout.php';</script>";
    }
    isset($_SESSION['User2']);
    isset($_SESSION['Users2']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/style3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>-->
<link rel="shortcut icon" href="styles/CvSU/logo.ico">
<script src="styles/js/jquery-3.6.0.js"></script>
</head>
<body>
  <div class="sidenav" id="mySidenav">
    <header>
        <div><i class="fas fa-user"></i></div>
        <div>
          <h3><?php echo $_SESSION['User2'] ?></h3>
          <h3>Admin</h3>
      </div>
    </header>
  <ul class="sidenav">
    <li><a href="#adm-message">Message</a></li>
    <li><a style="background-color:blue;" href="tab2.php">Administrative Officers</a></li>
    <li><a href="tab3.php">Academic Affairs</a></li>
    <li><a href="tab8.php">Graduates</a></li>
    <li><a href="tab11.php">Milestones & Activities</a></li>
    <li><a href="Reg1.php">Registered Accounts</a></li>
    <li><a href="reg2.php">Request Accounts</a></li>
    <li><a href="logout2.php">logout</a></li>
  </ul>
  </div>

  <div class="adm-container">
        <section>
      <?php
      //just add form tag here to use the search function
      $db = mysqli_connect('localhost', 'root', '', 'yearbook');
      $year = date("Y");

        if(isset($_POST['search']) or isset($_POST['nam'])){
        $searchKey=$_POST['search'];
        $name= $_POST['nam'];

        $sql = "SELECT * from shs where lname LIKE '%$name%' AND year LIKE '%$searchKey%' ORDER BY lname, year";
        $result = mysqli_query($db,$sql);
        $rows = mysqli_num_rows($result);
      }else{
        $sql = "SELECT * from shs ORDER BY lname, year";
        $searchKey="";
        $name="";
      }
        $result = mysqli_query($db,$sql);
        $rows = mysqli_num_rows($result);
        ?>

      <div class="search-container">
        <form action="" method="post">
        <div class="input-container">
    <i class="fa icon">Search</i>
    <input class="input-field" type="text" placeholder="Username" name="nam"  value="<?php echo $name; ?>">
  </div>
  <div class="input-container">
    <i class="fa icon"><p>&nbsp;&nbsp;Year:&nbsp;</p></i>
    <input class="input-field" type="number" placeholder="Year" name="search" min="2018" max="<?php echo $year; ?>" value="<?php echo $searchKey; ?>">
  </div>
    <button type="submit" class="btn">Register</button>
  
      </form>
      
        <script type="text/javascript">
         window.addEventListener('keydown',function(e){
            if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){
            if(e.target.nodeName=='INPUT'&&e.target.type=='text'){
            e.preventDefault();return false;}}},true);
          </script>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <?php
      echo "<table>";
        echo "<tr>";
        echo "<th>Image</td>";
        echo "<th>first Name</td>";
        echo "<th>Middle Initial</td>";
        echo "<th>Last name</td>";
        echo "<th>Year</td>";
        echo "</tr>";
        echo "<tbody>";
        if (empty($rows)) {
          echo "<tr>";
          echo "<td>" . "N/A" . "</td>";
          echo "<td>" . "N/A" . "</td>";
          echo "<td>" . "N/A" . "</td>";
          echo "<td>" . "N/A" . "</td>";
          echo "<td>" . "N/A" . "</td>";
          echo "</tr>";
          }
          else{
          while($row = mysqli_fetch_array($result)){
          echo "<tr>";
          echo "<td>".'<img class="image-official" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"/>'."</td>";
          echo "<td>" . $row['fname'] . "</td>";
          echo "<td>" . $row['mname'] . "</td>";
          echo "<td>" . $row['lname'] . "</td>";
          echo "<td>" . $row['year'] . "</td>";
          echo "</tr>";
        }
      }
          echo "</tbody>";
          echo "</table>";
          echo "<br>";
        mysqli_close($db);
        ?>
    </section>


    </div>

  <script src="styles/js/admin.js"></script>
</body>
</html>
