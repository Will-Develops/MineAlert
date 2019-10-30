<?php
session_start();
if(isset($_GET['access'])|| isset($_SESSION['access'])) {
 	if($_GET['access'] === "thecrafters") $_SESSION['access'] = "Yes";
    if($_GET['access'] === "betatester") $_SESSION['access'] = "Yes";
 	echo "<a href='index'>Back To Site</a>"; 
}else{
	echo "<a href='../'>Back To Site</a><br>";
 	die("Still under development!");
}
?>
