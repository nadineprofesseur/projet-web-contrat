<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$usager = 'root';
$motdepasse = '';
$hote = 'localhost';
$base = 'contrat-a-tout';
$dsn = 'mysql:dbname='.$base.';host=' . $hote;
$basededonnees = new PDO($dsn, $usager, $motdepasse);

function formater($texte)
{
	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
	$texte = htmlentities($texte,ENT_COMPAT,'ISO-8859-1');
	return $texte;

}
