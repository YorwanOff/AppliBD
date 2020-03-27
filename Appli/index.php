<?php

require_once __DIR__ . '/vendor/autoload.php';

use \Psr\Http\Message\{ServerRequestInterface as Request, ResponseInterface as Response};

$c = new Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new Slim\App($c);

\applibd\bd\Eloquent::start(__DIR__ . '/src/conf/conf.ini');

$app->get('/game/:id', function(Request $request, Response $response, $args) {
    $c = new \applibd\control\Controller();
    $c->findGame($args['id']);
    return $response;
});

$app->get('/games', function(Request $request, Response $response, $args) {
    $c = new \applibd\control\Controller();
    $c->getGames();
    return $response;
});
