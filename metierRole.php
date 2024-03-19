<?php

Class metierRole
	{
		
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct(private int $idRole=0,private int $idInstitution=0, private string $libelleRole='')
		{
			
		
		}
	
	//ACCESSEURS-------------------------------------------------------------------------------
	public function __get($attribut)
		{	switch ($attribut)
			{	case 'idRole' :
					return $this->idRole; break;
				case 'idInstitution' : 
					return $this->idInstitution; break;
				case 'libelleRole' : 
					return $this->libelleRole; break;
				default :
                    $trace = debug_backtrace();
                    trigger_error('Propriété non-accessible via _get() :'.$attribut.'dans '.$trace[0]['file'].' à la ligne'.$trace[0]['line'],E_USER_NOTICE);
				    break;
			}
		}
	
// les setteurs-----------------------------------------------------

public function __set($attribut, $laValeurDeLAttribut)
{	switch($attribut)
	{	case 'idRole' :
			$this->idRole=$laValeurDeLAttribut; break;
		case 'idInstitution' : 
			$this->idInstitution=$laValeurDeLAttribut; break;
		case 'libelleRole' : 
			$this->libelleRole=$laValeurDeLAttribut; break;
		default :
			$trace = debug_backtrace();
			trigger_error('Propriété non-accessible via _get() :'.$attribut.'dans '.$trace[0]['file'].' à la ligne'.$trace[0]['line'],E_USER_NOTICE);
			break;
	}
}
		
	// méthode permettant d'afficher tous les attributs d'un seul coup
	public function afficheRole()
	{
		$liste=$this->idRole.' | '.$this->idInstitution.' | '.$this->libelleRole.' | ';
		return $liste;
	}	
	

	}
	
?>