<?php
	
	/*output string into keyboard style*/
	function keyboard_output($input){
		echo "\t\t<div class='keyboard'>\n\t\t\t";
		for ($i=0;$i<strlen($input);$i++){
			echo "<div class='letter'>" . $input[$i] . "</div>";
		}
		echo "\n\t\t\t<div class='clear'></div>\n\t\t</div>\n";
	}
	
	echo "<html lang='zh-cn'>\n";
	echo "<head>\n";
	echo "\t<meta charset='UTF-8'>\n";
	echo "\t<meta content='IE=edge' http-equiv='X-UA-Compatible'>\n";
	echo "\t<title>Keyboardance - Beta</title>\n";
	echo "\t<link rel='stylesheet' type='text/css' href='css/main.css'>\n";
	echo "</head>\n";
	echo "<body>\n";
	
	echo "\t<div class='box_header_hp'><div class='header_hp'>\n";
	
	/*echo "\t\t<h1>Keyboardance</h1>\n";*/
	keyboard_output("KEYBOARDANCE");
		
	echo "\t\t<div class='text_align_center'><form action='search.php' method='post'>\n";
	echo "\t\t\t<input name='keyword' type='text' placeholder='输入名称后回车' autocomplete='off'>\n";
	echo "\t\t\t<input type='submit' value='搜索'>\n";
	echo "\t\t</form></div>\n";
	echo "\t</div></div>\n";
	
	$con = mysql_connect("127.0.0.1","root","123456");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("shortcuts", $con);
	mysql_query("SET NAMES UTF8");
	
	$result = mysql_query("SELECT * FROM shortcut_list ORDER BY count DESC LIMIT 5");
	
	echo "\t<div class='content_hp'><div>\n";
	echo "\t<div class='title_content_hp'><b>=TOP5推荐=</b></div><br />\n";
		
	while($row = mysql_fetch_array($result)){
		echo "\t\t<div class='shortcut_hp'>\n";
		echo "\t\t\t<a href='shortcut.php?sid=" . $row['id'] . "&source=hp'>" . $row['name'] . "</a><br />\n";
		echo "\t\t\t<span class='desc_content_hp'>" . $row['description'] . "</span><br />\n";
		echo "\t\t</div>\n";
	}
	echo "\t<div class='clear'></div>\n";
	echo "\t</div></div>\n";
	
	mysql_close($con);
	
	echo "\t<div class='footer'>Powered by <a href='import.php'>Bobo Jin</a></div>\n";
	echo "</body>\n";
	echo "</html>";
?>