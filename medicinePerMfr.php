
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/short.jpg" />

<?php
	session_start();
	require_once "./functions/database_functions.php";
	// get medid
	if(isset($_GET['medid'])){
		$medid = $_GET['medid'];
	} else {
		echo "Wrong query! Check again!";
		exit;
	}

	// connect database
	$conn = db_connect();
	$mfrName = getManufacturerName($conn, $medid);

	$query = "SELECT med_id, med_name, med_image FROM medicines WHERE manufacturerid = '$medid'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Out of Stock!!";
		exit;
	}

	$title = "Medicines Per Manufacturer";
	require "./template/header.php";
?>
	<p class="lead"><a href="manufacturer_list.php">Manufacturer</a> > <?php echo $mfrName; ?></p>
	<?php while($row = mysqli_fetch_assoc($result)){
?>
	<div class="row">
		<div class="col-md-3">
			<img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['med_image'];?>">
		</div>
		<div class="col-md-7">
			<h4><?php echo $row['med_name'];?></h4>
			<a href="medicine.php?medid=<?php echo $row['med_id'];?>" class="btn btn-primary">Get Details</a>
		</div>
	</div>
	<br>
<?php
	}
	if(isset($conn)) { mysqli_close($conn);}
	require "./template/footer.php";
?>