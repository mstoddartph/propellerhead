<?php
//require_once("controllers/init.php");
require_once("../init.php");
require_once("../../model/classes/CustomerData.php");
// print_r($_POST);

// print ($_POST['CustomerID']);

$status = $_POST['Status'];
$information = $_POST['Information'];


$customerData = new CustomerData();
$customer = $customerData->createCustomer($status,$information); // need error checking if it fails ....
