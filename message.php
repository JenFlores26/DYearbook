<?php include 'db_connect.php';?>
<table>
<tr>
<th>Sno.</th>
<th>User Id</th>
<th>User Name</th>
<th>Login Time</th>
</tr>
<?php
$query=mysqli_query($db_connect,"select * from userLog");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['Sid'];?></td>
<td><?php echo $row['usertype'];?></td>
<td><?php echo $row['loginTime'];?></td>
</tr>
<?php $cnt=$cnt+1;
} ?>
</table>
