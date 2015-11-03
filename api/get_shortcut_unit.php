<?php
	
	header('Content-type:text/xml');

	include 'connect.php';
	
	$id = $_GET['id'];
	
	$result = mysql_query("SELECT group_name,function,key_input FROM shortcut_data WHERE id = '$id'");
	
	$doc = new DOMDocument('1.0', 'utf-8');
	$doc->formatOutput = true;
	$r = $doc->createElement("root");
	$doc->appendChild($r);
	
	while($row = mysql_fetch_array($result)){
		
	    $b = $doc->createElement("shortcut_item");
	    
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