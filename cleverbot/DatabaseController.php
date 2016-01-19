<?php

include 'database.php';

class DatabaseController {
 
 	private $connection;

 	public function __construct(){
 		$this->connection = Database::getInstance()->connection;
 	}

 	public function getConnection(){
 		return $this->connection;
 	}
 	public function getError(){
 		return mysqli_error($this->connection);
 	}
 
 	public function createResponse($success,$message,$error){
 		$obj = new stdClass();
 		$obj->success = $success;
 		$obj->message = $message;
 		$obj->error = $error;
 		return $obj;
 	}

 	 

}



?>