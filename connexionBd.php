<?php

try{
    $servname ="localhost"; $username = "root"; $passeword =""; $dbname = "Magasin";$port = 3306;
    $dbco = new PDO("mysql:host=$servname;port=$port;dbname=$dbname",$username,$passeword);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
}    
    catch(PDOException $e){
        try{
           
            $dbco = new PDO("mysql:host=localhost;port=3306","root","");
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $createDB = "CREATE DATABASE Magasin";
            $dbco->exec($createDB);

            $use = "USE Magasin";
            $dbco->exec($use);

            $createTb1 = "CREATE TABLE utilisateurs (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(12) NOT NULL,
                name VARCHAR(20) NOT NULL,
                password VARCHAR(15) NOT NULL
            )";
            $dbco->exec($createTb1);

            $createTb2 = "CREATE TABLE articles (
                idProduit INT AUTO_INCREMENT PRIMARY KEY,
                liste VARCHAR(50) NOT NULL,
                prix DOUBLE NOT NULL,
                Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )AUTO_INCREMENT = 100";
            $dbco->exec($createTb2);  
          
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    }
    
?>