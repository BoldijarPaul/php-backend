<?php
require_once 'vendor/autoload.php';
include 'post.php';
$app = new Silex\Application();



$app->get('/{name}', function ($name,$id) use ($app) {
		return $id;
		// $post1=new Post("example");
		// $post1->id = 12;
		// $post1->details =$name;
		// $post1->imageFull = "www.com.com";
		// return json_encode($post1);
    // return 'Hello '.$app->escape($name);
});

$app->run();