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

    /*
     * Q2 : Liste des compagnies installées au Japon
     */
    function q2($pays)
    {
        $listeComp = Company::where('location_country', '=', $pays)->get();
        $res = "";
        foreach ($listeComp as $comp) {
            $res .= $comp->name . "<br/>";
        }
        return $res;
    }
}