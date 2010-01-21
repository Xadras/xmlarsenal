<?php

/**
 * character-reputation.php
 * 
 * The script handles caching and output of the character-repuatation.xml with respective values.
 *
 * @author Amras Taralom <amras-taralom@streber24.de>
 * @version 1.0, last modified 2009/09/22
 * @package XMLArsenal
 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License version 3 (GPLv3)
 *
*/

require_once './includes/autoload.inc.php';
require_once './includes/config.inc.php';
require_once './includes/db.inc.php';
require_once './includes/data.inc.php';
require_once './includes/functions.inc.php';

//try using cache
$cachefile = FILECACHEFOLDER. md5("character-reputation.xml_".$charname."_on_".$realmName."_lang_".$language) .".cache";
if(USEFILECACHE && file_exists($cachefile) && (filemtime($cachefile) + 60*60*UPDATEINTERVAL > time())){
	echo file_get_contents($cachefile)."<!-- cached file. cache valid until ".date('d.m.Y H:i:s',filemtime($cachefile) + 60*60*UPDATEINTERVAL).". -->";
	die();
}

$char = new Character($charname, $usedRealm);

if($char->getId()){
	
	if($DATA["factions"][$char->getRace()] == 0) 		$xmltmpl = "alliance";
	else if($DATA["factions"][$char->getRace()] == 1) 	$xmltmpl = "horde";
	
	$xml = fgettemplate("./xml-templates/character-sheet-reputation_$xmltmpl.xml", $char->prepareCharacterReputationSheet());
	$xml = str_replace(array("\n", "\r", "\t", "\o", "\xOB", "      "), '', $xml);
	
	$doc = new DOMDocument('1.0');
	$doc->preserveWhiteSpace = false;
	$doc->loadXML($xml);
	$doc->formatOutput = true;
	$xml = $doc->saveXML();
	
	if(USEFILECACHE) file_put_contents($cachefile, $xml);
	
	echo $xml;
	
}else{
	echo fgettemplate('./xml-templates/character-sheet-no-such-char.xml');
}


?>