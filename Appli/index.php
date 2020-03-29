<?php

require_once __DIR__ . '\vendor\autoload.php';

use \Psr\Http\Message\{ServerRequestInterface as Request, ResponseInterface as Response};

$c = new Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new Slim\App($c);

\applibd\bd\Eloquent::start(__DIR__ . '/src/conf/conf.ini');

$app->get('/', function(Request $request, Response $response, $args) {
    $response->getBody()->write("Test");
    return $response;
});

$app->get('/games/{id}', function(Request $request, Response $response, $args) use ($app) {
    $c = new \applibd\control\Controller($app->getContainer());

    $res = $c->findGame($args['id']);
    $response->getBody()->write($res);
    $response->withHeader('Content-Type','application/json');
    return $response;
})->setName('gamesId');

$app->get('/games', function(Request $request, Response $response, $args) use ($app) {
    $c = new \applibd\control\Controller($app->getContainer());
    if($request->getQueryParam('page') != null) {
        $res = $c->gamesByPage($request->getQueryParam('page'));
    } else {
        $res = $c->getGames();
    }
    $response->getBody()->write($res);
    $response->withHeader('Content-Type','application/json');
    return $response;
})->setName('games');

$app->get('/games/{id]/comments', function(Request $request, Response $response, $args) use ($app) {
    $c = new \applibd\control\Controller($app->getContainer());

    $res = $c->getComments($args['id']);
    $response->getBody()->write($res);
    $response->withHeader('Content-Type','application/json');
    return $response;
})->setName('comments');

try {
    $app->run();
} catch (Throwable $e) {
    echo $e->getTraceAsString();
}
