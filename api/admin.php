<html lang='zh-cn'>
<head>
	<meta charset='UTF-8'>
	<meta content='IE=edge' http-equiv='X-UA-Compatible'>
	<title>Data Import - Keyboardance</title>

	<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='../css/font-awesome.min.css'>
	<link rel='stylesheet' type='text/css' href='../css/import.css'>
	
	<script>
		
	/*get shortcut data*/
	function get_shortcut_data(shortcut_id){
		
		if (shortcut_id == 0){
			document.getElementById("shortcut_data").style.display = "none";
			document.getElementById("shortcut_data").innerHTML = "";
			document.getElementById("shortcut_add").style.display = "none";
			return;
		}
		
		document.getElementById("submit_button").value = "Add to " + document.getElementById("selectbox").options[document.getElementById("selectbox").selectedIndex].text;
		
		var xmlhttp;
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				txt = "<tr><th>ID</th><th class=\"th_width\">Group</th><th class=\"th_width\">Function</th><th class=\"th_width\">Key Input</th><th>Delete</th></tr>";
				x = xmlhttp.responseXML.documentElement.getElementsByTagName("shortcut");		
				if (x.length == 0){
					document.getElementById("shortcut_data").style.display = "";
					document.getElementById("shortcut_data").innerHTML = txt;
					document.getElementById("shortcut_add").style.display = "";
				}
				else{
					document.getElementById("shortcut_data").style.display = "";
					for (i=0;i<x.length;i++){
						x_id=x[i].getElementsByTagName("id");
						x_group=x[i].getElementsByTagName("group");
						x_function=x[i].getElementsByTagName("function");
						x_key=x[i].getElementsByTagName("key");
						txt = txt + "<tr id=\"shortcut" + x_id[0].firstChild.nodeValue + "\"><td>" + x_id[0].firstChild.nodeValue + "</td><td>"  + x_group[0].firstChild.nodeValue +
						 "</td><td>" + x_function[0].firstChild.nodeValue + "</td><td>" + x_key[0].firstChild.nodeValue + "</td><td><a href='javascript:void(0)' onclick='delete_shortcut(" + x_id[0].firstChild.nodeValue + ")' /><i class=\"fa fa-trash-o\"></i></a></td></tr>";
					}
					document.getElementById("shortcut_data").innerHTML = txt;
					document.getElementById("shortcut_add").style.display = "";
				}			
			}
		}
		xmlhttp.open("GET", "get_shortcut_data.php?sid=" + shortcut_id, true);
		xmlhttp.send();
			
	}
	
	/*add shortcut data*/
	function add_shortcut(){
		
		var add_id = document.getElementById("selectbox").value;
		var add_groupname = document.getElementById("groupname").value;
		var add_function = document.getElementById("function").value;
		var add_shortcut = document.getElementById("shortcut").value;
		
		var add_url = "add_shortcut.php?id=" + add_id + "&group=" + add_groupname + "&function=" + add_function + "&shortcut=" + add_shortcut;
		
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
				
				/*add result*/
				if (x == "failed"){			
					document.getElementById("result").style.display = "";
					document.getElementById("result").innerHTML = "Failed!";
				}
				else{
					var newNode = document.createElement("tr");
					newNode.id = "shortcut" + x;
					newNode.innerHTML = "<td>" + x + "</td><td>" + add_groupname + "</td><td>" + add_function + "</td><td>" + add_shortcut + "</td><td><a href='javascript:void(0)' onclick='delete_shortcut(" + x + ")' /><i class=\"fa fa-trash-o\"></i></a></td>";
					
					document.getElementById("shortcut_data").appendChild(newNode);
					document.getElementById("result").style.display = "";
					document.getElementById("result").innerHTML = "Success!";
					
					document.getElementById("function").value = "";
					document.getElementById("shortcut").value = "";
							
					setTimeout("display_none_result()",1500);
				}			
			}
		}
		xmlhttp.open("GET", add_url, true);
		xmlhttp.send();

	}
	
	function clear_input(){
		document.getElementById("groupname").value = "";
		document.getElementById("function").value = "";
		document.getElementById("shortcut").value = "";
	}
	
	function delete_shortcut(delete_id){
				
		var delete_url = "delete_shortcut.php?id=" + delete_id;
		
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
				
				/*delete success*/
				if (x == "deleted"){
					document.getElementById("result").style.display = "";
					document.getElementById("result").innerHTML = "Deleted!";
					
					var delete_tr = document.getElementById("shortcut" + delete_id);
					delete_tr.parentNode.removeChild(delete_tr);
					
					setTimeout("display_none_result()",1500);
					
				}
				else{
					document.getElementById("result").style.display = "";
					document.getElementById("result").innerHTML = "Delete Failed!";
				}			
			}
		}
		xmlhttp.open("GET", delete_url, true);
		xmlhttp.send();
	}
	
	function display_none_result(){
		document.getElementById("result").style.display = "none";	
	}
	
	</script>
	
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
	echo "</select><br />\n";
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