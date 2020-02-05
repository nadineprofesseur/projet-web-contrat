<?php

if(!empty($_POST['action-ajouter']))
{
	echo "action-ajouter";
	include "action/ajouter-contrat.php";
}
if(!empty($_POST['action-editer']))
{
	echo "action-editer";
	include "action/editer-contrat.php";	
}
if(!empty($_POST['effacer-contrat']))
{
	echo "action-effacer";
	include "action/action-effacer.php";			
}

	

?>