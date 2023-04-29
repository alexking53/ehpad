<?php
use Core\Controller;
use Core\Model;
require_once 'C:/wamp/www/ehpad/src/core/Model.php';
class Facture extends Controller
{
    public $lesServices;
    public function index($id)
    {
        //var_dump($id);
        $table = Model::load("commande");
        $data['condition'] = 'LOGIN = "' . $_SESSION['LOGIN'] . '" AND NOCOMMANDE ="' . $id . '"';
        $data['order'] = 'DATE DESC';
        $data['limit'] = '1';
        $resultat = $table->find(Model::connexion(), $data)[0];
        //var_dump($resultat);
        $table = Model::load('lignecommande');
        $data['join'] = "inner join commande ON commande.NOCOMMANDE = lignecommande.NOCOMMANDE";
        $data['join'] .= " inner join service ON service.REFERENCE = lignecommande.REFERENCE";
        $data['condition'] = 'commande.NOCOMMANDE = \'' . $resultat->NOCOMMANDE . '\'';
        $resultatServices = $table->find(Model::connexion(), $data);
        $table = Model::load('client');
        $data['join'] = "INNER JOIN commande ON commande.LOGIN=client.LOGIN";
        $data['condition'] = 'commande.NOCOMMANDE = \'' . $resultat->NOCOMMANDE . '\'';
        $resultatClient = $table->find(Model::connexion(), $data)[0];
        Model::deconnexion();
        $variables['lesCommandes'] = array("lesServices" => $resultatServices, "leClient" => $resultatClient);
        $this->set($variables);
        $this->render("index");
    }
    public function __construct()
    {

    }
}