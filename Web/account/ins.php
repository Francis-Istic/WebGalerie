<?php
require('../BDDConnect.php');
$co = getConnection();

//On récupère les valeurs du formulaire
$pseudo = $_POST['login'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];
$date = $_POST['birth'];

//On execute les requetes SQL
$vname = $co->prepare("SELECT COUNT(*) FROM user WHERE Username ='$pseudo'");
$vname->execute(array($pseudo));
$vpwd = $co->prepare("SELECT COUNT(*) FROM user WHERE Password ='$pwd'");
$vpwd->execute(array($pwd));
$vmail = $co->prepare("SELECT COUNT(*) FROM user WHERE email ='$email'");
$vmail->execute(array($email));

//On verifie que chaque requete ont une valeur = 0
if(($vname -> fetchColumn() == 0) && ($vpwd -> fetchColumn() == 0) && ($vmail -> fetchColumn() == 0)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $co->query("INSERT INTO user(Username, Password, email, Birth) VALUES('$pseudo','$pwd','$email','$date')");
    header('Location: mail.php?attri='.$email);
    exit();
  }
}
else {
  header('Location: inscription.php?mess=error&attri=Champs non valide');
  exit();
}

?>
