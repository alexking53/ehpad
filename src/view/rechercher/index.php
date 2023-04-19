<?php
    var_dump($lesServices);
?>
 <h1 class="col-12">
    Les résultats de la recherche
    <i><?= $this->laRecherche ?></i>
</h1>
<div class="col-12" id="rechercher">
    <?php if (count($lesServices) == 0): ?>
        <p>Aucun résultat pour votre recherche</p>
    <?php else: ?>
        <ul class="col-12">
            <?php foreach ($lesServices as $leService): ?>
                <li>
                    <p>
                        <a href="<?= URL . "Services/detail/" . $leService->REFERENCE?>"><?= $leService->TITRE ?></a>
                    </p>
                    <p>
                        <?= $leService->RESUME?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
