<?php
//just add form tag here to use the search function
$db = mysqli_connect('localhost', 'root', '', 'yearbook');

if(isset($_POST['search'])){
$searchKey=$_POST['search'];
$sql = "SELECT * from tab3 where lname LIKE '%$searchKey%' or fname LIKE '%$searchKey%' or mname LIKE '%$searchKey%' ORDER BY lname, year";
$result = mysqli_query($db,$sql);
}else{
$sql = "SELECT * from tab3 ORDER BY lname, year";
$searchKey="";
}
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
      <th>Image</th>
      <th>First Name</th>
      <th>Middle Initial</th>
      <th>Last Name</th>
      <th>Position</th>
      <th>Year</th>
  </tr>

  <?php
  while($row = mysqli_fetch_array($result)){
    echo "<tr class='main'>";
    echo "<td>".'<img class="image-official" src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'"/>'."</td>";
    echo "<td>" . $row['fname'] . "</td>";
    echo "<td>" . $row['mname'] . "</td>";
    echo "<td>" . $row['lname'] . "</td>";
    echo "<td>" . $row['position'] . "</td>";
    echo "<td>" . $row['year'] . "</td>";
    echo "</tr>";
  }
  mysqli_close($db);
  ?>
</table>
