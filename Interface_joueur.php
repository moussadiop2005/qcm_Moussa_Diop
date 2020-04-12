<?php
session_start();
if ($_SESSION['connecte']!=2) {
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page de Jeu</title>
    <link rel="stylesheet" href="asset/CSS/Interface_joueur.css">
</head>
<body>
<div id="body">
        <header>
            <img src="asset/IMG/logo-QuizzSA.png" width="58" class="logo_header" >
            <div id='header'>Le plaisir de jouer</div>
        </header>
        <div class="div">
            <div class="div1">
                <div class="div11">
                    <img src="<?=$_SESSION['joueur_actuel']['photo']?>" width="70">
                    <div class="div111"><?=ucfirst($_SESSION['joueur_actuel']['prenom']).' '.strtoupper($_SESSION['joueur_actuel']['nom']) ?></div>
                </div>
                <div class="div11">
                    <div class="div112">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</div>
                    <div class="div112">JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</div>
                </div>
                <form method="post"><button type="submit" name="logout">Déconnexion</button></form>
            </div>
            <?php
            if (isset($_POST['logout'])) {
                $_SESSION['connecte']==0;
                header('Location: index.php');
            }
            ?>
            <div class="div2">
                ljh
                
            
            </div>
        </div>
    </div>
</body>
</html>