<h1 class="col-12">Votre formulaire</h1>
<div class="tm-company-right-inner col-12">
    <ul class="nav nav-tabs" id="tmCompanyTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link tm-nav-link-border-right active" id="connexion-tab" data-toggle="tab" href="#connexion" role="tab" aria-controls="connexion" ariaselected="true">Connexion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link tm-no-border-right" id="inscription-tab" datatoggle="tab" href="#inscription" role="tab" aria-controls="inscription" ariaselected="true">inscription</a>
        </li>
    </ul>
    <div class="tab-content" id="tmTabContent">
        <div class="tab-pane fade show active" id="connexion" role="tabpanel" arialabelledby="connexion-tab">
            <form method="POST" action="<?= URL . "connexion/connexion" ?>">
                <fieldset>
                    <div class="form-group">
                        <label for="i_login">Entrez votre login</label>
                        <input type="text" class="form-control" id="i_login" name="n_login" placeholder="votre login">
                    </div>
                    <div class="form-group">
                        <label for="i_mdp">Entrez votre mot de passe</label>
                        <input type="password" class="form-control" id="i_mdp" name="n_mdp">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="connexion">
                        <input type="reset" value="effacer">
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="inscription" role="tabpanel" arialabelledby="inscription-tab">
            <form method="POST" action="<?= URL . "connexion/inscription" ?>">
                <fieldset>
                    <div class="form-group">
                        <label for="i_login">Login</label>
                        <input type="text" class="form-control" id="i_login" name="n_login" placeholder="votre login">
                    </div>
                    <div class="form-group">
                        <label for="i_mdp">Mot de passe</label>
                        <input type="password" class="form-control" id="i_mdp" name="n_mdp">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="inscription">
                        <input type="reset" value="effacer">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<div class="col-12">
    <?= isset($laReponse) ? var_dump($laReponse) : "" ?>
</div>