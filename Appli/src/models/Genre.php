<?php


namespace applibd\models;

class Genre extends BaseModel
{
    protected $table = 'genre';
    protected $primaryKey = 'id';

    function game()
    {
        return $this->belongsToMany('applibd\models\Game', 'game2rating', 'rating_id', 'game_id');
    }

    function rating_board()
    {
        return $this->belongsTo('applibd\models\Rating_board', 'rating_board_id');
    }
}