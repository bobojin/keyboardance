<html lang='zh-cn'>
<head>
	<meta charset='UTF-8'>
	<meta content='IE=edge' http-equiv='X-UA-Compatible'>
	<title>数据管理 - Keyboardance</title>
	<link rel='stylesheet' type='text/css' href='css/import.css'>
	
	<script>
		
	function get_group_list(name){
		document.getElementById("group_list").style.display = "";
		document.getElementById("group_list").innerHTML = "<option value='B'>" + name + "</option>";
	}
	</script>
	
</head>
<body>


<?php
		
	/*connect database*/
	$con = mysql_connect("127.0.0.1","root","123456");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("shortcuts", $con);
	mysql_query("SET NAMES UTF8");
	
	/*get data*/
	$result = mysql_query("SELECT name FROM shortcut_list ORDER BY name");
	echo "<select onchange='get_group_list(this.value)'>\n";
	echo "\t<option value='null'> - 选择应用 - </option>\n";
	while($row = mysql_fetch_array($result)){
		echo "\t<option value='" . $row['name'] . "' >" . $row['name'] . "</option>\n";
	}
	echo "</select>\n";
	
	echo "<select id='group_list' style='display:none'>\n";
	echo "</select>\n";
	
	mysql_close($con);
	echo "</body>\n</html>\n";
?>