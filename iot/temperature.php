<!DOCTYPE html>
<html lang="fr">
<head>
  <title>IOT Sun</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>

<style>
	body {
	background-color: #bdbdbd
	}
	
    .navbar {
    margin-bottom: 0;
    z-index: 9999;
    border: 0;
    font-size: 14px;
    line-height: 1.42857143;
    letter-spacing: 4px;
    border-radius: 0;
	}
	
	.navbar-brand{
	font-size: 30px;
	}
	
	.jumbotron{
	background-color: #bdbdbd;
	font-size: 30px;
	text-align: center
	}
	
	a{
	color:black;
	}
	
	h2 {
		text-align: center
	}
	
</style>

<body style="font-family:verdana;">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
	<ul class="nav navbar-nav">
		<li><img src="logoIOT.png" width="80"></li>
		<li><a href="accueil.php">accueil</a></li>
		<li><a href="temperature.php"> température</a></li>
		<li><a href="vibration.php">vibration</a></li>
		<li><a href="localisation.php">localisation</a></li>
		<li><a href="alerte.php">alertes</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> déconnection </a></li>
	</ul>
    </div>
  </div>
</nav>

<section class="container">
<h2>Capteurs de température</h2>	
<br>
<table class="table table-bordered">
<tr><th>température </th><th>date </th></tr>
<?php
// Effectuer la connexion à la Base de Données
$host = '192.168.0.250';  // serveur local
$user = 'adminIot';  // administrateur de la base
$password = 'bonjour'; // mot de passe de l'administrateur
$base = 'iotsun';    // nom de la base
$connexion = mysqli_connect($host, $user, $password, $base);
if ($connexion) {
 // Effectuer la requête
 $query = "SELECT mes_valeur, mes_date, mes_typId, typ_unite FROM mesure INNER JOIN typemesure ON (mes_typId = typ_id) WHERE typ_nom ='température'";
 $result = mysqli_query($connexion, $query);

 // Afficher les lignes du tableau en fonction de la réponse à la requête
 if ($result) {
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["mes_valeur"].$row["typ_unite"]."</td><td>".$row["mes_date"]."</td></tr>\n";
   }
  }
 }

 // Fermer la connexion
 mysqli_close($connexion);
}
?>
</table> 
</section>
</body>
</html>