<!DOCTYPE HTML>
<TYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content = "text/html;charset =iso-8859-1"  />
		<link rel="stylesheet" href="../style/test.css" />
		<link rel="icon" href="../favicon.ico" />
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<title>Connexion</title>
	</head>
	<body>
		<header>
			<nav>
				<?php
				session_start();
					if(isset($_SESSION['user']) && isset($_SESSION['pwd'])) {
						header('Location : moncompte.php');
						exit();
					}
				?>
				<a href="../accueil.php">Galerie Web</a>
	    	<a href="../contentphp/galerie.php"> Oeuvres </a>
	    	<a href="../contentphp/artistes.php"> Artistes </a>
	    	<a href="../contentphp/ajouter.php">Ajouter Oeuvre</a>
				<a class="active" href="seconnecter.php"> Connexion </a>
      	<a class="active" href="inscription.php"> Inscription </a>
	  </nav>
	 </header>
	 </br>
	 <div class="main">
		<h1 align = "center">Identification</h1>
			<?php
				if(!empty($_GET['attri'])){
					echo("<p align='center'>");
					echo $_GET['attri'];
					echo("</p>");
				}
				?>
		<form action="login.php" method="post">
			<table align = "center">
				<tr>
					<td align ="right">Login : </td>
					<td align ="left"> <input type="Text" name="login" id="login" required ></td>
				</tr>
				<tr>
					<td align ="right">Mot de passe : </td>
					<td align ="left"> <input type="password" name="pwd" id="pwd" required ></td>
				</tr>
			</table>
			<p align = "center"><input type = "submit" value = "Connexion" id="submit"></p>
			</br>
			<p align = "center"> <a href="inscription.php" > Pas encore inscris ? C'est par ici </a> </p>
		</form>
		<script>
			//Script de verification en JS
			var formValid = document.getElementById('submit');
			var login = document.getElementById('login');
			var pwd = document.getElementById('pwd');
			//On rajoute l'evenement de cliquer sur la validation
			formValid.addEventListener('click',validation);
			//On définit une fonction de validation
			function validation(event) {
				if(login.validity.valueMissing) {
					event.preventDefault();
					alert('Veuillez mettre un login');
				}
				if(pwd.validity.valueMissing) {
					event.preventDefault();
					alert('Veuillez mettre un mot de passe');
				}
			}
		</script>
	</div>
  </body>
</html>
