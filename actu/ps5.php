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
            <div class="col-size"><h1 align="center"><u>DES RUPTURES DE STOCKS À ENVISAGER ?</u></h1>
                <p>Sony s'est voulu prévoyant et pourrait limiter le nombre de PS5 à une seule par foyer. Même avec l'augmentation de sa production à 11 millions d'unités, la demande extrêmement importante pourrait mettre à mal le réassort et donc instaurer un délai d'attente plus ou moins long en fonction des régions. En 2013, alors que la PS4 était disponible en précommande depuis juin, un mois après la sortie de la machine, de nombreuses précommandes n'avaient pas encore été honorées. Il se pourrait que la situation soit identique en 2020. Néanmoins la France, un marché historiquement conquis par PlayStation, pourrait bénéficier de stocks plus importants. Mais là encore, rien n'est moins sur, tant le succès de la PS4 est retentissant dans de nombreux autres pays alimentant ainsi la demande mondiale.
                Des informations nous rapportent que PlayStation aurait mis les gros moyens pour le lancement de sa machine star. Pas moins de 60 vols Boeing 747 auraient été commandés pour l’approvisionnement des États-Unis. Quid de la France, terre historiquement conquis par PlayStation ? Les enseignes tardent à lancer les précommandes, pendant que d’autres sont déjà en rupture de stock totale. Des ratios pourraient être envisagés. Du côté de Micromania par exemple, la précommande de la machine est limitée à un seul exemplaire et l’enseigne française de jeux vidéo pourrait privilégier les clients premium au moment du réapprovisionnement. Les choses pourraient évoluer.
                Une première vague de console sera envoyée d’ici Novembre, puis deux autres prévues en Décembre et Janvier pourrait alimenter la demande ahurissante autour de la dernière-née de chez Sony.
                Nous mettrons à jour notre flux afin de vous informer des dernières disponibilités pour chaque enseigne.</p>
            </div>
        </td>
    </table>
    <table class="comm">
        <td>
            <div>
                <h3>Commentaires : </h3>
                
<?php
                    $db = new PDO('mysql:host=mysql-marcbal.alwaysdata.net;dbname=marcbal_site', 'marcbal', 'Resoxx11102000');
                    // Si j'ai entré un pseudo et un commentaire je l'insère dans la base de donnée 
                    if(isset($_POST['com'])&&isset($_POST['pseudo'])){
                        $pseud=htmlspecialchars($_POST['pseudo']);
                        $com= htmlspecialchars($_POST['com']);
                        $db->exec("INSERT INTO comm(pseudo,commentaires) VALUES ('$pseud','$com')");
                    }
?>

<?php
                    
                    
                    $bdd = new PDO('mysql:host=mysql-marcbal.alwaysdata.net;dbname=marcbal_site', 'marcbal', 'Resoxx11102000');
                     
                    // Je recupère les données des commentaires de la base de données
                    $reponse = $bdd->query('SELECT pseudo,commentaires FROM comm');
                  
                    // J'affiche le resultat
                    while ($donnees = $reponse->fetch()){
                    //J'affiche le pseudo suivi du commentaire associé
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