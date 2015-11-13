<?php
require_once 'vendor/autoload.php';
include 'post.php';
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
$app = new Silex\Application();



$app->get('/posts', function ( Application $app, Request $request) use ($app) {

		$limit= $request->query->get('limit');
		$offset=$request->query->get('offset');
		$beforeDate=$request->query->get('beforeDate');
		$category=$request->query->get('category');


		if( is_null($category) ||
			is_null($category) ||
			is_null($category) ||
			is_null($category)){

		}
		return "categorie k";
		// $postResponse =new PostResponse;
		// $postResponse->posts=$array;
		// $postResponse->count=count($array);

		// return json_encode($postResponse);
});

$app->run();

?>