<?php
session_start();
//var_dump($_POST["Cans"]);
//var_dump($_POST["Ans"]);

if ($_POST["Cans"] == $_POST["Ans"] ){
?>
 <p> CORRECT </p>
 
 <?php
}else{
?>
 <p> INCORRECT </p>

 <?php	
}

$_SESSION["Answertemp"] = $_POST["AnsText"];
//echo "ans temp" . $_SESSION["Answertemp"];
?>
 <input type = "button" value = "Next Question" onclick="location.href='template.php';" >