<html>

<?php

require 'connection.php';
?>
<h1> Select the question types </h1>
<?php

$result = mysqli_query($conn, "SELECT * FROM `questiontypes`") ;
	
	while ($row = $result->fetch_assoc()) {
		?>

		<input type="checkbox" name = "Qtype[]" value = "<?php echo $row["questionType"]; ?>"> <?php echo $row["Description"]; ?> <br>
<?php

}
?>
</html>