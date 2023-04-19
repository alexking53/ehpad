<?php
use Core\Model;
class Contact extends Model
{
    public function __construct()
    {
        $this->table = "contact";
        $this->id = "NUMERO";
    }
}