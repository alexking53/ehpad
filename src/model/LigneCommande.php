<?php
use Core\Model;
class LigneCommande extends Model
{
    public function __construct()
    {
        $this->table = "lignecommande";
        /*Ici la table lignecommande a 1 clé primaire composée, on lui donne une
        valeur nulle.*/
        $this->id = "null";
    }
}