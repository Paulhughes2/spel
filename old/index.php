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
function showQuestions(val)
{
	$.ajax({

		type: "POST",
		url: "show_questions.php",
		data: {'subLO' :val},
		success: function(data){

			$("#test").html(data);
		}

	});

}
    $(document).ready(function() {

        $("button").click(function(){

            var favorite = [];

            $.each($("input[name='Qtype']:checked"), function(){            

                favorite.push($(this).val());

            });

            document.getElementById("questions").textContent = "" + favorite.join(", ");

        });

    });

</script>
</head>
<body>
	<form class = "Qform" id = "Qform" action = "questions.php" method = "POST">
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
		<select id = "subloList" name = "SubLo" onChange="showQuestions(this.value);">
			<option value = "">Select</option>
		</select>
<div id = "test">



</div>

		
		<input type = "submit" value = "submit" >
	</form>




Selected LO: <span id ="msgC"></span>
Selected Sub LO: <span id ="msgS"></span>
Selected Questions: <span id ="questions"></span>

</body>