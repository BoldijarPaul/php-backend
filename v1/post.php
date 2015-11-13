<?php

class Post {

	public  $id;
	public  $imageFull;
	public  $category;
	public  $date;
	public  $details;

	public function __construct ( $details ) {
    $this->details = $details;
  }

}

?>