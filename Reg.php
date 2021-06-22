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
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style3.css">
<link rel="shortcut icon" href="CvSU/logo.ico">
<style>
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

.button1 {background: linear-gradient(to right, yellow, yellow);} /* Green */
.button2 {background: linear-gradient(to right, #9C27B0, #E040FB);} /* Blue */
}
</style>
</head>
<body>
<form action="scripts.php" method="post">
<div class="row">
  <div class="column" style="width:190px;">
<div id="mySidenav" class="sidenav">
  <p style="margin-left: 15px;margin-bottom: 0;color:white;">ID: <strong> <?php echo $_SESSION['User2'] ?></strong><br>Admin<br><strong><?php echo $_SESSION['Users2'] ?></strong><br></p>
  <a href="#">Message</a>
  <a href="tab2.php">Administrative Officers</a>
  <a href="tab3.php">Academic Affairs</a>
  <a href="tab8.php">Graduates</a>
  <a href="tab11.php">Milestones & activities</a>
  <a href="Reg1.php">Registered Accounts</a>
  <a href="Reg2.php">Request Accounts</a>
  <a href="logout2.php">Logout</a>
</div>

</div>
</div>
</form>
</body>
</html> 
