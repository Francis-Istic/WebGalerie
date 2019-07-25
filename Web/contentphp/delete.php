<?php
require('../BDDConnect.php');
$co = getConnection();


$name = $_GET['name'];

//
$query2 = "SELECT `Path` FROM `oeuvre` WHERE `Nom`='$name'";
$result = $co->query($query2);
$donnée = $result->fetch();

//On ouvre et lit le repertoire
$ouverture = opendir("../imgs");
$lecture = readdir($ouverture);
$newpath = "../imgs/".$donnée['Path'];
//On supprime le fichier et on ferme le repertoir
unlink ($newpath);
closedir($ouverture);

$query ="DELETE FROM `oeuvre` WHERE `Nom`='$name'";
$co->query($query);
header('Location: ../accueil.php');
exit();
 ?>
