<?php
//Fonction PHP qui permet la connexion à la base de données
function getConnection() {
  $servername = 'localhost';
  $databasename = 'galerie';
  $username = '';
  $password = 'root';
  try {
    $co = new PDO('mysql:host=localhost;dbname=galerie;charset=utf8', 'root', '');
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $co;
  }
  catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    return null;
  }
}
?>
