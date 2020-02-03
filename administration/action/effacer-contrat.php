<?php
	print_r($_POST);
	// todo php filter
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$usager = 'root';
	$motdepasse = '';
	$hote = 'localhost';
	$base = 'contrat-a-tout';
	$dsn = 'mysql:dbname='.$base.';host=' . $hote;
	$basededonnees = new PDO($dsn, $usager, $motdepasse);
	
	$id=filter_var($_GET['contrat'],FILTER_VALIDATE_INT);

	if(!empty($_POST['oui']))
	{
		$SQL_EFFACER_CONTRAT = "DELETE contrat WHERE id = :id";
		echo $SQL_EFFACER_CONTRAT;
		$demandeEffacementContrat = $basededonnees->prepare($SQL_EFFACER_CONTRAT);
		$demandeEffacementContrat->bindParam(':id', $id, PDO::PARAM_INT);
		$demandeEffacementContrat->execute();
	}
?>