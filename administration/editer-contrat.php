<?php
//print_r($_GET);
$id = $_GET['contrat']; // TODO php filter

error_reporting(E_ALL);
ini_set('display_errors', 1);

$usager = 'root';
$motdepasse = '';
$hote = 'localhost';
$base = 'contrat-a-tout';
$dsn = 'mysql:dbname='.$base.';host=' . $hote;
$basededonnees = new PDO($dsn, $usager, $motdepasse);


$SQL_DETAIL_CONTRAT = "SELECT * FROM contrat WHERE id = " . $id; // todo bind param
$demandeContrat = $basededonnees->prepare($SQL_DETAIL_CONTRAT);
$demandeContrat->execute();
$contrat = $demandeContrat->fetchAll(PDO::FETCH_OBJ)[0];
//print_r($contrat);

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
	<title>Panneau d'administration de Contrat à tout</title>
	<link rel="stylesheet" type="text/css" href="formulaire.css">	

</head>
<body>
	<header>
		<h1>Panneau d'administration de Contrat-à-tout</h1>
		<nav></nav>
	</header>
	
	<section id="contenu">
		<header><h2>&Eacute;diter le contrat <?=formater($contrat->titre)?></h2></header>
		
		<form action="action/editer-contrat.php?contrat=<?=formater($contrat->id)?>" method="post">
		
			<div class="champs">
				<label for="titre">Titre</label>
				<input type="text" name="titre" id="titre" value="<?=formater($contrat->titre)?>"/>			
			</div>
		
			<div class="champs">
				<label for="client">Client</label>
				<input type="text" name="client" id="client" value="<?=formater($contrat->client)?>"/>			
			</div>
		
			<div class="champs">
				<label for="titre">Description</label>
				<textarea name="description" id="description"><?=formater($contrat->description)?></textarea>
			</div>
		
			<div class="champs">
				<label for="technologie">Technologie</label>
				<textarea name="technologie" id="technologie"><?=formater($contrat->technologie)?></textarea>
			</div>
			
			<div class="champs">
				<label for="debut">D&eacute;but</label>
				<input type="text" name="debut" id="debut" value="<?=formater($contrat->debut)?>"/>			
			</div>
			
			<input type="submit" value="Enregistrer">
		</form>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>