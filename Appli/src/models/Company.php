<?php

namespace applibd\models;

class Company extends BaseModel
{
    protected $table = 'company';
    protected $primaryKey = 'id';

    function __construct($app)
    {
        parent::__construct($app);
    }

    function game(){
        return $this->belongsToMany('applibd\models\Game', 'game_publishers', 'comp_id', 'game_id')->get();
    }

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

