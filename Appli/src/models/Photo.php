<?php


namespace applibd\models;

use Illuminate\Database\Query\Builder;

class Photo extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'photo';
    protected $primaryKey = 'id';
}