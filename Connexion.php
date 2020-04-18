
    <div class="div">
        <div class="div1">
            <div class="d0">Login Form</div>
            <img src="asset/IMG/Icônes/ic-fermer.png" class="fermer">
        </div>
        <form action="#" method="post" class="form">
            <div class="d1">
                <input type="text" name="user" placeholder="Login" required>
                <div class="ic-login"></div>
            </div><br>
            <div class="d2">
                <input type="password" name="password" placeholder="Password" required>
                <div class="ic-pwd"></div>
            </div><br>
            <button type="submit" name="submit">Connexion</button>
            <a href="Mini_projet_sign_user.php" class="sign">S'inscrire pour jouer?</a>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $test=verificateur_login($_POST['user'],$_POST['password']);
            switch ($test) {
                case 0:
                    $_SESSION['connecte']=1;
                    $_SESSION['admin_actuel']=json_decode(file_get_contents('asset/JSON/Donnee_connexion.json'),true)[$_POST['user']];
                    break;
                case 1:
                    $_SESSION['connecte']=2;
                    $_SESSION['joueur_actuel']=json_decode(file_get_contents('asset/JSON/Donnee_connexion.json'),true)[$_POST['user']];
                    break;
                default:
                    echo 'Indentifiant invalide';
                    break;
            }
        }
        ?>
    </div>