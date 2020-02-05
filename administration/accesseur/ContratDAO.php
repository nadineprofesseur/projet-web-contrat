<?php 

	class ContratDAO
	{
		public static function listerContrats()
		{
			
			include "connexion.php";

			$SQL_LISTE_CONTRATS = "SELECT * FROM contrat";
			$demandeContrats = $basededonnees->prepare($SQL_LISTE_CONTRATS);
			$demandeContrats->execute();
			$contrats = $demandeContrats->fetchAll(PDO::FETCH_OBJ);
			return $contrats;
		}
		
		
		
		
	}


?>