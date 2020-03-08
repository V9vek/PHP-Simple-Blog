<?php
	
	/**
	  *Database linking class 
	  */
	 class Database 
	 {
	 	public $db_host = DB_HOST,
	 			$db_username = DB_USER,
	 		   	$db_password = DB_PASS,
	 		    $db_name = DB_NAME;

	 	public $link;
	 	public $error;

	 	//connstructor
	 	public function __construct(){ 

	 			//Call Connect function
	 			$this->connect();
	 	}


	 	//connect() function
	 	private function connect(){

	 		$this->link = new mysqli($this->db_host,$this->db_username,$this->db_password,$this->db_name);

	 		if (!$this->link) {
	 			$this->error = "Connection Failed : ".$this->link->connect_error;
	 			return false;
	 		}
	 	}


	 	//Select 
	 	public function select($query){

	 		$result = $this->link->query($query) or die($this->link->error.__LINE__);

	 		if ($result->num_rows > 0) {
	 			return $result;
	 		}else{
	 			return false;
	 		}

	 	}


	 	//Insert
	 	public function insert($query){

	 		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

	 		//Validate insert
	 		if ($insert_row) {
	 			header("Location: index.php?msg=Record Added");
	 			exit();
	 		}
	 		else{
	 			die('Error : Record not inserted !');
	 		}
	 	}


	 	//Update
	 	public function update($query){

	 		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);

	 		//Validate insert
	 		if ($update_row) {
	 			header("Location: index.php?msg=Record Updated");
	 			exit();
	 		}
	 		else{
	 			die('Error : Record not updated !');
	 		}
	 	}


	 	//Delete
	 	public function delete($query){

	 		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

	 		//Validate insert
	 		if ($delete_row) {
	 			header("Location: index.php?msg=Record Deleted");
	 			exit();
	 		}
	 		else{
	 			die('Error : Record not deleted !');
	 		}
	 	}

	 } 
 ?>