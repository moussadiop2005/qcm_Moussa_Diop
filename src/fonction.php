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
?>