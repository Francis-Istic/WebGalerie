<?php
  //On récupère les variables
  $login = $_POST["login"];
  $pwd = $_POST["pwd"];
  require('../BDDConnect.php');
  $co = getConnection();

  //On éxecute les requetes
  $pdoname = $co->prepare("SELECT COUNT(*) FROM user WHERE Username ='$login' AND Password ='$pwd'");
  $pdoname->execute(array($login));

  //On verifie les valeurs
  if(($pdoname -> fetchColumn() != 0)){
      session_start();
      $_SESSION['CONNECTE'] = "true";
      $_SESSION['user'] = $login;
      $_SESSION['pwd'] = $pwd;
      header("Location: moncompte.php");
      exit();
  } else {
      header('Location: seconnecter.php?mess=error&attri=Erreur de connexion');
      exit();
    }
?>
