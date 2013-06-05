<?php

 	$data  = mysql_real_escape_string($_POST['data']);
 	$skins = explode("; ", $data);
 	array_pop($skins); //pop the last element

//create the xml document
$xmlDoc = new DOMDocument();
//create the root element
$root = $xmlDoc->appendChild(
$xmlDoc->createElement("SkinCollection"));
//create a skin element
$skinTag = $root->appendChild(
$xmlDoc->createElement("Skins"));

foreach ($skins as $skin) 
{
	//create a skin element
	$skinT = $skinTag->appendChild(
	$xmlDoc->createElement("Skin"));
	
	$attributs = explode(", ", $skin);
	
	
		//create the skinName element
		$skinT->appendChild(
		$xmlDoc->createElement("skinName", $attributs[0]));
		//create the sound element
		$skinT->appendChild(
		$xmlDoc->createElement("sound", $attributs[1]));
		//create the particle element
		$skinT->appendChild(
		$xmlDoc->createElement("particle", $attributs[2]));
		//create the tempo element
		$skinT->appendChild(
		$xmlDoc->createElement("tempo", $attributs[3]));
		//create the official element
		$skinT->appendChild(
		$xmlDoc->createElement("official", strtolower($attributs[4])));
	
}



//make the output pretty
$xmlDoc->formatOutput = true;
$xmlDoc->save('skins.xml');
	


    
    
	
 ?>