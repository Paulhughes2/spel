<html>
<head>
	<?php
require 'connection.php';

?>
<script type="text/javascript" src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
function getState(val)
{
	$.ajax({

		type: "POST",
		url: "get_state.php",
		data: {'LO' :val},
		success: function(data){

			$("#subloList").html(data);
		}

	});

}
function showMsg()
{

	$("#msgC").html($("#lo-List option:selected").text());
	$("#msgS").html($("#subloList option:selected").text());
	return false;
}
</script>
</head>
<body>
	<form>
		<label>Learning Objective</label>
		<select name = "learningObjective" id = "lo-List" onChange="getState(this.value);">
			<option value = "">Select</option>
<?php
$result = mysqli_query($conn, "SELECT * FROM learningobjectives") ;
   
 while ($row = $result->fetch_assoc()) {
?>
 	<option value ="<?php echo $row["learningObjective"]; ?>"> <?php echo $row["learningObjective"]; ?> </option>
<?php
 }
 	?>


		</select>
		<label>Sub Learning Objective</label>
		<select id = "subloList" name = "SubLo">
			<option value = "">Select</option>
		</select>
		<button value = "submit" onclick="return showMsg()"> Submit </button>
	</form>


Selected LO: <span id ="msgC"></span>
Selected Sub LO: <span id ="msgS"></span>

</body>