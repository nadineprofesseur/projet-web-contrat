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


$SQL_DETAIL_CONTRAT = "SELECT titre, id FROM contrat WHERE id = " . $id; // todo bind param
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
		<header><h2>Voulez-vous vraiment effacer le contrat <?=formater($contrat->titre)?> ?</h2></header>
		
		<form action="action/effacer-contrat.php?contrat=<?=formater($contrat->id)?>" method="post">
			
			<input type="submit" name="oui" value="Oui">
			<input type="submit" name="non" value="Non">
			
		</form>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>