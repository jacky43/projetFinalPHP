<?php
include "connexionBd.php";
$produit = $_POST['produit'];
$prix = $_POST['prix'];


$select = $dbco->prepare("
   INSERT INTO articles (liste,prix) VALUES (:liste, :prix)
");
$select->bindParam(':liste',$produit);
$select->bindParam(':prix',$prix);


$select->execute();

header("location:affichageArticle.php");

?>