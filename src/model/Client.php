<?php
use Core\Model;
class Client extends Model
{
    public function __construct()
    {
        $this->table = "client";
        $this->id = "NUMERO";
    }
}