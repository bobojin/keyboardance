<?php
	
	$con = mysql_connect("127.0.0.1","root","StNk1211");
	
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("shortcuts", $con);
	mysql_query("SET NAMES UTF8");
	
?>