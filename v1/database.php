<?php

class Database {

	public $connection;
	public function __construct () {
	  $servername = "localhost";
		$username = "root";
		$password = "";
		$db = "junimea";
 
		$servername = "mysql.hostinger.ro" //sample host 
		$username = "u407201591_paul";
		$password = "cacatpisat";
 		$db = "u407201591_paul";
		// Create connection
		$this->connection = mysqli_connect($servername, $username, $password,$db);
		// $this->connection->select_db($db);
		
  	}

  	public function addPost($details,$imageFull,$category){
  		$date=round(microtime(true) * 1000);
  		$sql = "insert into post(details,imageFull,category,date) 
  		values('".$details."','".$imageFull."','".$category."','".$date."')";
  		if ($this->connection->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
  		
  	}
  	public function getPosts($offset,$limit,$category,$beforeDate){
  		if ($limit>20) {
  			$limit=20;
  		}
  		$sql = "select * from post ";
  		if(!is_null($category) || !is_null($beforeDate)){
  			$sql=$sql."where ";
  			if (!is_null($category) && !is_null($beforeDate)) {
  				$sql=$sql."category='".$category."' and date < '".$beforeDate."'";
  			}
  			else if (!is_null($category)) {
  				$sql=$sql."category='".$category."'";
  			}else{
  			$sql=$sql."date < '".$beforeDate."'";	
  			}
  			
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


}

?>