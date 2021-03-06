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

    /*
     * Q3 : Liste des plateformes dont la base installée est >= 10 000 000
     */
    function q3($base)
    {
        $listePlat = Platform::where('install_base', '>=', $base)->get();
        $res = "";
        foreach ($listePlat as $plat) {
            $res .= $plat->name . "<br/>";
        }
        return $res;
    }
}