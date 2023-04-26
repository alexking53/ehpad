<?php
use Core\Controller;
use Core\Model;
require_once 'C:/wamp/www/ehpad/src/core/Model.php';

class Connexion extends Controller
{
    //private $lesServices;
    public function index($id = null)
    {
        $this->render("index");
    }

    public function connexion()
    {
        if (!empty($_POST)) {
            try {
                $table = Model::load("Personne");
                $data['condition'] = 'personne.LOGIN =\'' . $_POST['n_login'] . '\' AND personne.MDP=\'' . $_POST['n_mdp'] . '\'';
                $reponse = $table->find(Model::connexion(), $data);
                if (!empty($reponse)) {
                    $_SESSION['LOGIN'] = $_POST['n_login'];
                    $variable['laReponse'] = array("resultat" => "Vous êtes bien connecté(e)!");
                } else {
                    $variable['laReponse'] = array("resultat" => "Veuillez recommencer!");
                }
            } catch (Exception $e) {
                $variable['laReponse'] = array("resultat" => "Veuillez recommencer!");
            }
            $this->set($variable);
            $this->render("index");
        } else {
            $this->redirect("Accueil");
        }
    }
    public function inscription()
    {
        if (!empty($_POST)) {
            try {
                $pdo = Model::connexion();
                $pdo->beginTransaction();
                var_dump($_POST);
                $tableP = Model::load("Personne");
                $dataP['LOGIN'] = '\'' . $_POST['n_login'] . '\'';
                $dataP['MDP'] = '\'' . $_POST['n_mdp'] . '\'';
                $tableP->insert(Model::connexion(), $dataP);
                $tableC = Model::load("Client");
                $dataC['LOGIN'] = '\'' . $_POST['n_login'] . '\'';
                $tableC->insert(Model::connexion(), $dataC);
                $variable['laReponse'] = array("resultat" => "Vous êtes bien inscrit(e)!");
                $pdo->commit();
                $tableC::deconnexion();
                $tableP::deconnexion();
            } catch (Exception $e) {
                var_dump($e);
                $pdo->rollBack();
                $variable['laReponse'] = array("resultat" => "Veuillez recommencer!");
            }
            $this->set($variable);
            $this->render("index");
        } else {
            $this->redirect("Accueil");
        }
    }

    public function deconnexion()
    {
        session_destroy();
        $this->redirect("Accueil");
    }

    public function __construct()
    {
    }
}