<?php
use Core\Controller;
use Core\Model;

class Rechercher extends Controller
{
    public $laRecherche;
    public function index($id = null)
    {
        if (isset($_POST['n_cherche'])) {
            $this->laRecherche = $_POST['n_cherche'];
            
            $model = Model::load('NomDuModele');
            $resultats = $model->find(Model::$pdo, [
                'condition' => "service.DESCRIPTION LIKE '%$this->laRecherche%' OR service.TITRE LIKE '%$this->laRecherche%' OR categorie.LIBELE LIKE '%$this->laRecherche%'",
                'join' => "INNER JOIN categorie ON service.CAT=categorie.NUMERO"
            ]);
            
            $this->render('vue', ['lesServices' => $resultats]);
        }
    }
    
    public function __construct()
    {
    }
}
