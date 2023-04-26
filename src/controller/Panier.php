<?php
use Core\Controller;
use Core\Model;
require_once 'C:/wamp/www/ehpad/src/core/Model.php';
class Panier extends Controller
{
    //private $lesServices;
    function index()
    {
        $test = "";
        if (isset($_SESSION['panier'])) {
            $test = "(";
            foreach ($_SESSION['panier'] as $ligne => $value) {
                $test .= $ligne . ",";
            }
            $test .= "0)";
        }
        /**try {
            $tables = Model::load("Service");
            $variable['lesServices'] = array("tous" => $tables - find(Model::connexion(), array('condition' => "REFERENCE in $test")));
            Model::deconnexion();
            $this->set($variable);
        } catch (Exception $e) {
        }**/
        $this->render('index');
    }

    function ajouter($i)
    {
        $_SESSION['test'] = false;
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'][$i] = 1;
            $_SESSION['totalpanier'] = count($_SESSION['panier']);
            echo "<i class='badge badge-light' style='background-color:orangered;'> "
            . $_SESSION['totalpanier'] . "</i>";
        } else {
            foreach ($_SESSION['panier'] as $ligne => $value) {
                //var_dump($ligne);
                if ($ligne == $i) {
                    $_SESSION['test'] = true;
                }
            }
            if ($_SESSION['test'] != true) {
                $_SESSION['panier'][$i] = 1;
            }
            $_SESSION['totalpanier'] = count($_SESSION['panier']);
            echo "<i class='badge badge-light' style='background-color:orangered;'> " . $_SESSION['totalpanier'] . "</i>";
            if ($_SESSION['test']) {
                echo '<script>var test=true;</script>';
            }
        }
    }

    function supprimerdupanier($i)
    {
        foreach ($_SESSION['panier'] as $ligne => $value) {
            if ($ligne == $i) {
                unset($_SESSION['panier'][$ligne]);
            }
        }
        $_SESSION['totalpanier'] = count($_SESSION['panier']);
        echo "<i class='badge badge-light' style='background-color:orangered;'> " . $_SESSION['totalpanier'] . "</i>";
    }

    public function commande($montant = 0)
    {
        //var_dump($montant);
        if (!empty($_POST)) {
            $resultat = false;
            try {
                $pdo = Model::connexion();
                $pdo->beginTransaction();
                $laTable1 = Model::load('commande');
                $array = array("LOGIN" => "'" . $_SESSION['LOGIN'] . "'");
                $resultat = $laTable1->insert($laTable1->connexion(), $array);
                if ($resultat) {
                    $array = array("champs" => "NOCOMMANDE", "order" => "NOCOMMANDE desc", "limit" => "1");
                    $laCommande = $laTable1->find($pdo, $array);
                    //var_dump($commande);
                    $laTable1->deconnexion();
                    $laTable2 = Model::load('LigneCommande');
                    foreach ($_SESSION['panier'] as $ligne => $value) {
                        $array = array('NOCOMMANDE' => $laCommande[0]->NOCOMMANDE, "REFERENCE" => $ligne, 'QTITE' => 1);
                        $leslignes = $laTable2->insert($laTable2->connexion(), $array);
                    }
                    $laTable2->deconnexion();
                }
                $pdo->commit();
                foreach ($_SESSION['panier'] as $ligne => $value) {
                    $this->supprimerdupanier($ligne);
                }
                //unset($_SESSION['panier']);
                $variables['lacommande'] = array("resultat" => "La commande a bien
                été validée");
                //Afficher la commande
                //$this->redirect('facture');
            } catch (Exception $e) {
                $pdo->rollBack();
                //var_dump($e);
                $variables['lacommande'] = array("resultat" => "pbm d validation");
            }
        } else {
            $variables['lacommande'] = array("montant" => $montant);
        }
        $this->set($variables);
        $this->render('commande');
        $variables['lacommande'] = array("laCommande" => $laCommande);

    }

    public function __construct()
    {
    }
}