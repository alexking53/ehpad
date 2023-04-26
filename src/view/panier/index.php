<?php

?>
<h1> Notre panier</h1>
<div class="tm-company-right-inner col-12">
    <table>
        <thead>
            <td width=10%>N°</td>
            <td width=45%>Titre</td>
            <td width=35%>Prix</td>
            <td width=10%>Supprimer</td>
        </thead>
        <?php

            if (isset($lacommande['laCommande'])): 
                    $laCommande = $lacommande['laCommande']; 
                    for($i=1;$i<=$laCommande;$i++){
                        echo "<tr><td width=10%>".$i."</td>";
                        echo "<td width=45%>". $laCommande[$i]->TITRE ."</td>";
                        echo "<td width=35%>". $laCommande[$i]->PRIX ."</td>";
                        echo "<td width=10%> <input type='submit' value='[-]'> </td> </tr>";
                        $i++;
                }
            endif;    
        ?>

        <tfoot>
            <td width=50%></td>
            <td width=10%>Total</td>
            <td width=30%><? ?> €</td>
            <td width=10%></td>
        </tfoot>
    </table>
    <div class="form-group">
        <input type="submit" value="COMMANDER">
    </div>
</div>

