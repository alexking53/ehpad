<?php
    // On débug la variable reçue du controller Services
    // var_dump($lesServices);
?>

<?php
    if (isset($lesServices)) {
        foreach ($lesServices['detail'] as $leService) {
?>
<h1 class="col-12 text-center">
    <?= $leService->TITRE . " en détail..." ?>
</h1>
<div class="col-12">
    <article class="col-12 text-center">
        <p>
            <a href="">
                <img src="<?= WEBROOT . "asset/img/" . $leService->IMAGE ?>" width="50%" />
            </a>
        </p>
        <p><?= $leService->DESCRIPTION ?></p>
        <p><?= $leService->PRIX ?> €</p>
    </article>
    <!-- On ajoute un écouter au nœud article et un lien vers le controller Panier via un
    script javascript défini dans le fichier script.js -->
    <script>
        document.querySelector('article').addEventListener('click', function(e) {
            e.preventDefault();
            fonctionPanier('<?= URL . 'panier/ajouter/' . $leService->REFERENCE ?>');
        });
    </script>
<?php  
        }
    }
?>
</div>
