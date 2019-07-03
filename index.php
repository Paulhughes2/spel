<html>
<head>
	
	<?php
require 'connection.php';
session_start();
$_SESSION["QuestionNo"] = 0;
$_SESSION["QAarray"] = array();
$_SESSION["SMAarray"] = array();
$_SESSION["EQAarray"] = array();
$_SESSION["AnswersArray"] = array();
$_SESSION["AnsComp"] = FALSE;
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

			document.getElementById("test").style.display = "inline";
			document.getElementById("button1").style.display = "inline";
			$("#test").html(data);
		}

	});

}
    $(document).ready(function() {
    	console.log("fdsgfg");

        $("Qtype").click(function(){

            var favorite = [];

            $.each($("input[name='Qtype']:checked"), function(){
                console.log($(this).val());
                favorite.push($(this).val());

            });

            document.getElementById("questions").textContent = "" + favorite.join(", ");

        });


    });

</script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="CSS/custom2.css">

</head>
<body>

<div class = "boxContainer">
	<div class="LOBox">
<form class = "Qform" id = "Qform" action = "template.php" method = "POST">
	
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
		</br>
		<label>Sub Learning Objective</label>
		<select id = "subloList" name = "SubLo" onChange="showQuestions(this.value);">
			<option value = "">Select Sub objective</option>
		</select>
	
			
<div id = "test">
			</div>
	<input class="btn btn-primary" id="button1" name="submit" type = "submit"  value = "Submit" >
	</form>
	</div>
</div>


</body>