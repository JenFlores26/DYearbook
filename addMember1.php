<div class="addMember">
    <form action="" method="post"  enctype="multipart/form-data">
        <h2>Add Member</h2>

        <div class="inputField">
        <p>Select Image</p>
        <input type="file" name="file1" required>

        <p>Firstname</p>
        <input type="text" name="firstname"required><br>

        <p>Middle Initial</p>
        <input type="text" name="middlename" maxlength="4" required><br>

        <p>Lastname</p>
        <input type="text" name="lastname"required><br>

        <p>Position</p>
        <input type="text" name="Position"required><br>

        <p>Year</p>
        <input type="text" name="Year" maxlength="4" required><br>

        <button class="button button1" type="submit" name="submit2" >ADD</button>
        <!--<input type="submit" name="submit1" class="button button1" value="Add">-->
        <button class="cancel-btn button">CANCEL</button>
      </div>
    </form>
</div>
<?php

  if(isset($_POST["submit2"])){
  $image1 = addslashes(file_get_contents($_FILES['file1']['tmp_name']));
  $firstName1 = $_POST['firstname'];
  $midName1 = $_POST['middlename'];
  $lastName1 = $_POST['lastname'];
  $course1 = $_POST['Position'];
  $year1 = $_POST['Year'];

  $user_check_query1 = "INSERT INTO tab3 (image1, fname, mname, lname, position, year) VALUES ('$image', '$firstName', '$midName', '$lastName', '$course', '$year')";
  $result1 = mysqli_query($db_connect, $user_check_query1);
  if($result1){
      echo "<script>alert('Added Successfully!');window.location='Regs.php';</script>";
  }else{
    echo "<script>alert('Not added!');window.location='Regs.php';</script>";
  }
  }
?>
