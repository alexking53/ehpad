<?php
var_dump($leProfil);
?>
<h1 class="col-12">Votre profil...</h1>
<div class="tm-company-right-inner col-12">
    <ul class="nav nav-tabs" id="tmCompanyTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link tm-nav-link-border-right active" id="editer-tab" datatoggle="tab" href="#editer" role="tab" aria-controls="editer" ariaselected="true">editer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link tm-no-border-right" id="modifier-tab" datatoggle="tab" href="#modifier" role="tab" aria-controls="modifier" ariaselected="true">modifier</a>
        </li>
        <li class="nav-item">
            <a class="nav-link tm-no-border-right" id="lesCommandes-tab" datatoggle="tab" href="#lesCommandes" role="tab" aria-controls="lesCommandes" ariaselected="true">Vos commandes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link tm-no-border-right" id="jeu-tab" data-toggle="tab" href="#jeu" role="tab" aria-controls="jeu" aria-selected="true">Suivi des jeux</a>
        </li>
    </ul>
    <div class="tab-content" id="tmTabContent">
        <div class="tab-pane fade show active" id="editer" role="tabpanel" arialabelledby="editer-tab">
            <form>
                <fieldset>
                    <div class="form-group">
                        <label for="i_nom">Nom : </label>
                        <input type="text" class="form-control" id="i_nom" name="n_nom" value="$laPersonne->NOM">
                    </div>
                    <div class="form-group">
                        <label for="i_prenom">Prénom : </label>
                        <input type="text" class="form-control" id="i_prenom" name="n_prenom" value="$laPersonne->PRENOM">
                    </div>
                    <div class="form-group">
                        <label for="i_rue">Rue : </label>
                        <input type="text" class="form-control" id="i_rue" name="n_rue" value="$laPersonne->RUE">
                    </div>
                    <div class="form-group">
                        <label for="i_cp">Code Postal </label>
                        <input type="text" class="form-control" id="i_cp" name="n_cp" value="$laPersonne->CP">
                    </div>
                    <div class="form-group">
                        <label for="i_ville">Ville : </label>
                        <input type="text" class="form-control" id="i_ville" name="n_ville" value="$laPersonne->VILLE">
                    </div>
                    <div class="form-group">
                        <label for="i_email">Email : </label>
                        <input type="email" class="form-control" id="i_email" name="n_email" value="$laPersonne->EMAIL">
                    </div>
                    <div class="form-group">
                        <label for="i_tel">Téléphone</label>
                        <input type="text" class="form-control" id="i_tel" name="n_tel" value="$laPersonne->TEL">
                    </div>
                    <div class="form-group">
                        <label for="i_mdp">Mot de passe</label>
                        <input type="password" class="form-control" id="i_mdp" name="n_mdp" value="$laPersonne->MDP">
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="modifier" role="tabpanel" arialabelledby="modifier-tab">
        <form method="POST" action="<?= URL . 'profil/modifier' ?>">
            <fieldset>
                <div class="form-group">
                    <label for="i_nom">Nom : </label>
                    <input type="text" class="form-control" id="i_nom" name="n_nom" value="$laPersonne->NOM">
                </div>
                <div class="form-group">
                    <label for="i_prenom">Prénom : </label>
                    <input type="text" class="form-control" id="i_prenom" name="n_prenom" value="$laPersonne->PRENOM">
                </div>
                <div class="form-group">
                    <label for="i_rue">Rue : </label>
                    <input type="text" class="form-control" id="i_rue" name="n_rue" value="$laPersonne->RUE">
                </div>
                <div class="form-group">
                    <label for="i_cp">Code Postal </label>
                    <input type="text" class="form-control" id="i_cp" name="n_cp" value="$laPersonne->CP">
                </div>
                <div class="form-group">
                    <label for="i_ville">Ville : </label>
                    <input type="text" class="form-control" id="i_ville" name="n_ville" value="$laPersonne->VILLE">
                </div>
                <div class="form-group">
                    <label for="i_email">Email : </label>
                    <input type="email" class="form-control" id="i_email" name="n_email" value="$laPersonne->EMAIL">
                </div>
                <div class="form-group">
                    <label for="i_tel">Téléphone</label>
                    <input type="text" class="form-control" id="i_tel" name="n_tel" value="$laPersonne->TEL">
                </div>
                <div class="form-group">
                    <label for="i_mdp">Changer de mot de passe</label>
                    <input type="password" class="form-control" id="i_mdp" name="n_mdp" value="$laPersonne->MDP">
                </div>
                <div class="form-group">
                    <input type="submit" value="valider">
                </div>
            </fieldset>
        </form>
        <div>
            <?= isset($laReponse) ? $laReponse['resultat'] : "" ?>
        </div>
    </div>
    <div class="tab-pane fade" id="lesCommandes" role="tabpanel" arialabelledby="lesCommandes-tab">
        <ul>
            <?php
            foreach ($leProfil['lesCommandes'] as $laCommande) {
                echo '<li><a href="' . URL . 'facture/index/' . $laCommande-> COMMANDE . '">Commande n°' . $laCommande-> COMMANDE . '</a></li>';
            }
            ?>
        </ul>
    </div>
    <div class="tab-pane fade" id="jeu" role="tabpanel" aria-labelledby="jeutab">
        <ul>
            <?php
            foreach ($leProfil['lesJeux'] as $leJeu) {
                echo '<li><table class="profil-table"><tr><td>Début : ' . $leJeu-> DUREE. '</td><td>Nombre de clic : ' .
                 $leJeu-> NBRECLIC.'</td><td>' . $leJeu-> STATUT . '</td></tr></table></li><br>';
            }
            ?>
        </ul>
    </div>
    </div>
</div>