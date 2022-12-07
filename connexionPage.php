<?php include "connexionBd.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Page de connection</title>
        <link  
            rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
            crossorigin="anonymous" >
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset='utf-8'>
    </head>
    <body class="bleuciel">
        <div id="form-accueil">
            <h1>Se connecter </h1>
            <form method="post" action="connexionPage.php">
                <br>
                <div class="champ">
                    <label>Username:</label><br>
                    <input type="text" name="username" placeholder="Ton username"/>
                </div>
                <br>
                <div class="champ">
                    <label>Password:</label><br>
                    <input type="password" name="password" placeholder="Ton password" />
                </div>
                <br>
                <div class="champ">
                    <input class="bouton-accueil-enregistrer" type="submit" name="connexion" value="Se connecter"/>
                </div>
                <div class="champ">
                    <input class="bouton-accueil-enregistrer" type="button" onclick="location.href='creationCompte.php'" value="Créer un compte"/>
                <div>
            </form>
        </div> 
    <?php  include "headerBottom.php";?>
    <?php
    
    if(isset($_POST['connexion'])){
        include "connexionBd.php";
        session_start();
        $_SESSION['username'] = $_POST['username'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $selectNom = $dbco->prepare("
        SELECT count(*) as 'nbNom' from utilisateurs where username = :username
        ");
        $selectNom->bindParam(':username',$username);
        $selectNom->execute();
        $resultatNom = $selectNom->fetch(PDO::FETCH_ASSOC);

        $selectMdp = $dbco->prepare("
        SELECT count(*) as 'nbMdp' from utilisateurs where password = :password
        ");
        $selectMdp->bindParam(':password',$password);
        $selectMdp->execute();
        $resultatMdp = $selectMdp->fetch(PDO::FETCH_ASSOC);

        if($resultatMdp['nbMdp'] == 0 && $resultatNom['nbNom'] == 0 ){
         echo   '<script> alert ("Username ou Password invalide. "); </script> ';
        }
        else if ($resultatMdp['nbMdp'] == 1 && $resultatNom['nbNom'] == 1 ) 
        {
            header("Location: affichageArticle.php");
        }
    }   
    ?>  

    </body>
</html>
