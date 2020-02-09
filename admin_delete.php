<?php
	$med_id = $_GET['medid'];

	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query0="DELETE FROM order_items WHERE med_id= '$med_id'";
	$query = "DELETE FROM medicines WHERE med_id = '$med_id'";
	$result0 = mysqli_query($conn, $query0);
	$result = mysqli_query($conn, $query);
	if(!$result0){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_medicine.php");
?>