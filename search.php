<?php
	
	include 'api/connect.php';
	
	/*output search results*/
	function output_result($input){
		while($row = mysql_fetch_array($input)){
			echo "\t<div class='result_unit_search'>\n";
			echo "\t\t<a href='shortcut.php?sid=" . $row['id'] . "&source=search'>" . $row['name'] . "</a><br />\n";
			echo "\t\t<span class='desc_content_hp'>" . $row['description'] . "</span><br />\n";
			echo "\t</div>\n";
		}
	}
	
	echo "<html lang='zh-cn'>\n";
	echo "<head>\n";
	echo "\t<meta charset='UTF-8'>\n";
	echo "\t<meta content='IE=edge' http-equiv='X-UA-Compatible'>\n";
	echo "\t<title>Search Results - Keyboardance</title>\n";
	echo "\t<link rel='stylesheet' type='text/css' href='css/main.css'>\n";
	echo "\t<link rel='shortcut icon' href='favicon.ico' />\n";
	echo "</head>\n";
	echo "<body>\n";
	
	$keyword = isset($_POST['keyword'])?$_POST['keyword']:"";
	$tag = isset($_GET['tag'])?$_GET['tag']:"";
	
	/*save search history*/
	mysql_query("INSERT INTO keyword_history (keyword,time) VALUES ('$keyword',NOW())");
	
	/*keyword is undefined*/
	if (strlen($keyword) == 0){
		
		/*tag is undefined*/
		if(strlen($tag)==0){
			$result = mysql_query("SELECT * FROM shortcut_list ORDER BY name ");
			echo "\t<div class='header_search'><span>输入为空，默认返回全部结果（" . mysql_num_rows($result) . "）：</span></div>\n";
			output_result($result);		
		}
		/*search by tag*/
		else{
			$result = mysql_query("SELECT * FROM shortcut_list WHERE tags LIKE '%$tag%' ");
			$result_count = 0;
			if ($result){
				$result_count = mysql_num_rows($result);	
			}
			if ($result_count){
				echo "\t<div class='header_search'><span>" . $tag ." 标签下有 " . $result_count . " 个应用：</span></div>\n";
				output_result($result);	
			}
			/*tag match nothing*/
			else{
				$result = mysql_query("SELECT * FROM shortcut_list ORDER BY name ");
				echo "\t<div class='header_search'><span>无成功匹配，默认返回全部应用（" . mysql_num_rows($result) . "）：</span></div>\n";
				output_result($result);		
			}
		}
	}
	else{
		$result = mysql_query("SELECT * FROM shortcut_list WHERE name RLIKE '$keyword' ");
		$result_count = 0;
		if ($result){
			$result_count = mysql_num_rows($result);	
		}
		if ($result_count){
			/*go directly to the shortcut page*/
			if ($result_count == 1){
				$row = mysql_fetch_array($result);
				echo "<script language = 'javascript'>";
				echo "location.href='shortcut.php?sid=" . $row['id'] . "&source=search'";
				echo "</script>";
			}
			/*show list of search results*/
			else{
				echo "\t<div class='header_search'><span>搜索到 " . $result_count . " 个结果：</span></div>\n";
				output_result($result);		
			}
		}
		/*match nothing*/
		else{
			$result = mysql_query("SELECT * FROM shortcut_list ORDER BY name ");
			echo "\t<div class='header_search'><span>无成功匹配，默认返回全部应用（" . mysql_num_rows($result) . "）：</span></div>\n";
			output_result($result);		
		}	
	}
	mysql_close($con);
	
	echo "\t<hr />\n";
	echo "\t<div class='return_search'><a href='index.php'>返回</a></div>\n";
	echo "\t<div class='footer'>Powered by Bobo Jin</div>\n";
	echo "</body>\n";
	echo "</html>";
?>