<?php 
session_start();
$_SESSION['connecte']=0;
require 'src/fonction.php';
$users=[
    'moussa23'=> ['password'=>'0000','status'=>0,'prenom'=>'moussa','nom'=>'diop','photo'=>'asset/IMG/admin.jpg'],
    'omar10'=> ['password'=>'aaaa', 'status'=>1,'prenom'=>'omar','nom'=>'sy','photo'=>'asset/IMG/joueur.jpg']
];
$users=json_encode($users);
file_put_contents('asset/JSON/Donnee_connexion.json',$users);

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Administrateur</title>
        <link rel="stylesheet" href="asset/CSS/index.css">
    </head>
    <body>
        <div id="body">
            <header>
                <img src="asset/IMG/logo-QuizzSA.png" width="58" class="logo_header" >
                <div id='header'>Le plaisir de jouer</div>
            </header>
            <div class="div">
                <div class="div1">
                    <div class="d0">Login Form</div>
                    <img src="asset/IMG/Icônes/ic-fermer.png" class="fermer">
                </div>
                <form action="#" method="post" class="form">
                    <div class="d1">
                        <input type="text" name="user" placeholder="Login" required>
                        <img src="asset/IMG/Icônes/ic-login.png">
                    </div><br>
                    <div class="d2">
                        <input type="password" name="password" placeholder="Password" required>
                        <img src="asset/IMG/Icônes/ic-password.png">
                    </div><br>
                    <button type="submit" name="submit">Connexion</button>
                    <a href="Mini_projet_sign_user.php" class="sign">S'inscrire pour jouer?</a>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $test=verificateur_login($_POST['user'],$_POST['password']);
                    switch ($test) {
                        case 0:
                            $_SESSION['connecte']=1;
                            $_SESSION['admin_actuel']=json_decode(file_get_contents('asset/JSON/Donnee_connexion.json'),true)[$_POST['user']];
                            break;
                        case 1:
                            $_SESSION['connecte']=2;
                            $_SESSION['joueur_actuel']=json_decode(file_get_contents('asset/JSON/Donnee_connexion.json'),true)[$_POST['user']];
                            break;
                        default:
                            echo 'Indentifiant invalide';
                            break;
                    }
                }
                ?>
            </div>
            <div>
                <?php
                switch ($_SESSION['connecte']) {
                    case 1:
                        header('Location: Interface_admin.php');
                        break;
                    case 2:
                        header('Location: Interface_joueur.php');
                        break;
                }
                ?>
            </div>
        </div>
    </body>


</html>