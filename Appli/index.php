<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '\vendor\autoload.php';

use \Psr\Http\Message\{ServerRequestInterface as Request, ResponseInterface as Response};

$c = new Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new Slim\App($c);

\applibd\bd\Eloquent::start(__DIR__ . '/src/conf/conf.ini');

$app->get('/', function(Request $request, Response $response, $args) {
    $response->getBody()->write("Test");
    return $response;
});

$app->get('/game/{id}', function(Request $request, Response $response, $args) {
    $c = new \applibd\control\Controller();

    $res = $c->findGame($args['id']);
    $response->getBody()->write($res);
    $response->withHeader('Content-Type','application/json');
    return $response;
});

$app->get('/games', function(Request $request, Response $response, $args) {
    $c = new \applibd\control\Controller();
    $res = $c->getGames();
    $response->getBody()->write($res);
    $response->withHeader('Content-Type','application/json');
    return $response;
});
try {
    $app->run();
} catch (Throwable $e) {
    echo $e->getTraceAsString();
}
