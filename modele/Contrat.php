<?php

class Contrat
{
	protected $titre;
	protected $client;
	protected $description;
	protected $technologie;
	protected $debut;
	
	public function __construct($tableau)
	{
		$this->id = $tableau['id'];
		$this->titre = $tableau['titre'];
		$this->client = $tableau['client'];
		$this->description = $tableau['description'];
		$this->technologie = $tableau['technologie'];
		$this->debut = $tableau['debut'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'id':
				$this->id = $valeur;
			break;
			case 'titre':
				$this->titre = $valeur;
			break;
			case 'client':
				$this->client = $valeur;
			break;
			case 'description':
				$this->description = $valeur;
			break;
			case 'technologie':
				$this->technologie = $valeur;
			break;
			case 'debut':
				$this->debut = $valeur;
			break;
		}
	}

	public function __get($propriete)
	{
		//$variable = '$this->'.$propriete;
		//return $$variable;
		$self = get_object_vars($this); // externaliser pour optimiser
		//print_r($self);
		return $self[$propriete];
	}	
}
//$contrat = new Contrat();
//$contrat->titre = "coucou";
//echo $contrat->titre;
?>