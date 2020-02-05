<?php
class BaseDeDonnees
{
	public static $connection;

	function __construct()
	{
	}
	
	public static function initialiser($configuration)
	{
		$dsn = "mysql:dbname=".$configuration->basededonnees.";host=". $configuration->hote;
		BaseDeDonnees::$connection = new PDO($dsn,$configuration->usager,$configuration->motdepasse);
	}
		
}

	$configuration = new stdClass();
	$configuration->basededonnees = "delicesduweb";
	$configuration->hote = "localhost";
	$configuration->usager = "root";
	$configuration->motdepasse = "";
	BaseDeDonnees::initialiser($configuration);

?>
