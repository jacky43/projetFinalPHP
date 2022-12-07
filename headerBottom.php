<?php 
$_SESSION['nomGroup'] = 'DECFINA20P - Project synthèse';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Acceuil</title>
        <link  
            rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
            crossorigin="anonymous" >
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset='utf-8'>
    </head>
    <body>
        <div class="header-Bottom">
            <p><?php echo $_SESSION['nomGroup']; ?></p>
        </div>
      
</html>