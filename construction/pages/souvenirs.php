<?php
include_once("../bibli.php");
htmldebut('Juliette et Nicolas','Souvenirs');
navigation('souvenirs');
?>


<!-- Titre -->
<div class="text-center my-5">
    <h1> Nos meilleurs souvenirs culinaires</h1>
    <p class="lead">Un petit retour sur les plus beaux événements gourmands partagés.</p>
</div>

<!-- Cartes souvenirs -->
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

    <?php
    $requete = "SELECT * FROM AT_MEMORIES ORDER BY ME_Date DESC;";
    $resultat = mysqli_query($connect, $requete);

    if ($resultat && mysqli_num_rows($resultat) > 0) {
        while ($souvenir = mysqli_fetch_assoc($resultat)) {
            echo '
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">'.$souvenir['ME_Label'].'</h5>
                        <p class="card-text">'.($souvenir['ME_Description']).'</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <small class="text-muted">📅 '.($souvenir['ME_Date']).'</small>
                        <div>
                            <span class="text-warning">';
                            for ($i = 0; $i < $souvenir['ME_Rating']; $i++) echo '★';
                            for ($i = $souvenir['ME_Rating']; $i < 5; $i++) echo '☆';
            echo       '</span>
                        </div>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo '<p class="text-center">Aucun souvenir n’a encore été ajouté.</p>';
    }
    ?>
    </div>
</div>

<!-- footer -->
<?php
footer("contact");
?>