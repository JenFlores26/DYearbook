<?php
include 'db_connect.php';
$output = '';
if(isset($_POST["affair_query"]))
{
	$search = mysqli_real_escape_string($db_connect, $_POST["affair_query"]);
	$query = "
	SELECT * FROM confirmed
	WHERE usertype LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM confirmed";
}
$result = mysqli_query($db_connect, $query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '
          <div>
					<table class="table">
          <tbody id="table">
						<tr>
							<th>School ID</th>
							<th>Email</th>
							<th>First name</th>
							<th>Middle Name</th>
							<th>Last Name</th>
							<th>Batch Year</th>
              <th>Contact No.</th>
              <th>Action</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr class="main">
				<td>'.$row["id"].'</td>
        <td>'.$row["email"].'</td>
				<td>'.$row["fname"].'</td>
				<td>'.$row["mname"].'</td>
				<td>'.$row["lname"].'</td>
        <td>'.$row["year"].'</td>
				<td>'.$row["Contact"].'</td>
        <td align="center">
                <button class="button2" style="border:1px solid;width:30px;">
              <a class="delbtn" style="text-decoration:none; color:white;" href ="RegFunction.php?edit='.$row["id"].'">&#9998;</a>
                </button>
                <button class="button3" style="border:1px solid;width:30px;">
              <a class="delbtn" style="text-decoration:none; color:white;" href="registarFunction.php?email='.$row["email"].'">&#128465;</a>
                </button>
              </td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
