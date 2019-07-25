<?php
session_start();
session_unset (); //On enleve la session
session_destroy(); //On détruit la session
header('Location: ../accueil.php');
?>
