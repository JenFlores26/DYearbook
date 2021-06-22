<?php
    session_start();

    if(!isset($_SESSION['User2']))
    {
      echo "<script>alert('You must login as Admin first.');window.location='logout.php';</script>";
    }
    isset($_SESSION['User2']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Request Accounts</title>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style3.css">
<link rel="stylesheet" type="text/css" href="style6.css">
<link rel="shortcut icon" href="CvSU/logo.ico">
<style>
  .topnav {
  overflow: hidden;
  width: 250%;
  background: none;
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
  float: right;
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
    float: none;
  }
 .topnav input[type=text], .topnav .search-container button {
    display: block;
    text-align: left;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}

.sidenav {
  width: 190px;
  position: fixed;
  z-index: 1;
  background: #0275d8;
  overflow-x: hidden;
  padding: 8px 0;
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
  padding: 15px 32px;
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
<form action="" method="post">
<div class="row">
  <div class="column" style="width:190px;">
<div id="mySidenav" class="sidenav">
  <p style="margin-left: 15px;margin-bottom: 0;color:white;"><strong> <?php echo $_SESSION['User2'] ?></strong><br>Admin<br>&nbsp;</p>
  <a href="#">Message</a>
  <a href="tab2.php">Administrative Officers</a>
  <a href="tab3.php">Academic Affairs</a>
  <a href="tab8.php">Graduates</a>
  <a href="tab11.php">Milestones & activities</a>
  <a href="Reg1.php">Registered Accounts</a>
  <a href="Reg2.php" class="active">Request Accounts</a>
  <a href="logout2.php">Logout</a>
</div>

</div>

<div class="column">

<div class="row">
        <?php 
        $db = mysqli_connect('localhost', 'root', '', 'yearbook');
        if(isset($_POST['Adds'])){
    header("Location: adEmail.php");
}
        $sql = "SELECT * from confirm";
        $result = mysqli_query($db,$sql);
        ?>
        <br>
        <br>
        </div>
        <table>
          <thead>
          <tr class="red">
            <th style="width:30px;"><center>School ID</center></th>
            <th style="width:30px;"><center>Email</center></th>
            <th style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; width:30px;"><center>Password</center></th>
            <th style="width:190px;"><center>First Name</center></th>
            <th style="width:190px;"><center>Middle Name</center></th>
            <th style="width:190px;"><center>Last Name</center></th>
            <th style="width:190px;"><center>Batch Year</center></th>
            <th style="width:190px;"><center>Contact No.</center></th>
            <th style="width:190px;"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($result)){ 
          echo "<tr>";
          echo "<td>" . $row['Sid'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td style='white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width:30px;'>" . $row['password'] . "</td>";
          echo "<td>" . $row['fname'] . "</td>";
          echo "<td>" . $row['mname'] . "</td>";
          echo "<td>" . $row['lname'] . "</td>";
          echo "<td>" . $row['year'] . "</td>";
          echo "<td>" . $row['Contact'] . "</td>";
          echo "<td align='center'>
                  <button class='button2' style='border:1px solid;width:30px;'>
                <a class='delbtn' style='text-decoration:none; color:white;' href ='registarFunction.php?editan=".$row['id']."'>&#10004;</a>
                  </button>
                  <button class='button3' style='border:1px solid;width:30px;'>
                <a class='delbtn' style='text-decoration:none; color:white;' href='registarFunction.php?emailan=".$row['email']."'>&#128465;</a>
                  </button>
                </td>";
          echo "</tr>";
}
echo "</tbody>";
echo "</table>";
mysqli_close($db);
?>
      </div>
    </div>
</form>
</body>
</html> 