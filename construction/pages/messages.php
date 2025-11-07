<?php
include_once("../bibli.php");
htmldebut('Juliette et Nicolas', 'messagerie');
navigation('messages');

if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];

    // Connexion et récupération de l'email de l'expéditeur
    $query = "SELECT CL_Mail FROM AT_CLIENTS WHERE CL_Username = '$username'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $sender_email = $row['CL_Mail'];

    // Préremplissage si l'e-mail est passé en GET
    $defaultRecipientEmail = '';
    if (isset($_GET['message'])) {
        $defaultRecipientEmail = htmlspecialchars($_GET['message']);
    }

    // Si un message est envoyé
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['recipient']) && !empty($_POST['message'])) {
        $recipient_email_input = mysqli_real_escape_string($connect, $_POST['recipient']);
        $message_text = mysqli_real_escape_string($connect, $_POST['message']);

        // Vérifier si l'adresse email existe
        $query_recipient = "SELECT CL_Username FROM AT_CLIENTS WHERE CL_Mail = '$recipient_email_input'";
        $result_recipient = mysqli_query($connect, $query_recipient);

        if ($recipient_row = mysqli_fetch_assoc($result_recipient)) {
            $recipient_username = $recipient_row['CL_Username'];
            $recipient_email = $recipient_email_input;

            // Enregistrement du message
            $insert_query = "INSERT INTO AT_MESSAGES (sender_username, recipient_username, message_text) 
                             VALUES ('$username', '$recipient_username', '$message_text')";
            if (mysqli_query($connect, $insert_query)) {
                // Envoi de l'email
                $subject = "Nouveau message de $username";
                $headers = "From: $sender_email";
                $email_message = "Vous avez reçu un message de $username :\n\n$message_text";

                if (mail($recipient_email, $subject, $email_message, $headers)) {
                    echo "<div class='alert alert-success'>Le message a bien été envoyé à $recipient_email.</div>";
                } else {
                    echo "<div class='alert alert-warning'>Le message est enregistré, mais l'e-mail n'a pas pu être envoyé.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Erreur lors de l'enregistrement du message.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Le destinataire avec cette adresse e-mail n'existe pas.</div>";
        }
    }

    // Formulaire d'envoi
    echo '
    <div class="container mt-5">
        <form method="POST" action="">
            <div class="form-group">
                <label for="recipient">Destinataire (adresse e-mail)</label>
                <input type="email" class="form-control" id="recipient" name="recipient" 
                       placeholder="Adresse e-mail du destinataire" value="'.$defaultRecipientEmail.'" required>
            </div>
            <div class="form-group mt-3">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" placeholder="Votre message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
        </form>
    </div>';

    // Historique des messages
    echo '<hr>';
    $query = "SELECT * FROM AT_MESSAGES WHERE sender_username = '$username' OR recipient_username = '$username' ORDER BY message_date DESC";
    $result = mysqli_query($connect, $query);

    echo '<div class="container mt-5">
            <h3>Votre historique des messages</h3>
            <ul class="list-group">';
    while ($row = mysqli_fetch_assoc($result)) {
        $sender = htmlspecialchars($row['sender_username']);
        $recipient = htmlspecialchars($row['recipient_username']);
        $message_text = htmlspecialchars($row['message_text']);
        $message_date = $row['message_date'];

        echo "<li class='list-group-item'>
                <strong>De :</strong> $sender <br>
                <strong>À :</strong> $recipient <br>
                <strong>Message :</strong> $message_text <br>
                <small><i>Envoyé le : $message_date</i></small>
              </li>";
    }
    echo '</ul></div>';

} else {
    echo '<div class="alert alert-danger">Vous devez être connecté pour envoyer un message.</div>';
}

footer('contact');
?>
