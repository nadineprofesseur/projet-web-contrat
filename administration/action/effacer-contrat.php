<?php
	print_r($_POST);
	
`	include "../connexion.php";
	
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