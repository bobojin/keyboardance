<?php
	
	$con = mysql_connect("127.0.0.1","root","123456");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("shortcuts", $con);
	mysql_query("SET NAMES UTF8");
	
	$sid = $_GET['sid'];
	
	$result = mysql_query("SELECT DISTINCT(group_name) FROM shortcut_data WHERE shortcut_id = '$sid'");
	
	if(mysql_num_rows($result) > 0){		
		while($row = mysql_fetch_array($result)){
			echo "<option value='" . $row['group_name'] . "' >" . $row['group_name'] . "</option>\n";
		}
	}
	else{
		echo "None";
	}
	mysql_close($con);
?>