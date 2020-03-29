<?php

require_once __DIR__ . '\vendor\autoload.php';

use \Psr\Http\Message\{ServerRequestInterface as Request, ResponseInterface as Response};

$c = new Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new Slim\App($c);

\applibd\bd\Eloquent::start(__DIR__ . '/src/conf/conf.ini');

$app->get('/api/games/{id}', function(Request $request, Response $response, $args) use ($app) {
    $c = new \applibd\control\Controller($app->getContainer());

    $res = $c->findGame($args['id']);
    $response->getBody()->write($res);
    $response->withHeader('Content-Type','application/json');
    return $response;
})->setName('gamesId');

$app->get('/api/games', function(Request $request, Response $response, $args) use ($app) {
    $c = new \applibd\control\Controller($app->getContainer());
    $res = $c->gamesByPage($request->getQueryParam('page'));
    $response->getBody()->write($res);
    $response->withHeader('Content-Type','application/json');
    return $response;
})->setName('games');

$app->get('/api/games/{id}/characters', function(Request $request, Response $response, $args) use ($app) {
    $c = new \applibd\control\Controller($app->getContainer());

    $res = $c->getCharacters($args['id']);
    $response->getBody()->write($res);
    $response->withHeader('Content-Type','application/json');
    return $response;
})->setName('characters');

$app->get('/api/characters/{id}', function(Request $request, Response $response, $args) use ($app) {
    $c = new \applibd\control\Controller($app->getContainer());

    $res = $c->getCharacter($args['id']);
    $response->getBody()->write($res);
    $response->withHeader('Content-Type','application/json');
    return $response;
})->setName('character');

try {
    $app->run();
} catch (Throwable $e) {
    echo $e->getTraceAsString();
}
