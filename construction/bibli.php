<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'connexion_mysql.php';
session_start();
function htmldebut($auteur,$titre) {
    echo  '<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="'.$auteur.'">
        <title>'.$titre.'</title>
        ';
        if($titre == "Index"){
           echo' <link rel="icon" type="image/x-icon" href="favicon.svg">';
        }else{
          echo '<link rel="icon" type="image/x-icon" href="../favicon.svg">';
        }
        echo'
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
      


            :root {
                --bs-primary: #FFB6C1;
                --bs-secondary: #AEC6CF;
                --bs-success: #AEC6CF;
                --bs-info: #FDFD96;o
                --bs-warning: #D98566;
                --bs-danger: #FF6961;
                --bs-light: #BECDC6;
                --bs-dark: #A29BFE;

                --bs-btn-success: #A29BFE; 
            }
            .main-custom {
                background-color: #D98566 !important;
            }

            .btn-custom-warning {
                background-color: var(--bs-warning) !important;
                border-color: var(--bs-warning) !important;
                color: black !important;
            }

            .btn-custom-warning:hover {
                background-color: #F2C4B3 !important;
                border-color: #F2C4B3 !important;
            }

            .btn-primary {
                background-color: var(--bs-primary);
                border-color: var(--bs-primary);
            }

            .btn-primary:hover {
                background-color: #FF99AA;
                border-color: #FF99AA;
            }
        </style>
    </head>
    <body>
    ';
}
function footer($page) {
  global $connect;
    echo'
   <footer class="row text-white main-custom row-cols-1 row-cols-sm-2 row-cols-md-6 py-2 my-2 border-top">

          <div class="col mb-3">
              ';
        if($page == "index"){
          echo' <a class="navbar-brand text-white" href="index.php"><img src="medias/interface/logo.svg" alt="A Table !" width="150" height="auto"></a>';
        }else{
          echo '<a class="navbar-brand text-white" href="../index.php"><img src="../medias/interface/logo.svg" alt="A Table !" width="150" height="auto"></a></a>';
        }
        echo'
              <div class="row">
                  <a href="https://www.instagram.com/a_table_stdie?igsh=MW90Ynl6NnhwdzRyeQ%3D%3D&utm_source=qr/"
                      class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none col-3">
                      <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 50 50">
                          <path
                              d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z">
                          </path>
                      </svg>
                  </a>
                  <a href="https://bsky.app/"
                      class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none col-3">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -3.268 64 68.414" width="50" height="50" viewBox="0 0 50 50">
                          <path fill="#0085ff"
                              d="M13.873 3.805C21.21 9.332 29.103 20.537 32 26.55v15.882c0-.338-.13.044-.41.867-1.512 4.456-7.418 21.847-20.923 7.944-7.111-7.32-3.819-14.64 9.125-16.85-7.405 1.264-15.73-.825-18.014-9.015C1.12 23.022 0 8.51 0 6.55 0-3.268 8.579-.182 13.873 3.805zm36.254 0C42.79 9.332 34.897 20.537 32 26.55v15.882c0-.338.13.044.41.867 1.512 4.456 7.418 21.847 20.923 7.944 7.111-7.32 3.819-14.64-9.125-16.85 7.405 1.264 15.73-.825 18.014-9.015C62.88 23.022 64 8.51 64 6.55c0-9.818-8.578-6.732-13.873-2.745z" />
                      </svg></a>
              </div>
          </div>

          <div class="col mb-3">

          </div>



          <div class="col mb-3">
              <h5>Plan du site :</h5>
              <ul class="nav flex-column">
                  <li class="nav-item mb-2">';

                // Si on n'est pas sur la page "index" et qu'on clickl alors accueil nous ramène à accueil
                  if($page != "index"){
                  echo'<a href="../index.php" class="nav-link text-white p-0">Accueil</a>';
                  }else{
                  echo'<a href="index.php" class="nav-link text-white p-0">Accueil</a>';
                  }
                  echo'
                  </li>
                  <li class="nav-item mb-2 text-white">';

                // si l'on est dans l'index, et qu'on click alors offre nous ramène à offre 
                  if($page == "index"){
                  echo'<a href="afficheProposition.php?proposition=Offres" class="nav-link text-white p-0">
                          Offres</a>';
                  }else{
                    echo'
                    <a href="afficheProposition.php?proposition=Offres" class="nav-link text-white p-0">
                          Offres</a>';
                  }
                  echo'
                          </li>
                  <li class="nav-item mb-2">';
                  if($page == "index"){
                    echo'<a href=""afficheProposition.php?proposition=Demandes"" class="nav-link text-white p-0">
                            Demandes</a></li>';
                  }else{
                    echo'
                    <a href=""afficheProposition.php?proposition=Demandes"" class="nav-link text-white p-0">
                            Demandes</a>
                            ';
                          }
                          echo'
                          </li>
                  <li class="nav-item mb-2">';

                
                  // si l'on est dans l'index,et qu'on click alors souvenirs nous ramène à souvenirs
                  if($page == "index"){
                  echo'<a href="pages/souvenirs.php" class="nav-link text-white p-0">
                          Souvenirs</a>';
                  }else{
                    echo'<a href="souvenirs.php" class="nav-link text-white p-0">
                          Souvenirs</a>';
                  }
                  echo' 
                          </li>
                  <li class="nav-item mb-2">';

                  // si l'on est dans l'index, alors profil nous ramène à profil
                  if($page == "index"){
                    echo'<a href="pages/profil.php" class="nav-link text-white p-0">Profil</a>';
                  }else{
                    echo'<a href="profil.php" class="nav-link text-white p-0">Profil</a>';

                  }
                  echo'
                  </li>
              </ul>
          </div>

          <div class="col mb-3">
              <h5>A propos :</h5>
              <ul class="nav flex-column">
                  <li class="nav-item text-white mb-2"><a href="mentionlegal.php"
                          class="nav-link text-white p-0">Mention légale</a></li>
              </ul>
          </div>
          <div class="col mb-3">
              <h5>Contact :</h5>
              <ul class="nav flex-column">
                  <li class="nav-item text-white text-white mb-2"><a href="mailto:contact@athome.fr"
                          class="nav-link text-white p-0">Nous envoyer un mail.</a></li>
                  <li class="nav-item text-white mb-2">
                      Auteur : Muller Nicolas / Quiévreux Juliette TP4
                  </li>

              </ul>
          </div>
      </footer>
  </div>
  </body>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      </html>';

      $ok = mysqli_close($connect);

}

