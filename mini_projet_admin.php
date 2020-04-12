<?php
session_start();

?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administrateur</title>
    <link rel="stylesheet" href="asset/CSS/mini_projet_admin.css">
</head>
<body>
    <p>Bienvenue <?=ucwords($_SESSION['user'])?> sur la plateforme d'editions des questionnaires </p>
    <form action="" method="post">
        <fieldset>
            <label for="question" class="question">QUESTIONS</label>
            <textarea name="question" id="question" cols="30" rows="10"></textarea><br/><br/>
            <label for="score">SCORE</label>
            <input type="score" name="score" id="score" class="score"><br/><br/>
            <label for="type">TYPE</label>
            <select name="type" id="typer">
                <option value="multiple">Choix multiple</option>
                <option value="simple">Choix simple</option>
                <option value="texte">Choix texte</option>
            </select><br/><br/>
            <label for="nbr_reponse">NBR<br/>REPONSE</label>
            <input type="nbr_reponse" name="nbr_reponse" id="nbr_reponse" class="nbr_reponse"><br/><br/>
            
            <?php
            if (isset($_POST['submit'])) {
                if ($_POST['type']=='texte') {
                    echo '<label for="rep">REP</label>';
                    echo '<textarea name="rep" id="rep" cols="30" rows="10"></textarea><br/><br/>';
                }elseif ($_POST['type']=='multiple') {
                    for ($i=0; $i < $_POST['nbr_reponse']; $i++) { 
                        echo '<label for="rep'.$i.'">REP'.$i.'</label>';
                        echo '<input type="rep'.$i.'" name=rep'.$i.'id=rep'.$i.'>';
                        echo '<input type="checkbox" name="rep" id="rep'.$i.'"><br/><br/>';
                    }
                    
                }else{
                    for ($i=0; $i < $_POST['nbr_reponse']; $i++) { 
                        echo '<label for="rep'.$i.'">REP'.$i.'</label>';
                        echo '<input type="rep'.$i.'" name=rep'.$i.'id=rep'.$i.'>';
                        echo '<input type="radio" name="rep" id="rep'.$i.'"><br/><br/>';
                    }
                }
            }
            ?> 
            <button type="submit" name="submit" class="button">VALIDER</button>
        </fieldset>
    </form>
</body>
</html>