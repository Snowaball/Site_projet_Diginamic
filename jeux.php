<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleac.css">
    <title>Jeux</title>
</head>
<body>
<?php 
include 'header.php';
?>
<br>
<h3 align="center" class="jeux"> Recherche de jeux : </h3>
<?php
        $db = new PDO('mysql:host=mysql-marcbal.alwaysdata.net;dbname=marcbal_site', 'marcbal', 'Resoxx11102000');
    
        //Affichage
        if(isset($_GET['titre'])){
            //Je récupère la recherche
            $titre= htmlspecialchars($_GET['titre']);

            //Je prépare la requète de la recherche dans la base de donnée avec la recherche de l'utilisateur
            $search= '%'. strtolower($titre) . '%';
            $recherche = $db->query("SELECT titre FROM jeux WHERE lower(titre) LIKE '$search' ORDER BY titre" );
            
            //Si un jeu correspondant est trouvé dans la base de donnée on l'affiche
            if($recherche->rowCount()==0){
                $recherche = $db->query("SELECT titre FROM jeux WHERE lower(titre) LIKE '$search' ORDER BY titre" );
            }
        }

?>
    <form align="center" method="GET">
       <input type="texte" name="titre" ></input>
       <input type="submit" value="Rechercher"/>
    </form>
<?php if(isset($_GET['titre'])){

?>
    <?php //Mise en page de l'affichage
        if($recherche->rowCount()>0){ ?>
        <ul>
        <?php while($a = $recherche->fetch()){ ?>
            <li align="center"><?= $a['titre'] ?></li>
        <?php } ?>
        </ul>
    <?php } else{ ?>
        
        <!-- Si aucun résultat n'est trouvé j'affiche : -->
    <p align="center">Aucun résultat pour: <?=$titre ?>...</p>
    <?php } ?>
    <?php } ?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include 'footer/footer.php'; ?>
</body>
</html>
