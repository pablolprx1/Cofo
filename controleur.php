<?php
include_once ('conteneurRoles.php');
include_once ('vueCentraleRole.php');
include_once ('accesBD.php');

class controleur
{
    private $tousLesRoles;
    private $maBD;

/* CONSTRUCTEUR DU CONTROLEUR */
    public function __construct()
    {	
        $this->maBD = new accesBD();
        $this->tousLesRoles = new conteneurRoles();
        $this->chargeLesRoles();
    }

/* AFFICHAGE ENTETE */ 

    public function afficheEntete() 
    {
    //appel de la vue de l'entête
        require 'entete.php';
    
    }

    
    public function affichePiedPage()
    {
    //appel de la vue du pied de page
        require 'piedPage.php';
    }

/* AFFICHAGE EN FONCTION DE LA VUE */

    public function affichePage($action,$vue)
    {
        if (isset($_GET['action']) && isset($_GET['vue']))
        {
            $action = $_GET['action'];
            $vue = $_GET['vue'];
            
            switch ($vue)
            {
                case "role" : 
                    $this->actionRole($action);
                    break;
            
          }
        }
    }

/* AIGUILLE L'ACTION */
    
    public function actionRole($action)
    {
        switch ($action)
        {
            case "ajouter":
                $vue=new vueCentraleRole();
                $vue->ajouterRole();
                break;
            case "saisirRole";
                $idRole = $_POST['idRole'];
                $libelleRole = $_POST['libelleRole'];
                $idInstitution = $_POST['idInstitution'];
                $this->tousLesRoles->ajouterUnRole($idRole , $idInstitution, $libelleRole);
                $this->maBD->insererUnRole($idRole, $idInstitution, $libelleRole);
                break;
                
            case "visualiser" :
                $liste=$this->tousLesRoles->listeDesRoles();
                $vue=new vueCentraleRole();
                $vue->visualiserRole($liste);
                break;
            
        }
        
    }

    public function chargeLesRoles()
    {   $resultatRole=$this->maBD->chargement('role');
        $nbE=0;
        while ($nbE<sizeof($resultatRole))
        {
            $this->tousLesRoles->ajouterUnRole($resultatRole[$nbE][0],$resultatRole[$nbE][1],$resultatRole[$nbE][2]);
                
            $nbE++;
        }
        
    }
}
?>