<?php
use Core\Controller;
use Core\Model;
require_once 'C:/wamp/www/ehpad/src/core/Model.php';

class Profil extends Controller
{
    public $laPersonne;
    public $lesCommandes;
    public $lesJeux;

    public function index($id = null)
    {
        $this->getLaPersonne();
        $this->getLesCommandes();
        $this->getLesJeux();
        $variable['leProfil'] = array(
        "lesCommandes" => $this->lesCommandes,
        "laPersonne" => $this->laPersonne[0],
        "lesJeux" => $this->lesJeux
        );
        $this->set($variable);
        $this->render("index");
    }
    
    public function modifier()
    {
        if (!empty($_POST)) {
            var_dump($_POST);
            try {
                $pdo = Model::connexion();
                $pdo->beginTransaction();
                $tableP = Model::load("Personne");
                $tableC = Model::load("Client");
                $dataP = array();
                $dataC = array();
                foreach ($_POST as $k => $v) {
                    $champ = strtoupper(substr($k, 2));
                    if ($k != "n_mdp") {
                        $dataC["$champ"] = $v;
                    } else {
                        $dataP["$champ"] = $v;
                    }
                }
                $dataP["id"] = $_SESSION['LOGIN'];
                $dataC["id"] = $_SESSION['LOGIN'];
                $tableC->update($pdo, $dataC);
                $tableP->update($pdo, $dataP);
                Model::deconnexion();
                $pdo->commit();
                $variable['laReponse'] = array("resultat" => "La modification a bien été faite");
            } catch (Exception $e) {
                $pdo->rollBack();
                $variable['laReponse'] = array("resultat" => "La modification n'est pas disponible. Veuillez contacter l'Ehpad.");
            }
            $this->set($variable);
            $this->index();
        } else {
            $this->redirect('Accueil');
        }
    }

    public function getLesCommandes()
    {
    //Tout sur les commandes du client connectée
    /** SELECT noCommande FROM commande
     * INNER JOIN personne ON commande.login = personne.login
     * WHERE personne.login={valeur}
     */
    }
    public function getLesJeux()
    {
    //Tout sur les parties de la personne connectée
    /** SELECT * FROM partie
     * INNER JOIN personne ON partie.login = personne.login
     * WHERE personne.login={valeur}
     */
    
    }
    public function getLaPersonne()
    {
    //Tout sur la personne ET le client connectée
    /** SELECT * FROM client
     * INNER JOIN personne ON client.login = personne.login
     * WHERE personne.login={valeur}
     */
    
    }
    public function __construct()
    {
        if (!isset($_SESSION['LOGIN'])) {
            $this->redirect('accueil');
        }
    }
}