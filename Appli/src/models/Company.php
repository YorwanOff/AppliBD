<?php

namespace applibd\models;

use Illuminate\Database\Query\Builder;

/**
 * Class Company
 * @mixin Builder
 */
class Company  extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'company';
    protected $primaryKey = 'id';
}