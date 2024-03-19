<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class accesBD
{
	private $hote;
	private $login;
	private $passwd;
	private $base;
	private $conn;
	
	// Nous construisons notre connexion
	public function __construct()
		{
		$this->hote="localhost";
		$this->login="root";
		$this->passwd="";
		$this->base="cofonie";
		$this->connexion();
		
		}
	private function connexion()
	{
		try
        {
            $this->conn = new PDO("mysql:host=".$this->hote.";dbname=".$this->base.";charset=utf8", $this->login, $this->passwd);
        }
        catch(PDOException $e)
        {
            die("Connection à la base de données échouée".$e->getMessage());
        }
	}
	
	public function insererUnRole($unCodeRole,$unCodeInstitution, $unLibelleRole)
	{
		$uneTable = 'role';
		$sonCodeRole = $this->donneProchainIdentifiant("ROLE","idRole");
		if ($this->estIdentifiantUtilise($uneTable, $sonCodeRole)) 
		{
			echo "L'identifiant est déjà utilisé.";
			return null;
		}
		$requete = $this->conn->prepare("INSERT INTO ROLE(idRole, idInstitution, libelleRole) VALUES (?,?,?)");
		$requete->bindValue(1,$unCodeRole);
		$requete->bindValue(2,$unCodeInstitution);
		$requete->bindValue(3,$unLibelleRole);
		if(!$requete->execute())
		{
			die("Erreur dans insert Role : ".$requete->errorCode());
		}
		echo "Rôle n°".$unCodeRole." ajouté !";
		return $sonCodeRole;
	}
	
	/***********************************************************************************************
	C'est la fonction qui permet de charger les tables et de les mettre dans un tableau 2 dimensions. La petite fontions specialCase permet juste de psser des minuscules aux majuscules pour les noms des tables de la base de données
	************************************************************************************************/
	public function chargement($uneTable)
	{
		$lesInfos = null;
		$nbTuples = 0;
		$stringQuery = "SELECT * FROM ";
		$stringQuery = $this->specialCase($stringQuery, $uneTable);
		$query = $this->conn->prepare($stringQuery);
		if ($query->execute()) {
			while ($row = $query->fetch(PDO::FETCH_NUM)) {
				$lesInfos[$nbTuples] = $row;
				$nbTuples++;
			}
		} else {
			die('Problème dans chargement : ' . $query->errorCode);
		}
		return $lesInfos;
	}

	private function specialCase($stringQuery,$uneTable)
	{
			$uneTable = strtoupper($uneTable);
			switch ($uneTable) 
			{
				case 'ROLE':
					$stringQuery.='role';
					break;
				case 'INSTITUTION':
					$stringQuery.='institution';
					break;
				case 'UTILISATEUR':
					$stringQuery.='utilisateur';
					break;
				default:
					die('Pas une table valide');
					break;
			}

			return $stringQuery.";";
	}
	
	/**************************************************************************
	fonction qui permet d'avoir le prochain identifiant de la table. Elle est là uniquement parce que nous n'avons pas d'autoincremente dans notre base de données
	***************************************************************************/
	public function donneProchainIdentifiant($uneTable)
	{
		$stringQuery = $this->specialCase("SELECT * FROM ",$uneTable);
		$requete = $this->conn->prepare($stringQuery);
		//$requete->bindValue(1,$unIdentifiant);

		if($requete->execute())
		{
			$nb=0;
			while($row = $requete->fetch(PDO::FETCH_NUM))
			{
				$nb = $row[0];
			}
			return $nb+1;
		}
		else
		{
			die('Erreur sur donneProchainIdentifiant : '+$requete->errorCode());
		}
	}
	
	/**************************************************************************
	Fonction qui annonce si la création d'une table utilise un ID déjà utilsié ou non 
	***************************************************************************/
	private function estIdentifiantUtilise($uneTable ,$unCodeRole)
{
    $query = $this->conn->prepare("SELECT * FROM " . $uneTable . " WHERE idRole = ?");
    $query->bindValue(1, $unCodeRole);
    $query->execute();

    return $query->rowCount() > 0;
}
		
}
