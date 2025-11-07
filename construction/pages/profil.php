<?php
include_once("../bibli.php");
htmldebut('Juliette et Nicolas','Profil');
navigation('profil');

// Vérification de session
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}

$username = $_SESSION['user'];

// Récupération du prénom
$PrenomRequete = "SELECT X.At_FirstName
FROM (
    SELECT 'Client' AS Type, CL_FirstName AS At_FirstName, CL_Username FROM AT_CLIENTS
    UNION ALL
    SELECT 'Prestataire', PR_Label AS At_FirstName, PR_Username AS CL_Username FROM AT_PROVIDERS
) AS X
WHERE X.CL_Username = ?";

$stmt = $connect->prepare($PrenomRequete);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($prenom);

if ($stmt->fetch()) {
    echo '<div class="d-flex justify-content-center align-items-center w-25 vh-25 ms-4" style="background-color: #F2C3AF;">
        <div class="text-center">
            <img src="../medias/interface/logo.svg" alt="Logo" class="img-fluid mb-3" style="width: 150px;">
            <p class="text-muted">Hello !</br><span class="fs-1 fw-bold">'.$prenom.'</span></p>
        </div>
    </div>';
} else {
    header('Location: connexion.php');
    exit();
}
$stmt->close();

// Vérification si l'utilisateur est un prestataire
$prestataire = false;
$queryPrestataire = "SELECT * FROM AT_PROVIDERS WHERE PR_Username = '$username'";
$resultPrestataire = mysqli_query($connect, $queryPrestataire);
if (mysqli_num_rows($resultPrestataire) > 0) {
    $prestataire = true;
}

// Mise à jour du profil
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $current_password = $_POST['current_password'] ?? '';
    $new_firstname = !empty($_POST['prenom']) ? trim($_POST['prenom']) : null;
    $new_lastname = !empty($_POST['nom']) ? trim($_POST['nom']) : null;
    $new_password = !empty($_POST['mdp']) ? trim($_POST['mdp']) : null;
    $new_phone = !empty($_POST['phone_number']) ? trim($_POST['phone_number']) : null;

    $passwordQuery = "SELECT CL_Password FROM AT_CLIENTS WHERE CL_Username = ? UNION SELECT PR_Password FROM AT_PROVIDERS WHERE PR_Username = ?";
    $stmt = $connect->prepare($passwordQuery);
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $stmt->bind_result($stored_password);
    $stmt->fetch();
    $stmt->close();

    if ($new_password !== null && hash('sha256', $current_password) !== $stored_password) {
        echo '<div class="alert alert-danger">Le mot de passe actuel est incorrect. Veuillez réessayer.</div>';
    } else {
        $profileUpdated = false;

        // Mise à jour client
        $update_parts = [];
        $params = [];
        $types = "";

        if ($new_firstname !== null) {
            $update_parts[] = "CL_FirstName = ?";
            $params[] = $new_firstname;
            $types .= "s";
        }
        if ($new_lastname !== null) {
            $update_parts[] = "CL_LastName = ?";
            $params[] = $new_lastname;
            $types .= "s";
        }
        if ($new_password !== null) {
            $new_password_hash = hash('sha256', $new_password);
            $update_parts[] = "CL_Password = ?";
            $params[] = $new_password_hash;
            $types .= "s";
        }
        if ($new_phone !== null) {
            $update_parts[] = "CL_Phone = ?";
            $params[] = $new_phone;
            $types .= "s";
        }

        if (!empty($update_parts)) {
            $sql = "UPDATE AT_CLIENTS SET " . implode(", ", $update_parts) . " WHERE CL_Username = ?";
            $params[] = $username;
            $types .= "s";

            $stmt = $connect->prepare($sql);
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            $stmt->close();
            $profileUpdated = true;
        }

        // Mise à jour prestataire
        $update_parts = [];
        $params = [];
        $types = "";

        if ($new_firstname !== null) {
            $update_parts[] = "PR_Label = ?";
            $params[] = $new_firstname;
            $types .= "s";
        }
        if ($new_password !== null) {
            $new_password_hash = hash('sha256', $new_password);
            $update_parts[] = "PR_Password = ?";
            $params[] = $new_password_hash;
            $types .= "s";
        }
        if ($new_phone !== null) {
            $update_parts[] = "PR_Phone = ?";
            $params[] = $new_phone;
            $types .= "s";
        }

        if (!empty($update_parts)) {
            $sql = "UPDATE AT_PROVIDERS SET " . implode(", ", $update_parts) . " WHERE PR_Username = ?";
            $params[] = $username;
            $types .= "s";

            $stmt = $connect->prepare($sql);
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            $stmt->close();
            $profileUpdated = true;
        }

        if ($profileUpdated) {
            echo '<div class="alert alert-success">Profil mis à jour avec succès !</div>';
        }
    }
}

