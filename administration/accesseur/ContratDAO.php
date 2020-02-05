<?php 

	class ContratDAO
	{
		public static $basededonnees = null;

		public static function initialiser()
		{
			$usager = 'root';
			$motdepasse = '';
			$hote = 'localhost';
			$base = 'contrat-a-tout';
			$dsn = 'mysql:dbname='.$base.';host=' . $hote;
			ContratDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse);
			ContratDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		public static function listerContrats()
		{
			ContratDAO::initialiser();
			$SQL_LISTE_CONTRATS = "SELECT * FROM contrat";
			$demandeContrats = ContratDAO::$basededonnees->prepare($SQL_LISTE_CONTRATS);
			$demandeContrats->execute();
			$contrats = $demandeContrats->fetchAll(PDO::FETCH_OBJ);
			return $contrats;
		}
		
		public static function detaillerContrat($id)
		{
			
			ContratDAO::initialiser();
			$SQL_DETAIL_CONTRAT = "SELECT * FROM contrat WHERE id = :id"; 
			$demandeContrat = ContratDAO::$basededonnees->prepare($SQL_DETAIL_CONTRAT);
			$demandeContrat->bindParam(':id', $id, PDO::PARAM_INT);
			$demandeContrat->execute();
			$contrat = $demandeContrat->fetchAll(PDO::FETCH_OBJ)[0];
			return $contrat;
		}
		
		public static function ajouterContrat($contrat)
		{
			ContratDAO::initialiser();
			$SQL_AJOUTER_CONTRAT = "INSERT into contrat(titre, client, description, technologie, debut) VALUES(:titre, :client, :description, :technologie, :debut)";
			//echo $SQL_AJOUTER_CONTRAT;
			$demandeAjoutContrat = ContratDAO::$basededonnees->prepare($SQL_AJOUTER_CONTRAT);
			$demandeAjoutContrat->bindParam(':titre',$contrat['titre'], PDO::PARAM_STR);
			$demandeAjoutContrat->bindParam(':client',$contrat['client'], PDO::PARAM_STR);
			$demandeAjoutContrat->bindParam(':description',$contrat['description'], PDO::PARAM_STR);
			$demandeAjoutContrat->bindParam(':technologie',$contrat['technologie'], PDO::PARAM_STR);
			$demandeAjoutContrat->bindParam(':debut',$contrat['debut'], PDO::PARAM_STR);
			$demandeAjoutContrat->execute();			
		}
		
		public static function editerContrat($contrat)
		{
			//print_r($contrat);
			ContratDAO::initialiser();

			$SQL_EDITER_CONTRAT = "UPDATE contrat SET titre = :titre, client = :client, client=:description, technologie=:technologie, debut=:debut WHERE id = :id";
			//echo $SQL_EDITER_CONTRAT;
			$demandeEditionContrat = ContratDAO::$basededonnees->prepare($SQL_EDITER_CONTRAT);
			$demandeEditionContrat->bindParam(':titre',$contrat['titre'], PDO::PARAM_STR);
			$demandeEditionContrat->bindParam(':client',$contrat['client'], PDO::PARAM_STR);
			$demandeEditionContrat->bindParam(':description',$contrat['description'], PDO::PARAM_STR);
			$demandeEditionContrat->bindParam(':technologie',$contrat['technologie'], PDO::PARAM_STR);
			$demandeEditionContrat->bindParam(':debut',$contrat['debut'], PDO::PARAM_STR);
			$demandeEditionContrat->bindParam(':id',$contrat['id'], PDO::PARAM_STR);
			
			$demandeEditionContrat->execute();
			//print_r($demandeEditionContrat->errorInfo());
		}
		
		public static function effacerContrat($id)
		{
			ContratDAO::initialiser();

			$SQL_EFFACER_CONTRAT = "DELETE FROM contrat WHERE id = :id";
			//echo $SQL_EFFACER_CONTRAT;
			$demandeEffacementContrat = ContratDAO::$basededonnees->prepare($SQL_EFFACER_CONTRAT);
			$demandeEffacementContrat->bindParam(':id', $id, PDO::PARAM_INT);
			$demandeEffacementContrat->execute();
		}
		
		
	}

function formater($texte)
{
	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
	$texte = htmlentities($texte,ENT_COMPAT,'ISO-8859-1');
	return $texte;

}
?>