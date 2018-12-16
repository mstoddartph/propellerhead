<?php 
class StatusTextArray
{
//	private $StatusTextItems = array();


	public function __construct()
	{
		$database = $GLOBALS['DATABASE'];
		$sql = 'select * from statusTypes';
		$database->ExecuteSQL($sql);

		while($row=$database->getRow())
		{
			$this->StatusTextItems[$row['status_id']] = $row['status_text']; 
		}

	}

	public function getStatusItems()
	{
		return ($this->StatusTextItems);
	}

}