// Création de l'offre pour le prestataire
if ($prestataire && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_offer'])) {
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $price = floatval($_POST['price']);
    $min_guests = intval($_POST['min_guests']);
    $max_guests = intval($_POST['max_guests']);

    // Récupération du code du prestataire (PR_Code) à partir du nom d'utilisateur
    $sql_provider = "SELECT PR_Code FROM AT_PROVIDERS WHERE PR_Username = ?";
    $stmt = $connect->prepare($sql_provider);
    $stmt->bind_param("s", $username);  // Le nom d'utilisateur est dans la variable $username
    $stmt->execute();
    $stmt->bind_result($providerCode);
    
    // Vérification si le prestataire existe
    if ($stmt->fetch()) {
        // Si le prestataire existe, on peut insérer l'offre dans la base de données
        $stmt->close();

        // Insertion de l'offre dans la base de données
        $sql = "INSERT INTO AT_OFFERS (OF_Label, OF_Description, OF_Price, OF_Pictures, PR_Code, OF_MinGuest, OF_MaxGuest) 
                VALUES (?, ?, ?, NULL, ?, ?, ?)";
        $stmt_insert = $connect->prepare($sql);
        $stmt_insert->bind_param("ssdiii", $title, $description, $price, $providerCode, $min_guests, $max_guests);
        
        if ($stmt_insert->execute()) {
            echo '<div class="alert alert-success">Votre offre a été créée avec succès !</div>';
        } else {
            echo '<div class="alert alert-danger">Erreur lors de la création de l\'offre.</div>';
        }
        $stmt_insert->close();
    } else {
        echo '<div class="alert alert-danger">Le prestataire n\'existe pas ou n\'est pas correctement authentifié.</div>';
    }
}

?>

<!-- Formulaire de création d'offre pour prestataire -->
<?php if ($prestataire): ?>
    <hr>
    <div class="container mt-5">
        <h3>Créer une nouvelle offre</h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="new_offer" value="1">
            <div class="form-group mt-3">
                <label for="title">Titre de l'offre</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="form-group mt-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
            </div>

            <div class="form-group mt-3">
                <label for="price">Prix (€ par convive)</label>
                <input type="number" step="0.01" class="form-control" name="price" id="price" required>
            </div>

            <div class="form-group mt-3">
                <label for="min_guests">Nombre minimum de convives</label>
                <input type="number" class="form-control" name="min_guests" id="min_guests" required>
            </div>

            <div class="form-group mt-3">
                <label for="max_guests">Nombre maximum de convives</label>
                <input type="number" class="form-control" name="max_guests" id="max_guests" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Créer l'offre</button>
        </form>
    </div>
<?php endif; ?>


<?php

// Vérification si client
$client = false;
$queryClient = "SELECT * FROM AT_CLIENTS WHERE CL_Username = '$username'";
$resultClient = mysqli_query($connect, $queryClient);
if (mysqli_num_rows($resultClient) > 0) {
    $client = true;
}

