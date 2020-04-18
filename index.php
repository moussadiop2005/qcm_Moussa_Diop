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
            <div class="header">
                <div class="logo_header" ><img src="asset/IMG/logo-QuizzSA.png" width="58"></div>
                <div class="text_header">Le plaisir de jouer</div>
            </div>
            <?php
            require_once 'Connexion.php'
            ?>
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
