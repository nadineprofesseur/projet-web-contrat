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
		
		public static function ajouterContrat($contrat)
		{
				include "../connexion.php";

				$SQL_AJOUTER_CONTRAT = "INSERT into contrat(titre, client, description, technologie, debut) VALUES(:titre, :client, :description, :technologie, :debut)";
				//echo $SQL_AJOUTER_CONTRAT;
				$demandeAjoutContrat = $basededonnees->prepare($SQL_AJOUTER_CONTRAT);
				$demandeAjoutContrat->bindParam(':titre',$contrat['titre'], PDO::PARAM_STR);
				$demandeAjoutContrat->bindParam(':client',$contrat['client'], PDO::PARAM_STR);
				$demandeAjoutContrat->bindParam(':description',$contrat['description'], PDO::PARAM_STR);
				$demandeAjoutContrat->bindParam(':technologie',$contrat['technologie'], PDO::PARAM_STR);
				$demandeAjoutContrat->bindParam(':debut',$contrat['debut'], PDO::PARAM_STR);
				$demandeAjoutContrat->execute();			
		}
		
		public static function editerContrat($contrat)
		{
			print_r($contrat);
			include "../connexion.php";

			$SQL_EDITER_CONTRAT = "UPDATE contrat SET titre = :titre, client = :client, client=:description, technologie=:technologie, debut=:debut WHERE id = :id";
			echo $SQL_EDITER_CONTRAT;
			$demandeEditionContrat = $basededonnees->prepare($SQL_EDITER_CONTRAT);
			$demandeEditionContrat->bindParam(':titre',$contrat['titre'], PDO::PARAM_STR);
			$demandeEditionContrat->bindParam(':client',$contrat['client'], PDO::PARAM_STR);
			$demandeEditionContrat->bindParam(':description',$contrat['description'], PDO::PARAM_STR);
			$demandeEditionContrat->bindParam(':technologie',$contrat['technologie'], PDO::PARAM_STR);
			$demandeEditionContrat->bindParam(':debut',$contrat['debut'], PDO::PARAM_STR);
			$demandeEditionContrat->bindParam(':id',$contrat['id'], PDO::PARAM_STR);
			
			$demandeEditionContrat->execute();
			//print_r($demandeEditionContrat->errorInfo());
		}
		
		
	}


?>