// Création de demande
if ($client && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_request'])) {
    $label = mysqli_real_escape_string($connect, $_POST['label']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $date = mysqli_real_escape_string($connect, $_POST['date']);
    $ville = mysqli_real_escape_string($connect, $_POST['ville']);
    $codePostal = mysqli_real_escape_string($connect, $_POST['code_postal']);
    $nbInvite = intval($_POST['guests']);
    $budget = floatval($_POST['budget']);
    $evenement = intval($_POST['evenement']);

    $res = mysqli_query($connect, "SELECT CL_Code FROM AT_CLIENTS WHERE CL_Username = '$username'");
    $data = mysqli_fetch_assoc($res);
    $codeClient = $data['CL_Code'];

    $sql = "INSERT INTO AT_REQUESTS (RE_Label, RE_Description, RE_Date, RE_City, RE_PostalCode, RE_Guest, RE_Budget, EV_Code, CL_Code)
            VALUES ('$label', '$description', '$date', '$ville', '$codePostal', $nbInvite, $budget, $evenement, $codeClient)";
    $insert = mysqli_query($connect, $sql);

    echo $insert ? '<div class="alert alert-success">Votre demande a bien été créée !</div>' : '<div class="alert alert-danger">Erreur lors de la création de la demande.</div>';
}
?>

<!-- Formulaire de création de demande -->
<?php if ($client): ?>
<hr>
<div class="container mt-5">
    <h3>Créer une nouvelle demande</h3>
    <form method="POST">
        <input type="hidden" name="new_request" value="1">
        <div class="form-group mt-3"><label for="label">Titre de la demande</label><input type="text" class="form-control" name="label" required></div>
        <div class="form-group mt-3"><label for="description">Description</label><textarea class="form-control" name="description" rows="4" required></textarea></div>
        <div class="form-group mt-3"><label for="date">Date de l'événement</label><input type="date" class="form-control" name="date" required></div>
        <div class="form-group mt-3"><label for="ville">Ville</label><input type="text" class="form-control" name="ville" required></div>
        <div class="form-group mt-3"><label for="code_postal">Code postal</label><input type="text" class="form-control" name="code_postal" required></div>
        <div class="form-group mt-3"><label for="guests">Nombre de convives</label><input type="number" class="form-control" name="guests" required></div>
        <div class="form-group mt-3"><label for="budget">Budget (€)</label><input type="number" step="0.01" class="form-control" name="budget" required></div>
        <div class="form-group mt-3"><label for="evenement">Type d’événement</label>
            <select name="evenement" class="form-control" required>
                <?php
                $events = mysqli_query($connect, "SELECT * FROM AT_EVENTS");
                while ($ev = mysqli_fetch_assoc($events)) {
                    echo '<option value="'.$ev['EV_Code'].'">'.$ev['EV_Event'].'</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Créer la demande</button>
    </form>
</div>
<?php endif; ?>
<hr>
<div class="container mt-5">
    <h3>Modifier mes informations</h3>
    <form method="POST">
        <?php if ($client): ?>
        <div class="form-group"><label>Prénom</label><input type="text" class="form-control" name="prenom" placeholder="Nouveau prénom"></div>
        <div class="form-group mt-3"><label>Nom</label><input type="text" class="form-control" name="nom" placeholder="Nouveau nom"></div>
        <?php endif; ?>
        <div class="form-group mt-3"><label>Mot de passe actuel</label><input type="password" class="form-control" name="current_password" placeholder="Mot de passe actuel"></div>
        <div class="form-group mt-3"><label>Nouveau mot de passe</label><input type="password" class="form-control" name="mdp" placeholder="Nouveau mot de passe"></div>
        <div class="form-group mt-3"><label>Numéro de téléphone</label><input type="text" class="form-control" name="phone_number" placeholder="Nouveau numéro de téléphone"></div>
        <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
    </form>
</div>

<?php
footer('profil');
?>
