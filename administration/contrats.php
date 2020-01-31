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
//print_r($contrats);

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
	
		<div>
			<a href="ajouter-contrat.html">Ajouter un contrat</a>
		</div>

		<div id="liste-contrats">
				
		<?php
		foreach($contrats as $contrat)
		{
		?>
			<div class="contrat">			
				<h4><a href="contrat.php?contrat=<?=$contrat->id?>"><?=formater($contrat->titre)?></a> 
				<a class="action" href="editer-contrat.php?contrat=<?=$contrat->id?>">&Eacute;diter</a> 
				<a class="action" href="effacer-contrat.php?contrat=<?=$contrat->id?>">Effacer</a></h4>
			</div>
		<?php
		}
		?>
				
		</div>
	
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>