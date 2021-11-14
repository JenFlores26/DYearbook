<?php
include "db_connect.php";

if(isset($_GET['edit1'])){
	$id=$_GET['edit1'];
	$result = $db_connect->query("SELECT * FROM tab2 WHERE id = '$id'") or die($mysqli->error());
	while($row = $result->fetch_assoc()){
		echo "<html>";
		echo "<head>";
		echo "<title>Edit Info</title>";
		echo "<link rel='stylesheet' type='text/css' href='styles/style2.css'>";
		echo "<link rel='stylesheet' type='text/css' href='styles/style7.css'>";
		echo "</head>";
		echo "<body>";
		echo "<div class='header'>
    <h2>Edit Information</h2>
  </div>";
		echo "<form action='s.php' method='POST'>";
		echo "<div class='card'>";
        echo "<div class='container'>";
        echo "<div class='input-group' align='center'>";
		echo "<input value='" . $row['id'] ."' name='ids' style='display:none;'></input>";
		echo "<label>First Name:</label><input value='". $row['fname'] ."' name='firstname'></input>";
		echo "<label>Middle Name:</label><input value='". $row['mname'] ."' name='middlename'></input>";
		echo "<label>Last Name:</label><input value='". $row['lname'] ."' name='lastname'></input>";
		echo "<button type ='submit' class='button button1' name='save'>SAVE</a></button>";
		echo "</form>";
		echo "</body>";
		echo "</html>";
	}
}
if(isset($_GET['edit2'])){
  $id=$_GET['edit2'];
  $result = $db_connect->query("SELECT * FROM tab3 WHERE id = '$id'") or die($mysqli->error());
  while($row = $result->fetch_assoc()){
    echo "<html>";
    echo "<head>";
    echo "<title>Edit Info</title>";
    echo "<link rel='stylesheet' type='text/css' href='styles/style2.css'>";
    echo "<link rel='stylesheet' type='text/css' href='styles/style7.css'>";
    echo "</head>";
    echo "<body>";
    echo "<div class='header'>
    <h2>Edit Information</h2>
  </div>";
    echo "<form action='s.php' method='POST'>";
    echo "<div class='card'>";
        echo "<div class='container'>";
        echo "<div class='input-group' align='center'>";
    echo "<input value='" . $row['id'] ."' name='ids' style='display:none;'></input>";
    echo "<label>First Name:</label><input value='". $row['fname'] ."' name='firstname'></input>";
    echo "<label>Middle Name:</label><input value='". $row['mname'] ."' name='middlename'></input>";
    echo "<label>Last Name:</label><input value='". $row['lname'] ."' name='lastname'></input>";
    echo "<button type ='submit' class='button button1' name='save'>SAVE</a></button>";
    echo "</form>";
    echo "</body>";
    echo "</html>";
  }
}
if(isset($_GET['edit3'])){
  $id=$_GET['edit3'];
  $result = $db_connect->query("SELECT * FROM shs WHERE id = '$id'") or die($mysqli->error());
  while($row = $result->fetch_assoc()){
    echo "<html>";
    echo "<head>";
    echo "<title>Edit Info</title>";
    echo "<link rel='stylesheet' type='text/css' href='styles/style2.css'>";
    echo "<link rel='stylesheet' type='text/css' href='styles/style7.css'>";
    echo "</head>";
    echo "<body>";
    echo "<div class='header'>
    <h2>Edit Information</h2>
  </div>";
    echo "<form action='s.php' method='POST'>";
    echo "<div class='card'>";
        echo "<div class='container'>";
        echo "<div class='input-group' align='center'>";
    echo "<input value='" . $row['id'] ."' name='ids' style='display:none;'></input>";
    echo "<label>First Name:</label><input value='". $row['fname'] ."' name='firstname'></input>";
    echo "<label>Middle Name:</label><input value='". $row['mname'] ."' name='middlename'></input>";
    echo "<label>Last Name:</label><input value='". $row['lname'] ."' name='lastname'></input>";
    echo "<button type ='submit' class='button button1' name='save'>SAVE</a></button>";
    echo "</form>";
    echo "</body>";
    echo "</html>";
  }
}
?>
