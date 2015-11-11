<?php
	
	/*get display text*/
	include 'api/display_text.php';
	include 'api/connect.php';
	
	/*output string into keyboard style*/
	function keyboard_output($input){
		echo "\t\t<div class='keyboard'>\n";
		for ($i=0;$i<strlen($input);$i++){
			echo "\t\t\t<div class='letter'>" . $input[$i] . "</div>\n";
		}
		echo "\t\t\t<div class='clear'></div>\n\t\t</div>\n";
	}
	
	echo "<html lang='zh-cn'>\n";
	echo "<head>\n";
	echo "\t<meta charset='UTF-8'>\n";
	echo "\t<meta content='IE=edge' http-equiv='X-UA-Compatible'>\n";
	echo "\t<link rel='shortcut icon' href='favicon.ico' />\n";
	echo "\t<title>" . $title_hp_text . "</title>\n";
	echo "\t<meta name='keywords' content='keyboardance, 键盘舞步, 快捷键, 快捷键大全, shortcut' />\n";
	echo "\t<meta name='description' content='KeyboarDance.com是收录各种快捷键信息的一个网站。' />\n";
	echo "\t<link rel='stylesheet' type='text/css' href='css/main.css'>\n";
	echo "</head>\n";
	echo "<body>\n";
	
	include_once('api/analyticstracking.php');
	
	echo "\t<div class='box_header_hp'><div class='header_hp'>\n";
	
	/*echo "\t\t<h1>Keyboardance</h1>\n";*/
	keyboard_output("KEYBOARDANCE");
		
	echo "\t\t<div class='text_align_center'><form action='search.php' method='post'>\n";
	echo "\t\t\t<input name='keyword' type='text' placeholder= '" . $search_placeholder_hp_text . "' autocomplete='off'>\n";
	echo "\t\t\t<input type='submit' value='" . $search_button_hp_text . "'>\n";
	echo "\t\t</form></div>\n";
	echo "\t</div></div>\n";
	
	$result = mysql_query("SELECT * FROM shortcut_list ORDER BY count DESC LIMIT 5");
	
	echo "\t<div class='content_hp'><div>\n";
	echo "\t<div class='title_content_hp'><b>" . $title_content_hp_text . "</b></div><br />\n";
		
	while($row = mysql_fetch_array($result)){
		echo "\t\t<div class='shortcut_hp'>\n";
		echo "\t\t\t<a href='shortcut.php?sid=" . $row['id'] . "&source=hp'>" . $row['name'] . "</a><br />\n";
		echo "\t\t\t<span class='desc_content_hp'>" . $row['description'] . "</span><br />\n";
		echo "\t\t</div>\n";
	}
	echo "\t<div class='clear'></div>\n";
	echo "\t</div></div>\n";
	
	mysql_close($con);
	
	echo "\t<div class='footer'>Powered by Bobo Jin · <a href='mailto:806600006@qq.com?subject=Feedback of Keyboardance'>Feedback</a> · <a href='api/admin.php' target='_blank'>Login</a></div>\n";
	echo "</body>\n";
	echo "</html>";
?>