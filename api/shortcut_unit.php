<?php

	include 'connect.php';
	
	$action = $_GET['action'];
	
	if ($action == "add"){	
		$i = $_GET['id'];
		$g = $_GET['group'];
		$f = $_GET['function'];
		$s = $_GET['shortcut'];
		
		$u = $_COOKIE['username'];
		$result = mysql_query("INSERT INTO shortcut_data (shortcut_id,group_name,function,key_input,added_by) VALUES('$i','$g','$f','$s','$u')");
		$get_id = mysql_query("SELECT id FROM shortcut_data ORDER BY id DESC LIMIT 1");	
		if ($result AND $get_id){
			$row = mysql_fetch_array($get_id);
			$new_id = $row['id'];
			echo($new_id);
		}
		else{
			echo("Add Failed!");
		}
	}
	else if ($action == "update"){	
		$i = $_GET['id'];
		$g = $_GET['group'];
		$f = $_GET['function'];
		$s = $_GET['shortcut'];
		$u = $_COOKIE['username'];
		$result = mysql_query("UPDATE shortcut_data SET group_name = '$g',function = '$f',key_input = '$s',added_by='$u' WHERE id = '$i'");
		if ($result){
			echo("Updated!");
		}
		else{
			echo("Update Failed!");
		}
	}
	else if ($action == "delete"){
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
	}
	else{
		echo("Invalid Action!");
	}
		
	mysql_close($con);
?>