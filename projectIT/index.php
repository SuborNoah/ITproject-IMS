<?php 

 include('config/database_connect.php');


//query for all inventories
$sql = 'SELECT title, inventories, id FROM tescom_offices ORDER BY created_at';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the result rows as an array
$tescom_offices = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free the result
mysqli_free_result($result);

// close the connection
mysqli_close($conn);


//print_r($tescom_offices);

?>


<!DOCTYPE html>
<html>
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Tescom Offices</h4>

	<div class="container">
		<div class="row">
			<?php foreach($tescom_offices as $tescom_office){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-1">
						<div class="card-content center">
							<h6 class="units"><?php echo ($tescom_office['title']); ?></h6>
							<div><?php echo ($tescom_office['inventories']); ?></div>
						</div>
						<div class="card-action right-align">
						<a class="brand-text" href="details.php?id=<?php echo $tescom_office['id'] ?>">more details</a>
						</div>
						
					</div>
					
				</div>



			<?php } ?>
			

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>