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
        <div class="header">
            <div class="logo_header" ><img src="asset/IMG/logo-QuizzSA.png" width="58"></div>
            <div class="text_header">Le plaisir de jouer</div>
        </div>
        <div class="div">
            <div class="div1">
                <div class="div11">CRÉER ET PARAMÉRTER VOS QUIZZ </div>
                <form method="post" class="logout"><button type="submit" name="logout">Déconnexion</button></form>
            </div>
            <?php
            if (isset($_POST['logout'])) {
                $_SESSION['connecte']==0;
                header('Location: index.php');
            }
            ?>
            <div class="div2">
                <div class="nav">
                    <div class="profil">
                        <img src="<?=$_SESSION['admin_actuel']['photo']?>" width="110">
                        <div class="identifiant">
                            <div><?=strtoupper($_SESSION['admin_actuel']['prenom'])?></div>
                            <div><?=strtoupper($_SESSION['admin_actuel']['nom'])?></div>
                        </div>
                    </div>
                    <nav class="menu">
                        <ul>
                            <li class="submenu active">
                                <a href="#liste_question" class="titre_menu">Liste Questions<div class="ic-liste"></div></a>
                            </li>
                            <li>
                                <a href="#creer_admin" class="titre_menu">Créer Admin<div class="ic-ajout"></div></a>
                            </li>
                            <li>
                                <a href="#liste_joueur" class="titre_menu">Liste joueurs<div class="ic-liste"></div></a>
                            </li>
                            <li>
                                <a href="#creer_question" class="titre_menu">Créer Questions<div class="ic-ajout"></div></a>
                            </li>
                        <ul>
                    </nav>
                </div>
                <div class="content">
                    <div class="content-onglet active" id="liste_question">
                        <div class="form">
                            <div class="head-form">
                                <div class="title-form">S'INCRIRE</div>
                                <div class="text-head">Pour proposer des quizz</div>
                            </div>
                            <hr>
                            <div class="body-form">
                                <label for="prenom" class="label-form">Prénom</label><br>
                                <input type="text" class="input-form" id="prenom" name="prenom"><br>
                                <label for="nom" class="label-form">Nom</label><br>
                                <input type="text" class="input-form" id="nom" name="nom"><br>
                                <label for="login" class="label-form">Login</label><br>
                                <input type="text" class="input-form" id="login" name="login"><br>
                                <label for="pwd" class="label-form">Password</label><br>
                                <input type="password" class="input-form password" id="pwd" name="pwd"><br>
                                <label for="confirm" class="label-form">Confirmer Password</label><br>
                                <input type="password" class="input-form password" id="confirm" name="confirm"><br>
                                <label for="avatar" class="label-avatar">Avatar</label>
                                <input type="file" class="input-avatar" value="Choisir un fichier"><br>
                                <button type="submit" name="submit-compte" class="submit-compte">Créer compte</button>
                            </div>
                        </div>
                        <div class="photo">
                            <div class="avatar"></div>
                            <div class="text-avatar">Avatar</div>

                        </div>
                    </div>
                    <div class="content-onglet" id="creer_admin">
                        <div class="nbr">
                            <label for="nbr" class="nbr-label">Nombre de questions/Jeu</label>
                            <input type="text" id="nbr" name="nbr_question" class="nbr-input">
                            <button type="submit" name="submit_nbr" class="nbr-ok">OK</button>
                        </div><br>
                        <div>
                            <div class="questions">

                            </div><br>
                            <button type="submit" name="precedent" class="precedent">Précedent</button>
                            <button type="submit" name="suivant" class="suivant">Suivant</button>
                        </div>
                    </div>
                    <div class="content-onglet" id="liste_joueur">

                    </div>
                    <div class="content-onglet" id="creer_question">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="asset/JS/Interface_admin.js"></script>
</body>
</html>
