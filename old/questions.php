 <html>
 <head>
 	<?php
 	require_once 'connection.php';
 	?>


</script>

 </head>
<body>

<?php

echo $_POST["SubLo"];
$questionTypes = array();
echo $questionTypes[1];

		


	//header('Location:http://localhost/spel/index.php ');

	$i = 1;
 	$answerString = "MCAnswer";
	
	var_dump("Next question file" . $questionTypes[8]);
	
?>
<div id = "Questionbox">
	<?php
	


	
	while ($row = $result->fetch_assoc()) 
	{
		echo $row["questionText"] . "<br>";
		$correctAnswer = $row["correctAnswer"];
		//var_dump($correctAnswer);
		do 
		{	
			$temp = ((string)$i);
			$temp2 = $answerString . $temp;
			if ($row["$temp2"] != null)
			{
	?>
			<input type="radio" name = "Answer" value = "<?php echo $i; ?>"> <?php echo $row["$temp2"]; ?> <br>
	<?php	
			}	
		} while ( $i++ <= 4);
	}

	?>
	<input type = "button" value = "Check" onclick="check(<?php echo $correctAnswer ?>);">
	
</div>

<p id = testtext> </p>
<input type = "button" value = "Next Question" onclick="NewQuestion()" >

</html>