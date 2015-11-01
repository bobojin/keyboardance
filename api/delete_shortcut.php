<?php

	include 'connect.php';
	
	$p = $_COOKIE['password'];
	$check_password = mysql_query("SELECT level FROM admin_account WHERE password LIKE '$p'");
	$row = mysql_fetch_array($check_password);
	$level = $row['level'];
	
	if($level == 0){
		echo("No authorized to delete data!");
	}
	else{
		$id = $_GET['id'];
		$delete_result = mysql_query("DELETE FROM shortcut_data WHERE id = '$id'");
		if ($delete_result){
			echo("Deleted!");
		}
		else{
			echo("Delete Failed!");
		}
	}
		
	mysql_close($con);
	
?>