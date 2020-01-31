<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$usager = 'root';
$motdepasse = '';
$hote = 'localhost';
$base = 'contrat-a-tout';
$dsn = 'mysql:dbname='.$base.';host=' . $hote;
$basededonnees = new PDO($dsn, $usager, $motdepasse);


$SQL_LISTE_CONTRATS = "SELECT * FROM contrat";
$demandeListeContrats = $basededonnees->prepare($SQL_LISTE_CONTRATS);
$demandeListeContrats->execute();
$contrats = $demandeListeContrats->fetchAll();
//print_r($listeContrats);
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Liste des contrats</title>
	<link rel="stylesheet" type="text/css" href="contrats.css">	<style>
	</style>
</head>
<body>
	<div id="header">
		<h1><span>Contrat A Tout</span></h1>
		<nav>
			<div id="menu">
				<a class="lien-page" href="#">Accueil</a> |
				<a class="lien-page" href="#">Contrats</a> |
				<a class="lien-page" href="#">Contacts</a>
			</div>
		</nav>
	</div>
	
	<section id="contenu">
		<header><h2>Contrats offerts</h2></header>
	
		<div id="liste-contrats">
		
		<?php
		foreach($contrats as $contrat)
		{
		?>
			<div class="contrat">			
				<h4>Embellissement d'un site XOOPS</h4>
				<div class="contrat-client"><img src="illustration/profil-defaut.png"/></div>
				<p class="contrat-description">Le site de rencontre mentor-mentoré doit être redécoré pour améliorer 
				le taux d'inscription au projet pédagogique.</p>
				<span class="contrat-technologie">PHP, CSS, XOOPS, AJAX</span>
				<span class="contrat-debut"></span>
			</div>
		<?php
		}
		?>
				
		</div>
	
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>