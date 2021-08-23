
<div>
    <div class="header">
    <h2>Add Member</h2>
  </div>
    <form action="" method="post"  enctype="multipart/form-data">
        <div class="card">
            <div class="container">
        <div class="input-group" align="center">

            <p align="left">&nbsp;Select Image</p>
      <input type="file" name="f1" required><br>
      <p align="left">&nbsp;Firstname</p>
      <input type="text" name="Fname"required><br>
      <p align="left">&nbsp;Middle Initial</p>
      <input type="text" name="Mname" maxlength="4" required><br>
      <p align="left">&nbsp;Lastname</p>
      <input type="text" name="Lname"required><br>
      <p align="left">&nbsp;Position</p>
      <input type="text" name="position"required><br>
      <p align="left">&nbsp;Year</p>
      <input type="text" name="year" maxlength="4" required><br>
      <input type="submit" name="submit1" class="button button1" value="Add">
            </div>
            </div>
            </form>
</div>
<?php
$db=mysqli_connect('localhost','root','','yearbook');

if(isset($_POST["submit1"])){
$image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
$firstName = $_POST['Fname'];
$midName = $_POST['Mname'];
$lastName = $_POST['Lname'];
$course = $_POST['position'];
$year = $_POST['year'];

$user_check_query = "INSERT INTO tab3 (image1, fname, mname, lname, position, year) VALUES ('$image', '$firstName', '$midName', '$lastName', '$course', '$year')";
$result = mysqli_query($db, $user_check_query);
echo "<script>alert('Added Successfully!');window.location='tab3.php';</script>";
}
?>
