<!DOCTYPE HTML>
<TYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content = "text/html;charset =iso-8859-1"/>
		<link rel="icon" href="../favicon.ico" />
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<link rel="stylesheet" href="../style/test.css" />
		<title>Mes Oeuvres</title>
	</head>
	<body>
		<header>
			<nav>
				<a href="../accueil.php">Galerie Web</a>
	    	<a href="galerie.php"> Oeuvres </a>
	    	<a href="artistes.php"> Artistes </a>
	    	<a href="ajouter.php">Ajouter Oeuvre</a>
	    	<a class='active' href='../account/deconnexion.php'> Deconnexion </a>
	    	<a class='active' href='../account/moncompte.php'> Mon Compte </a>
	    	<a class='active' href='mesoeuvres.php'> Mes oeuvres </a>
			</nav>
		</header>
	</br>
		<div class="main">
		    <h1 align="center"> Mes Oeuvres</h1>
		    </br>
		    <table border=1 align="center">
		    	<?php
		    		session_start();
		    		if($_SESSION['CONNECTE'] !== "true") {
		        	header("Location: login.php");
		        	exit();
		    		} else {
		        	require('../BDDConnect.php');
							$co = getConnection();
							$name = " '" . $_SESSION['user'] . "' " ;
							$query ="SELECT `Nom` FROM `oeuvre` WHERE `User`=$name";
							$result = $co->query($query);
				 	  	echo ("<table border=1 align='center'>");
							echo ("<tr>");
							echo ("<th> Nom de l'oeuvre </th>");
							echo ("<th> Supprimer </th>");
							echo ("</tr>");
							while($donnée = $result->fetch()){
								echo ("<tr>");
			      		echo ("<td> $donnée[Nom] </td>");
			      		echo ("<td> <a href='delete.php?name=$donnée[Nom]'><img src ='../croix.png' </a></td>");
			      		echo ("</tr>");
							}
		    	  }
		     ?>
		     </table>
		   </br>
		</div>
  </body>
</html>
