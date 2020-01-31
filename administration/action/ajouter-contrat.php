<?php
	print_r($_POST);
	// todo php filter
	$titre = $_POST['titre'];
	$client = $_POST['client'];
	$description = $_POST['description'];
	$technologie = $_POST['technologie'];
	$debut = $_POST['debut'];
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$usager = 'root';
	$motdepasse = '';
	$hote = 'localhost';
	$base = 'contrat-a-tout';
	$dsn = 'mysql:dbname='.$base.';host=' . $hote;
	$basededonnees = new PDO($dsn, $usager, $motdepasse);

	$SQL_AJOUTER_CONTRAT = "INSERT into contrat(titre, client, description, technologie, debut) VALUES('$titre', '$client', '$description', '$technologie', '$debut')";
	//echo $SQL_AJOUTER_CONTRAT;
	$demandeAjoutContrat = $basededonnees->prepare($SQL_AJOUTER_CONTRAT);
	//$demandeAjoutContrat->bindParam(':titre',$titre, PDO::PARAM_STR);
	//$demandeAjoutContrat->bindParam(':client',$client, PDO::PARAM_STR);
	//$demandeAjoutContrat->bindParam(':description',$description, PDO::PARAM_STR);
	//$demandeAjoutContrat->bindParam(':technologie',$technologie, PDO::PARAM_STR);
	//$demandeAjoutContrat->bindParam(':debut',$debut, PDO::PARAM_STR);
	$demandeAjoutContrat->execute();
?>