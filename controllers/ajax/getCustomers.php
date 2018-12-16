<?php
//require_once("controllers/init.php");
require_once("../init.php");
require_once("../../model/classes/CustomerData.php");

$customerData = new CustomerData();
$customerArray = $customerData->getCustomers();
//print_r($customerArray);

$jsonString = "";
$jsonString .= '[ ';
foreach($customerArray as $customer)
{
	$date = new DateTime($customer->get_creationDate());
	$datestr = $date->format("l j F Y \a\\t h:i");


	$jsonString .= '{ ';
	$jsonString .= '"customer_id": '   . $customer->get_customer_id()  . ', ';
	$jsonString .= '"status": "'        . $customer->get_status()       . '", ';
	$jsonString .= '"creationDate": "' . $datestr                      . '", ';
	$jsonString .= '"information": "'  . $customer->get_information()  . '" ';
	$jsonString .= '},';
}
$jsonString = substr($jsonString, 0,-1);
$jsonString .= '] ';

echo ($jsonString);
