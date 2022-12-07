<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Page de creation de compte</title>
        <link  
            rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
            crossorigin="anonymous" >
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset='utf-8'>
    </head>
    <body class="bleuciel">
        <div id="form-ajout-uti">
            <h1>S'enregistrer</h1>
            <form  method="post" action="creationCompte.php">
                <br>
                <div class="champ">
                    <label>Username:</label><br>
                    <input type="text" name="username" required  pattern="^[A-Za-z0-9]{1,11}$"  />
                </div>
                <div class="champ">
                    <label>Nom complet:</label><br>
                    <input type="text" name="nomComplet" required  pattern="^[A-Za-z0-9\s-]{1,19}$" />
                </div>
                <div class="champ">
                    <label>Password:</label><br>
                    <input type="password" name="password" required  pattern="^[A-Za-z0-9$?!@\s-]{1,14}$"/>
                </div>
                <div class="champ">
                    <label>Confirmation Password:</label><br>
                    <input type="password" name="confirmationPassword" required  pattern="^[A-Za-z0-9$?!@\s-]{1,14}$"/>
                </div>
                <div class="champ">
                    <input class="bouton-accueil-enregistrer" type="submit" name="enregistrer" value="S'enregistrer"/>
                </div>
                <div class="champ">
                    <input class="bouton-accueil-enregistrer" id="bouton-plus-grand" type="button" onclick="location.href='connexionPage.php'" value="Vous avez un compte? Donc, retour au login"/>
                </div>
            </form>
        </div>
        <?php  include "headerBottom.php";?>
        <?php
        include "connexionBd.php";
        if(isset($_POST['enregistrer'])){
            if($_POST['password'] ==  $_POST['confirmationPassword']){
            
            $username = $_POST['username'];
            $name = $_POST['nomComplet'];
            $password = $_POST['password'];
            $select = $dbco->prepare("
            INSERT INTO utilisateurs (username,name,password) VALUES (:username, :name, :password)
            ");
            $select->bindParam(':username',$username);
            $select->bindParam(':name',$name);
            $select->bindParam(':password',$password);

            $resultatSelect = $select->execute();

            header("location:connexionPage.php");
            }else{
            echo   '<script> alert ("Password incorrect. "); </script> ';
            
            }
        }
        ?>
    </body> 
</html>
