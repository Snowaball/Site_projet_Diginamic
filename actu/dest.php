<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destiny</title>
</head>
<body>
<?php
include 'header2.php';
?>
<main>
    <table class="tabps5">
        <td>
            <div class="col-size"><h1 class="h1ps5" align="center"><u>Cyberpunk 2077 : Du gameplay PS4 fuite à cause de copies dans la nature</u></h1>
                <p>Pourtant attendu dans un peu plus de deux semaines, le prochain hit de Cyberpunk voit déjà ses premiers exemplaires distribués dans la nature et avec eux, la diffusion illégale d'images du jeu.
                Alors que la communication autour de Cyberpunk 2077 s'accélère à l'approche de sa sortie le 10 décembre prochain, CD Projekt n'avait sûrement pas anticipé cela. Après que la taille du jeu sur PS4 semble avoir été révélée par un utilisateur ayant reçu la boîte du jeu en avance, ce sont aujourd'hui des extraits du jeu sur la console de Sony qui fuite sur Internet.
                Dans ces séquences publiées et immédiatement supprimées à la demande CD Projekt pour violation de droit d’auteur, on peut notamment voir l'interface du jeu ainsi que le prologue. Cette circulation d'exemplaires probablement subtilisés du jeu à quelques semaines de sa sortie s'explique par la présence du titre dans de nombreux entrepôts afin de pouvoir être livré à temps. Prudence si vous cherchez à mettre la main sur ces vidéos, au risque de vous faire spoiler.</p>
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
                        $db->exec("INSERT INTO commdest(pseudo,commentaires) VALUES ('$pseud','$com')");
                    }
?>

<?php
                    
                    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    $bdd = new PDO('mysql:host=mysql-marcbal.alwaysdata.net;dbname=marcbal_site', 'marcbal', 'Resoxx11102000');
                     
                    // On recupere tout le contenu de la table Client
                    $reponse = $bdd->query('SELECT pseudo,commentaires FROM commdest');
                  
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