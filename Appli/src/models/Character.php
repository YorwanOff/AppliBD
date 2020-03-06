<?php


namespace applibd\models;

use Illuminate\Database\Query\Builder;

class Character extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'character';
    protected $primaryKey = 'id';
}