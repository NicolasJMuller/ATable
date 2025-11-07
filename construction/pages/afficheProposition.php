<?php
include_once("../bibli.php");
htmldebut('Juliette et Nicolas','Demandes');
navigation('demandes');
?>

<?php
$table = $_GET["proposition"];
switch ($table) {
    case "Demandes":
        $client = true;
        $table = "AT_REQUESTS";
        break;
    case "Offres":
        $client = false;
        $table = "AT_OFFERS";
        break;
}
echo'
 <div class="row align-items-center">
    <!-- Colonne pour l\'image -->
    <div class="col-md-7 d-flex justify-content-center">';
    switch ($client){
      case true :
        // A modifier pour requete
           echo'<figure class="m-0">
        <img src="../medias/contenu/offre/intro.webp" alt="" class="img-fluid">
      </figure>
          ';
    break;
    case false :
      // à modifier pour offre
      echo'
            <figure class="m-0">
        <img src="../medias/contenu/offre/intro.webp" alt="" class="img-fluid">
      </figure>';
      break;
  }
  echo'
    
    <!-- Colonne pour le texte -->
    <div class="col-md-5 mx-4">
    ';
    switch ($client){
        case true :
             echo'<h2>Ici, on est là pour créer du bonheur !</h2>
      <p>Retrouvez les dernières offre de nos particuliers !</p>';
      break;
      case false :
        echo'
        <h2>Vous allez trouvez votre bonheur ici !</h2>
        <p>Retrouvez nos meilleurs offres parmi une large séléction de professionnels.</p>';
        break;
    }
    echo'
    </div>
  </div>
</div>
    <div class="d-flex justify-content-center align-items-center w-100 vh-25" style="background-color: #F2C3AF;">
        <div class="text-center">
            <img src="../medias/interface/logo.svg" alt="Logo" class="img-fluid mb-3" style="width: 150px;">
        </div>
    </div>';
    


?>
<?php
echo '<section class = "row justify-content-center">';

