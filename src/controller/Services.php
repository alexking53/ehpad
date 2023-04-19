<?php
use Core\Controller;
use Core\Model;
require_once 'C:/wamp/www/ehpad/src/core/Model.php';

class Services extends Controller
{
    public $lesServices;
    
    public function index($id = null)
    {
        $table = Model::load('categorie');
        $result = $table->find(Model::connexion());

        $variable['lesServices'] = array('tous' => $result);
        $this->set($variable);
        $this->render("index");
    }

    public function categorie($var)
    {
        $data = array('join' => ' INNER JOIN categorie ON categorie.NUMERO = service.CAT', 'condition' => 'CAT=' . $var);
        $table = Model::load('service');
        $result = $table->find(Model::connexion(), $data);

        $variable['lesServices'] = array('categorie' => $result);
        $this->set($variable);
        $this->render("liste");
    }

    public function detail($var)
{
    $table = Model::load('service');
    $data = array('condition' => 'REFERENCE=' . $var);
    $result = $table->find(Model::connexion(), $data);
    $variable['lesServices'] = array('detail' => $result); // Mettre à jour la clé à 'detail'
    $this->set($variable);
    $this->render("detail");
}

    public function __construct()
    {
    }
}
