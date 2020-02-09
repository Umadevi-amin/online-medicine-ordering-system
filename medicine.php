<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/short.jpg" />
<br>
<br>
<br>


<?php
  session_start();
  $med_id = $_GET['medid'];
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM medicines WHERE med_id = '$med_id'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty medicines";
    exit;
  }

  $title = $row['med_name'];
  require "./template/header.php";
?>
      <!-- Example row of columns -->
      <p class="lead" style="margin: 25px 0"><a href="medicines.php">Medicine</a> > <?php echo $row['med_name']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['med_image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Medicine Description</h4>
          <p><?php echo $row['med_descr']; ?></p>
          <br>
          <br>
          <h4>Medicine Details</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "med_descr" || $key == "med_image" || $key == "manufacturerid" || $key == "med_name"){
                continue;
              }
              switch($key){
                case "med_id":
                  $key = "ID";
                  break;
                case "med_name":
                  $key = "Name";
                  break;
                  
                  

                case "supplier_name":
                  $key = "Supplier";
                  break;
                case "med_price":
                  $key = "Price";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <form method="post" action="cart.php">
            <input type="hidden" name="medid" value="<?php echo $med_id;?>">
            <input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-primary">
          </form>
       	</div>
      </div>
<?php
  require "./template/footer.php";
?>