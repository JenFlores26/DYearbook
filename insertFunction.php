<?php
  $sid = "1213";
  $email = "taylor@gmail.com";
  $pass = "justMe";
  $firstName = "Taylor Alison";
  $middleName = "R";
  $lastName = "Swift";
  $contact = "09";
  $userType = "Dummy";
  $year = "1989";

  $functionAtm = "insTab2";

  if($functionAtm == "insTab2"){
    InsertTAb($sid, $email, $pass, $firstName,$middleName,$lastName,$contact,$userType,$year);
  }

  function InsertTAb($id, $em, $pa, $fName, $mName, $lName, $userT, $y){
    include 'db_connect.php';

    $user_check_query = "INSERT INTO confirmed (Sid, email, password, fname, mname, lname, Contact, usertype, year)
    VALUES ( '$id','$em','$pa','$fName', '$mName', '$lName', '$userT', '$y')";
    $result = mysqli_query($db_connect, $user_check_query);
    if($result){
        echo "<script>alert('Added Successfully!');window.location='Regs.php';</script>";
    }else{
      echo "<script>alert('Not added!');window.location='Regs.php';</script>";
    }
  }
?>
