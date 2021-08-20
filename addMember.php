<link rel="stylesheet" href="styles/style5.css">
<div class="addMember">
  <header>
    <h2>Add Member</h2>
  </header>
  <form class="" action="" method="post">

      <div class="input-group">
        <p>Select Image</p>
        <input type="file" name="f1" required>
      </div>

      <div class="input-group">
        <p>First Name</p>
        <input type="text" name="Fname" required>
      </div>

      <div class="input-group">
        <p>Middle Initial</p>
        <input type="text" name="Mname" required>
      </div>

      <div class="input-group">
        <p>Last Name</p>
        <input type="text" name="Lname" required>
      </div>

      <div class="input-group">
        <p>Position</p>
        <input type="text" name="position" required>
      </div>

      <div class="input-group">
        <p>Year</p>
        <input type="text" name="year" required>
      </div>

      <div class="input-group">
        <button type="submit" name="button" value="add">ADD</button>
        <button type="submit" name="button" value="cancel">CANCEL</button>
      </div>
  </form>
</div>
<?php
  include 'db_connect.php';
  if(isset($_POST["submit"])){
    $image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
    $firstName = $_POST['Fname'];
    $middleName = $_POST['Mname'];
    $lastName = $_POST['Lname'];
    $position = $_POST['position'];
    $year = $_POST['year'];

    $insert_query = "INSERT INTO tab3 (image1, fname, mname, lname,postion,year) VALUES ('$image', '$firstName', '$middlename', '$lastName', '$position', '$year')";
    $result = mysqli_query($db_connect, $insert_query);
    echo "<script>alert('Added Successfully!');</script>";
  }
?>
