<?php
  include 'db_connect.php';
  if(isset($_POST["submit1"])){
  $image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
  $firstName = $_POST['Fname'];
  $midName = $_POST['Mname'];
  $lastName = $_POST['Lname'];
  $course = $_POST['position'];
  $year = $_POST['year'];

  $user_check_query = "INSERT INTO tab2 (image1, fname, mname, lname, position, year) VALUES ('$image', '$firstName', '$midName', '$lastName', '$course', '$year')";
  $result = mysqli_query($db_connect, $user_check_query);
  if($result){
      echo "<script>alert('Added Successfully!');window.location='Regs.php';</script>";
  }else{
    echo "<script>alert('Not added!');window.location='Regs.php';</script>";
  }
  }
  //submit2//
  if(isset($_POST["submit2"])){
  $image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
  $firstName = $_POST['Fname'];
  $midName = $_POST['Mname'];
  $lastName = $_POST['Lname'];
  $course = $_POST['position'];
  $year = $_POST['year'];

  $user_check_query = "INSERT INTO tab3 (image1, fname, mname, lname, position, year) VALUES ('$image', '$firstName', '$midName', '$lastName', '$course', '$year')";
  $result = mysqli_query($db_connect, $user_check_query);
  if($result){
      echo "<script>alert('Added Successfully!');window.location='Regs.php';</script>";
  }else{
    echo "<script>alert('Not added!');window.location='Regs.php';</script>";
  }
  }
  //submit3//
  if(isset($_POST["submit3"])){
  $image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
  $firstName = $_POST['Fname'];
  $midName = $_POST['Mname'];
  $lastName = $_POST['Lname'];
  $year = $_POST['year'];

  $user_check_query = "INSERT INTO shs (image, fname, mname, lname, year) VALUES ('$image', '$firstName', '$midName', '$lastName', '$year')";
  $result = mysqli_query($db_connect, $user_check_query);
  if($result){
      echo "<script>alert('Added Successfully!');window.location='Regs.php';</script>";
  }else{
    echo "<script>alert('Not added!');window.location='Regs.php';</script>";
  }
  }
  //submit4//
  if(isset($_POST["submit4"])){
  $image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
  $year = $_POST['year'];

  $user_check_query = "INSERT INTO tab11 (image1, year) VALUES ('$image','$year')";
  $result = mysqli_query($db_connect, $user_check_query);
  if($result){
      echo "<script>alert('Added Successfully!');window.location='Regs.php';</script>";
  }else{
    echo "<script>alert('Not added!');window.location='Regs.php';</script>";
  }
  }
  //yearbook-tab adding year //
  if (isset($_POST['submitYear'])) {
      $yr= mysqli_real_escape_string($db_connect, $_POST['f1']);
      $user_check_query = "SELECT * FROM folder where year='$yr' LIMIT 1";
      $result = mysqli_query($db_connect, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      if($user){ // if user exists
        if ($user['year'] === $yr) {
              echo "<script>alert('Yearbook already exist!'); window.location='Regs.php';</script>";
        }
      }
      else{
        $adds="INSERT INTO folder (year) VALUES ('$yr')";
        mysqli_query($db_connect, $adds);
        echo "<script>window.location='Regs.php';</script>";
      }
    }
?>
