<!--this is admin-style branch-->
<?php
    session_start();

    if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='logout.php';</script>";
    }
    isset($_SESSION['User']);

    $page = isset($_GET['page']) ? $_GET['page'] : 'reg_AO';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrar Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/style4.css">
  <link rel="stylesheet" type="text/css" href="styles/style5.css">
  <link rel="stylesheet" type="text/css" href="styles/style6.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="shortcut icon" href="styles/CvSU/logo.ico">
<script src="styles/js/jquery-3.6.0.js"></script>
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
      <li class="<?php if($page == 'message'){echo 'active';}?>"><a href="./Regs.php?page=message">Message</a></li>
      <li class="<?php if($page == 'yearbooks'){echo 'active';}?>"><a href="./Regs.php?page=yearbooks">Yearbooks</a></li>
      <li class="<?php if($page == 'reg_ao'){echo 'active';}?>"><a href="./Regs.php?page=reg_ao">Administrative Officers</a></li>
      <li class="<?php if($page == 'reg_af'){echo 'active';}?>"><a href="./Regs.php?page=reg_af">Academic Affairs</a></li>
      <li class="<?php if($page == 'reg_grad'){echo 'active';}?>"><a href="./Regs.php?page=reg_grad">Graduates</a></li>
      <li class="<?php if($page == 'milestones'){echo 'active';}?>"><a href="./Regs.php?page=milestones">Milestones & Activities</a></li>
      <li><a href="logout2.php">logout</a></li>
    </ul>
  </div>
  <div class="reg-container">
    <section class="reg-section">
      <?php
      if(file_exists($page.".php")){
        include $page.'.php';
      }else{
        include '404.html';
      }
      ?>
    </section>
  </div>
  <!--<script src="styles/js/reg.js"></script>-->
  <script src="styles/js/form.js"></script>
  <script src="styles/js/yearbook.js"></script>
</body>
</html>
