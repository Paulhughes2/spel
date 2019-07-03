 	<script type="text/javascript" src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
 		
 	</script>
 		<script>
function unhide()
{
 var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

</script>
<?php

$Answers = array();

$_SESSION["QuestionNo"]++;

	while ($row = $result->fetch_assoc()) 
	{
		echo $row["QuestionText"] . "<br>";
		$c = $row["Answer"];

		if (in_array($row["ID"], $EQ)) 
  		{ 
  			 
  		} 
		else
  		{ 
  			$_SESSION["QuestionTextTemp"] = $row["QuestionText"];
			$_SESSION["QuestionAnswerTemp"] = $row["Answer"];
  			//echo"ADDED TO complete";
  		array_push($EQ, $row["ID"]);
  		}
		
	}	

?>
 <br>


<div id="myDIV" style= "display: none;">
  <?php
echo $c . "<br>";
  ?>
  </div>
  <input type = "button" value = "Check" onclick="unhide()">
  <form class = "Aform" id = "Aform" action = "template.php" method = "POST">
  	<input type="text" ID = "answerbox" name = "Answer" value = "" >
  <input type = "Submit" name = answer value = "Next Question" >
</form>
