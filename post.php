<?php

class muie {

	public  $id;
	public  $imageFull;
	public  $category;
	public  $date;
	public  $details;

	public function __construct ( $details ) {
    $this->details = $details;
  }

}

class PostResponse{
	public $posts;
	public $count;
}

?>