<?php
session_start();
$d=false;
?>
<?php
//Démarrage de la session

    if(isset($_POST['test'])){
        //Récupération des login
        $email= $_POST['mail'];
        $pass= $_POST['mdp'];

        //Connection à la base de données 
        $db = new PDO('mysql:host=mysql-marcbal.alwaysdata.net;dbname=marcbal_site', 'marcbal', 'Resoxx11102000');

        //Je vérifie si l'adresse email inscrite est déja dans la bdd
        $sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
        $result = $db->prepare($sql);
        $result->execute();

        //Si l'adresse mail existe déja je connecte l'utilisateur en vérifiant son mot de passe
        if($result->rowCount() > 0){
            $data = $result->fetchAll();
            if(password_verify($pass, $data[0]["pass"])){
                echo"Connexion réussie";
                $_SESSION['email']=$email;
                header('Location: accueil.php');
                exit();
            }//Si le mot de passe n'est pas le même que celui dans la bdd j'affiche un message d'erreur
            else{
                echo '<script language="javascript" defer>';
                echo 'alert("Mot de passe erronné");';
                echo 'window.location.href="index.php";';
                echo "</script>";
                }
        }//Si l'adresse mail n'exitste pas je crée un nouvel utilisateur en inscrivant son email et son mot de passe dans la bdd en hashant son mot de passe
        else{
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO utilisateurs (email, pass) VALUES ('$email', '$pass')";
            $req = $db->prepare($sql);
            $req->execute();
            header('Location: accueil.php');
            exit();
        }
    }

?>