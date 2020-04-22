<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="asset/CSS/page_inscription.css">
</head>
<body>
    <div id="body">
        <div class="header">
            <div class="logo_header" ><img src="asset/IMG/logo-QuizzSA.png" width="58"></div>
            <div class="text_header">Le plaisir de jouer</div>
        </div>
            <div class="div">
            <div class="form">
                <div class="head-form">
                    <div class="title-form">S'INCRIRE</div>
                    <div class="text-head">Pour tester votre niveau de culture générale</div>
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
                <div class="avatar"><img id="photo-admin" width="250"></div>
                <div class="text-avatar">Avatar du joueur</div>

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
        $tab[$_POST['login']]=['password'=>$_POST['pwd'], 'status'=>0,'prenom'=>$_POST['prenom'],'nom'=>$_POST['nom'],'photo'=>'asset/IMG/Avatar/'.$_POST['login'].strrchr($_FILES['avatar']['name'],'.')];
        $tab=json_encode($tab);
        file_put_contents('asset/JSON/Donnee_connexion.json',$tab);
    }
}
?>