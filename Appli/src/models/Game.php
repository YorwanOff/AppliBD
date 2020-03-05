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
}