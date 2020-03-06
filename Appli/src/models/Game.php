<?php

namespace applibd\models;

use Illuminate\Database\Query\Builder;

/**
 * Class Game
 * @mixin Builder
 */

class Game  extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'game';
    protected $primaryKey = 'id';
    /*
       * Q1 : liste des jeux dont le nom contient mario
       */
    function q1($name)
    {
        $liste = Game::where('name', 'like', $name)->get();
        $res = "";
        foreach ($liste as $game) {
            $res .= $game->name . ' : ' . $game->alias . "<br/>";
        }
        return $res;
    }

    /*
     * Q4 : Lister 442 à partir du 21173e
     */
    function q4($number, $start)
    {
        $listeJeu = Game::take($number)->skip($start)->get();
        $res = "";
        foreach ($listeJeu as $game) {
            $res .= $game->name . ' : ' . $game->alias . "<br/>";
        }
        return $res;
    }
}