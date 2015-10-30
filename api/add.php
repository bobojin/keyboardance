<?php

	include 'connect.php';
	
	$i = $_GET['id'];
	$g = $_GET['group'];
	$f = $_GET['function'];
	$s = $_GET['shortcut'];
	
	$result = mysql_query("INSERT INTO shortcut_data (shortcut_id,group_name,function,key_input) VALUES('$i','$g','$f','$s')");
	
	if ($result){
		echo("success");
	}
	else{
		echo("failed");
	}
		
	mysql_close($con);
?>