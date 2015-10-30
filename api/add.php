<?php

	include 'connect.php';
	
	$i = $_GET['id'];
	$g = $_GET['group'];
	$f = $_GET['function'];
	$s = $_GET['shortcut'];
	
	$result = mysql_query("INSERT INTO shortcut_data (shortcut_id,group_name,function,key_input) VALUES('$i','$g','$f','$s')");
	$get_id = mysql_query("SELECT id FROM shortcut_data ORDER BY id DESC LIMIT 1");
	
	if ($result AND $get_id){
		$row = mysql_fetch_array($get_id);
		$new_id = $row['id'];
		echo($new_id);
	}
	else{
		echo("failed");
	}
		
	mysql_close($con);
?>