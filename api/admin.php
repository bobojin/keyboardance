<html lang='zh-cn'>
<head>
	<meta charset='UTF-8'>
	<meta content='IE=edge' http-equiv='X-UA-Compatible'>
	<title>Data Import - Keyboardance</title>

	<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='../css/font-awesome.min.css'>
	<link rel='stylesheet' type='text/css' href='../css/import.css'>
	
	<script src="../js/admin.js"></script>	
	
</head>
<body>

<?php
	
	include 'connect.php';
	
	echo "<h3>Choose Product:</h3>";
	
	/*get data*/
	$result = mysql_query("SELECT name,id FROM shortcut_list ORDER BY name");
	echo "<select id='selectbox' onchange='get_shortcut_data(this.value)'>\n";
	echo "\t<option value='0'> - Choose - </option>\n";
	while($row = mysql_fetch_array($result)){
		echo "\t<option value='" . $row['id'] . "' >" . $row['name'] . "</option>\n";
	}
	echo "</select>&nbsp;&nbsp;&nbsp;<a href='../index.php' id='view_url' target='_blank' >Visit</a><br />\n";
	echo "<br />\n";
	
	/*output data*/
	echo "<table id='shortcut_data' style='display:none' border='1' ></table>\n";
	
	echo "<br />\n";
	
	echo "<div id='shortcut_add' style='display:none'>\n";
	echo "Group Name:\n<input type='text' id='groupname' name='groupname' class='input_box' /><br />\n";
	echo "Function:\n<input type='text' id='function'  name='function' class='input_box' /><br />\n";
	echo "Shortcut:\n<input type='text' id='shortcut'  name='shortcut' class='input_box' /><br />\n";
	echo "<input type='button' id='submit_button' class='submit_button' value='Add to' onclick='add_shortcut()' />&nbsp;<input type='button' value='Clear' onclick='clear_input()' />\n";
	echo "</div>\n";
	
	echo "<div id='result' style='display:none' >Result:</div>\n";
	
	mysql_close($con);
	
?>

</body>
</html>