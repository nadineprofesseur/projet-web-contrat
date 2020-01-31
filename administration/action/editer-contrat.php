<?php
	print_r($_POST);
	// todo php filter
	$titre = $_POST['titre'];
	$client = $_POST['client'];
	$description = $_POST['description'];
	$technologie = $_POST['technologie'];
	$debut = $_POST['debut'];
	$id=$_GET['contrat'];
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$usager = 'root';
	$motdepasse = '';
	$hote = 'localhost';
	$base = 'contrat-a-tout';
	$dsn = 'mysql:dbname='.$base.';host=' . $hote;
	$basededonnees = new PDO($dsn, $usager, $motdepasse);

	$titre = addslashes($titre); $client = addslashes($client); $description = addslashes($description); $technologie = addslashes($technologie); $debut = addslashes($debut); // retirer avec bindparam
	$SQL_EDITER_CONTRAT = "UPDATE contrat SET titre = '$titre', client = '$client', client='$description', technologie='$technologie', debut='$debut' WHERE id = '$id'";
	echo $SQL_EDITER_CONTRAT;
	$demandeEditionContrat = $basededonnees->prepare($SQL_EDITER_CONTRAT);
	//$demandeEditionContrat->bindParam(':titre',$titre, PDO::PARAM_STR);
	//$demandeEditionContrat->bindParam(':client',$client, PDO::PARAM_STR);
	//$demandeEditionContrat->bindParam(':description',$description, PDO::PARAM_STR);
	//$demandeEditionContrat->bindParam(':technologie',$technologie, PDO::PARAM_STR);
	//$demandeEditionContrat->bindParam(':debut',$debut, PDO::PARAM_STR);
	$demandeEditionContrat->execute();
?>