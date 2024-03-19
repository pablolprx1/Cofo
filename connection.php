<!-- PHP -->
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=cofonie;charset=utf8;','root', '');
if(isset($_POST['valider'])){
    if(!empty($_POST['login']) AND !empty($_POST['password'])){
        $login = ($_POST['login']);
        $password = ($_POST['password']);
        
        $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE login = ? AND password = ?');
        $recupUser->execute(array($login, $password));

        if($recupUser->rowCount() > 0){
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('Location: index2.php');
        }
        else{
            echo" Mot de passe ou pseudo incorrect";
        }
    }
    else{
        echo "Veuillez compléter tous les champs.";
    }

}
?>
