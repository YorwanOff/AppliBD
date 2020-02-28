<?php

require __DIR__ . 'Appli/vendor/autoload.php';

use applidb\models\Game;
use applidb\models\Company;
use applidb\models\Platform;

use Illuminate\Database\Capsule\Manager as DB;

$c = new Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new Slim\App($c);



\games\AppConf::AddDbConf('../config/games.db.conf.ini');

/*
 * Q1 : liste des jeux dont le nom contient mario
 */

$liste = Game::where('name', 'like', '%mario%')->get();

foreach ($liste as $game) {
    echo $game->name . ' : ' . $game->alias . "\n";


}

echo "Jeux dont le titre contient Mario : " . count($liste). "\n";
