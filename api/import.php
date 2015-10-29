<html lang='zh-cn'>
<head>
	<meta charset='UTF-8'>
	<meta content='IE=edge' http-equiv='X-UA-Compatible'>
	<title>Data Import - Keyboardance</title>
	<link rel='stylesheet' type='text/css' href='../css/import.css'>
	
	<script>
	function get_group_list(shortcut_id){
		var xmlhttp;
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){			
				txt = "";
				x = xmlhttp.responseXML.documentElement.getElementsByTagName("group");			
				if (x.length == 0){
					document.getElementById("group_list").style.display = "none";
					document.getElementById("group_list").innerHTML = "";
				}
				else{
					document.getElementById("group_list").style.display = "";
					for (i=0;i<x.length;i++){
						xx=x[i].getElementsByTagName("name");
						txt = txt + "<option value=" + xx[0].firstChild.nodeValue + " >" + xx[0].firstChild.nodeValue + "</option>";
					}
					document.getElementById("group_list").innerHTML = txt;
				}			
			}
		}
		xmlhttp.open("GET", "group.php?sid=" + shortcut_id, true);
		xmlhttp.send();
	}
	</script>
	
</head>
<body>

<?php
	
	echo "<h3>Choose Product and Group Name First:</h3>";
		
	/*connect database*/
	$con = mysql_connect("127.0.0.1","root","123456");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("shortcuts", $con);
	mysql_query("SET NAMES UTF8");
	
	/*get data*/
	$result = mysql_query("SELECT name,id FROM shortcut_list ORDER BY name");
	echo "<select onchange='get_group_list(this.value)'>\n";
	echo "\t<option value='null'> - Choose - </option>\n";
	while($row = mysql_fetch_array($result)){
		echo "\t<option value='" . $row['id'] . "' >" . $row['name'] . "</option>\n";
	}
	echo "</select>\n";
	echo "<select id='group_list' style='display:none'>\n";
	echo "</select>\n";
	
	echo "<p id='box'></p>";
	
	mysql_close($con);
	
?>

</body>
</html>