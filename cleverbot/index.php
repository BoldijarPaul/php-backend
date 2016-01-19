<?php
require_once 'vendor/autoload.php';
include 'AnswerController.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
$app = new Silex\Application();

 
$answerController = new AnswerController();



$app->get('/suggestion', function ( Application $app, Request $request) use ($app) {
		$question= $request->query->get('question');
		global $answerController;
		return createResponse($answerController->getAnswer($question));
});

$app->get('/suggestion/add', function ( Application $app, Request $request) use ($app) {
		$question= $request->query->get('question');
		$answer= $request->query->get('answer');
		global $answerController;
		return createResponse($answerController->addSuggestion($question,$answer));
});

function createResponse($object){
		$response = new Response();
		$response->setContent(json_encode($object));
		$response->setStatusCode(200);
	    $response->headers->set("Access-Control-Allow-Origin","*");
        $response->headers->set("Access-Control-Allow-Methods","GET,POST,PUT,DELETE,OPTIONS");
        $response->headers->set("Content-Type","application/json; charset=UTF-8 ");
        return $response;
}

$app->run();

?>