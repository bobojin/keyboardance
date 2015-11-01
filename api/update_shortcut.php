<?php

	include 'connect.php';
	
	$i = $_GET['id'];
	$g = urldecode($_GET['group']);
	$f = urldecode($_GET['function']);
	$s = urldecode($_GET['shortcut']);
	$u = $_COOKIE['username'];
	
	$result = mysql_query("UPDATE shortcut_data SET group_name = '$g',function = '$f',key_input = '$s',added_by='$u' WHERE id = '$i'");
	
	if ($result){
		echo("Updated!");
	}
	else{
		echo("Failed!");
	}
		
	mysql_close($con);
?>