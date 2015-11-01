<?php
	
	include 'api/connect.php';

	/*invalid id output*/
	function invalid_id_output($title, $content){
		echo "\t<title>Invalid ID - Keyboardance</title>\n";
		echo "\t<link rel='stylesheet' type='text/css' href='css/main.css'>\n";
		echo "</head>\n";
		echo "<body>\n";
		echo "\t<div class='box_header_hp'>";
		echo "\t\t<div class='return_sc'><a href='index.php'>返回</a></div>\n";
		echo "\t\t<div class='header_hp'>\n";
		echo "<h2>" . $title . "</h2>\n";
		echo "\t\t</div>\n\t</div>\n";
		echo "\t<div><div class='content_sc text_align_center'>" . $content . "</div></div><br />\n";
	}
	
	/*tags output*/
	function tags_output($tags){
		echo "\t\t\t<div class='tag_sc'><span>标签：";
		$tags_array = explode(", ", $tags);
		foreach($tags_array as $tag){
			echo "<a href='search.php?tag=" . $tag . "' title='$tag'>" . $tag . "</a>"; 			
		}
		echo "</span></div>\n";
	}
	
	/*html start*/
	echo "<html lang='zh-cn'>\n";
	echo "<head>\n";
	echo "\t<meta charset='UTF-8'>\n";
	echo "\t<meta content='IE=edge' http-equiv='X-UA-Compatible'>\n";
	
	$sid = $_GET['sid'];
	
	$title_name = mysql_query("SELECT name FROM shortcut_list WHERE id = $sid");
	
	if ($title_name){
		
		/*valid id*/
		if (mysql_num_rows($title_name)){
			
			/*get title name*/
			$row_title_name = mysql_fetch_array($title_name);
			echo "\t<title>" . $row_title_name['name'] . " - Keyboardance</title>\n";
			echo "\t<link rel='stylesheet' type='text/css' href='css/main.css'>\n";
			echo "</head>\n";
			echo "<body>\n";
			
			/*visited count*/
			mysql_query("UPDATE shortcut_list SET count = count+1 WHERE id = $sid");
			
			/*get basic information*/
			$result_name = mysql_query("SELECT name,count,tags FROM shortcut_list WHERE id = $sid");
			echo "\t<div class='box_header_hp'>";
			echo "\t\t<div class='return_sc'><a href='#'>获取打印版</a>&nbsp;&nbsp;<a href='index.php'>返回</a></div>\n";
			echo "\t\t<div class='header_hp'>\n";
			$row_name = mysql_fetch_array($result_name);
			echo "\t\t\t<h2>" . $row_name['name'] . "</h2>\n";
			
			tags_output($row_name['tags']);
			
			echo "\t\t\t<div class='count_sc'><span>访问次数：" . $row_name['count'] . "</span></div>\n";
			echo "\t\t</div>\n\t</div>\n";
			
			/*get data by group*/
			$result = mysql_query("SELECT DISTINCT(group_name) FROM shortcut_data WHERE shortcut_id = $sid");
			if (mysql_num_rows($result)){
				
				echo "\t<div><div class='content_sc'>\n";	
				/*get data by group*/
				while($row = mysql_fetch_array($result)){
					$groupname = $row['group_name'];
					echo "\t\t<div class='group_section_sc'><h3>" . $groupname . "</h3>\n";	
					$result_data = mysql_query("SELECT * FROM shortcut_data WHERE shortcut_id = $sid AND group_name LIKE '$groupname' ");
					/*each group*/
					while($row_data = mysql_fetch_array($result_data)){
						echo "\t\t<div class='key_line_sc'><span class='function_sc'>" . $row_data['function'] . "</span> <span class='key_sc'>" . $row_data['key_input'] . "</span></div>";
					}
					echo "\t\t</div>";		
				}	
				echo "\t</div></div>\n";
			}
			/*valid id without data*/
			else{
				echo "\t<div><div class='content_sc text_align_center'>无数据</div></div><br />\n";
			}
		}
		/*id not exist*/
		else{
			invalid_id_output('ID NOT EXIST', '无数据');
		}
	}
	/*id error*/
	else{
		invalid_id_output('ERROR', '输入异常');
	}
	
	mysql_close($con);
	
 	echo "\t<div class='footer'>Powered by Bobo Jin</div>\n";
	echo "</body>\n";
	echo "</html>";
?>