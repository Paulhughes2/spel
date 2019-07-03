 	<script type="text/javascript" src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
 		
 	</script>
 		<script>

 		var val2;

function check(val)
{
 	if(val2 == null)
 	{ 
       	val2 = $("input[name='Answer']:checked").val();
       	val3 = document.getElementById(val2).innerText;
       	
    }
	
	$.ajax({

		type: "POST",
		url: "check_ans.php",
		data: jQuery.param({'Cans' :val, 'Ans' :val2, 'AnsText': val3}),
		success: function(data)
		{
			$("#testtext").html(data);
		}
	});
}
</script>
<?php
$_SESSION["QuestionNo"]++;
	$i = 1;
	$j = 0;
 	$answerString = "MCAnswer";
	
	while ($row = $result->fetch_assoc()) 
	{
		
		echo $row["question_text"] . "<br>";
		$correctAnswer = $row["correctAnswer"];
		$CA = $answerString . $correctAnswer;
		$correctAnswerText = $row["$CA"];
		if (in_array($row["question_id"], $SM)) 
  		{ 
  		 
  		} 
		else
  		{ 
  			//echo"ADDED TO complete";
  		array_push($SM, $row["question_id"]);
  		$_SESSION["QuestionTextTemp"] = $row["question_text"];
		$_SESSION["QuestionAnswerTemp"] = $correctAnswerText;
  		} 

		do 
		{	
			$temp = ((string)$i);
			$temp2 = $answerString . $temp;
			//var_dump($temp2);
			if ($row["$temp2"] != null)
			{
	?>
			<input type="radio" name = "Answer" value = "<?php echo $i; ?>"><label id="<?php echo $i; ?>"> <?php echo $row["$temp2"]; ?> </label>  <br>
	<?php	
			}	
		} while ( $i++ <= 3);
	}?>
<input type = "button" value = "Check" onclick="check(<?php echo $correctAnswer ?>);">
<p id = testtext> 

</p>
	