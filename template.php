<?php //include ('Header.php'); 
include ('connection.php');
session_start();
if(isset($_POST['submit'])){
	if(!empty($_POST['Qtype'])) {

var_dump($_SESSION["AnsComp"]);
	}
}

if($_SESSION["AnsComp"] === false)
{
	echo "not dead";
	include ('questionfilter.php');
}else
{
	echo "dead";
	//include ('report.php');
}

?>