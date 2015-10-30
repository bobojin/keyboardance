<?php
	
	header('Content-type:text/xml');

	include 'connect.php';
	
	$sid = $_GET['sid'];
	
	$result = mysql_query("SELECT id,group_name,function,key_input FROM shortcut_data WHERE shortcut_id = '$sid'");
	
	$doc = new DOMDocument('1.0', 'utf-8');
	$doc->formatOutput = true;
	$r = $doc->createElement("root");
	$doc->appendChild($r);
	
	while($row = mysql_fetch_array($result)){
		
	    $b = $doc->createElement("shortcut");
	    
	    $group_name = $doc->createElement("id"); 
	    $group_name->appendChild($doc->createTextNode($row['id']));
	    $b->appendChild($group_name);
	    
	    $group_name = $doc->createElement("group"); 
	    $group_name->appendChild($doc->createTextNode($row['group_name']));
	    $b->appendChild($group_name);
	    
		$function = $doc->createElement("function");
	    $function->appendChild($doc->createTextNode($row['function']));
	    $b->appendChild($function);
	    
	    $key_input = $doc->createElement("key");
	    $key_input->appendChild($doc->createTextNode($row['key_input']));
	    $b->appendChild($key_input);
	    
	    $r->appendChild($b);
	    
	} 
		 
	echo $doc->saveXML(); 
		
	mysql_close($con);
?>