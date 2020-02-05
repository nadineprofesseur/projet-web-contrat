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
		
		public static function detaillerContrat($id)
		{
			include "connexion.php";

			$SQL_DETAIL_CONTRAT = "SELECT * FROM contrat WHERE id = :id"; 
			$demandeContrat = $basededonnees->prepare($SQL_DETAIL_CONTRAT);
			$demandeContrat->bindParam(':id', $id, PDO::PARAM_INT);
			$demandeContrat->execute();
			$contrat = $demandeContrat->fetchAll(PDO::FETCH_OBJ)[0];
			return $contrat;
		}
	
		
	}

function formater($texte)
{
	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
	$texte = htmlentities($texte,ENT_COMPAT,'ISO-8859-1');
	return $texte;

}
?>