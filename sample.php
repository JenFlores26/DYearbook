<?php
    session_start();

    if(!isset($_SESSION['User2']))
    {
      echo "<script>alert('You must login as Admin first.');window.location='logout2.php';</script>";
    }
    isset($_SESSION['User2']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Administrative Officers</title>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/style3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="shortcut icon" href="styles/CvSU/logo.ico">
<style>
  .topnav {
  width: 250%;
  background: none;
  position: relative;
}


.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  margin-bottom:8px;
  margin-left: 80px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: right;
  }
 .topnav input[type=text], .topnav .search-container button {
    display: block;
    text-align: left;
    margin: 0;
    padding: 14px;
    float: right;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;
  }
}


.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 15px;
  color: white;
  display: block;
}

.search-container {
  float: right;
}
.active {
  background-color: #020cbd;
  color: white;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
  .button {
  border-radius: 25px;
  border:none;
  color: white;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  color: black;

}
.button1 {background: linear-gradient(to right, lightblue, lightblue);}
.button2 {background: linear-gradient(to right, green, green);} /* Green */
.button3 {background: linear-gradient(to right, red, red);} /* Blue */
}
</style>
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
    <li><a href="sample.php">Message</a></li>
    <li><a href="tab2.php">Administrative Officers</a></li>
    <li><a href="tab3.php">Academic Affairs</a></li>
    <li><a href="tab8.php">Graduates</a></li>
    <li><a href="tab11.php">Milestones & Activities</a></li>
    <li><a href="Reg1.php">Registered Accounts</a></li>
    <li><a href="Reg2.php">Request Accounts</a></li>
    <li><a href="logout2">logout</a></li>
  </ul>
  </div>
<div class="column">
<div class="row">
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
         <div class="topnav">
  <div class="search-container">
    <form>
      <input type="text" placeholder="Search.." name="search" value="<?php echo $searchKey; ?>">
      <button type="button1" style="font-size: 14.5px;background-color:#0275d8;">&#128269;</button>
      <script type="text/javascript">
window.addEventListener('keydown',function(e){
  if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){
    if(e.target.nodeName=='INPUT'&&e.target.type=='text'){
      e.preventDefault();return false;}}},true);
</script>
    </form>
  </div>
  </div>
        <br>
        <br>
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
          <?php while($row = mysqli_fetch_array($result)){
          echo "<tr style='width: 100%;'>";
          echo "<td style='width:40px;' align='center'>".'<img class="imahe" style="width:80px; height:100px;" src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'"/>'."</td>";
          echo "<td style='width:150px;'>" . $row['fname'] . "</td>";
          echo "<td style='width:150px;'>" . $row['mname'] . "</td>";
          echo "<td style='width:150px;'>" . $row['lname'] . "</td>";
          echo "<td style='width:250px;'>" . $row['position'] . "</td>";
          echo "<td align='center' style='width:40px;'>" . $row['year'] . "</td>";
          echo "</tr>";
}
echo "</body>";
echo "</table>";
mysqli_close($db);
?>
      </div>
</body>
</html>
