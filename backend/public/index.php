<?php

declare(strict_types=1);

require_once(__DIR__ . '/../vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;
use SimplePie\SimplePie;
use App\Services\NewsFetcher;
use App\Transformers\NewsTransformer;
use App\Controllers\MainController;
use Symfony\Component\HttpFoundation\Response;


$controller = new MainController(new NewsFetcher(new SimplePie()), new NewsTransformer());

$response = new Response();
$response->headers->set('Content-Type', 'application/json');
$response->headers->set('Access-Control-Allow-Origin', '*');

try {
    $results = $controller->index(Request::createFromGlobals());
    $response->setContent(json_encode(['results' => $results]));
    $response->setStatusCode(Response::HTTP_OK);
} catch (\Exception $exception) {
    $response->setContent(json_encode(['error' => $exception->getMessage()]));
    $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
}

$response->send();
