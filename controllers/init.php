<?php
error_reporting(E_ALL);
date_default_timezone_set("Pacific/Auckland");
ini_set('display_errors', '1');

$GLOBALS['FILE_SYSTEM_ROOT'] = dirname(dirname(__FILE__));

//$GLOBALS['IS_LOGGED_ON'] = 0; // I've put this early to make sure we know from the start that we aren't logged on !


//echo  $GLOBALS['FILE_SYSTEM_ROOT'];

// get config info
$xml = simplexml_load_file($GLOBALS['FILE_SYSTEM_ROOT']."/controllers/config.xml");
if(!isset($xml))echo "$xml not set";
//else echo "XML is set!";

$PathsXML = $xml->Paths;
$GLOBALS['DOCUMENT_ROOT'] = $PathsXML->DocumentRoot;

require_once($GLOBALS['FILE_SYSTEM_ROOT']."/config/version.php");

//echo $PathsXML->DocumentRoot."\n";

//echo $GLOBALS['DOCUMENT_ROOT']."\n";

require_once($GLOBALS['FILE_SYSTEM_ROOT']."/model/classes/database/Database.php");
if(!isset($xml->Database))echo "$xml->Database not set";
$databaseXML = $xml->Database;
$GLOBALS['DATABASE'] = new Database($databaseXML->Server,$databaseXML->Database,$databaseXML->Username,$databaseXML->Password);