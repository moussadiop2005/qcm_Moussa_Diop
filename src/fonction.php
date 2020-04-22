<?php

function verificateur_login ($user, $password)  {
    $tab=file_get_contents('asset/JSON/Donnee_connexion.json');
    $tab=json_decode($tab,true);
    foreach ($tab as $key => $value) {
        if ($key==$user&&$value['password']==$password) {
            return $value['status'];
        }
    }
    return 2;
}
function verificateur_validite_login ($login)  {
    $tab=file_get_contents('asset/JSON/Donnee_connexion.json');
    $tab=json_decode($tab,true);
    foreach ($tab as $key => $value) {
        if ($key==$login) {
            return false;
        }
    }
    return true;
}
function meilleur_score (array $scores){
    foreach ($scores as $value) {
        $tab[$value[2]]=$value;
    }
    krsort($tab);
    $n=0;
    foreach ($tab as $val) {
        $res[]=$val;
        $n++;
        if ($n==5) {
            break;
        }
    }
    return $res;
}
function classement_score (array $scores){
    foreach ($scores as $value) {
        $tab[$value[2]]=$value;
    }
    krsort($tab);
    $n=0;
    foreach ($tab as $val) {
        $res[]=$val;
    }
    return $res;
}
function pagination (array $tab){
    $tab;
    $nbr=count($tab);
    $nb_page=ceil($nbr/15);
    $n=0;
    
    if (isset($tab)) {
        for ($i=1; $i <= $nb_page; $i++) { 
            $i_debut=($i-1)*15;
            $i_fin=($i_debut+15)-1;
            if ($i==1) {
                echo '<table class="contenu-page affiche" id="page'.$i.'">';
                echo '<tr><th class="liste_nom">Nom</th><th class="liste_prenom">Prénoms</th><th class="liste_score">Score</th></tr>';
                for ($j=$i_debut; $j <= $i_fin; $j++) { 
                    if (isset($tab[$j])) {
                        echo '<tr>';
                            echo '<td class="liste_nom">'.strtoupper($tab[$j][1]).'</td>';
                            echo '<td class="liste_prenom">'.ucfirst($tab[$j][0]).'</td>';
                            echo '<td class="liste_score">'.$tab[$j][2].'</td>';
                        echo '</tr>';
                    }
                    
                }
                echo '</table>';
            }else{
                echo '<table class="contenu-page" id="page'.$i.'">';
                echo '<tr><th class="liste_nom">Nom</th><th class="liste_prenom">Prénoms</th><th class="liste_score">Score</th></tr>';
                for ($j=$i_debut; $j <= $i_fin; $j++) { 
                    if (isset($tab[$j])) {
                        echo '<tr>';
                            echo '<td class="liste_nom">'.strtoupper($tab[$j][1]).'</td>';
                            echo '<td class="liste_prenom">'.ucfirst($tab[$j][0]).'</td>';
                            echo '<td class="liste_score">'.$tab[$j][2].'</td>';
                        echo '</tr>';
                    }
                    
                }
                echo '</table>';
            }
        }
        
    }
}
?>
