<head>
	<title>Michael Stoddart</title>
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script language="javascript" src="controllers/js/jquery-1.7.1.min.js"></script>
	<script language="javascript" src="controllers/js/main.js"></script>
	<script>
<?php 
$statusArray = $GLOBALS['STATUS_ITEMS'];
//print_r($statusArray);
$statusStr = "var statusItemsObj = {";
foreach($statusArray as $key => $value)
{
	$statusStr .= "$key: '$value',";
}
$statusStr = substr($statusStr, 0, -1);
$statusStr .= "};";
echo $statusStr;?>
	</script>
</head>