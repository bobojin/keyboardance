<html lang='zh-cn'>
<head>
	<meta charset='UTF-8'>
	<meta content='IE=edge' http-equiv='X-UA-Compatible'>
	<title>Data Import - Keyboardance</title>

	<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='../css/import.css'>
	
	<script>
	function get_group_list(shortcut_id){
		
		if (shortcut_id == 0){
			document.getElementById("shortcut_data").style.display = "none";
			document.getElementById("shortcut_data").innerHTML = "";
			document.getElementById("shortcut_add").style.display = "none";
			return;
		}
		
		var xmlhttp;
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				txt = "<tr><th>Group</th><th>Function</th><th>Key Input</th></tr>";
				x = xmlhttp.responseXML.documentElement.getElementsByTagName("shortcut");		
				if (x.length == 0){
					document.getElementById("shortcut_data").style.display = "";
					document.getElementById("shortcut_data").innerHTML = txt;
					document.getElementById("shortcut_add").style.display = "";
				}
				else{
					document.getElementById("shortcut_data").style.display = "";
					for (i=0;i<x.length;i++){
						x_group=x[i].getElementsByTagName("group");
						x_function=x[i].getElementsByTagName("function");
						x_key=x[i].getElementsByTagName("key");
						txt = txt + "<tr><td>" + x_group[0].firstChild.nodeValue +
						 "</td><td>" + x_function[0].firstChild.nodeValue + "</td><td>" + x_key[0].firstChild.nodeValue + "</td></tr>";
					}
					document.getElementById("shortcut_data").innerHTML = txt;
					document.getElementById("shortcut_add").style.display = "";
				}			
			}
		}
		xmlhttp.open("GET", "data.php?sid=" + shortcut_id, true);
		xmlhttp.send();
			
	}
	
	function add_data(){
		
		var add_id = document.getElementById("selectbox").value;
		var add_groupname = document.getElementById("groupname").value;
		var add_function = document.getElementById("function").value;
		var add_shortcut = document.getElementById("shortcut").value;
		
		var add_url = "add.php?id=" + add_id + "&group=" + add_groupname + "&function=" + add_function + "&shortcut=" + add_shortcut;
		
		if (add_groupname == "" || add_function == "" || add_shortcut == ""){
			document.getElementById("result").style.display = "";
			document.getElementById("result").innerHTML = "Data Invalid!";
			setTimeout("display_none_result()",1500);
			return;
		}
		
		var xmlhttp;
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				
				x = xmlhttp.responseText;
				
				/*add success*/
				if (x == "success"){
					var newNode = document.createElement("tr");
					newNode.innerHTML = "<td>" + add_groupname + "</td><td>" + add_function + "</td><td>" + add_shortcut + "</td>";
					document.getElementById("shortcut_data").appendChild(newNode);
					document.getElementById("result").style.display = "";
					document.getElementById("result").innerHTML = "Success!";					
					setTimeout("display_none_result()",1500);
				}
				else{
					document.getElementById("result").style.display = "";
					document.getElementById("result").innerHTML = "Failed!";
				}			
			}
		}
		xmlhttp.open("GET", add_url, true);
		xmlhttp.send();

	}
	
	function clear_data(){
		document.getElementById("groupname").value = "";
		document.getElementById("function").value = "";
		document.getElementById("shortcut").value = "";
	}
	
	function display_none_result(){
		document.getElementById("result").style.display = "none";	
	}
	
	</script>
	
</head>
<body>

<?php
	
	echo "<h3>Choose Product First:</h3>";
		
	/*connect database*/
	$con = mysql_connect("127.0.0.1","root","123456");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("shortcuts", $con);
	mysql_query("SET NAMES UTF8");
	
	/*get data*/
	$result = mysql_query("SELECT name,id FROM shortcut_list ORDER BY name");
	echo "<select id='selectbox' onchange='get_group_list(this.value)'>\n";
	echo "\t<option value='0'> - Choose - </option>\n";
	while($row = mysql_fetch_array($result)){
		echo "\t<option value='" . $row['id'] . "' >" . $row['name'] . "</option>\n";
	}
	echo "</select><br />\n";
	echo "<br />\n";
	
	/*output data*/
	echo "<table id='shortcut_data' style='display:none' border='1' ></table>\n";
	
	echo "<br />\n";
	
	echo "<div id='shortcut_add' style='display:none'>\n";
	echo "Group Name:\n<input type='text' id='groupname' name='groupname' /><br />\n";
	echo "Function:\n<input type='text' id='function'  name='function' /><br />\n";
	echo "Shortcut:\n<input type='text' id='shortcut'  name='shortcut' /><br />\n";
	echo "<br /><input type='button' value='Add to...' onclick='add_data()' />&nbsp;<input type='button' value='Clear' onclick='clear_data()' />\n";
	echo "</div>\n";
	
	echo "<div id='result' style='display:none' >Result:</div>\n";
	
	mysql_close($con);
	
?>

</body>
</html>