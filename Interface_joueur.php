<?php
session_start();
if ($_SESSION['connecte']!=2) {
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
    'aly'=>['aly','niang',963]

];
$scores=json_encode($scores);
file_put_contents('asset/JSON/Scores.json',$scores);
$scores=file_get_contents('asset/JSON/Scores.json');
$scores=json_decode($scores,true);
$top=meilleur_score($scores);

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
        <div class="header">
            <div class="logo_header" ><img src="asset/IMG/logo-QuizzSA.png" width="58"></div>
            <div class="text_header">Le plaisir de jouer</div>
        </div>
        <div class="div">
            <div class="div1">
                <div class="div11">
                    <img src="<?=$_SESSION['joueur_actuel']['photo']?>" width="70">
                    <div class="div111"><?=ucfirst($_SESSION['joueur_actuel']['prenom']).' '.strtoupper($_SESSION['joueur_actuel']['nom']) ?></div>
                </div>
                <div class="div12">
                    <div class="div112">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</div>
                    <div class="div112">JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</div>
                </div>
                <form method="post"><button type="submit" name="logout" class="logout">Déconnexion</button></form>
            </div>
            <?php
            if (isset($_POST['logout'])) {
                $_SESSION['connecte']==0;
                header('Location: index.php');
            }
            ?>
            <div class="div2">
                <div class="contenu">
                    <div class="questions">

                    </div>
                    <div class="scores">
                        <nav class="menu">
                            <div class="submenu active"><a href="#classement">Top scores</a></div>
                            <div class="submenu"><a href="#score-joueur">Mon meilleur score</a></div>
                        </nav>
                        <div class="affichage">
                            <div class="content-onglet active" id="classement">
                                <?php
                                echo '<table>';
                                for ($i=0; $i < 5; $i++) { 
                                    echo '<tr>';
                                    echo '<td class="nom">'.ucfirst($top[$i][0]).' '.strtoupper($top[$i][1]).'</td><td class="colone-score score-'.$i.'">'.$top[$i][2].' pts</td>';
                                    echo '</tr>';
                                }
                                echo '</table>';
                                ?>
                            </div>
                            <div class="content-onglet" id="score-joueur"><?='Score joueur actuel : '.$scores[$_SESSION['joueur_actuel']['login']][2].' pts'?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="asset/JS/Interface_joueur.js"></script>
</body>
</html>
        
    
