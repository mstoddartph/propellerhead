<?php
require($GLOBALS['FILE_SYSTEM_ROOT'].'/model/classes/CustomerDataItem.php');

class CustomerData
{
	private $CustomerDataItems = array();



	public function __construct()
	{
		$database = $GLOBALS['DATABASE'];
		$sql = 'select c.*, st.* from customers as c inner join statusTypes as st on c.status = st.status_id';
		$database->ExecuteSQL($sql);
		while($row=$database->getRow())
		{
			$item = new CustomerDataItem
			(
				$row['customers_id'],
				$row['status_text'],
				$row['creationDate'],
				$row['information']
			);
			$this->CustomerDataItems[$row['customers_id']]=$item;
		}

	}

	public function getCustomers()
	{
		return ($this->CustomerDataItems);
	}

	public function getCustomer($id)
	{
		return ($this->CustomerDataItems[$id]);
	}

	public function saveNote($customer_id,$note)
	{
		$database = $GLOBALS['DATABASE'];
		$sql = 'insert into customerNotes (customers_id,note) values ('.$customer_id.',"'.$note.'")';
//		echo $sql;

		$database->ExecuteSQL($sql);
		// need to check it worked
	}

	public function getNotes($id)
	{
		$noteItems = array();

		$database = $GLOBALS['DATABASE'];
		$sql = 'select * from customerNotes where customers_id = '.$id;
//		echo $sql;
		$database->ExecuteSQL($sql);
		while($row=$database->getRow())
		{
			array_push($noteItems,$row['note']);
//			echo ($row['note'] . '\n');
		}
		return ($noteItems);

	}


}