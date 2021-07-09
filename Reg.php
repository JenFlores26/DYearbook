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
<link rel="stylesheet" type="text/css" href="styles/sample.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</script>
<link rel="shortcut icon" href="styles/CvSU/logo.ico">
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
  <ul>
    <li><a href="#adm-message">Message</a></li>
    <li><a href="#adm-ao">Administrative Officers</a></li>
    <li><a href="tab3.php">Academic Affairs</a></li>
    <li><a href="tab8.php">Graduates</a></li>
    <li><a href="tab11.php">Milestones & Activities</a></li>
    <li><a href="Reg1.php">Registered Accounts</a></li>
    <li><a href="Reg2.php">Request Accounts</a></li>
    <li><a href="logout2">logout</a></li>
  </ul>
  </div>

  <div class="adm-container">
    <section class="adm-message" id="adm-message">
      <?php
      $db = mysqli_connect('localhost', 'root', '', 'yearbook');

      if(isset($_POST['search'])){
      $searchKey=$_POST['search'];
      $sql = "SELECT * from tab2 where lname LIKE '%$searchKey%' or fname LIKE '%$searchKey%' or mname LIKE '%$searchKey%' ORDER BY lname, year";
      $result = mysqli_query($db,$sql);
      }else{
      $sql = "SELECT * from tab2 ORDER BY lname, year";
      $searchKey="";
      }
      $result = mysqli_query($db,$sql);
      ?>

      <div class="search-container">
          <input type="text" placeholder="Search.." name="search" value="<?php echo $searchKey; ?>">
          <button type="button1" style="font-size: 14.5px;background-color:#0275d8;">&#128269;</button>
          <script type="text/javascript">
          window.addEventListener('keydown',function(e){
            if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){
            if(e.target.nodeName=='INPUT'&&e.target.type=='text'){
            e.preventDefault();return false;}}},true);
          </script>
      </div>

      <table>
        <thead>
          <tr class="red">
            <th style="width:30px;"><center>Image</center></th>
            <th style="width:190px;"><center>First Name</center></th>
            <th style="width:190px;"><center>Middle Initial</center></th>
            <th style="width:190px;"><center>Last Name</center></th>
            <th style="width:190px;"><center>Position</center></th>
            <th style="width:190px;"><center>Year</center></th>
          </tr>
        </thead>
      <tbody>
        <?php
        while($row = mysqli_fetch_array($result)){
        echo "<tr style='width: 100%;'>";
        echo "<td style='width:40px;' align='center'>".'<img class="imahe" style="width:80px; height:100px;" src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'"/>'."</td>";
        echo "<td style='width:150px;'>" . $row['fname'] . "</td>";
        echo "<td style='width:150px;'>" . $row['mname'] . "</td>";
        echo "<td style='width:150px;'>" . $row['lname'] . "</td>";
        echo "<td style='width:250px;'>" . $row['position'] . "</td>";
        echo "<td align='center' style='width:40px;'>" . $row['year'] . "</td>";
        echo "</tr>";
        }
        mysqli_close($db);
        ?>
      </table>
    </section>
    <section id="adm-ao">

    </section>
  </div>
</body>
</html>