if ($table == 'AT_REQUESTS') {
    $requete = 'SELECT R.*, C.*, E.*
FROM AT_REQUESTS R
JOIN AT_CLIENTS C ON R.CL_Code = C.CL_Code
JOIN AT_EVENTS E ON R.EV_Code = E.EV_Code
ORDER BY R.EV_Code;';
    $result = mysqli_query($connect ,$requete);
    while ($row = mysqli_fetch_assoc($result)) {

  echo '<article class="col-sm-6 col-md-4 col-lg-3 m-5">
            <div class="card">
              <img class="card-img-top p-3 " src="../medias/contenu/photoProfil/'.$row['CL_Profil'].'" alt="Photo de Profil">
              <div class="card-body">
                <h2 class="h5 card-title">'.$row['CL_FirstName'].' '.$row['CL_LastName'].'</h2>
                <ul class="list-group list-group-flush">
                <li class="list-group-item card-text">Mon évenement : '.$row['EV_Event'].' <small class="text-muted"> à '.$row['RE_City'].', '.$row['RE_PostalCode'].'</small> </li>
                <li class="list-group-item card-text"><img src="../medias/interface/plat.png" alt="€" style="width: 20px; height: 20px; margin-right: 5px; vertical-align: middle;">J\'aimerais beaucoup : '.$row['RE_Label'].'</li>
                <li class="list-group-item card-text"><img src="../medias/interface/convives.png" alt="€" style="width: 20px; height: 20px; margin-right: 5px; vertical-align: middle;">Pour '.$row['RE_Guest'].' de personnes</li>
                <li class="list-group-item card-text"> <img src="../medias/interface/prix.png" alt="€" style="width: 20px; height: 20px; margin-right: 5px; vertical-align: middle;">J\'ai '.$row['RE_Budget'].'€ de budget</li>
                </ul>

                 <button class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#myModal'.$row['RE_Code'].'">Détails</button>
              </div>
            </div>		
        </article>

           <!-- CODE FENETRE MODALE MAISON 1 -->
            <div class="modal" id="myModal'.$row['RE_Code'].'" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="h5 modal-title">'.$row['RE_Label'].' <small class="text-muted"> de '.$row['CL_FirstName'].' '.$row['CL_LastName'].'</small></h2>
                  </div>
                  <div class="modal-body text-center">
                  <ul class="list-group list-group-flush">
                    <li style="list-style: none;"><img src="../medias/contenu/photoProfil/'.$row['CL_ProfilMiniature'].'" alt="photo de profil" /></li>
                    <li class="list-group-item card-text">Description de la demande :</li>
                    <li style="list-style: none;">'.$row['RE_Description'].'</li>
                    <li class="list-group-item card-text">Date de l\'évènement :</>
                    <li style="list-style: none;">'.$row['RE_Date'].'</li>
                    </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <a type="button" href="messages.php?message='.$row['CL_Mail'].'" class="btn btn-primary">Envoyer un message</a>
                  </div>
                </div>
              </div>
            </div>';
}
}else {
  $requete = 'SELECT O.*, P.*
                FROM AT_OFFERS O
                JOIN AT_PROVIDERS P ON O.PR_Code = P.PR_Code
                ORDER BY O.OF_Code;';
    $result = mysqli_query($connect ,$requete);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<article class="col-sm-6 col-md-4 col-lg-3 m-5">
                <div class="card">
                    <img class="card-img-top p-3" src="../medias/contenu/photoOffre/'.$row['OF_Pictures'].'" alt="Logo de l\'entreprise">
                    <div class="card-body">
                        <h2 class="h5 card-title">'.$row['PR_Label'].'</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item card-text"><img src="../medias/interface/plat.png" alt="€" style="width: 20px; height: 20px; margin-right: 5px; vertical-align: middle;"> '.$row['OF_Label'].'</li>
                            <li class="list-group-item card-text">
                             <img src="../medias/interface/prix.png" alt="€" style="width: 20px; height: 20px; margin-right: 5px; vertical-align: middle;">'.$row['OF_Price'].'€/par convive</li>
                            <li class="list-group-item card-text">
                            <img src="../medias/interface/convives.png" alt="€" style="width: 20px; height: 20px; margin-right: 5px; vertical-align: middle;">'.$row['OF_MinGuest'].' à '.$row['OF_MaxGuest'].' personnes</li>
                            <li class="list-group-item card-text"><img src="../medias/interface/localisation.png" alt="€" style="width: 20px; height: 20px; margin-right: 5px; vertical-align: middle;">'.$row['PR_City'].' ('.$row['PR_PostalCode'].')</li>
                        </ul>
                        <button class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#offerModal'.$row['OF_Code'].'">Détails</button>
                    </div>
                </div>		
            </article>

            <!-- Fenêtre modale pour l\'offre -->
            <div class="modal" id="offerModal'.$row['OF_Code'].'" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="h5 modal-title">'.$row['OF_Label'].' <small class="text-muted">par '.$row['PR_Label'].'</small></h2>
                        </div>
                        <div class="modal-body text-center">
                            <ul class="list-group list-group-flush">
                                <li style="list-style: none;"><img src="../medias/contenu/photoOffre/'.$row['OF_Pictures'].'" alt="Logo" /></li>
                                <li class="list-group-item card-text">Description de l\'offre :</li>
                                <li style="list-style: none;">'.$row['OF_Description'].'</li>
                                <li class="list-group-item card-text">Nombre de personnes : de '.$row['OF_MinGuest'].' à '.$row['OF_MaxGuest'].'</li>
                                <li class="list-group-item card-text">Prix : '.$row['OF_Price'].'€</li>
                                <li class="list-group-item card-text">Site web : <a href="'.$row['PR_Website'].'" target="_blank">'.$row['PR_Website'].'</a></li>
                                <li class="list-group-item card-text">Téléphone : '.$row['PR_Phone'].'</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <a type="button" href="messages.php?message='.$row['PR_Mail'].'" class="btn btn-primary">Contacter</a>
                        </div>
                    </div>
                </div>
            </div>';
    }
}

echo '</section>';

?>
<?php
footer('contact');
?>