function navigation($page){

    echo'
    <header>

<nav class="navbar text-white navbar-expand-md main-custom">
<div class="container flex-column">
';
if($page == "index"){
   echo'  <a class="navbar-brand mx-auto mb-3" href="index.php">
                <img src="medias/interface/logo.svg" alt="A Table !" width="150" height="auto">
            </a>';
}else{
  echo ' <a class="navbar-brand mx-auto mb-3" href="../index.php">
                <img src="../medias/interface/logo.svg" alt="A Table !" width="150" height="auto">
            </a>';
}
echo'
       
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">';
                    if($page == "index"){
                        echo '<a class="nav-link active text-white" aria-current="page" href="index.php">Accueil</a>';
                    }
                    else{
                   echo' <a class="nav-link text-white" aria-current="page" href="../index.php">Accueil</a>';
                    }
                    echo '
                    </li>
        <li class="nav-item">
          ';
                  if($page != "index"){
                   echo' <a class="nav-link text-white" aria-current="page" href="afficheProposition.php?proposition=Offres">Offres</a>';
                  }else{
                    echo '<a class="nav-link text-white" aria-current="page" href="pages/afficheProposition.php?proposition=Offres">Offres</a>';
                  }
                    echo '
        </li>
     <li class="nav-item">
         ';
                  if($page != "index"){
                        echo '<a class="nav-link active text-white" aria-current="page" href="afficheProposition.php?proposition=Demandes">Demandes</a>';
                    }
                    else{
                  echo' <a class="nav-link text-white" aria-current="page" href="pages/afficheProposition.php?proposition=Demandes">Demandes</a>';
                    }
                  
                    echo '
        </li>
     <li class="nav-item">
          ';
                  if($page != "index"){
                    echo' <a class="nav-link text-white" aria-current="page" href="souvenirs.php">Souvenirs</a>';
                  }else{
                    echo '<a class="nav-link text-white" aria-current="page" href="pages/souvenirs.php">Souvenirs</a>';
                  }
                    echo '
        </li>
        ';
         
        //création d'une session utilisateur 
        // Si elle n'est pas connectée (la session d'utilisateur) alors, bouton de connexion, sinon bouton de profil 
                    if(!isset($_SESSION['user'])){
                      if($page != "index"){

                        // Renvoi vers formulaire de connexion 
              echo'<li><a class="nav-link text-white" aria-current="page" href="connexion.php">Connexion</a></li>';
                      }else{
                        echo'<li><a class="nav-link text-white" aria-current="page" href="pages/connexion.php">Connexion</a></li>';
                      }
              } else {
                if($page != "index"){
                  echo'<a class="nav-link text-white" aria-current="page" href="profil.php">Profil</a>
                  <a class="nav-link text-white" aria-current="page" href="deconnexion.php">Deconnexion</a>
                  
                  ';
                }else{
                  echo'<a class="nav-link text-white" aria-current="page" href="pages/profil.php">Profil</a>
                  <a class="nav-link text-white" aria-current="page" href="pages/deconnexion.php">Deconnexion</a>
                  ';
                }
              };
              echo'
      </ul>
      ';
      if($page != "index"){
        echo'
   <form class="d-flex" role="search" method="GET" action="recherche.php">
                    <input class="form-control me-2" name="searchIt" type="search" placeholder="Que cherchez-vous ?"
                        aria-label="Search">
                    <button class="btn btn-primary" type="submit">Rechercher </button>
                </form>';
      }else  {
        echo'
        <form class="d-flex" role="search" method="GET" action="pages/recherche.php">
                         <input class="form-control me-2" name="searchIt" type="search" placeholder="Que cherchez-vous ?"
                             aria-label="Search">
                         <button class="btn btn-primary" type="submit">Rechercher </button>
                     </form>';
      }
      echo'
    </div>
  </div>
</nav>
</header>';
}
?>