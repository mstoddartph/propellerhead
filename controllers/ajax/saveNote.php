<?php
//require_once("controllers/init.php");
require_once("../init.php");
require_once("../../model/classes/CustomerData.php");
// print_r($_POST);

// print ($_POST['CustomerID']);

$customer_id = $_POST['CustomerID'];
$noteText = $_POST['Note'];

//echo ($customer_id . $noteText);


$customerData = new CustomerData();
$customerData->saveNote($customer_id,nl2br($noteText));
//echo (json_encode($noteText));


//$customer = $customerData->getCustomer($customer_id);
// print_r($customer);

/*$date = new DateTime($customer->get_creationDate());
$datestr = $date->format("l j F Y \a\\t h:i");
*/

$jsonString  = '{ "customer_id": ' . $customer_id . '}';

echo ($jsonString);
