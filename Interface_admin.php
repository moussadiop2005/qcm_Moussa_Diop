<?php
session_start();
if ($_SESSION['connecte']!=1) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/CSS/Interface_admin.css">
    <title>Page Admin</title>
</head>
<body>
    <div id="body">
        <header>
            <img src="asset/IMG/logo-QuizzSA.png" width="58" class="logo_header" >
            <div id='header'>Le plaisir de jouer</div>
        </header>
        <div class="div">
            <div class="div1">
                <div>CRÉER ET PARAMÉRTER VOS QUIZZ </div>
                <form method="post"><button type="submit" name="logout">Déconnexion</button></form>
            </div>
            <?php
            if (isset($_POST['logout'])) {
                $_SESSION['connecte']==0;
                header('Location: index.php');
            }
            ?>
            <div class="div2">
                <div class="profil">
                    <div class="img">
                        <img src="<?=$_SESSION['admin_actuel']['photo']?>" width="110">
                        <div class="identifiant">
                            <div><?=strtoupper($_SESSION['admin_actuel']['prenom'])?></div>
                            <div><?=strtoupper($_SESSION['admin_actuel']['nom'])?></div>
                        </div>
                    </div>
                    <nav class="menu">
                    <form method="post"></form>
                        <div >
                            <label for="liste_question" class="titre_menu"><span>Liste Questions</span>
                            <input type="radio" name="menu" id="liste_question" value="1">
                            <img src="asset/IMG/Icônes/ic-liste.png" class="inactive">
                            <img src="asset/IMG/Icônes/ic-liste-active.png" class="active">
                            </label>
                        </div><br>
                        <div>
                            <label for="Creer_Admin" class="titre_menu"><span>Créer Admin</span>
                            <input type="radio" name="menu" id="Creer_Admin" value="2">
                            <img src="asset/IMG/Icônes/ic-ajout.png" class="inactive">
                            <img src="asset/IMG/Icônes/ic-ajout-active.png" class="active">
                            </label>
                        </div><br>
                        <div>
                            <label for="liste_joueur" class="titre_menu"><span>Liste joueurs</span>
                            <input type="radio" name="menu" id="liste_joueur" value="3">
                            <img src="asset/IMG/Icônes/ic-liste.png" class="inactive">
                            <img src="asset/IMG/Icônes/ic-liste-active.png" class="active">
                            </label>
                        </div><br>
                        <div>
                            <label for="creer_question" class="titre_menu"><span>Créer Questions</span>
                            <input type="radio" name="menu" id="creer_question" value="2">
                            <img src="asset/IMG/Icônes/ic-ajout.png" class="inactive">
                            <img src="asset/IMG/Icônes/ic-ajout-active.png" class="active">
                            </label>
                        </div>
                    </nav>
                </div>
                <div class="content">
                qsdf
                </div>
            
            </div>
        </div>
    </div>
    
    
</body>
</html>