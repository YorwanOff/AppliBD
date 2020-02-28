<?php


use \games\model\Game;
use \games\model\Company;
use \games\model\Platform;


require '../vendor/autoload.php';

\games\AppConf::AddDbConf('../config/games.db.conf.ini');

/*
 * Q1 : liste des jeux dont le nom contient mario
 */

$liste = Game::where('name', 'like', '%mario%')->get();

foreach ($liste as $game) {
    echo $game->name . ' : ' . $game->alias . "\n";


}

echo "Jeux dont le titre contient Mario : " . count($liste). "\n";
