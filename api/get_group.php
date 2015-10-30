<?php
	
	header('Content-type:text/xml');

	include 'connect.php';
	
	$sid = $_GET['sid'];
	
	$result = mysql_query("SELECT DISTINCT(group_name) FROM shortcut_data WHERE shortcut_id = '$sid'");
	
	$doc = new DOMDocument('1.0', 'utf-8');
	$doc->formatOutput = true; 
	$r = $doc->createElement("root"); 
	$doc->appendChild($r); 
	
	while($row = mysql_fetch_array($result)){
	    $b = $doc->createElement("group"); 
	    $name = $doc->createElement("name"); 
	    $name->appendChild($doc->createTextNode($row['group_name'])); 
	    $b->appendChild($name);  
	    $r->appendChild($b); 
	} 
		 
	echo $doc->saveXML(); 
		
	mysql_close($con);
?>