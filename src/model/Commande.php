<?php
use Core\Model;
class Commande extends Model
{
    public function __construct()
    {
        $this->table = "commande";
        $this->id = "NUMERO";
    }
}