<?php
class CustomerDataItem
{
	private $customer_id;
	private $status;
	private $creationDate;
	private $information;

	public function get_customer_id(){return $this->customer_id;}
	public function get_status(){return $this->status;}
	public function get_creationDate(){return $this->creationDate;}
	public function get_information(){return $this->information;}


	public function __construct
	(
		$customer_id,
		$status,
		$creationDate,
		$information
	)
	{
		$this->customer_id=$customer_id;
		$this->status=$status;
		$this->creationDate=$creationDate;
		$this->information=$information;
	}
}