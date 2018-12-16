<?php
//require_once("controllers/init.php");
require_once("../init.php");
require_once("../../model/classes/CustomerData.php");
// print_r($_POST);

// print ($_POST['CustomerID']);

$customer_id = $_POST['CustomerID'];


$customerData = new CustomerData();
$customer = $customerData->getCustomer($customer_id);
// print_r($customer);

$notes = $customerData->getNotes($customer_id);
//print_r($notes);


$jsonNotesString = "";
foreach ($notes as $key => $note)
{
//	echo '{ "Note": ' . $note . '},';
	$jsonNotesString .= ' "Note ' . $key . '": "' . $note . '",';
}
$jsonNotesString .= substr($jsonNotesString, 0,-1);

//echo $jsonNotesString;



$date = new DateTime($customer->get_creationDate());
$datestr = $date->format("l j F Y \a\\t h:i");


$jsonString  = '{ ';
$jsonString .= '"customer_id": '   . $customer->get_customer_id()  . ', ';
$jsonString .= '"status": "'       . $customer->get_status()       . '", ';
$jsonString .= '"creationDate": "' . $datestr                      . '", ';
$jsonString .= '"information": "'  . $customer->get_information()  . '", ';
$jsonString .= '"notes": {'        . $jsonNotesString             . '} '; 
$jsonString .= '}';


echo ($jsonString);

