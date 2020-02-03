<?php
//print_r($_GET);
$id=filter_var($_GET['contrat'],FILTER_VALIDATE_INT);

include "connexion.php";

$SQL_DETAIL_CONTRAT = "SELECT titre, id FROM contrat WHERE id = :id"; // todo bind param
$demandeContrat = $basededonnees->prepare($SQL_DETAIL_CONTRAT);
$demandeContrat->bindParam(':id', $id, PDO::PARAM_INT);
$demandeContrat->execute();
$contrat = $demandeContrat->fetchAll(PDO::FETCH_OBJ)[0];
//print_r($contrat);


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