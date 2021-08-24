<div class="addMember">
    <form action="" method="post"  enctype="multipart/form-data">
        <h2>Add Member</h2>

        <div class="inputField">
        <p>Select Image</p>
        <input type="file" name="f1" required>

        <p>Firstname</p>
        <input type="text" name="Fname"required><br>

        <p>Middle Initial</p>
        <input type="text" name="Mname" maxlength="4" required><br>

        <p>Lastname</p>
        <input type="text" name="Lname"required><br>

        <p>Position</p>
        <input type="text" name="position"required><br>

        <p>Year</p>
        <input type="text" name="year" maxlength="4" required><br>

        <button class="button button1" type="submit" name="submit1" >ADD</button>
        <!--<input type="submit" name="submit1" class="button button1" value="Add">-->
        <button class="cancel-btn button">CANCEL</button>
      </div>
    </form>
</div>
<?php
  include 'db_connect.php';

  if(isset($_POST["submit1"])){
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
?>
