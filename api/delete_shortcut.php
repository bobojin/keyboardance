<?php

	include 'connect.php';
	
	$id = $_GET['id'];
	
	$result = mysql_query("DELETE FROM shortcut_data WHERE id = '$id'");
	
	if ($result){
		echo("deleted");
	}
	else{
		echo("failed");
	}
		
	mysql_close($con);
?>