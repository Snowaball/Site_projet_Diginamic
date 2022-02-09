<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'header2.php';
?>
<main>

    <table class="tabps5">
        <td>
            <div class="col-size"><h1 class="h1ps5" align="center"><u>Pas de portage sur Switch ?</u></h1>
                <p>L'été prochain, Monster Hunter Stories 2 : Wing of Ruin débarquera sur Switch. Si vous espériez un portage de son prédécesseur, sorti en 2017 sur 3DS, ce n'est pas à l'ordre du jour chez Capcom.
                "Il n’est pas prévu pour le moment de porter le premier Monster Hunter Stories sur Nintendo Switch, mais si quelqu’un s’inquiète de devoir rattraper son retard parce que l’histoire est directement liée ou qu’il ne pourra pas apprécier le nouveau jeu, je peux mettre fin à cette crainte car il y a un tout nouveau protagoniste et une nouvelle intrigue", a déclaré le réalisateur Ryozo Tsujimoto dans les colonnes de Gamereactor. "Bien qu'il se déroule dans le même monde, Monster Hunter Stories 2 a été conçu de sorte à ce que les joueurs puissent y jouer directement", a-t-il ajouté.
                Spin-off à la sauce RPG avec des monstres à capturer et à faire évoluer, Monster Hunter Stories reste donc disponible sur 3DS, mais aussi sur iOS et Android où il est proposé au prix de 21,99€. Une démo nommée Monster Hunter Stories The Adventure Begins est également téléchargeable.</p>
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
                        $db->exec("INSERT INTO comm_mh(pseudo,commentaires) VALUES ('$pseud','$com')");
                    }
?>

<?php
                    
                    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    $bdd = new PDO('mysql:host=mysql-marcbal.alwaysdata.net;dbname=marcbal_site', 'marcbal', 'Resoxx11102000');
                     
                    // On recupere tout le contenu de la table Client
                    $reponse = $bdd->query('SELECT pseudo,commentaires FROM comm_mh');
                  
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