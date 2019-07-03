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

	while ($row = $result->fetch_assoc()) 
	{
		echo $row["questionText"] . "<br>";
		$c = $row["Answer"];
		
	}	

?>
	<input type="text" name = "Answer" value = "" > <br>
	


<input type = "button" value = "Check" onclick="unhide()">

<div id="myDIV" style= "display: none;">
  <?php
echo $c;
  ?>
  <input type = "button" value = "Next Question" onclick="location.href='template.php';" >
</div>