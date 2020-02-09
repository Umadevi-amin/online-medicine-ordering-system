<!DOCTYPE html>
<html>
    <head>
		<link rel="shortcut icon" href="img/short.jpg" />
		</html>





<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Medicive Admin";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>

<br>
<br><br>
<br><br>

	<p class="lead"><a href="admin_add.php">Add new medicine</a></p>
	<a href="admin_signout.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Supplier</th>
			<th>Image</th>
			<th>Description</th>
			<th>Price</th>
			<th>Manufacturer</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['med_id']; ?></td>
			<td><?php echo $row['med_name']; ?></td>
			<td><?php echo $row['supplier_name']; ?></td>
			<td><?php echo $row['med_image']; ?></td>
			<td><?php echo $row['med_descr']; ?></td>
			<td><?php echo $row['med_price']; ?></td>
			<td><?php echo getManufacturerName($conn, $row['manufacturerid']); ?></td>
			<td><a href="admin_edit.php?medid=<?php echo $row['med_id']; ?>">Edit</a></td>
			<td><a href="admin_delete.php?medid=<?php echo $row['med_id']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	// require_once "./template/footer.php";
?>