<?php

?>
<div class="col-12 text-center">
    <?php
        var_dump($lesCommandes);
        $date = explode('-', $lesCommandes['leClient']->DATE);
        var_dump($date);
    ?>
    <div class="row">
    <h1 class="col-12 text-center">Facture n° <? $lesCommandes-> NOCOMMANDE ?> </h1>
    <h2 class="col-12 text-center"> Date : <?= explode(' ', $date[2])[0] . '/' .
    $date[1] . '/' . $date[0] ?></h2>
    <div class="col-12 text-left">
        <table class="row text-left" id="information">
            <tr>
                <td>
                    <h2> Destinataire</h2>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Nom : <? $lesCommandes-> NOM ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Prénom : <? $lesCommandes-> PRENOM ?></td>
                <td></td>
            </tr>
            <tr>
                <td>rue : <? $lesCommandes-> RUE?> </td>
                <td></td>
            </tr>
            <tr>
                <td>C.P. : <? $lesCommandes->CP?> </td>
                <td></td>
            </tr>
            <tr>
                <td>Ville : <? $lesCommandes->VILLE?> </td>
                <td></td>
            </tr>
            <tr>
                <td>Téléphone : <? $lesCommandes->TEL?> </td>
                <td></td>
            </tr>
            <tr>
                <td>Email : <? $lesCommandes->EMAIL?> </td>
                <td></td>
            </tr>
            <tr>
            <tr>
                <td>

                </td>
                <td>
                    <h2>Emetteur</h2>
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <p>Ehpad Discount</p>
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <p>7, rue des archives</p>
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <p>53 000 Laval</p>
                </td>
            </tr>
        </table>
    </div>
    <br> <br>
    <div class="row" style="margin:50px;border:2px solid black;padding:10px;">
        <h2 class=" col-12">Les services commandés</h2>
        <br>
        <table class="col-12" border:1px id="facture">
            <tr>
                <td>N°</td>
                <td>Service </td>
                <td>Prix </td>
            </tr>
            <?php
                $i = 0;
                foreach ($lesCommandes['lesServices'] as $leService) {
                $i++;
                echo '<tr>
                <td>' . $i . '</td>
                <td>' .  $leService-> TITRE . '</td>
                <td>' .  $leService-> PRIX . '</td>
                </tr>';
            }
            ?>
        </table>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdfautotable/3.2.13/jspdf.plugin.autotable.min.js">
</script>
<?php

?>
<script>
    var doc = new jsPDF('p', 'pt', 'a4');
    //document.querySelector('#facture').width = "100%";
    var y = 20;
    doc.setLineWidth(2);
    doc.text(200, y = y + 30, "Facture n° <?= $lesCommandes['leClient']->NOCOMMANDE ?> - Date : <?= explode(' ', $date[2])[0] . '/' . $date[1] . '/' . $date[0] ?>");
    doc.text(30, y = y + 30, "Information client : ");
    doc.autoTable({
        html: '#information',
        startY: 100,
        theme: 'grid',
        columnStyles: {
            0: {
                halign: 'left',
                tableWidth: 400,
            },
            1: {
                halign: 'left',
                tableWidth: 400,
            }
        }
    });
    doc.text(30, y = y + 325, " Montant payé : <?= $lesCommandes['leClient']->TOTAL ?> comprenant les services suivants : ");
    doc.autoTable({
        html: '#facture',
        startY: 425,
        theme: 'grid',
        columnStyles: {
            0: {
                halign: 'right',
                tableWidth: 100,
            },
            1: {
                tableWidth: 400,
            },
            2: {
                halign: 'right',
                tableWidth: 100,
            }
        }
    });
    doc.setFontSize(12);
    doc.save("facture<?= $lesCommandes['leClient']->NOCOMMANDE ?>.pdf");
</script>
</div>