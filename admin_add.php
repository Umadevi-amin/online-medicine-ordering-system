<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/short.jpg" />
		<br>
		<br>
		<br>
		

<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Add new medicine";
	require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$id = trim($_POST['id']);
		$id = mysqli_real_escape_string($conn, $id);
		
		$name = trim($_POST['name']);
		$name = mysqli_real_escape_string($conn, $name);

		$supplier = trim($_POST['supplier']);
		$supplier = mysqli_real_escape_string($conn, $supplier);
		
		$descr = trim($_POST['descr']);
		$descr = mysqli_real_escape_string($conn, $descr);
		
		$price = floatval(trim($_POST['price']));
		$price = mysqli_real_escape_string($conn, $price);
		
		$manufacturer = trim($_POST['manufacturer']);
		$manufacturer = mysqli_real_escape_string($conn, $manufacturer);

		// add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}

		// find manufacturer and return manufacturerid
		// if manufacturer is not in db, create new
		$findMfr = "SELECT * FROM manufacturer WHERE manufacturer_name = '$manufacturer'";
		$findResult = mysqli_query($conn, $findMfr);
		if(!$findResult){
			// insert into manufacturer table and return id
			$insertMfr = "INSERT INTO manufacturer(manufacturer_name) VALUES ('$manufacturer')";
			$insertResult = mysqli_query($conn, $insertMfr);
			if(!$insertResult){
				echo "Can't add new manufacturer " . mysqli_error($conn);
				exit;
			}
			$manufacturerid = mysql_insert_id($conn);
		} else {
			$row = mysqli_fetch_assoc($findResult);
			$manufacturerid = $row['manufacturerid'];
		}


		$query = "INSERT INTO medicines VALUES ('" . $id . "', '" . $name . "', '" . $supplier . "', '" . $image . "', '" . $descr . "', '" . $price . "', '" . $manufacturerid . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_medicine.php");
		}
	}
?>
	<form method="post" action="admin_add.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ID</th>
				<td><input type="text" name="id"></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><input type="text" name="name" required></td>
			</tr>
			<tr>
				<th>Supplier</th>
				<td><input type="text" name="supplier" required></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="descr" cols="40" rows="5"></textarea></td>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type="text" name="price" required></td>
			</tr>
			<tr>
				<th>Manufacturer</th>
				<td><input type="text" name="manufacturer" required></td>
			</tr>
		</table>
		<input type="submit" name="add" value="Add new medicine" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>