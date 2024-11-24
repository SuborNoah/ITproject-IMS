<?php 

	include('config/database_connect.php');

	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM tescom_offices WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM tescom_offices WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$tescom_office = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<div class="container center">
		<?php if($tescom_office): ?>
			<h4><?php echo $tescom_office['title']; ?></h4>
			<p>Created by <?php echo $tescom_office['email']; ?></p>
			<p><?php echo date($tescom_office['created_at']); ?></p>
			<h5>Inventories:</h5>
			<p><?php echo $tescom_office['inventories']; ?></p>

			<!-- DELETE FORM -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $tescom_office['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-1">
			</form>

		<?php else: ?>
			<h5>There are no inventories.</h5>
		<?php endif ?>
	</div>

	<?php include('templates/footer.php'); ?>

</html>