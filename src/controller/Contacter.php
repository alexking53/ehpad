<?php
//Utilisation des namespaces pour le Model mère et le controller mère
use Core\Controller;
//Définition de la classe
class Contacter extends Controller
{
    //Liaison entre la vue index et son action
    public function index($id = null)
    {
        $this->render("index");
    
        /*Récupère le message issu du formulaire (vue : view/contacter/index.php) public function message()*/

        //On vérifie que nous recevons bien les variables du formulaire via la méthode POST
        var_dump($_POST);
        /*On s'assure que l'utilisateur est bien passé par le formulaire et donc le tableau
        $_POST n'est pas sensé être vide*/
        if (!empty($_POST)) {
            try {
                //On charge la classe Model contact
                $table = Model::load("Contact");
                /*On complète un tableau des données servant à réécrire une requête SQL de type
                INSERT INTO contact (TITRE, DESCRIPTION, EMAIL ) VALUES ('valeur pour le titre',
                'valeur pour la description','valeur pour l email')*/
                $data = array(
                "TITRE" => '\'' . $_POST['n_titre'] . '\'',
                "DESCRIPTION" => '\'' . $_POST['n_message'] . '\'',
                "EMAIL" => '\'' . $_POST['n_email'] . '\''
                );
                /*On appelle la méthode de la classe mère permettant de générer la requête et on
                affecte le résultat à une variable $test*/
                $test = $table->insert(Model::connexion(), $data);
                //On débugge la variable $test
                var_dump($test);
                //On prépare une variable à envoyer à la vue
                $variable['laReponse'] = $test ? array("resultat" => "votre message a
                bien été envoyé") : array("resultat" => "Problème lors de l'envoi");
                //Le PDO est détruit ici
                Model::deconnexion();
            } catch (Exception $e) {
                //Si la requête ne fonctionne pas on modifie le message à envoyer à la vue
                $variable['laReponse'] = array("resultat" => "Problème lors de l'envoi");
            }
            //On envoie la variable à la vue
            $this->set($variable);
            /*On appelle la vue correspondant à l'action 'ici on souhaite rester sur la vue index
            de contacter)*/
            $this->render("index");
        } else {
            //L'utilisateur 'trop curieux' est renvoyé à l'accueil.
            $this->redirect("Accueil");
        }
    }
    //Le constructeur par défaut
    public function __construct()
    {
    }
}