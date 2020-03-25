<?php

require 'vendor/autoload.php';

use applibd\models;
use \Psr\Http\Message\{ServerRequestInterface as Request, ResponseInterface as Response};

use Illuminate\Database\Capsule\Manager as DB;

$c = new Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new Slim\App($c);

\applibd\bd\Eloquent::start('src/conf/conf.ini');

$app->get('/game/:id', function(Request $request, Response $response, $args) {
    $c = new \applibd\control\Controller();
    $res = $c->findGame($args['id']);
    $response->getBody()->write($res);
    $response->withHeader('Content-Type','application/json');
    return $response;
});
