<?php
session_start();
if ($_SESSION['connecte']!=1) {
    header('Location: index.php');
    exit();
}
require 'src/fonction.php';
$scores=[
    'omar10'=>['omar','sy',700],
    'ibou'=>['ibou','diatta',1022],
    'moussa'=>['moussa','sow',870],
    'saliou'=>['saliou','mbaye',877],
    'khady'=>['khady','diouf',875],
    'youssou'=>['mboup','niang',816],
    'aba'=>['abba','ndour',716],
    'modou'=>['modou','diene',856],
    'amadou'=>['amadou','diallo',684],
    'aliou'=>['aliou','dione',933],
    'matar'=>['matar','seck',963],
    'fatou'=>['fatou','ningue',821],
    'omar'=>['omar','gueye',658],
    'm'=>['aly','niang',9],
    'h'=>['aly','niang',46],
    'a'=>['aly','niang',45],
    'e'=>['aly','niang',55],
    'z'=>['aly','niang',63],
    'y'=>['aly','niang',45],
    'u'=>['aly','niang',63],
    'i'=>['aly','niang',28],
    'o'=>['aly','niang',52],
    'p'=>['aly','niang',85],
    'q'=>['aly','niang',25],
    's'=>['aly','niang',52],
    'f'=>['aly','niang',02],
    'd'=>['aly','niang',10],
    'h'=>['aly','niang',25],
    'j'=>['aly','niang',452],
    'l'=>['aly','niang',25],
    'k'=>['aly','niang',52],
    'b'=>['aly','niang',52],
    'n'=>['aly','niang',25],

];
$scores=json_encode($scores);
file_put_contents('asset/JSON/Scores.json',$scores);
$scores=file_get_contents('asset/JSON/Scores.json');
$scores=json_decode($scores,true);
$classement=classement_score($scores);
$nbr_page=ceil(count($classement)/15);

$questions=[
    [$question,$type,$reponses]
]
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
                    <div class="content-onglet" id="creer_admin">
                        <div class="form">
                            <div class="head-form">
                                <div class="title-form">S'INCRIRE</div>
                                <div class="text-head">Pour proposer des quizz</div>
                            </div>
                            <hr>
                            <form action="index.php" method="post" class="body-form" id="form-sign-admin" enctype="multipart/form-data">
                                <label for="prenom" class="label-form">Prénom</label>
                                <div id="error-prenom" class="error"></div><br>
                                <input type="text" class="input-form" id="prenom" name="prenom" >
                                <label for="nom" class="label-form">Nom</label>
                                <div id="error-nom" class="error"></div><br>
                                <input type="text" class="input-form" id="nom" name="nom" >
                                <label for="login" class="label-form">Login</label>
                                <div id="error-login" class="error"></div><br>
                                <input type="text" class="input-form" id="login" name="login" >
                                <label for="pwd" class="label-form">Password</label>
                                <div id="error-pwd" class="error"></div><br>
                                <input type="password" class="input-form password" id="pwd" name="pwd" >
                                <label for="confirm" class="label-form">Confirmer Password</label>
                                <div id="error-confirm" class="error"></div><br>
                                <input type="password" class="input-form password" id="confirm" name="confirm" >
                                <label for="avatar" class="label-avatar">Avatar</label>
                                <input type="file" class="input-avatar" name="avatar" id="avatar" accept="image/png, image/jpeg, .jpg" onchange="preview()">
                                <div id="error-avatar" class="error-avatar"></div>
                                <button type="submit" name="submit-compte" class="submit-compte">Créer compte</button>
                            </form>
                        </div>
                        <div class="photo">
                            <div class="avatar"><img id="photo-admin" width="150"></div>
                            <div class="text-avatar">Avatar</div>

                        </div>
                    </div>
                    <div class="content-onglet" id="liste_joueur">
                        <div class="title-liste-joueur">LISTE DES JOUEURS PAR SCORE</div>
                        <div class="liste-joueur">
                            <?php pagination($classement)?>
                        </div>
                        <div id="boutonPage">
                                
                        </div>
                        <input type="checkbox" id="nbr_page" checked value="<?=$nbr_page?>">
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
<?php
if (isset($_POST['submit-compte'])) {
    if (verificateur_validite_login($_POST['login'])) {
        if (isset($_FILES['avatar']['tmp_name'])) {
            copy($_FILES['avatar']['tmp_name'],'asset/IMG/Avatar/'.$_POST['login'].'.'.strrchr($_FILES['avatar']['name'],'.'));
            
        }
        $tab=file_get_contents('asset/JSON/Donnee_connexion.json');
        $tab=json_decode($tab,true);
        $tab[$_POST['login']]=['login'=>$_POST['login'],'password'=>$_POST['pwd'], 'status'=>1,'prenom'=>$_POST['prenom'],'nom'=>$_POST['nom'],'photo'=>'asset/IMG/Avatar/'.$_POST['login'].strrchr($_FILES['avatar']['name'],'.')];
        $tab=json_encode($tab);
        file_put_contents('asset/JSON/Donnee_connexion.json',$tab);
    }
}
?>
