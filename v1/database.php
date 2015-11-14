<?php

class Database {

	public $connection;
	public function __construct () {
	    $servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		$this->connection = mysqli_connect($servername, $username, $password);
		$this->connection->select_db('junimea');
		
  	}

  	public function getPosts($offset,$limit,$category){
  		if ($limit>20) {
  			$limit=20;
  		}
  		$sql = "select * from post ";
  		if(!is_null($category)){
  			$sql=$sql."where category='".$category."' ";
  		}
  		$sql=$sql. " order by date desc limit ".$limit." offset ".$offset;
  		$result = $this->connection->query($sql);
	  	$list = array();
  		if ($result->num_rows > 0) {
   			while($row = $result->fetch_assoc()) {
        		$post=new Post;
        		$post->id=$row['id'];
        		$post->imageFull=$row['imageFull'];
        		$post->category=$row['category'];
        		$post->details=$row['details'];
        		$post->date=$row['date'];
        		array_push($list, $post);
    		}
		}
		return $list;
  	}
  	public function isConnected(){
  		if($this->connection){
  			return "Connected";
  		}
  		return "Not connected";
  	}


}

?>