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
  <ul class="nav">
    <li><a class="active" href="#">Message</a></li>
    <li><a class="active" href="./Reg.php?page=adm_ao">Administrative Officers</a></li>
    <li><a class="active" href="./Reg.php?page=adm_affairs">Academic Affairs</a></li>
    <li><a class="active" href="./Reg.php?page=adm_graduates">Graduates</a></li>
    <li><a class="active" href="./Reg.php?page=adm_milestone">Milestones & Activities</a></li>
    <li><a class="active" href="./Reg.php?page=adm_reg_account">Registered Accounts</a></li>
    <li><a class="active" href="./Reg.php?page=adm_req_account">Request Accounts</a></li>
    <li><a href="logout2.php">logout</a></li>
  </ul>
  </div>


  <div class="adm-container">
    <section class="adm-section">
      <?php
      $page = isset($_GET['page']) ? $_GET['page'] : 'adm_AO';
      if(file_exists($page.".php")){
        include $page.'.php';
      }else{
        include '404.html';
      }
      ?>
    </section>
  </div>
</body>
<!--<script src="styles/js/admin.js"></script>-->
</html>
