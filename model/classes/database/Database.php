<?php

class Database
{
	private $server;
	private $database;
	private $username;
	private $password;
	private $db;
	private $query_id;
	private $lastSQL;
	private $result;
//	private $last_insert_id;

	private $tables;

	public function __construct($aServer,$aDatabase,$aUsername,$aPassword)
	{
		$this->server =  $aServer;
		$this->database = $aDatabase;
		$this->username = $aUsername;
		$this->password = $aPassword;
		
//		echo "New Database object\n";
		
//		echo $this->server." ";
//		echo $this->database." ";
//		echo $this->username." ";
//		echo $this->password."\n\n";
				
		$this->db = new mysqli($this->server, $this->username, $this->password, $this->database);
//		echo "Setting \$this->db - error number = ".$this->db->connect_error."\n";
//		echo "New database name is ".$this->getDatabaseName()."\n";
//		echo "Host info - ".$this->db->host_info . "\n";
		
//		print_r ($this->db);
		if ($this->db->connect_error) 
		{
		   die('Connect Error (' . $this->db->connect_errno . ') '
		        . $this->db->connect_error);		
		}
		
//		exit();
	}


	public function Recopy()
		{
			$newDatabase = new Database($this->server,$this->database,$this->username,$this->password);
			return $newDatabase;
		}


	public function ExecuteSQL($sql)
	{
//		echo "ExecuteSQL  ".$sql."\n";
//		echo "Host info - ".$this->db->host_info . "\n";
		if($this->db)
		{
//			echo "Name of database = ".$this->database."\n";
			$result = $this->db->query($sql);
//			if($result!=1)
//				echo $result->num_rows." rows returned\n";
//			echo "Setting \$this->result \n";
			$this->result = $result;
//			echo "ExecuteSQL - saved result ...\nResult = ";
//			print_r ($result);
//			echo "\n";
			$this->lastSQL = $sql;
//			$this->last_insert_id=$this->db->insert_id;
		}
		else echo "Null database instance!\n";
	}		

	public function getDatabaseName() {return $this->database;}

	public function getRow()
	{
		$row = null;
		if($this->result)
		{
			$row= $this->result->fetch_array(MYSQLI_BOTH);	
//			echo "We have a result ";
		}
		return $row;
	}
	
	public function getNumRows()
	{
//		print_r ($this->result);
		return $this->result->num_rows;
	}
	
	public function getInsertID()
	{
		return $this->db->insert_id;
	}

	public function close()
	{
			$this->db->close();
//			$this__destruct();
	}

}


?>