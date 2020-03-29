<?php

namespace applibd\models;

use Illuminate\Database\Query\Builder;

/**
 * Class Company
 * @mixin Builder
 */
abstract class BaseModel extends \Illuminate\Database\Eloquent\Model{
    function __construct($app = null)
    {
        $this->app = $app;
    }

    function getApp(){
        return $this->app;
    }

}