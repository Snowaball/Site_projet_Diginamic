<meta charset="utf-8"/>
<?php
    $db = new PDO('mysql:host=localhost;dbname=site_projet', 'root', '');
    
    $titre= $db->query('SELECT titre FROM jeux WHERE titre LIKE '."%".$recherche."%"  );
?>

<ul>
<?php while($a = $titre-> fetch()) { ?>
    <li><?= $a['titre']?></li>
    
<?php } ?>
</ul>

