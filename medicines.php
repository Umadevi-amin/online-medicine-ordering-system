

  
  <!DOCTYPE html>
  <html>
      <head>
          <link rel="shortcut icon" href="img/short.jpg" />
          </html>
          
          
          <?php
  session_start();
  $count = 0;
  // connect to database
  require_once "./functions/database_functions.php";

  $conn = db_connect();

  $query = "SELECT med_id, med_image,med_name,med_price FROM medicines";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Medicive";
  require_once "./template/header.php";
?>
<br>
<br>
<br>
<br>

  <p class="lead text-center text-muted">Medicines</p>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="col-md-3">
            <a href="medicine.php?medid=<?php echo $query_row['med_id']; ?>">
              <img class="img-responsive fit-image img-thumbnail" src="./bootstrap/img/<?php echo $query_row['med_image']; ?>">
              <?php
              
               echo $query_row['med_name'];
               
               ?> <br>
              <?php echo "Rs."?>
              <?php echo$query_row['med_price']; ?>


             
            </a>
          </div>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
      </div>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer.php";
?>