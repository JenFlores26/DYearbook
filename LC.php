<?php 
 include ('server.php');
if(isset($_SESSION['User'])) {
     header("Location: Regs.php"); // redirects them to homepage
     exit; // for good measure
}
if(isset($_SESSION['User2'])) {
     header("Location: Reg.php"); // redirects them to homepage
     exit; // for good measure
}
if(isset($_SESSION['User3'])) {
     header("Location: StudentDashboard.php"); // redirects them to homepage
     exit; // for good measure
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" href="style2.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="CvSU/logo.ico">
<style>
  body{
    background-image: url("CvSU/quad.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  }
  .header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #3a4af8;
  text-align: center;
  border: 1px solid #3a4af8;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
  .button {
  border-radius: 5px;
  border:none;
  color: white;
  height: 40px;
  width: 98.5%;
  padding: 10px 10px;
  text-align: center;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;

}

.button1 {background: linear-gradient(to right, #5bc0de, #5bc0de);}/* Green */
.button2 {background: linear-gradient(to right, #9C27B0, #E040FB);} /* Blue */
}
</style>

</head>
<body>
  <div class="header">
    <h2>Login</h2>
  </div>
   
  <form method="post" action="LC.php">
    <?php include('errors.php') ?>
    <div class="input-group">
      <input type="text" name="username" placeholder="School ID No." value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <input type="password" name="password" placeholder="Password" id="myInput"><br>
    </div>
    <div style="font-size: 15px;">
      <input type="checkbox" onclick="myFunc()" style="width:20px;">Show Password
    </div><br>
    <div class="g-recaptcha" data-sitekey="6LcM5gAbAAAAAMU0nZe9hU6aVXHm6sXCJ4CcAU4j" align="center"></div>
    <div class="input-group">
      <button class="button button1" name="lc">Login</button>
      <p style="font-size: 15px;">
        Not yet a member? Register <a href="register.php">here.</a>
      </p>
    </div>
  </form>
</body>
</html>

<script>
function myFunc() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>