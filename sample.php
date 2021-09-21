<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>File Item</title>
  <link rel="stylesheet" type="text/css" href="disenyo.css">
<style>
  body {
  margin: 0;
  padding: 2rem;
  background-color: lightgray;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 12px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:nth-child(odd){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: blue;
  color: white;
  position: sticky;
  top: 0;
}
</style>
</head>
<body>
<form action="" method="post">

<div class="row">
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'yearbook');
        $year = date("Y");

        if (isset($_GET['call'])) {
        $Ys= mysqli_real_escape_string($db, $_GET['call']);

        $sql = "SELECT * FROM shs WHERE year='$Ys' ORDER BY lname";
        $result = mysqli_query($db,$sql);
        $rows = mysqli_num_rows($result);
      }
        ?>

         <div class="topnav">

  <div class="search-container">
    <form>

      <h3>Total: <input type="text" name="total" style="font-size: 20px; width: 50px; border:none; outline: none; background: none; border-bottom: 2px solid; border-color: blue;" value="<?php echo $rows; ?>" readonly></h3>

      <script type="text/javascript">
window.addEventListener('keydown',function(e){
  if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){
    if(e.target.nodeName=='INPUT'&&e.target.type=='text'){
      e.preventDefault();return false;}}},true);
</script>

    <script>
function myFunction() {
  var x = document.getElementById("myTable").rows.length;
}
</script>

    </form>
  </div>
  </div>
        <br>
        <br>
        </div>
        <table id="customers">
          <thead>
          <tr class="red">
            <th ><center>ID</center></th>
            <th ><center>Last Name</center></th>
            <th><center>Middle Initial</center></th>
            <th><center>First Name</center></th>
            <th><center>Quotes</center></th>
            <th><center>Year</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($rows = mysqli_fetch_array($result)){

          echo "<tr>";
          echo "<td>" . $rows['id'] . "</td>";
          echo "<td>" . $rows['lname'] . "</td>";
          echo "<td>" . $rows['mname'] . "</td>";
          echo "<td>" . $rows['fname'] . "</td>";
          echo "<td>" . $rows['year'] . "</td>";
          echo "</tr>";

}
echo "</body>";
echo "</table>";
mysqli_close($db);
?>
      </div>
    </div>
</form>
</body>
</html>
