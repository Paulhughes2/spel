<?php //include ('Header.php'); 
include ('connection.php');
session_start();


if($_SESSION["AnsComp"] == FALSE)
{
	include ('questionfilter.php');
}else
{
	include ('report.php');
}

?>