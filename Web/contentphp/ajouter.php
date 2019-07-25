<!DOCTYPE HTML>
<TYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="../style/test.css" />
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<title>Ajouter Oeuvre</title>
	</head>
	<body>
		<header>
			<nav>
				<a href="../accueil.php">Galerie Web</a>
				<a href="galerie.php"> Oeuvres </a>
				<a href="artistes.php"> Artistes </a>
				<a href="ajouter.php">Ajouter Oeuvre</a>
				<?php
					session_start();
					if(isset($_SESSION['user']) && isset($_SESSION['pwd'])) {
						echo  ("<a class='active' href='../account/deconnexion.php'> Deconnexion </a>");
						echo ("<a class='active' href='../account/moncompte.php'> Mon Compte </a>");
						echo  ("<a class='active' href='mesoeuvres.php'> Mes oeuvres </a>");
					} else {
						echo ("<a class='active' href='../account/seconnecter.php'> Connexion </a>");
						echo ("<a class='active' href='../account/inscription.php'> Inscription </a>");
					}
			 	?>
	  	</nav>
	  	</br>
		</header>
		<?php
			if($_SESSION['CONNECTE'] !== "true") {
	    	header("Location: ../account/login.php?mess=error&attri=Se connecter avant l'uplaod");
	    exit();
 			}
	 	?>
 		</br>
	 	<div class="main">
		<h2 align="center"> Ajouter une Oeuvre </h2>
		<?php
			if(!empty($_GET['attri'])){
				echo("<p align='center'>");
				echo $_GET['attri'];
				echo("</p>");
			}
		?>
		<form action="../upload.php" method="post" enctype="multipart/form-data">
			<table align="center">
				<tr>
	        <td align ="right">Titre</td>
	        <td align ="left"> <input type="Text" name="titre" id="title" required></td>
	      </tr>
				<tr>
	        <td align ="right">Description</td>
	        <td align ="left"> <input type="Text" name="desc" id="desc" required></td>
	      </tr>
				<tr>
					<td align="right">Select image to upload: </td>
					<td align="left"><input type="file" name="fichier" id="fileToUpload"> </td>
				</tr>
		</table>
		</br>
		<p align="center"><input type="submit" value="Upload Image" name="submit" id="submit"></p>
    </form>
		<script>
			//Script de verification en JS
			var formValid = document.getElementById('submit');
			var title = document.getElementById('title');
			var desc = document.getElementById('desc');
			var fileToUpload = document.getElementById('fileToUpload');
			//On rajoute l'evenement de cliquer sur la validation
			formValid.addEventListener('click',validation);
			//On définit une fonction de validation
			function validation(event) {
				if(title.validity.valueMissing) {
					event.preventDefault();
					alert('Veuillez mettre un titre');
				}
				if(desc.validity.valueMissing) {
					event.preventDefault();
					alert('Veuillez mettre une description');
				}
			}
		</script>
	</div>
  </body>
</html>
