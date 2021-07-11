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
    <li class="active"><a href="#adm-message">Message</a></li>
    <li class="active"><a href="#adm-ao">Administrative Officers</a></li>
    <li class="active"><a href="tab3.php">Academic Affairs</a></li>
    <li class="active"><a href="tab8.php">Graduates</a></li>
    <li class="active"><a href="tab11.php">Milestones & Activities</a></li>
    <li class="active"><a href="Reg1.php">Registered Accounts</a></li>
    <li class="active"><a href="Reg2.php">Request Accounts</a></li>
    <li><a href="logout2">logout</a></li>
  </ul>
  <script src="https://code/jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript">
    $(document).on('click','ul li',function(){
      $this.addClass('active').siblings().removeClass('active')
    }));
  </script>
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
        <div>
            <input type="text" placeholder="Search.." name="search" value="<?php echo $searchKey; ?>">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
        </form>
        <script type="text/javascript">
         window.addEventListener('keydown',function(e){
            if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){
            if(e.target.nodeName=='INPUT'&&e.target.type=='text'){
            e.preventDefault();return false;}}},true);
          </script>
      </div>

      <table>
        <tbody>
        <tr>
            <th>Image</th>
            <th>First Name</th>
            <th>Middle Initial</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>Year</th>
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
        echo "</tr>";
        }
        mysqli_close($db);
        ?>
      </table>
    </section>
    <section id="adm-ao">
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

      <div class="search-container">
        <div>
            <input type="text" placeholder="Search.." name="search" value="<?php echo $searchKey; ?>">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
        </form>
        <script type="text/javascript">
         window.addEventListener('keydown',function(e){
            if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){
            if(e.target.nodeName=='INPUT'&&e.target.type=='text'){
            e.preventDefault();return false;}}},true);
          </script>
      </div>

      <table>
        <tbody>
        <tr>
            <th>Image</th>
            <th>First Name</th>
            <th>Middle Initial</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>Year</th>
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
        echo "</tr>";
        }
        mysqli_close($db);
        ?>
      </table>
    </section>
  </div>
</body>
</html>
