<?php

// définition des bonnes constantes mysql selon l'hébergeur



if ($_SERVER['SERVER_NAME'] == 'webetu.iutnc.univ-lorraine.fr') {
        define('SERVER', 'localhost');
        define('USERNAME', 'e96506u');
        define('PASSWORD', 'Nico1');
        define('DATABASE',  'e96506u');
        // autres constantes webetu de connexion mysql SERVEUR LOGIN PASS
        
}
else {
    define('SERVER', 'mysql-sae203atable.alwaysdata.net');
    define('USERNAME', '402508');
    define('PASSWORD', 'SAE203JulietteNicolas'); // root pour mac
    define('DATABASE', 'sae203atable_db');
}    
    


//données pour webetu

// Connection à la base de données
$connect = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE) or die('Une erreur est survenue. Veuillez réessayer plus tard.');
//si connection échoue
mysqli_set_charset($connect, 'utf8'); //encodage des caractères

// $ok = mysqli_close($result) pour fermer 
// $ok = mysqli_free_result($laVariable) pour supprimer la variable
//tester print_r
?>