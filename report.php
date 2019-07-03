<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
</html>

<div class="row">
	<div class='col s1'> Question Number </div>
	<div class='col s2'> Question </div>
	<div class='col s3'> Your Answer </div>
	<div class='col s6'> Correct Answer </div>	
</div>

<?php
if (isset($_SESSION["AnswersArray"]["1"]))
{


$z=1;
$P = (sizeof($_SESSION["AnswersArray"], 0));
	do
	{
		echo "<div class='row'>";
		$Z =(string)$z;

      	$J = (sizeof($_SESSION["AnswersArray"][$Z], 0))-1;
      	print "<div class='col s1'>". $_SESSION["AnswersArray"][$Z][0] ."</div>";
      	print "<div class='col s2'>". $_SESSION["AnswersArray"][$Z][1] ."</div>";
      	print "<div class='col s3'>". $_SESSION["AnswersArray"][$Z][2] ."</div>";
      	print "<div class='col s6'>". $_SESSION["AnswersArray"][$Z][3] ."</div>";
      
      	$z++;
    	echo"</div>"; 	
	}while ($z < ($P+1)); 
}
session_destroy();

    ?>

    <input type = "button" value = "Home" onclick="location.href='index.php';" >
</body>
</html>