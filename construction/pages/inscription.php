<?php
include_once("../bibli.php");
htmldebut('Juliette et Nicolas','inscription');
navigation('inscription');
// La méthode "POST" est celle du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Crée que les variables sont définies avant de les utiliser
    // ? = if / else 
    $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
    $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
    //? = si le label : = sinon NULL
    $label = isset($_POST['label']) ? trim($_POST['label']) : null;
    $webSite = isset($_POST['webSite']) ? trim($_POST['webSite']) : null;
    $adresse = isset($_POST['Adresse']) ? trim($_POST['Adresse']) : null;
    $login = isset($_POST['login']) ? trim($_POST['login']) : '';
    $password = isset($_POST['mdp']) ? trim($_POST['mdp']) : '';
    $password = hash('sha256',$password);
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $mail = isset($_POST['mail']) ? trim($_POST['mail']) : '';
    $city = isset($_POST['city']) ? trim($_POST['city']) : '';
    $postalCode = isset($_POST['postalCode']) ? trim($_POST['postalCode']) : '';
    // Vérifie si la case 'prestataire' est cochée si oui = 1 si non = 0
    $prestataire = isset($_POST['prestataire']) ? 1 : 0;
    $profil = NULL; // Option pour ajouter une photo de profil directement depuis l'interface profil.

    // Vérifie si le login existe déjà dans la base de données
$stmt = $connect->prepare("
SELECT COUNT(*) 
FROM (
    SELECT CL_Username FROM AT_CLIENTS
    UNION
    SELECT PR_Username FROM AT_PROVIDERS
) AS all_users
WHERE all_users.CL_Username = ?
");
// Ce point d'interogation est défini par stmt -> bind_param
$stmt->bind_param("s", $login);
$stmt->execute();
$stmt->bind_result($login_exists);
$stmt->fetch();
$stmt->close(); // On ferme après usage

if ($login_exists > 0) {
$_SESSION['DejaPris'] = 'Ce nom d\'utilisateur est déjà pris ! Désolé :c';
} else {
// Insertion des données
if ($prestataire == 0) {
    $requete = "INSERT INTO AT_CLIENTS (CL_Code, CL_LastName, CL_FirstName, CL_Phone, CL_Mail, CL_City, CL_PostalCode, CL_Profil, CL_Username, CL_Password) 
                VALUES (NULL, ?, ?, ?, ?, ?, ?, NULL, ?, ?)";
} else {
    $requete = "INSERT INTO AT_PROVIDERS 
    (PR_Code, PR_Label, PR_Phone, PR_Mail, PR_WebSite, PR_Profil, PR_PostalCode, PR_Adress, PR_City, PR_Username, PR_Password) 
    VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
}

$stmt = $connect->prepare($requete); // Nouveau statement

if ($prestataire == 0) {
    $stmt->bind_param("ssssssss", $lastName, $firstName, $phone, $mail, $city, $postalCode, $login, $password);
} else {
    $stmt->bind_param("ssssssssss", $label, $phone, $mail, $webSite, $profil, $postalCode, $adresse, $city, $login, $password);
}

$stmt->execute();
$stmt->close(); // On ferme le statement après usage

// Le header doit être obligatoirement avec le formulaire sinon il cherche à afficher du contenue et donc ne fonctionne pas.
header("Location: connexion.php");
$_SESSION["Inscription"] = true;
exit();
}

}

?>

<main class="form-signin w-50 m-auto shadow p-3 mb-5 bg-body rounded">
  <form method="POST" action="inscription.php" class="row justify-content-center">
    <h1 class="h3 mb-3 fw-normal">Tu nous rejoins mon p'tit bout ?!</h1>
    <?php if (isset($_SESSION["DejaPris"])): ?>
            <p class="alert alert-danger mt-3"><?= $_SESSION["DejaPris"] ?></p>
            <?php unset($_SESSION["DejaPris"]); ?>
        <?php endif; ?>
    <div class="form-floating mt-4 col-md-6">
      <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Nom de famille" required>
      <label for="lastName">Votre nom de famille</label>
    </div>
    
    <div class="form-floating mt-4 col-md-6">
      <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Prénom" required>
      <label for="firstName">Prénom</label>
    </div>

    <div class="form-floating mt-4 col-md-6">
      <input type="text" class="form-control" name="label" id="label" placeholder="Nom d'entreprise">
      <label for="label">Nom d'entreprise (si prestataire)</label>
    </div>

    <div class="form-floating mt-4 col-md-6">
      <input type="text" class="form-control" name="webSite" id="webSite" placeholder="Site web">
      <label for="webSite">Site web (si prestataire)</label>
    </div>

    <div class="form-floating mt-4 col-md-6">
      <input type="text" class="form-control" name="Adresse" id="Adresse" placeholder="Adresse du magasin">
      <label for="Adresse">Adresse du magasin (si prestataire)</label>
    </div>

    <div class="form-floating mt-4 col-md-6">
      <input type="username" class="form-control" name="login" id="login" placeholder="MariageHeureux" required>
      <label for="login">Nom d'utilisateur (pour se connecter)</label>
    </div>

    <div class="form-floating mt-4 col-md-6">
      <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe" required>
      <label for="mdp">Mot de passe</label>
    </div>
    
    <div class="form-floating mt-4 col-md-6">
      <input type="text" class="form-control" name="phone" id="phone" placeholder="Numéro de téléphone" required>
      <label for="phone">Numéro de téléphone</label>
    </div>
    
    <div class="form-floating mt-4 col-md-6">
      <input type="mail" class="form-control" name="mail" id="mail" placeholder="Adresse E-mail" required>
      <label for="mail">Votre adresse mail</label>
    </div>
    
    <div class="form-floating mt-4 col-md-6">
      <input type="text" class="form-control" name="city" id="city" placeholder="MariageHeureux" required>
      <label for="city">Ville de résidence</label>
    </div>

    <div class="form-floating mt-4 col-md-6">
      <input type="text" class="form-control" name="postalCode" id="postalCode" placeholder="Votre code postal" required>
      <label for="postalCode">Votre code postal</label>
    </div>

    <div class="form-check mt-4">
      <input class="form-check-input" type="checkbox" name="prestataire" id="Prestataires">
      <label class="form-check-label" for="Prestataires">
        Vous êtes un prestataire ? 
      </label>
    </div>
    <button class="btn btn-success w-100 py-2 mt-4" type="submit">S'inscrire</button>

  </form>
</main>


<?php
footer('inscription');
?>
