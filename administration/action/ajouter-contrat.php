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
		
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$usager = 'root';
	$motdepasse = '';
	$hote = 'localhost';
	$base = 'contrat-a-tout';
	$dsn = 'mysql:dbname='.$base.';host=' . $hote;
	$basededonnees = new PDO($dsn, $usager, $motdepasse);

	$SQL_AJOUTER_CONTRAT = "INSERT into contrat(titre, client, description, technologie, debut) VALUES(:titre, :client, :description, :technologie, :debut)";
	//echo $SQL_AJOUTER_CONTRAT;
	$demandeAjoutContrat = $basededonnees->prepare($SQL_AJOUTER_CONTRAT);
	$demandeAjoutContrat->bindParam(':titre',$contrat['titre'], PDO::PARAM_STR);
	$demandeAjoutContrat->bindParam(':client',$contrat['client'], PDO::PARAM_STR);
	$demandeAjoutContrat->bindParam(':description',$contrat['description'], PDO::PARAM_STR);
	$demandeAjoutContrat->bindParam(':technologie',$contrat['technologie'], PDO::PARAM_STR);
	$demandeAjoutContrat->bindParam(':debut',$contrat['debut'], PDO::PARAM_STR);
	$demandeAjoutContrat->execute();
?>