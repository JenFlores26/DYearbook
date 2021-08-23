<!--<link rel="stylesheet" href="styles/style5.css">
<div class="addMember">
  <form action="" method="post" enctype="multipart/form-data">
        <h2>Add Member</h2>
      <div>
        <p>Select Image</p>
        <input type="file" name="fileOne" required>
      </div>

      <div>
        <p>First Name</p>
        <input type="text" name="insertFN" required>
      </div>

      <div>
        <p>Middle Initial</p>
        <input type="text" maxlength="4" name="insertMN" required>
      </div>

      <div>
        <p>Last Name</p>
        <input type="text" name="insertLN" required>
      </div>

      <div >
        <p>Position</p>
        <input type="text" name="insertPosition" required>
      </div>

      <div>
        <p>Year</p>
        <input type="text" maxlength="4" name="insertYear" required>
      </div>

      <div>
        <button class="button" type="submit" name="submitButton" value="add">ADD</button>
        <input type="submit" name="submitButton" class="button button1" value="Add">
        <button class="cancel-btn button">CANCEL</button>
      </div>
  </form>
  <?php /*
    $db=mysqli_connect('localhost','root','','yearbook');
    if(isset($_POST["submitButton"])){
      $imageInsert = addslashes(file_get_contents($_FILES['fileOne']['tmp_name']));
      $firstNameInsert = $_POST['insertFN'];
      $middleNameInsert = $_POST['insertMN'];
      $lastNameInsert = $_POST['insertLN'];
      $positionInsert = $_POST['insertPositIon'];
      $yearInsert = $_POST['insertYear'];

      $insertQuery = "INSERT INTO tab2 (image1, fname, mname, lname, postion, year) VALUES ('$imageInsert', '$firstNameInsert', '$middleNameInsert', '$lastNameInsert', '$positionInsert', '$yearInsert')";
      $result_insert = mysqli_query($db, $insertQuery);
      if($result_insert){
        echo "<script>alert('Added Successfully!');</script>";
      }else{
        echo "<script>alert('NOT ADDED!');</script>";
      }
    }
  */
 ?>
</div> -->

<link rel="stylesheet" href="styles/style5.css">
<div class="addMember">
    <form action="" method="post"  enctype="multipart/form-data">
        <h2>Add Member</h2>

        <div>
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
