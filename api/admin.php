<?php
	
	$pw = $_COOKIE["password"];
	
	if ($pw != "1234567"){
		echo "<script>";
		echo "location.href='login.php'";
		echo "</script>";
	}

	echo "<html lang='zh-cn'>";
	echo "<head>";
	echo "\t<meta charset='UTF-8'>";
	echo "\t<meta content='IE=edge' http-equiv='X-UA-Compatible'>";
	echo "\t<title>Data Center - Keyboardance</title>";
	echo "\t<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>";
	echo "\t<link rel='stylesheet' type='text/css' href='../css/font-awesome.min.css'>";
	echo "\t<link rel='stylesheet' type='text/css' href='../css/import.css'>";
	echo "\t<script src='../js/admin.js'></script>";
	echo "</head>";
	echo "<body>";
	
	include 'connect.php';
	
	echo "<h3>Please Choose Product:</h3>";
	
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