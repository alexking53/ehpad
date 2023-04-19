
<?php
//Utilisation des namespaces pour le Model mère et le controller mère
use Core\Controller;
//Définition de la classe
class Paiement extends Controller
{
    //Liaison entre la vue index et son action
    public function index($id = null)
    {
        $this->render("index");
    }
    //Le constructeur par défaut
    public function __construct()
    {
    }
}