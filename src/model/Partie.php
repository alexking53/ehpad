<?php
use Core\Model;
class Partie extends Model
{
    public function __construct()
    {
        $this->table = "partie";
        $this->id = "null";
    }
}