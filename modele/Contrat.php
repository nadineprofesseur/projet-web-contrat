<?php

class Contrat
{
	protected $titre;
	protected $client;
	protected $description;
	protected $technologie;
	protected $debut;
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
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
		return $self['titre'];
	}	
}
//$contrat = new Contrat();
//$contrat->titre = "coucou";
//echo $contrat->titre;
?>