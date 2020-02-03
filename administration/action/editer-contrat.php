<?php
	print_r($_POST);
	
	$filtresContrat = 
	array(
		'id' => FILTER_VALIDATE_INT,
		'titre' => FILTER_SANITIZE_ENCODED,
		'client' => FILTER_SANITIZE_ENCODED,
		'description' => FILTER_SANITIZE_ENCODED,
		'technologie' => FILTER_SANITIZE_ENCODED,
		'debut' => FILTER_SANITIZE_ENCODED
	);
	$contrat = filter_input_array(INPUT_POST, $filtresContrat);
	
	$filtresContrat = 
	array(
		'id' => FILTER_VALIDATE_INT,
		'titre' => FILTER_SANITIZE_ENCODED,
		'client' => FILTER_SANITIZE_ENCODED,
		'description' => FILTER_SANITIZE_ENCODED,
		'technologie' => FILTER_SANITIZE_ENCODED,
		'debut' => FILTER_SANITIZE_ENCODED
	);
	$contrat = filter_input_array(INPUT_POST, $filtresContrat);
	
	$id=filter_var($_GET['contrat'],FILTER_VALIDATE_INT);
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$usager = 'root';
	$motdepasse = '';
	$hote = 'localhost';
	$base = 'contrat-a-tout';
	$dsn = 'mysql:dbname='.$base.';host=' . $hote;
	$basededonnees = new PDO($dsn, $usager, $motdepasse);

	$SQL_EDITER_CONTRAT = "UPDATE contrat SET titre = :titre, client = :client, client=:description, technologie=:technologie, debut=:debut WHERE id = :id";
	echo $SQL_EDITER_CONTRAT;
	$demandeEditionContrat = $basededonnees->prepare($SQL_EDITER_CONTRAT);
	$demandeEditionContrat->bindParam(':titre',$contrat['titre'], PDO::PARAM_STR);
	$demandeEditionContrat->bindParam(':client',$contrat['client'], PDO::PARAM_STR);
	$demandeEditionContrat->bindParam(':description',$contrat['description'], PDO::PARAM_STR);
	$demandeEditionContrat->bindParam(':technologie',$contrat['technologie'], PDO::PARAM_STR);
	$demandeEditionContrat->bindParam(':debut',$contrat['debut'], PDO::PARAM_STR);
	$demandeEditionContrat->bindParam(':id',$id, PDO::PARAM_STR);
	$demandeEditionContrat->execute();
?>