<?php
	print_r($_POST);
		
	$id=filter_var($_GET['contrat'],FILTER_VALIDATE_INT);

	if(!empty($_POST['oui']))
	{
		include "../accesseur/ContratDAO.php";
		ContratDAO::effacerContrat($id);
	}
?>