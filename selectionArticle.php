<?php
function selection(){
    include "connexionBd.php";
    $select = $dbco->prepare("
    SELECT * FROM articles 
");
$select->execute();
$resultatSelectArticles = $select->fetchAll(PDO::FETCH_ASSOC);

    return $resultatSelectArticles;
}

?>