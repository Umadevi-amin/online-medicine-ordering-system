<?php	
	// if save change happen
	if(!isset($_POST['save_change'])){
		echo "Something wrong!";
		exit;
	}

	$id = trim($_POST['id']);
	$name = trim($_POST['name']);
	$supplier = trim($_POST['supplier']);
	$descr = trim($_POST['descr']);
	$price = floatval(trim($_POST['price']));
	$manufacturer = trim($_POST['manufacturer']);

	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}

	require_once("./functions/database_functions.php");
	$conn = db_connect();

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
	}


	$query = "UPDATE medicines SET  
	med_name = '$name', 
	supplier_name = '$supplier', 
	med_descr = '$descr', 
	med_price = '$price'";
	if(isset($image)){
		$query .= ", med_image='$image' WHERE med_id = '$id'";
	} else {
		$query .= " WHERE med_id = '$id'";
	}
	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_edit.php?medid=$id");
	}
?>