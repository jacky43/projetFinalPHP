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
            </thead>
            <?php include "selectionArticle.php";
                $articleSelectionner = selection();
            ?>
            <tbody>
                <tr>
                <?php $num="";  for($i = 0; $i < count($articleSelectionner); $i++)  { $num++;?>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $articleSelectionner[$i]["idProduit"]; ?></td>
                    <td><?php echo $articleSelectionner[$i]["liste"]; ?></td>
                    <td><?php echo $articleSelectionner[$i]["prix"]; ?></td>
                    <td><?php echo $articleSelectionner[$i]["Date"]; ?></td>
                </tr>
            </tbody>
               <?php } ?> 
        </table>
        <div class="ajout">
            <?php
            echo "<form action=\"traitementModifierArticle.php?idProduit=" . $_GET["idProduit"] . "\" method=\"post\">";
            ?>
                    <br>
                    
                    <div class="champ">
                        <label>Produits:</label><br>
                        <input type="text" name="produitModifier" value="<?php echo $_GET['liste']; ?>"/>
                    </div>
                    <div class="champ">
                        <label>Prix:</label><br>
                        <input type="number" name="prixModifier" value="<?php echo $_GET['prix'] ;?>" step=0.01/>
                    </div>
                    <div class="champ">
                        <input id="a" type="submit" name="connexion" value="Modifier"/>
                        <input id="b" type="button" onclick="location.href='affichageArticle.php'" value="Retouner"/>
                    </div>
                </form>
        </div>
    </body> 
</html>
