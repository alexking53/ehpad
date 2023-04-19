<?php
use Core\Model;
class Categorie extends Model
{
    public function __construct()
    {
        $this->table = "categorie";
        $this->id = "NUMERO";
    }
}