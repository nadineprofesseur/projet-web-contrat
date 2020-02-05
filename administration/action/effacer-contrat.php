<?php
	//print_r($_POST);
		
	$id=filter_var($_POST['contrat'],FILTER_VALIDATE_INT);

	if($_POST['action-effacer'] == "Oui")
	{
		//include_once "../accesseur/ContratDAO.php";
		ContratDAO::effacerContrat($id);
	}
