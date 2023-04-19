<?php
use Core\Model;
class Personne extends Model
{
    public function __construct()
    {
        $this->table = "personne";
        $this->id = "null";
    }
}