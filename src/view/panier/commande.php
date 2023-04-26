<h1>Montant à payer</h1>
<div class="tm-company-right-inner col-12">
    <p>Montant à payer: <? $laCommande[$i]->PRIX ?></p>
    <p>Informations CB :</p>
    <div>
        <form method="POST">
            <fieldset>
                    <p>1. Type de carte bancaire</p>
                    <div class="form-group">
                        <input type="radio" value="VISA">
                        <input type="radio" value="Mastercard">
                    </div>
                    <p> 2. N° de carte: <input type="text"></p>
                    <p> 3. Code sécurité <input type="password"></p>
                    <p> 4. Nom du porteur <input type="text" placeholder="Même nom que sur la carte"></p>
                    <div class="form-group">
                        <input type="submit" value="ACHETER">
                    </div>
            </fieldset>
        </form>
    </div>
</div>