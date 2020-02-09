<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/short.jpg" />


<?php
	session_start();
	require_once "./functions/database_functions.php";
	$conn = db_connect();



	$query = "SELECT * FROM manufacturer ORDER BY manufacturerid";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty manufacturer ! Something wrong! check again";
		exit;
	}

	$title = "List Of Manufacturers";
	require "./template/header.php";
?>
	<br>
<br>
<br>
<br>

	<p class="lead">List of Manufacturers</p>
	<ul>
	<?php 
		while($row = mysqli_fetch_assoc($result)){
			$count = 0; 
			$query = "SELECT manufacturerid FROM medicines";
			$result2 = mysqli_query($conn, $query);
			if(!$result2){
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($mfrInMed = mysqli_fetch_assoc($result2)){
				if($mfrInMed['manufacturerid'] == $row['manufacturerid']){
					$count++;
				}
			}
	?>
		<li>
			<span class="badge"><?php echo $count; ?></span>
		    <a href="medicinePerMfr.php?medid=<?php echo $row['manufacturerid']; ?>"><?php echo $row['manufacturer_name']; ?></a>
		</li>
	<?php } ?>
		<li>
			<a href="medicines.php">List of Medicines</a>
		</li>
	</ul>
<?php
	mysqli_close($conn);
	require "./template/footer.php";
?>