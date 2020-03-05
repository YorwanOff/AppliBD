<?php

namespace applibd\models;

use Illuminate\Database\Query\Builder;

/**
 * Class Platform
 * @mixin Builder
 */
class Platform  extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'platform';
    protected $primaryKey = 'id';

}