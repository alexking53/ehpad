<?php
use Core\Model;
class Service extends Model
{
    public function __construct()
    {
        $this->table = "service";
        $this->id = "null";
    }
}