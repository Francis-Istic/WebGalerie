<?php

    //Destinataire
    $to =  "'".$_GET['attri']."'";
    //Expediteur
    $from = "webgalerie0@gmail.com";
    //Sujet
    $subject = "Inscription Galerie Web";
    //Contenu
    $message = "Bienvenue sur la Galerie WEB. Votre Inscription est réussit";
    //Entete
    $headers = "From: " . $from;

    mail($to,$subject,$message,$headers);

    header('Location: seconnecter.php?mess=error&attri=Inscription réussit, Vous pouvez vous connecter');
    exit();
?>
