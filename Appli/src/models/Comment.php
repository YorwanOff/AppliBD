<?php


namespace applibd\models;


class Comment extends BaseModel
{
    protected $table = 'comment';
    protected $primaryKey = ['email','game_id'];
    public $timestamps = true;

    function add($titre,$contenu,$datecrea,$email,$id){
        $c = new Comment();
        $c->titre = $titre;
        $c->contenu = $contenu;
        $c->datecrea = $datecrea;
        $c->email = $email;
        $c->game_id = $id;
        $c->save();
    }
}