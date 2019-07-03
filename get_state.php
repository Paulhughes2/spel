<html>

<?php
var_dump($_POST["LO"]);
require 'connection.php';
?>
<option> Select Sub objective </option>
<?php

$result = mysqli_query($conn, "SELECT * FROM `sub-objectives` WHERE `learningObjective` ='" .$_POST["LO"]."'") ;
	
	while ($row = $result->fetch_assoc()) {
		?>

		<option value = "<?php echo $row["ID"]; ?>"> <?php echo $row["subObjective"]; ?> </option>
<?php

}
?>
</html>