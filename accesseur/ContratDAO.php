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
	
		
	}

function formater($texte)
{
	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
	$texte = htmlentities($texte,ENT_COMPAT,'ISO-8859-1');
	return $texte;

}
?>