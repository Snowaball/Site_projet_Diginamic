<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="form.css"/>
	<title>Contact</title>
</head>
<body>
<div class="body">
<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold">Games Marc</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="accueil.php" class="nav-link text-uppercase font-weight-bold">Accueil <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="actu.php" class="nav-link text-uppercase font-weight-bold">Actualités</a></li>
                    <li class="nav-item"><a href="jeux.php" class="nav-link text-uppercase font-weight-bold">Jeux</a></li>
                    <li class="nav-item"><a href="form.php" class="nav-link text-uppercase font-weight-bold">Contact</a></li>
					<li class="nav-item"><a href="index.php" class="nav-link text-uppercase font-weight-bold">Se connecter/S'inscrire</a></li>
					<li class="nav-item"><a href="logout.php" class="nav-link text-uppercase font-weight-bold">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<br>
	

<?php
if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"Marc Balouzet"<test.test@gmail.com>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">

					<u>Nom de l\'expediteur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expediteur :</u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'

				</div>
			</body>
		</html>
		';

		mail("marc.balouzet@outlook.fr", "CONTACT - Monsite.com", $message, $header);
		$msg='<h3 align="center" style="color: green">Votre message a bien été envoyé !</h3>';
	}
	else
	{
		$msg='<h3 align="center" style="color: red">Tous les champs doivent être complétés !</h3>';
	}
}
?>

		<h2 align="center">Formulaire de contact !</h2>
		<form method="POST" action="">
            <div class="container">
			    <input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
			    <input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
			    <textarea name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
			    <input type="submit" value="Envoyer !" name="mailform"/>
            </div>
		</form>
		<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>
</div>
<?php include 'footer/footer.php'; ?>
</body>
</html>