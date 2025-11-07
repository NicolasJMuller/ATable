<?php
include_once("../bibli.php");
htmldebut('Juliette et Nicolas','connexion');
navigation('connexion');
if(isset($_SESSION["Inscription"])){
    echo"<script>alert('Vous êtes inscrit ! Vous pouvez maintenant vous connectez ! ');</script>";
    session_destroy();
}
if (isset($_POST["login"]) && isset($_POST["mdp"])) {
    $username = $_POST["login"];
    $password = $_POST["mdp"];
    
    // Requête préparée pour sécuriser l'entrée utilisateur
    // stmt sécurise la requête et empêche l'injection de SQL   

    $stmt = $connect->prepare("SELECT
	AT_Password
FROM
(
SELECT 'Client' AS Type, CL_Username AS AT_Name, CL_Password AS AT_Password FROM AT_CLIENTS
UNION ALL
SELECT 'Prestataire', PR_Username, PR_Password  FROM AT_PROVIDERS
) X 
WHERE
    AT_NAME = ?
");
// AT_Name = ? est une condition de comparaison où le ? est un paramètre lié. Cela signifie que la valeur à la place de ? sera insérée dynamiquement par la méthode bind_param de MySQLi
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
                
        // Vérification du mot de passe SHA-256
        if (hash('sha256', $password) === $hashed_password) {
            // $_Session est une variable global, une fois initialisé, elle est présente dans tout le site
            $_SESSION["user"] = $username;

            // Header nous renvoie vers la "location" choisi, ici l'index.
            // Une fois connecté, on nous renvoie vers l'index !
            header('Location: ../index.php');
            exit();
        } else {
            $_SESSION["error"] = "Mot de passe incorrect";
        }
    } else {
        $_SESSION["error"] = "Utilisateur introuvable";
    }

    $stmt->close();
    header("Location: connexion.php"); // Recharge la page après traitement
    exit();
    // Necessaire de le mettre avant l'html, sinon erreur header qui veut afficher quelque chose avant de partir, ce qui créer une erreur.
}
?>
<main class="form-signin w-25 m-auto shadow p-3 mb-5 bg-body rounded">
<form method="POST" action="connexion.php">
    <h1 class="h3 mb-3 fw-normal">Allez hop ! On se connecte !</h1>
    <?php if (isset($_SESSION["error"])): ?>
            <p class="alert alert-danger mt-3"><?= $_SESSION["error"] ?></p>
            <?php unset($_SESSION["error"]); ?>
        <?php endif; ?>
    <div class="form-floating">
      <input type="username" class="form-control" name="login" id="login" placeholder="MariageHeureux" required>
      <label for="login">Votre nom d'utilisateur</label>
    </div>
    <div class="form-floating mt-4">
      <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe" required>
      <label for="mdp">Mot de passe</label>
    </div>
    <button class="btn btn-success w-100 py-2 mt-4" type="submit">Se connecter</button>
    <a href="inscription.php" class="mt-2" type="submit">Pas de compte ? Tu peux t'inscrire.</a>
  </form>
</main>
<?php


?>
<?php
footer('connexion');
?>