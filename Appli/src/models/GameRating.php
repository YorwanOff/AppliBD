<?php


namespace applibd\models;

use Illuminate\Database\Query\Builder;

class GameRating extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'game_rating';
    protected $primaryKey = 'id';
}