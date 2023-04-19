<!-- La vue index de contacter -->
<h1 class="col-12">Contact</h1>
<div class="col-12">
    <?php
        //On vérifie que l'utilisateur n'a pas déjà posté son message
        if (!isset($laReponse)) {
    ?>
    <!-- Formulaire de contact -->
    <form action="<?= URL . "contacter/message" ?>" class="tm-contact-form" method="POST">
        <div class="form-group">
            <input type="text" id="i_titre" name="n_titre" class="form-control" placeholder="Titre du message" required />
        </div>
        <div class="form-group">
            <input type="email" id="i_email" name="n_email" class="form-control"
            placeholder="Email" required />
        </div>
        <div class="form-group">
            <textarea rows="5" cols="50" id="i_message" name="n_message" class="formcontrol" placeholder="Message" required></textarea>
        </div>
        <div class="tm-text-right">
            <button type="submit" class="btn tm-btn tm-btn-big">
            ENVOYER
            </button>
        </div>
    </form>
    <?php
        //Si l'utilisateur a déjà posté son message, on affiche un accusé de réception
        } else {
        echo $laReponse['resultat'];
        }
    ?>
</div>