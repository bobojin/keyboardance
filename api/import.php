<html lang='zh-cn'>
<head>
	<meta charset='UTF-8'>
	<meta content='IE=edge' http-equiv='X-UA-Compatible'>
	<title>Data Import - Keyboardance</title>
	<link rel='stylesheet' type='text/css' href='../css/import.css'>
	
	<script>
	function get_group_list(shortcut_id){
		var xmlhttp;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){

				if (xmlhttp.responseText == "None"){
					document.getElementById("group_list").style.display="none";
				}
				else{
					document.getElementById("group_list").style.display="";
					document.getElementById("group_list").innerHTML=xmlhttp.responseText;
				}
			}
		}
		xmlhttp.open("GET","group.php?sid="+shortcut_id,true);
		xmlhttp.send();
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
	$result = mysql_query("SELECT name,id FROM shortcut_list ORDER BY name");
	echo "<h3>Choose Product and Group Name First:</h3>";
	echo "<select onchange='get_group_list(this.value)'>\n";
	echo "\t<option value='null'> - Choose - </option>\n";
	while($row = mysql_fetch_array($result)){
		echo "\t<option value='" . $row['id'] . "' >" . $row['name'] . "</option>\n";
	}
	echo "</select>\n";
	
	echo "<select id='group_list' style='display:none'>\n";
	echo "</select>\n";
	
	mysql_close($con);
	echo "</body>\n</html>\n";
	
?>