<?php


namespace applibd\models;


class Users extends BaseModel
{
    protected $table = 'users';
    protected $primaryKey = 'email';
    public $timestamps = false;

    function comments(){
        return $this->belongsToMany('applibd\models\Games', 'comment', 'email', 'game_id')->get();
    }

    function add($email,$name,$firstname,$adr,$date){
        $u = new Users();
        $u->email = $email;
        $u->nom = $name;
        $u->prenom = $firstname;
        $u->adresse = $adr;
        $u->datenaiss = $date;
        $u->save();
    }
}