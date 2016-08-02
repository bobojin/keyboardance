<?php
	
	include 'connect.php';
	
	$pw = $_COOKIE['password'];
	$username = "";
	
	/*check password first*/
	if(strlen($pw) == 0){
		echo "<script>location.href='login.php?status=failed'</script>";
	}
	else{
		$check_password = mysql_query("SELECT username FROM admin_account WHERE password LIKE '$pw'");
		$account_match = mysql_num_rows($check_password);
		if($account_match == 0){
			echo "<script>location.href='login.php?status=failed'</script>";
		}
		else{
			$row = mysql_fetch_array($check_password);
			$username = $row['username'];
			setcookie("username", $username, time()+3600);
		}
	}

	echo "<html lang='zh-cn'>";
	echo "<head>";
	echo "\t<meta charset='UTF-8'>";
	echo "\t<meta content='IE=edge' http-equiv='X-UA-Compatible'>";
	echo "\t<title>Data Import - Logged in as " . $username . "</title>";
	echo "\t<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>";
	echo "\t<link rel='stylesheet' type='text/css' href='../css/font-awesome.css'>";
	echo "\t<link rel='stylesheet' type='text/css' href='../css/admin.css'>";
	echo "\t<script src='../js/admin.js'></script>";
	echo "</head>";
	echo "<body>";
	
	echo "<div class='select_board'>\n";
	echo "<h3>选择应用</h3>";
	
	/*get data*/
	$result = mysql_query("SELECT name,id FROM shortcut_list ORDER BY name");
	echo "<select id='selectbox' onchange='get_shortcut_data(this.value)'>\n";
	echo "\t<option value='0'> - 请选择 - </option>\n";
	while($row = mysql_fetch_array($result)){
		echo "\t<option value='" . $row['id'] . "' >" . $row['name'] . "</option>\n";
	}
	echo "</select>&nbsp;&nbsp;&nbsp;<a href='../index.php' id='view_url' target='_blank' >查看</a><br />\n";
	echo "</div>\n";
	
	/*output data*/
	echo "<table id='shortcut_data' style='display:none' border='1' ></table>\n";
	echo "<br />\n";
	
	echo "<div class='control_board'>\n";

	echo "<div id='shortcut_add' style='display:none'>\n";
	echo "<span class='input_item'>Group Name:</span><input type='text' id='groupname' name='groupname' class='input_box' /><br />\n";
	echo "<span class='input_item'>Function:</span><input type='text' id='function'  name='function' class='input_box' /><br />\n";
	echo "<span class='input_item'>Shortcut:</span><input type='text' id='shortcut'  name='shortcut' class='input_box' /><br />\n";
	echo "<input type='button' id='submit_button' class='submit_button' value='Add to' onclick='add_shortcut()' />\n";
	echo "<input type='button' value='Clear' onclick='clear_input()' />\n";
	echo "<input type='button' value='Group Add...' onclick='add_shortcut_group()' />\n";
	echo "</div>\n";
	
	echo "<div id='shortcut_update' style='display:none'>\n";
	echo "<span id='update_id' style='display:none'>0</span>\n";
	echo "<span class='input_item'>Group Name:</span><input type='text' id='update_groupname' name='groupname' class='input_box' /><br />\n";
	echo "<span class='input_item'>Function:</span><input type='text' id='update_function'  name='function' class='input_box' /><br />\n";
	echo "<span class='input_item'>Shortcut:</span><input type='text' id='update_shortcut'  name='shortcut' class='input_box' /><br />\n";
	echo "<input type='button' id='submit_button' class='submit_button' value='Save' onclick='submit_update()' />\n";
	echo "<input type='button' value='Cancel' onclick='close_update()' />\n";
	echo "</div>\n";
	
	echo "<div id='shortcut_group_add' style='display:none'>\n";
	echo "<span><b>格式</b>（第一行:组名称 - 第二行:分隔符 - 第三行:数据内容左右顺序 - 第四行:数据）</span><br /><textarea id='add_group_data' placeholder='请按照格式输入'/></textarea><br />\n";
	echo "<input type='button' id='submit_button' class='submit_button' value='Add to' onclick='submit_group_add()' />\n";
	echo "<input type='button' value='Cancel' onclick='end_group_add()' />\n";
	echo "</div>\n";
	
	echo "<div id='result' style='display:none' >Result:</div>\n";
	
	echo "</div>\n";
	
	mysql_close($con);
	
	echo "</body>\n";
	echo "</html>\n";
?>