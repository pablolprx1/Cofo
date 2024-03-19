<?php
include('controleur.php');
if (!isset($monControleur))
{
    $monControleur = new controleur();
    $monControleur->afficheEntete();
}

if ((isset($_GET['vue']))&& (isset($_GET['action'])))
{
    require "menu.php";
    $monControleur->affichePage($_GET['action'],$_GET['vue']);
}
else
{
    require "menu.php";
                
}

//if (!isset($monControleur))
//{
    $monControleur->affichePiedPage();
//}
?>
