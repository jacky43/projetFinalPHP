<?php
include "ConnexionBd.php";

$idProduit = $_GET["idProduit"];
$produitModifier = $_POST["produitModifier"];
$prixModifier = $_POST["prixModifier"];

$modifierArticle = $dbco->prepare("
UPDATE articles
SET liste = :produitModifier, prix = :prixModifier
WHERE idProduit = :idProduit
");

$modifierArticle->bindParam(':idProduit', $idProduit);
$modifierArticle->bindParam(':produitModifier', $produitModifier);
$modifierArticle->bindParam(':prixModifier', $prixModifier);

$modifierArticle->execute();

header("Location:affichageArticle.php");
?>