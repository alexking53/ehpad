<?php
    // La variable récupérée
    // var_dump($lesServices);
?>

<h1 class="col-12">
    <!-- On vérifie qu'il existe des services dans la catégorie -->
    <?= count($lesServices['categorie']) != 0 ? "Les services " . $lesServices['categorie'][0]->LIBELLE . " de l'ehpad Discount" : "Pas de service dans cette catégorie" ?>
</h1>
<div class="col-12 text-left">
    <!-- On récupère tous les services -->
    <?php
        if (isset($lesServices)) {
            foreach ($lesServices['categorie'] as $leService) {
    ?>
                <article class="col-3">
                    <p>
                        <a href="<?= URL . "Services/detail/" .  $leService->REFERENCE?>">
                            <img src="<?= WEBROOT . "asset/img/" . $leService->PHOTO ?>" width="300px" style="border:2px solid black;border-radius:4px" />
                        </a>
                    </p>
                    <p> <?= $leService->TITRE?></p>
                    <p> <?= $leService->RESUME?></p>
                </article>
    <?php
            } 
        } else {
            echo "<p>Pas de service dans cette catégorie</p>";
        }
    ?>
</div>
