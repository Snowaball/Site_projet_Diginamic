<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PS5 arcticle</title>
</head>
<body>
<?php
include 'header2.php';
?>
<main>
    <table class="tabps5">
        <td>
            <div class="col-size"><h1 align="center"><u>PS5 : Toutes les consoles n'ont pas le même ventilateur</u></h1>
                <p>Lors des tests, de nombreuses rédactions ont pu mettre en avant le silence de la PS5, une promesse faite par Sony bien en amont. 
                Cependant, depuis la mise à disposition de la console auprès du public, de nombreux utilisateurs ont constaté que la PS5 n'était pas si silencieuse que ça.
                De nombreuses raisons peuvent être à l'origine de cela, mais la source d'un bruit normal mais important semble avoir été identifié par nos confrères de Les Numériques. 
                En effet, en démontant un modèle silencieux et un modèle plus bruyant, ils se sont rendu compte que les deux ventilateurs n'étaient pas identiques. 
                Comme ils l'indiquent dans leur article, l'épaisseur des pales et leur forme peuvent considérablement modifier le bruit produit.</p>
            </div>
        </td>
    </table>
    <table class="comm">
        <td>
            <div>
                <h3>Commentaires : </h3>
                
<?php
                    $db = new PDO('mysql:host=mysql-marcbal.alwaysdata.net;dbname=marcbal_site', 'marcbal', 'Resoxx11102000');
                    if(isset($_POST['com'])&&isset($_POST['pseudo'])){
                        $pseud=htmlspecialchars($_POST['pseudo']);
                        $com= htmlspecialchars($_POST['com']);
                        $db->exec("INSERT INTO commps5_2(pseudo,commentaires) VALUES ('$pseud','$com')");
                    }
?>

<?php
                    
                    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    $bdd = new PDO('mysql:host=mysql-marcbal.alwaysdata.net;dbname=marcbal_site', 'marcbal', 'Resoxx11102000');
                     
                    // On recupere tout le contenu de la table Client
                    $reponse = $bdd->query('SELECT pseudo,commentaires FROM commps5_2');
                  
                    // On affiche le resultat
                    while ($donnees = $reponse->fetch()){
                    //On affiche l'id et le nom du client en cours
                    echo "<p style='color: white;'> $donnees[pseudo] : ";
                    echo "$donnees[commentaires] </p>";
                    }
                 
                    
?>
                <form method="POST">
                    <input type="text" placeholder="Entrez votre pseudo :" name="pseudo"></input>
                    <input type="text" placeholder="Ecrire un commentaire : " name="com"></input>
                    <input type="submit"></input>
                </form>
                

            </div>
        </td>
    </table>
</main>

</body>
</html>