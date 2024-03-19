<?php
include_once ('metierRole.php');

Class conteneurRoles
	{
	//attribut de type arrayObjet, mais on est en php donc on ne met pas les types
	private $lesRoles;
	
	//le constructeur créer un tableau vide
	public function __construct()
		{
		$this->lesRoles = new arrayObject();
		}
	
	//les méthodes habituellement indispensables
	public function ajouterUnRole(int $unIdRole,int $unIdInstitution, string $unLibelleRole)
		{	
			$unRole = new metierRole($unIdRole, $unIdInstitution, $unLibelleRole);
			
			$this->lesRoles->append($unRole);
			
						
		}
	public function nbRole()
		{
		return $this->lesRoles->count();
		}	
		
	public function listeDesRoles()
		{
			
		$liste = '';
		foreach ($this->lesRoles as $unRole)
			{	$liste = $liste.$unRole->afficheRole();
			}
		return $liste;
		}
		
	public function lesRolesAuFormatHTML()
		{
		$liste = "<SELECT name = 'idRole'>";
		foreach ($this->lesRoles as $unRole)
			{
			$liste = $liste."<OPTION value='".$unRole->idRole."'></OPTION>";
			}
		$liste = $liste."</SELECT>";
		return $liste;
		}		

	public function donneObjetRoleDepuisNumero($unIdRole)
		{
		$trouve=false;
		$leBonRole=null;
       
		foreach ($this->lesRoles as $unRole) {
            if ($unRole->getIdRole() === $unIdRole) {
                $trouve = true;
                $leBonRole = $unRole;
                break;
			}
		return $leBonRole;
		}	
	}
	}
?>