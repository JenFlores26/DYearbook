<?php
include 'db_connect.php';
$output = '';
if(isset($_POST["milestone_query"]))
{
	$search = mysqli_real_escape_string($db_connect, $_POST["milestone_query"]);
	$query = "
	SELECT * FROM tab11
	WHERE year LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM tab11";
}
$result = mysqli_query($db_connect, $query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '
          <div>
					<table class="table">
          <tbody id="table">
						<tr>
							<th>Image</th>
							<th>Year</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr class="main">
				<td><img class="image-official" src="data:image/jpeg;base64,'.base64_encode($row["image1"]).'"/></td>
				<td>'.$row["year"].'</td>
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
