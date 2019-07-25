<?php
require('../BDDConnect.php');
$co = getConnection();
session_start();

if(isset($_SESSION['user'])) {
  $content = $_POST['text'];
  $oeuvre = $_GET['attri'];
  $nom = $_SESSION['user'];
  $query = "INSERT INTO `comment` VALUES ('$content','$nom','$oeuvre')";
  $co->query($query);
  header('Location: oeuvre.php?titre='.$oeuvre);
} else {
  header('Location: ../account/seconnecter?mess=error&attri=Pour commenter, connectez-vous !');
  exit();
}
?>
