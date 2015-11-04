<?php
	
	/*get display text*/
	include 'api/display_text.php';
	include 'api/connect.php';
	
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
	echo "\t<title>" . $title_hp_text . "</title>\n";
	echo "\t<link rel='stylesheet' type='text/css' href='css/main.css'>\n";
	echo "\t<link rel='stylesheet' type='text/css' href='css/material.css'>\n";
	echo "\t<script src='js/material.js'></script>";
	echo "</head>\n";
	echo "<body>\n";
	
	echo "\t<div class='box_header_hp'><div class='header_hp'>\n";
	
	/*echo "\t\t<h1>Keyboardance</h1>\n";*/
	keyboard_output("KEYBOARDANCE");
		
	echo "\t\t<div class='text_align_center'><form action='search.php' method='post'><div class='mdl-textfield mdl-js-textfield'>\n";
	echo "\t\t\t<input class='mdl-textfield__input' name='keyword' type='text' autocomplete='off'>\n";
	echo "<label class='mdl-textfield__label text_align_center' for='sample1'>Text...</label>";
	echo "\t\t</div></form></div>\n";
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
	
	echo "\t<div class='footer'>Powered by Bobo Jin · <a href='api/admin.php' target='_blank'>Login</a></div>\n";
	echo "</body>\n";
	echo "</html>";
?>