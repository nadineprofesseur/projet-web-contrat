<?php
interface ContratSQL
{
	
	public const SQL_LISTE_CONTRATS = "SELECT * FROM contrat";
	public const SQL_DETAIL_CONTRAT = "SELECT * FROM contrat WHERE id = :id"; 

}
?>