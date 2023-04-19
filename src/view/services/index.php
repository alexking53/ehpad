<?php
//La variable récupérée
//var_dump($lesServices);
?>
<h1 class="col-12">Tous les services de l'ehpad Discount</h1>
<div class="col-12 text-center">
    <section class="row text-center">
        <?php
            if (isset($lesServices)) {
            foreach ($lesServices['tous'] as $leService) {
                //var_dump($leService);
        ?>
        <article class="col-md-3 col-12 col-sm-12"
            style="height:200px;border:2px solid black;border-radius:5px;margin:10px; backgroundcolor:orange">
            <a style="color:black" href="<?= URL . "Services/categorie/" .$leService ->NUMERO ?>">
                <div class="text-center" style="width:100%;height:100%;padding-top:5em">
                    <?= $leService -> LIBELE ?>
                </div>
            </a>
        </article>
        <?php
                }
            }
        ?>
    </section>
</div>