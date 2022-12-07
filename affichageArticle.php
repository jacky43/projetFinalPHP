<?php 
include "connexionBd.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Affichage Articles</title>
        <link  
            rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
            crossorigin="anonymous" >
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset='utf-8'>
    </head>
    <body class="roseclair">
        <?php 
        include "headerTop.php";
        ?>
        <table>
            <thead>
                <th>Num</th>
                <th>ID:Produit</th>
                <th>Liste</th>
                <th>Prix</th>
                <th>Date</th>
                <th>Modifier</th>
                <th>suppimer</th>
            </thead>
            <tbody>
                <?php 
                include "selectionArticle.php";
                $articleSelectionner = selection();
                ?> 
                <tr>
                    <?php $num =""; for($i = 0; $i < count($articleSelectionner); $i++) { $num++; ?>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $articleSelectionner[$i]["idProduit"]; ?></td>
                    <td><?php echo $articleSelectionner[$i]["liste"]; ?></td>
                    <td><?php echo $articleSelectionner[$i]["prix"]; ?></td>
                    <td><?php echo $articleSelectionner[$i]["Date"]; ?></td>
                    <td><?php echo "<input type=\"button\" onclick=\"location.href='formulaireModifierArticle.php?idProduit=" . $articleSelectionner[$i]["idProduit"] . "&liste=" . $articleSelectionner[$i]["liste"] . "&prix=" . $articleSelectionner[$i]["prix"] . "'\" value=\"modifier\" id=\"bouton-modifier\">"; ?></td>
                    <td><?php echo "<input type=\"button\" onclick=\"location.href='suppressionArticle.php?idProduit=" . $articleSelectionner[$i]["idProduit"] . "'\" value=\"supprimer\" id=\"bouton-supprimer\">"; ?></td>
                </tr>
                <?php } ?>  
                
            </tbody>   
        </table>
        <input id="bouton-ajouter-produit"  type="button" onclick="location.href='ajouterArticle.php'" value="Ajouter un produit dans la liste"/>
    </body> 
</html>
