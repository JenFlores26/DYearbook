<?php
//just add form tag here to use the search function
$db = mysqli_connect('localhost', 'root', '', 'yearbook');
$sql = "SELECT * from confirmed WHERE usertype='Student'";
$result = mysqli_query($db,$sql);
?>

<div class="search-container">
  <div>
      <input type="text" placeholder="Search.." name="search" value="<?php echo $searchKey; ?>">
      <button type="submit"><i class="fas fa-search"></i></button>
  </div>
  </form>
  <script type="text/javascript">
   window.addEventListener('keydown',function(e){
      if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){
      if(e.target.nodeName=='INPUT'&&e.target.type=='text'){
      e.preventDefault();return false;}}},true);
    </script>
</div>

<table>
  <tbody>
  <tr>
      <th>School ID</th>
      <th>Email</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>Batch Year</th>
      <th>Contact No.</th>
      <th>Action</th>
  </tr>

  <?php
  while($row = mysqli_fetch_array($result)){
    echo "<tr class='main'>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['fname'] . "</td>";
    echo "<td>" . $row['mname'] . "</td>";
    echo "<td>" . $row['lname'] . "</td>";
    echo "<td>" . $row['year'] . "</td>";
    echo "<td>" . $row['Contact'] . "</td>";
    echo "<td align='center'>
            <button class='button2' style='border:1px solid;width:30px;'>
          <a class='delbtn' style='text-decoration:none; color:white;' href ='registarFunction.php?edit=".$row['id']."'>&#9998;</a>
            </button>
            <button class='button3' style='border:1px solid;width:30px;'>
          <a class='delbtn' style='text-decoration:none; color:white;' href='registarFunction.php?email=".$row['email']."'>&#128465;</a>
            </button>
          </td>";
    echo "</tr>";
  }
  mysqli_close($db);
  ?>
</table>
