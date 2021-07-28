<!--this is admin-style branch-->
<?php
    session_start();

    if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='logout.php';</script>";
    }
    isset($_SESSION['User']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrar Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/style4.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="shortcut icon" href="styles/CvSU/logo.ico">
</head>
<body>
  <div class="sidenav" id="mySidenav">
    <header>
      <div><i class="fas fa-user"></i></div>
      <div>
        <h3><?php echo $_SESSION['User'] ?></h3>
        <h3>Registrar</h3>
      </div>
    </header>
    <ul class="nav">
      <li><a class="active" href="#reg-message">Message</a></li>
      <li><a class="active" href="#reg-ao">Administrative Officers</a></li>
      <li><a class="active" href="#reg-affairs">Academic Affairs</a></li>
      <li><a class="active" href="#gradutes">Graduates</a></li>
      <li><a class="active" href="#reg-milestones-activities">Milestones & Activities</a></li>
      <li><a href="logout2.php">logout</a></li>
    </ul>
  </div>
  <div class="reg-container">
    <section class="reg-section" id="reg-message">

    </section>
    <section class="reg-section" id="reg-ao">
      <form>
      <?php
      //just add form tag here to use the search function
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
      <form action="" method="post"  enctype="multipart/form-data">
        <div class="search-container">
            <div>
                <input type="text" placeholder="Search.." name="search" value="<?php echo $searchKey; ?>">
                <button type="submit" name="search"><!--<i class="fas fa-search">--></i></button>
            </div>
          <script type="text/javascript">
           window.addEventListener('keydown',function(e){
              if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){
              if(e.target.nodeName=='INPUT'&&e.target.type=='text'){
              e.preventDefault();return false;}}},true);
            </script>
        </div>
      </form>

      <table>
        <tbody>
        <tr>
            <th>Image</th>
            <th>First Name</th>
            <th>Middle Initial</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>Year</th>
            <th>Action</th>
        </tr>

        <?php
        while($row = mysqli_fetch_array($result)){
        echo "<tr class='main'>";
        echo "<td>".'<img class="image-official" src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'"/>'."</td>";
        echo "<td>" . $row['fname'] . "</td>";
        echo "<td>" . $row['mname'] . "</td>";
        echo "<td>" . $row['lname'] . "</td>";
        echo "<td>" . $row['position'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        //Action button
        echo "<td>
                  <button class='button2'>
                    <a href ='registarFunctions.php?edit2=".$row['id']."'>&#9998;</a>
                  </button>
                  <button class='button3'>
                <a class='delbtn'  href='registarFunctions.php?email2=".$row['fname']."'>&#128465;</a>
                  </button>
                  </td>";
        echo "</tr>";
        }
        mysqli_close($db);
        ?>
      </table>
    </section>
    <section class="reg-section" id="reg-affairs">

    </section>
    <section class="reg-section" id="graduates">

    </section>
    <section class="reg-section" id="reg-milestones-activities">

    </section>
  </div>
  <script src="styles/js/jquery-3.6.0.js"></script>
  <script src="styles/js/reg.js"></script>
</body>
</html>
