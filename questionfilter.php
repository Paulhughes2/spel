<?php //include ('Header.php'); 

//var_dump($_POST["Qtype"]);
	//var_dump($_SESSION["Answertemp"]);
if((isset($_POST["Answer"])) || (isset($_SESSION["Answertemp"])))
{
	if(isset($_POST["Answer"]))
	{
		$_SESSION["Answertemp"] = $_POST["Answer"];
	}
	$InsertArray = array($_SESSION["QuestionNo"],$_SESSION["QuestionTextTemp"],$_SESSION["Answertemp"],$_SESSION["QuestionAnswerTemp"]);

	$_SESSION["AnswersArray"][$_SESSION["QuestionNo"]]= $InsertArray;
	//echo "ADDED";

	unset($_SESSION["Answertemp"]);
	unset($InsertArray);
}

	//var_dump($_POST["Answer"]);
	//var_dump($_SESSION["QuestionTextTemp"]);
	//var_dump($_SESSION["QuestionAnswerTemp"]);
	


if(isset($_POST["Qtype"]))
{
	$_SESSION["Qselected"] = $_POST["Qtype"];
	$_SESSION["LO"] = $_POST["SubLo"];
}
if(isset($_SESSION["Qselected"]))
{
	$temp = $_SESSION["Qselected"];	
	$SM = $_SESSION["SMAarray"];
	$EQ = $_SESSION["EQAarray"];
}
if (isset($temp))
{
	$LO = $_SESSION["LO"];
	$J = (sizeof($temp, 0))-1;
	$T = array();
	
	$random = rand(0, $J);

//var_dump($_SESSION["Qselected"]);
	//echo "size" . $J;
	//var_dump($temp);

		if ($temp[$random] == "MC")
		{
			
			$r = mysqli_query($conn, "SELECT * FROM `self_marking_question` WHERE `learningObjective` = '".$LO."'" );

			while ($row = $r->fetch_assoc()) 
			{
				if (in_array($row["question_id"], $SM)) 
  				{ 
  			//echo"FOUND";
  				} 
				else
  				{ 
  			//echo"ADDED TO LIST";
  				array_push($T, $row["question_id"]);
  				} 
			}
				$r->free();
				$K = (sizeof($T, 0))-1;
			if($K >= 0)
			{
			
				$ran = rand(0, $K);
				$L = $T[$ran];
				$result = mysqli_query($conn, "SELECT * FROM `self_marking_question` WHERE `question_id` = '".$L."'");
		
				include ('MCquestion.php');
		
				$_SESSION["SMAarray"] = $SM;
				
			}else
			{
				array_splice($temp,$random,1);
				echo "after splice";
				
				$_SESSION["Qselected"] = $temp;
				
				//var_dump($temp);

			header('Location:http://localhost/spel/template.php ');
			}

		}else if ($temp[$random] == "CO" || $temp[$random] == "DE" ||$temp[$random] == "DI" ||$temp[$random] == "DR" ||$temp[$random] == "EV" ||$temp[$random] == "EX" ||$temp[$random] == "ID" ||$temp[$random] == "JU" )
		{
			
			$r = mysqli_query($conn, "SELECT * FROM `essayquestion` WHERE `LO` = '".$LO."' AND `questionType` = '".$temp[$random]."'" );

			while ($row = $r->fetch_assoc()) 
			{
				if (in_array($row["ID"], $EQ)) 
  				{ 
  			//echo"FOUND";
  				} 
				else
  				{ 
  			//echo"ADDED TO LIST";
  				array_push($T, $row["ID"]);
  				} 
			}
				$r->free();
				$K = (sizeof($T, 0))-1;
			if($K >= 0)
			{			
				$random = rand(0, $K);
				$L = $T[$random];
				$result = mysqli_query($conn, "SELECT * FROM `essayquestion` WHERE `ID` = '".$L."'");

				include ('question.php');

				$_SESSION["EQAarray"] = $EQ;
			}else
			{
				array_splice($temp,$random,1);
				//echo "after splice";
				
				$_SESSION["Qselected"] = $temp;
				
				//var_dump($temp);

			header('Location:http://localhost/spel/template.php ');
			}
		}else{
			
			$_SESSION["AnsComp"] = TRUE;
			header('Location:http://localhost/spel/template.php ');
		}
	}

/*
	// IF QUESTION NUMBER <5 do stuff else include a done.php or some shit	
*/

	
