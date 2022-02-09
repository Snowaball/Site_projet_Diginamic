<?php
session_start();
?>
<?php 
  if (isset($_SESSION['email'])){
    header('Location: accueil.php');
    exit();
  }
  else{
?>
    <form action="login.php" method="POST">
    <div class="login-box">

      <h1>Identification</h1>
      <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" name="mail" placeholder="Adresse mail">
      </div>

      <div class="textbox">
        <i class="fas fa-lock"></i>
      
        <input type="password" name="mdp" placeholder="Mot de passe">
      </div>

      <button type="submit" class="btn" value="Connexion" name="test">Connexion </button>
    </div>
  </form>

<?php
  }
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
</body>
</html>