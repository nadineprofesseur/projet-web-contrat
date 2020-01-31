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
$demandeContrats = $basededonnees->prepare($SQL_LISTE_CONTRATS);
$demandeContrats->execute();
$contrats = $demandeContrats->fetchAll(PDO::FETCH_OBJ);
//print_r($listeContrats);

function formater($texte)
{
	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
	$texte = htmlentities($texte,ENT_COMPAT,'ISO-8859-1');
	return $texte;

}

?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Liste des contrats</title>
	<meta charset="UTF-8">
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
				<h4><?=formater($contrat->titre)?></h4>
				<div class="contrat-client"><img src="illustration/profil-defaut.png"/></div>
				<p class="contrat-description"><?=formater($contrat->description)?></p>
				<span class="contrat-technologie"><?=formater($contrat->technologie)?></span>
				<!--span class="contrat-debut"><?=formater($contrat->debut)?></span-->
			</div>
		<?php
		}
		?>
				
		</div>
	
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>