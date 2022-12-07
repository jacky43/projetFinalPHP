<?php
include "connexionBd.php";

$idProduit = $_GET["idProduit"];

$supprimerArticle = $dbco->prepare(
    "DELETE FROM articles WHERE idProduit = :idProduit"
);

$supprimerArticle->bindParam(':idProduit', $idProduit);


$supprimerArticle->execute();

header("Location:affichageArticle.php");

?>