<?php
	
	echo "<html lang='zh-cn'>\n";
	echo "<head>\n";
	echo "\t<meta charset='UTF-8'>\n";
	echo "\t<meta content='IE=edge' http-equiv='X-UA-Compatible'>\n";
	echo "\t<title>Login - Keyboardance</title>\n";
	echo "\t<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>";
	echo "\t<script src='../js/admin.js'></script>";
	echo "</head>\n";
	echo "<body>\n";
	
	echo "\t<div style='text-align:center;padding-top:120px'>\n";
	echo "\t\t<h3>后台登录</h3><br />\n";
	echo "\t\t<span>密码:&nbsp;</span><input type='text' id='password' name='password' placeholder='请输入密码' />&nbsp;<input type='button' value='登录' onclick='login()' />\n";
	echo "\t</div>\n";
	
	echo "</body>\n";
	echo "</html>";

?>