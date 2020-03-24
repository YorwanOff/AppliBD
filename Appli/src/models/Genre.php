<?php


namespace applibd\models;

class Genre extends BaseModel
{
    protected $table = 'genre';
    protected $primaryKey = 'id';
    public $timestamps = true;

    function game()
    {
        return $this->belongsToMany('applibd\models\Game', 'game2genre', 'genre_id', 'game_id');
    }
}