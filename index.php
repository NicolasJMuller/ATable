<?php
include_once("construction/bibli.php");
htmldebut('Nicolas','Index');


?>


<?php
echo '<h1>Site en construction</h1>
<figure><img src="medias/contenu/Construction.webp" alt="Image d\'un gateau en construction"></figure>

<h2><a href="construction/index.php">Site :</h2>
<p>
    <a href="medias/sae203atable_db.sql" download>
        Télécharger la base de données (.sql)
    </a>
</p>
<p>
    <a href="ReadMe.md" download>
        Télécharger le ReadMe (.md)
    </a>
</p>';



?>

<?php
footer('index');
?>