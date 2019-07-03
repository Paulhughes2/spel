<?php
 
function QuestionLogic($conn, &$questions){


if( $questions[8] == "TRUE")
{

$random = rand(2, 693);
	$result = mysqli_query($conn, "SELECT * FROM `multichoiceq` WHERE `ID` = '".$random."'");
return $result;
}
/*
if( $questions[0] == "TRUE")
{
	
$random = rand(2, 693);
	$result = mysqli_query($conn, "SELECT * FROM `multichoiceq` WHERE `ID` = '".$random."'");
return $result;
}
*/		

}

?>